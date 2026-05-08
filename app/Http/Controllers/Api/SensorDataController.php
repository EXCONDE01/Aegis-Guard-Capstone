<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Node;
use App\Models\EnvironmentalLog;

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

        // 2. Find the Node in the database (or fail if it doesn't exist)
        $node = Node::where('hardware_id', $validated['hardware_id'])->first();

        if (!$node) {
            return response()->json(['message' => 'Node not recognized.'], 404);
        }

        // 3. Simple Threshold Logic (You can adjust these values later)
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

        // 4. Save the reading to the database
        $log = EnvironmentalLog::create([
            'node_id' => $node->id,
            'temperature' => $validated['temperature'],
            'smoke_level' => $validated['smoke_level'],
            'water_level' => $validated['water_level'],
            'status' => $status,
            'hazard_type' => $hazardType,
            'alert_dispatched' => false // We will handle SMS dispatching later
        ]);

        // Update the Node's last ping time
        $node->update(['last_ping_at' => now(), 'status' => 'ONLINE']);

        return response()->json([
            'message' => 'Data logged successfully',
            'status' => $status
        ], 201);
    }
}