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
      <a href="/history" class="block p-3 hover:bg-slate-800 rounded-lg text-slate-300 transition-colors">📜 Hazard History Logs</a>
      <a href="/contacts" class="block p-3 hover:bg-slate-800 rounded-lg text-slate-300 transition-colors">📞 Alert Contacts</a>
    </nav>
    <div class="p-5 bg-[#06152D] border-t border-slate-700/50 text-sm">
      <div class="text-slate-400 mb-1 text-[10px] uppercase font-bold tracking-tight">Active Session:</div>
      <div class="font-bold text-white flex items-center gap-2 text-xs">
        <div class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></div>
        Campus Director
      </div>
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
      
      <div class="flex justify-between items-end mb-4">
        <h2 class="text-xl font-bold text-[#0B2447]">Campus Sensor Map</h2>
        <span class="text-xs text-slate-400 font-semibold">Live Database Feed</span>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        
        @foreach($nodes as $node)
            @php 
                $latestLog = $node->logs->first(); 
                $isCritical = $latestLog && $latestLog->status == 'CRITICAL';
                $isWarning = $latestLog && $latestLog->status == 'WARNING';
            @endphp

            <div class="{{ $isCritical ? 'bg-red-50 border-2 border-red-400 ring-4 ring-red-500/10' : ($isWarning ? 'bg-amber-50 border border-amber-300' : 'bg-white border border-slate-200') }} p-6 rounded-2xl shadow-sm flex flex-col transition-all">
              <div class="flex justify-between items-start mb-6">
                <div>
                  <h3 class="text-lg font-black {{ $isCritical ? 'text-red-700' : 'text-slate-800' }}">{{ $node->location_name }}</h3>
                  <p class="text-[10px] {{ $isCritical ? 'text-red-500' : 'text-slate-400' }} font-bold uppercase tracking-widest mt-1">{{ $node->specific_area ?? $node->hardware_id }}</p>
                </div>
                
                @if($isCritical)
                    <span class="bg-red-600 text-white px-2.5 py-1 rounded text-[10px] font-black uppercase tracking-wider shadow-sm animate-pulse">Critical</span>
                @elseif($isWarning)
                    <span class="bg-amber-500 text-white px-2.5 py-1 rounded text-[10px] font-black uppercase tracking-wider shadow-sm">Warning</span>
                @else
                    <span class="bg-green-50 text-green-600 px-2.5 py-1 rounded text-[10px] font-black uppercase tracking-wider border border-green-200">Safe</span>
                @endif
              </div>

              <div class="space-y-4">
                <div class="flex justify-between items-center text-sm border-b {{ $isCritical ? 'border-red-100' : 'border-slate-50' }} pb-2">
                  <span class="{{ $isCritical ? 'text-red-700 font-medium' : 'text-slate-500' }}">🌡️ Temperature</span>
                  <span class="font-bold {{ $isCritical ? 'text-red-700' : '' }}">{{ $latestLog ? $latestLog->temperature . ' °C' : '--' }}</span>
                </div>
                <div class="flex justify-between items-center text-sm border-b {{ $isCritical ? 'border-red-100' : 'border-slate-50' }} pb-2">
                  <span class="{{ $isCritical ? 'text-slate-600' : 'text-slate-500' }}">🌊 Water Level</span>
                  <span class="font-bold text-slate-800">{{ $latestLog ? $latestLog->water_level . ' cm' : '--' }}</span>
                </div>
                <div class="flex justify-between items-center text-sm">
                  <span class="{{ $isCritical ? 'text-red-700 font-medium' : 'text-slate-500' }}">💨 Smoke Level</span>
                  <span class="font-bold {{ $isCritical ? 'text-red-700' : '' }}">{{ $latestLog ? $latestLog->smoke_level . ' %' : '--' }}</span>
                </div>
              </div>
            </div>
        @endforeach

        @if($nodes->isEmpty())
            <div class="col-span-3 text-center p-12 bg-slate-50 rounded-2xl border border-dashed border-slate-300">
                <p class="text-slate-500 font-bold">No sensors deployed yet.</p>
            </div>
        @endif

      </div>
    </main>
  </div>
</body>
</html>