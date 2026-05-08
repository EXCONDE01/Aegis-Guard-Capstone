<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Node;
use App\Models\EnvironmentalLog;
use App\Models\AlertContact;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // 1. Real-Time Map (Already done)
    public function index()
    {
        $nodes = Node::with(['logs' => function($query) {
            $query->latest()->take(1);
        }])->get();

        return view('dashboard', compact('nodes'));
    }

    // 2. Hazard History Logs
    public function history()
    {
        // Fetch logs that are WARNING or CRITICAL, ordered by newest first
        $logs = EnvironmentalLog::with('node')
                    ->whereIn('status', ['WARNING', 'CRITICAL'])
                    ->latest()
                    ->get();
        
        $totalAlerts = $logs->count();

        return view('history', compact('logs', 'totalAlerts'));
    }

    // 3. Alert Contacts Page
    public function contacts()
    {
        $contacts = AlertContact::latest()->get();
        return view('contacts', compact('contacts'));
    }

    // 4. Save a New Contact
    public function storeContact(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'mobile_number' => 'required|string|max:20',
        ]);

        AlertContact::create($validated);

        // Redirect back with a success message
        return redirect('/contacts')->with('success', 'Emergency contact added successfully!');
    }
}