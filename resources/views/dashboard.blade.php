<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aegis-Guard | Command Center</title>
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
      <a href="/dashboard" class="block p-3 bg-blue-600/40 border border-blue-500/50 rounded-lg font-semibold text-white shadow-inner">📍 Real-Time Map</a>
      
      @if(auth()->user()->role == 'campus_director' || auth()->user()->role == 'system_admin')
        <a href="/history" class="block p-3 hover:bg-slate-800 rounded-lg text-slate-300 transition-colors">📜 Hazard History Logs</a>
        <a href="/contacts" class="block p-3 hover:bg-slate-800 rounded-lg text-slate-300 transition-colors">📞 Alert Contacts</a>
      @endif

      @if(auth()->user()->role == 'system_admin')
        <div class="pt-4 pb-1 px-3 text-[10px] text-slate-500 uppercase font-bold tracking-widest">Engineering</div>
        <a href="/nodes" class="block p-3 hover:bg-slate-800 rounded-lg text-amber-400 font-semibold border border-amber-400/10 transition-colors">⚙️ Node Management</a>
      @endif
    </nav>

    <div class="p-5 bg-[#06152D] border-t border-slate-700/50 text-sm">
      <form method="POST" action="/logout" class="mb-4">
          @csrf
          <button type="submit" class="text-[10px] text-slate-500 hover:text-white uppercase font-bold tracking-tight">Logout System</button>
      </form>
      <div class="text-slate-400 mb-1 text-[10px] uppercase font-bold tracking-tight">Active Session:</div>
      <div class="font-bold text-white flex items-center gap-2 text-xs uppercase">
        <div class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></div>
        {{ str_replace('_', ' ', auth()->user()->role) }} </div>
    </div>
  </div>

  <div class="flex-1 flex flex-col h-full overflow-hidden">
    <header class="bg-white shadow-sm p-6 flex justify-between items-center z-0">
      <div>
        <h1 class="text-2xl font-extrabold text-[#0B2447] tracking-tight">Command Center</h1>
        <p class="text-sm text-slate-500 font-medium">Live Environmental Monitoring</p>
      </div>
    </header>

    <main class="p-8 flex-1 overflow-y-auto space-y-8">
      @if(session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
          <strong class="font-bold">Access Denied:</strong>
          <span class="block sm:inline">{{ session('error') }}</span>
        </div>
      @endif

      <div class="flex justify-between items-end mb-4">
        <h2 class="text-xl font-bold text-[#0B2447]">Campus Sensor Map</h2>
        <span class="text-xs text-slate-400 font-semibold uppercase tracking-widest">Live Database Feed</span>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach($nodes as $node)
            @php 
                $latestLog = $node->logs->first(); 
                $statusClass = $latestLog && $latestLog->status == 'CRITICAL' ? 'bg-red-50 border-red-400' : 'bg-white border-slate-200';
            @endphp
            <div class="{{ $statusClass }} p-6 rounded-2xl border shadow-sm flex flex-col transition-all">
              <div class="flex justify-between items-start mb-6">
                <div>
                  <h3 class="text-lg font-black text-slate-800">{{ $node->location_name }}</h3>
                  <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest mt-1">{{ $node->hardware_id }}</p>
                </div>
                <span class="bg-green-50 text-green-600 px-2.5 py-1 rounded text-[10px] font-black border border-green-200 uppercase tracking-wider">ONLINE</span>
              </div>
              <div class="space-y-4">
                <div class="flex justify-between items-center text-sm border-b border-slate-50 pb-2">
                  <span class="text-slate-500">🌡️ Temperature</span>
                  <span class="font-bold">{{ $latestLog ? $latestLog->temperature . ' °C' : '--' }}</span>
                </div>
                <div class="flex justify-between items-center text-sm">
                  <span class="text-slate-500">💨 Smoke Level</span>
                  <span class="font-bold">{{ $latestLog ? $latestLog->smoke_level . ' %' : '--' }}</span>
                </div>
              </div>
            </div>
        @endforeach
      </div>
    </main>
  </div>
</body>
</html>