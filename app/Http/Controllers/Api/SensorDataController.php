<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Node;
use App\Models\EnvironmentalLog;
// 1. New imports for the Alerting System
use App\Models\AlertContact;
use Twilio\Rest\Client;

class SensorDataController extends Controller
{
    public function store(Request $request)
    {
        // 1. Validate the incoming data from the ESP32
        $validated = $request->validate([
            'hardware_id' => 'required|string',
            'temperature' => 'nullable|numeric',
            'smoke_level' => 'nullable|numeric',
            'water_level' => 'nullable|numeric',
        ]);

        // 2. Find the Node in the database
        $node = Node::where('hardware_id', $validated['hardware_id'])->first();

        if (!$node) {
            return response()->json(['message' => 'Node not recognized.'], 404);
        }

        // 3. Threshold Logic
        $status = 'SAFE';
        $hazardType = null;

        if ($validated['temperature'] >= 45 || $validated['smoke_level'] >= 15) {
            $status = 'CRITICAL';
            $hazardType = 'Fire/Smoke Warning';
        } elseif ($validated['water_level'] >= 10) {
            $status = 'CRITICAL';
            $hazardType = 'Flood Warning';
        } elseif ($validated['temperature'] >= 35) {
            $status = 'WARNING';
            $hazardType = 'High Temperature';
        }

        // 4. Save the reading
        $log = EnvironmentalLog::create([
            'node_id' => $node->id,
            'temperature' => $validated['temperature'],
            'smoke_level' => $validated['smoke_level'],
            'water_level' => $validated['water_level'],
            'status' => $status,
            'hazard_type' => $hazardType,
        ]);

        // 5. Trigger SMS Alerts if the status is CRITICAL
        if ($status === 'CRITICAL') {
            $this->dispatchEmergencySMS($hazardType, $node->location_name);
        }

        $node->update(['last_ping_at' => now(), 'status' => 'ONLINE']);

        return response()->json([
            'message' => 'Data logged successfully',
            'status' => $status
        ], 201);
    }

    // Helper function to send the actual SMS
    private function dispatchEmergencySMS($hazard, $location)
    {
        $contacts = AlertContact::where('is_active', true)->get();
        
        $sid = env('TWILIO_SID');
        $token = env('TWILIO_AUTH_TOKEN');
        $from = env('TWILIO_NUMBER');

        $client = new Client($sid, $token);

        foreach ($contacts as $contact) {
            try {
                $client->messages->create(
                    '+63' . $contact->mobile_number, 
                    [
                        'from' => $from,
                        'body' => "[AEGIS-GUARD ALERT] EMERGENCY: {$hazard} detected at {$location}. Please evacuate immediately."
                    ]
                );
            } catch (\Exception $e) {
                \Log::error("SMS Failed for {$contact->full_name}: " . $e->getMessage());
            }
        }
    }
}