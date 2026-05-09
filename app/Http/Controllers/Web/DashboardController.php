<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Node;
use App\Models\EnvironmentalLog;
use App\Models\AlertContact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    // ==========================================
    // UNIVERSITY ADMIN (CAMPUS DIRECTOR) ROUTES
    // ==========================================

    // 1. Command Center: Real-Time Map
    public function index()
    {
        // Fetch all nodes and only their single most recent log for the dashboard
        $nodes = Node::with(['logs' => function($query) {
            $query->latest()->take(1);
        }])->get();

        return view('dashboard', compact('nodes'));
    }

    // 2. Hazard History Logs (Optimized for HTMX)
    public function history()
    {
        // Uses paginate() instead of get() to prevent database lag on large tables
        $logs = EnvironmentalLog::with('node')
                    ->whereIn('status', ['WARNING', 'CRITICAL'])
                    ->latest()
                    ->paginate(50);
        
        // Fast aggregate count directly from the database
        $totalAlerts = EnvironmentalLog::whereIn('status', ['WARNING', 'CRITICAL'])->count();

        return view('history', compact('logs', 'totalAlerts'));
    }

    // 3. Alert Contacts Directory
    public function contacts()
    {
        $contacts = AlertContact::latest()->get();
        return view('contacts', compact('contacts'));
    }

    // 4. Save a New Emergency Contact
    public function storeContact(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'mobile_number' => 'required|string|max:20',
        ]);

        AlertContact::create($validated);

        return redirect('/contacts')->with('success', 'Emergency contact added successfully!');
    }

    // 5. Manual Alert Dispatch View
    public function manualAlert()
    {
        return view('manual_alert');
    }

    // 6. Execute Manual Alert
    public function dispatchAlert(Request $request)
    {
        // In a production scenario, manual Twilio API dispatch logic would trigger here
        return redirect('/dashboard')->with('success', 'Emergency broadcast dispatched to all registered faculty and staff.');
    }

    // ==========================================
    // SYSTEM ADMIN (IT BACKEND) ROUTES
    // ==========================================

    // 7. Infrastructure Monitor (Nodes Page)
    public function manageNodes()
    {
        $nodes = Node::all();
        
        // Mock data for wireframe metrics (In production, pull from Proxmox/OPNsense API)
        $systemMetrics = [
            'cpu_load' => '12%',
            'ram_usage' => '2.4 GB',
            'uptime' => '84%',
            'active_nodes' => $nodes->where('status', 'ONLINE')->count() . ' / ' . $nodes->count()
        ];

        return view('nodes', compact('nodes', 'systemMetrics'));
    }

    // 8. View Sensor Threshold Calibration
    public function thresholds()
    {
        $settings = DB::table('settings')->pluck('value', 'key');
        return view('thresholds', compact('settings'));
    }

    // 9. Save Updated Sensor Thresholds
    public function updateThresholds(Request $request)
    {
        $data = $request->validate([
            'temp_critical' => 'required|numeric',
            'temp_warning' => 'required|numeric',
            'smoke_critical' => 'required|numeric',
            'water_critical' => 'required|numeric',
            'polling_rate' => 'required|numeric',
        ]);

        foreach ($data as $key => $value) {
            DB::table('settings')->where('key', $key)->update(['value' => $value]);
        }

        return redirect('/thresholds')->with('success', 'System safety thresholds applied successfully!');
    }
}