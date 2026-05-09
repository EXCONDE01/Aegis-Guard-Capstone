<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Node;
use App\Models\EnvironmentalLog;
use App\Models\AlertContact;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    // ==========================================
    // CAMPUS SAFETY METHODS
    // ==========================================

    public function index()
    {
        // Load all nodes with their latest log
        $nodes = Node::with(['logs' => function($query) {
            $query->latest()->take(1);
        }])->get();

        return view('dashboard', compact('nodes'));
    }

    public function history()
    {
        $logs = EnvironmentalLog::with('node')->latest()->paginate(15);
        $totalAlerts = EnvironmentalLog::count();
        
        return view('history', compact('logs', 'totalAlerts'));
    }

    public function contacts()
    {
        $contacts = AlertContact::orderBy('full_name')->get();
        return view('contacts', compact('contacts'));
    }

    public function storeContact(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'mobile_number' => 'required|string|max:15',
        ]);

        AlertContact::create($validated);
        return back()->with('success', 'Emergency contact registered successfully.');
    }

    public function manualAlert()
    {
        return view('manual_alert');
    }

    public function dispatchAlert(Request $request)
    {
        $request->validate(['message' => 'required|string']);
        
        // Here you would integrate your SMS Gateway API (like Twilio or Semaphore)
        // For the capstone, we simulate the success:
        
        return redirect('/dashboard')->with('success', 'Priority SMS broadcast dispatched successfully.');
    }


    // ==========================================
    // IT INFRASTRUCTURE METHODS (System Admin)
    // ==========================================

    public function manageNodes()
    {
        // 1. Fetch physical hardware from database
        $nodes = Node::all();

        // 2. Generate System Metrics (In production, this would use shell_exec to check Proxmox)
        $systemMetrics = [
            'cpu_load' => rand(10, 25) . '%',
            'ram_usage' => '4.' . rand(1, 9) . ' GB',
            'uptime' => '99.' . rand(90, 99) . '%',
            'active_nodes' => $nodes->where('status', 'ONLINE')->count(),
        ];

        return view('nodes', compact('nodes', 'systemMetrics'));
    }

    public function showThresholds()
    {
        // Fetch key-value pairs from the settings table
        // (Assuming you ran the 2026_05_08_065528_create_settings_table.php migration)
        $settingsData = DB::table('settings')->pluck('value', 'key')->toArray();

        // Default fallbacks in case the table is empty
        $settings = [
            'temp_warning' => $settingsData['temp_warning'] ?? 40,
            'temp_critical' => $settingsData['temp_critical'] ?? 60,
            'smoke_warning' => $settingsData['smoke_warning'] ?? 15,
            'smoke_critical' => $settingsData['smoke_critical'] ?? 30,
            'polling_rate' => $settingsData['polling_rate'] ?? 5,
        ];

        return view('thresholds', compact('settings'));
    }

    public function updateThresholds(Request $request)
    {
        // Validate incoming hardware threshold parameters
        $validated = $request->validate([
            'temp_warning' => 'required|numeric',
            'temp_critical' => 'required|numeric',
            'smoke_warning' => 'required|numeric',
            'smoke_critical' => 'required|numeric',
            'polling_rate' => 'required|numeric',
        ]);

        // Loop through and update or insert settings into the database
        foreach ($validated as $key => $value) {
            DB::table('settings')->updateOrInsert(
                ['key' => $key],
                ['value' => $value, 'updated_at' => now()]
            );
        }

        return back()->with('success', 'Sensor thresholds calibrated successfully.');
    }
    
}