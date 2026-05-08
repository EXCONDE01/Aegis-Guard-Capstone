<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aegis-Guard | Infrastructure Monitor</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex h-screen bg-[#0F172A] font-sans text-slate-300 overflow-hidden">

  <div class="w-64 bg-[#1E293B] border-r border-slate-800 flex flex-col z-10">
    <div class="p-6 border-b border-slate-800 flex flex-col gap-2">
      <div class="flex items-center gap-2 text-xl font-bold text-white">
        <span class="bg-indigo-600 p-1.5 rounded shadow-lg text-lg">⚙️</span> IT BACKEND
      </div>
    </div>

    <nav class="flex-1 p-4 space-y-3 mt-4 text-sm">
      <a href="/nodes" class="block p-3 bg-indigo-600/20 border border-indigo-500/50 rounded-lg font-semibold text-white">🔗 Node Connectivity</a>
      <a href="#" class="block p-3 hover:bg-slate-800 rounded-lg transition-colors">📊 Threshold Config</a>
      <a href="#" class="block p-3 hover:bg-slate-800 rounded-lg transition-colors">🛡️ Gateway & VLAN</a>
      <a href="#" class="block p-3 hover:bg-slate-800 rounded-lg transition-colors">💾 System Backups</a>
    </nav>

    <div class="p-5 border-t border-slate-800">
      <a href="/dashboard" class="text-xs text-indigo-400 hover:text-white font-bold uppercase tracking-widest">← Return to Command Center</a>
    </div>
  </div>

  <div class="flex-1 flex flex-col h-full">
    <header class="bg-[#1E293B] p-6 flex justify-between items-center border-b border-slate-800">
      <h1 class="text-2xl font-black text-white tracking-tight uppercase">Infrastructure Monitor</h1>
    </header>

    <main class="p-8 flex-1 overflow-y-auto space-y-8">
      
      <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        <div class="bg-[#1E293B] p-6 rounded-xl border border-slate-800">
          <div class="text-[10px] uppercase font-black tracking-widest text-slate-500 mb-2">Gateway CPU Load</div>
          <div class="text-3xl font-black text-white">{{ $systemMetrics['cpu_load'] }}</div>
        </div>
        <div class="bg-[#1E293B] p-6 rounded-xl border border-slate-800">
          <div class="text-[10px] uppercase font-black tracking-widest text-slate-500 mb-2">Proxmox RAM Usage</div>
          <div class="text-3xl font-black text-white">{{ $systemMetrics['ram_usage'] }}</div>
        </div>
        <div class="bg-[#1E293B] p-6 rounded-xl border border-slate-800">
          <div class="text-[10px] uppercase font-black tracking-widest text-slate-500 mb-2">Overall Uptime</div>
          <div class="text-3xl font-black text-white">{{ $systemMetrics['uptime'] }}</div>
        </div>
        <div class="bg-[#1E293B] p-6 rounded-xl border border-slate-800">
          <div class="text-[10px] uppercase font-black tracking-widest text-slate-500 mb-2">Active Nodes</div>
          <div class="text-3xl font-black text-indigo-400">{{ $systemMetrics['active_nodes'] }}</div>
        </div>
      </div>

      <div class="bg-[#1E293B] rounded-xl border border-slate-800 overflow-hidden shadow-2xl">
        <div class="p-6 border-b border-slate-800">
          <h2 class="text-sm font-black uppercase tracking-widest text-white">ESP32 Edge-Node Connectivity</h2>
        </div>
        <table class="w-full text-left text-sm">
          <thead>
            <tr class="bg-[#0F172A] text-slate-500">
              <th class="px-6 py-4 font-bold uppercase text-[10px]">Hardware ID</th>
              <th class="px-6 py-4 font-bold uppercase text-[10px]">Location</th>
              <th class="px-6 py-4 font-bold uppercase text-[10px]">Latency</th>
              <th class="px-6 py-4 font-bold uppercase text-[10px]">Status</th>
              <th class="px-6 py-4 font-bold uppercase text-[10px]">Action</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-slate-800">
            @foreach($nodes as $node)
            <tr class="hover:bg-slate-800/50">
              <td class="px-6 py-4 font-mono text-indigo-400 font-bold">{{ $node->hardware_id }}</td>
              <td class="px-6 py-4 text-white font-semibold">{{ $node->location_name }}</td>
              <td class="px-6 py-4">14 ms</td>
              <td class="px-6 py-4">
                <span class="flex items-center gap-2">
                  <div class="w-2 h-2 rounded-full bg-green-500"></div>
                  {{ $node->status }}
                </span>
              </td>
              <td class="px-6 py-4">
                <button class="text-[10px] font-black uppercase text-slate-500 hover:text-indigo-400">Reboot</button>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </main>
  </div>
</body>
</html>