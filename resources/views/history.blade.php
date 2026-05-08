<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hazard History | Aegis-Guard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex h-screen bg-slate-50 font-sans text-slate-900 overflow-hidden">

  <div class="w-64 bg-[#0B2447] text-white flex flex-col shadow-2xl z-10">
    <div class="p-6 border-b border-slate-700/50 flex flex-col gap-2">
      <div class="flex items-center gap-2 text-2xl font-bold">
        <span class="bg-amber-500 text-white p-1.5 rounded shadow-lg text-lg">🛡️</span> Aegis-Guard
      </div>
      <span class="text-[10px] text-amber-400 tracking-widest uppercase font-black">LSPU Campus</span>
    </div>
    <nav class="flex-1 p-4 space-y-3 mt-4 text-sm">
      <a href="/dashboard" class="block p-3 hover:bg-slate-800 rounded-lg text-slate-300 transition-colors">📍 Real-Time Map</a>
      <a href="/history" class="block p-3 bg-blue-600/40 border border-blue-500/50 rounded-lg font-semibold text-white shadow-inner">📜 Hazard History Logs</a>
      <a href="/contacts" class="block p-3 hover:bg-slate-800 rounded-lg text-slate-300 transition-colors">📞 Alert Contacts</a>
    </nav>
  </div>

  <div class="flex-1 flex flex-col h-full overflow-hidden">
    <header class="bg-white shadow-sm p-6 flex justify-between items-center z-0">
      <div>
        <h1 class="text-2xl font-extrabold text-[#0B2447] tracking-tight">Hazard History Logs</h1>
        <p class="text-sm text-slate-500 font-medium">Archived Incident Reports & Analytics</p>
      </div>
    </header>

    <main class="p-8 flex-1 overflow-y-auto space-y-6">
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-200">
          <h3 class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Total Alerts Logged</h3>
          <p class="text-4xl font-black text-slate-800 mt-2">{{ $totalAlerts }}</p>
        </div>
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-200">
          <h3 class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Network Priority</h3>
          <p class="text-4xl font-black text-[#0B2447] mt-2">100%</p>
          <p class="text-xs text-slate-500 font-bold uppercase tracking-wider mt-2">VLAN 10 Status: Secure</p>
        </div>
      </div>

      <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
        <table class="w-full text-left border-collapse">
          <thead>
            <tr class="bg-slate-50 text-[10px] text-slate-500 uppercase tracking-widest font-black border-b border-slate-200">
              <th class="p-5">Timestamp</th>
              <th class="p-5">Location</th>
              <th class="p-5">Hazard Type</th>
              <th class="p-5">Status</th>
            </tr>
          </thead>
          <tbody class="text-sm">
            @forelse($logs as $log)
            <tr class="border-b border-slate-100 hover:bg-slate-50">
              <td class="p-5 font-medium text-slate-600">{{ $log->created_at->format('M d, Y • H:i') }}</td>
              <td class="p-5 font-bold text-slate-800">{{ $log->node->location_name ?? 'Unknown' }}</td>
              <td class="p-5 font-bold {{ $log->status == 'CRITICAL' ? 'text-red-600' : 'text-amber-600' }} italic">{{ $log->hazard_type }}</td>
              <td class="p-5">
                @if($log->status == 'CRITICAL')
                  <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs font-bold border border-red-200">CRITICAL</span>
                @else
                  <span class="bg-amber-100 text-amber-700 px-3 py-1 rounded-full text-xs font-bold border border-amber-200">WARNING</span>
                @endif
              </td>
            </tr>
            @empty
            <tr>
              <td colspan="4" class="p-5 text-center text-slate-500 font-bold">No hazard logs recorded yet.</td>
            </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </main>
  </div>
</body>
</html>