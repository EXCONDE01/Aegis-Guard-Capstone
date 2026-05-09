<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aegis-Guard | Manual Dispatch</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/htmx.org@1.9.10"></script>
</head>
<body class="flex h-screen bg-[#F8FAFC] font-sans text-slate-900 overflow-hidden">

  <div id="mobile-overlay" class="fixed inset-0 bg-slate-900/50 z-40 hidden md:hidden" onclick="toggleSidebar()"></div>

  <div id="sidebar" class="fixed inset-y-0 left-0 transform -translate-x-full md:relative md:translate-x-0 transition duration-300 ease-in-out w-64 bg-[#0F172A] text-white flex flex-col shadow-2xl z-50">
    <div class="p-6 flex justify-between items-center gap-2">
      <div class="flex items-center gap-3 text-2xl font-black tracking-tight">
        <div class="w-8 h-8 bg-indigo-500 rounded-lg flex items-center justify-center shadow-lg shadow-indigo-500/30">
          <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M12.516 2.17a.75.75 0 00-1.032 0 11.209 11.209 0 01-7.877 3.08.75.75 0 00-.722.515A12.74 12.74 0 002.25 9.75c0 5.942 4.064 10.933 9.563 12.348a.749.749 0 00.374 0c5.499-1.415 9.563-6.406 9.563-12.348 0-1.39-.223-2.73-.635-3.985a.75.75 0 00-.722-.516l-.143.001c-2.996 0-5.717-1.17-7.734-3.08zm3.094 8.016a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" /></svg>
        </div>
        Aegis-Guard
      </div>
      <button onclick="toggleSidebar()" class="md:hidden text-slate-400 hover:text-white">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path></svg>
      </button>
    </div>
    <div class="px-6 mb-2">
        <span class="text-[10px] text-indigo-400 tracking-widest uppercase font-bold mt-1">LSPU Campus</span>
    </div>

    <nav class="flex-1 p-4 space-y-2 mt-2 text-sm font-medium" hx-boost="true">
      <div class="px-3 pb-2 text-[10px] text-slate-500 uppercase font-black tracking-widest">Campus Safety</div>
      <a href="/dashboard" class="flex items-center gap-3 p-3 hover:bg-slate-800/50 rounded-xl text-slate-400 hover:text-white transition-all">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 6.75V15m6-6v8.25m.503 3.498l4.875-2.437c.381-.19.622-.58.622-1.006V4.82c0-.836-.88-1.38-1.628-1.006l-3.869 1.934c-.317.159-.69.159-1.006 0L9.503 3.252a1.125 1.125 0 00-1.006 0L3.622 5.689C3.24 5.88 3 6.27 3 6.705V19.18c0 .836.88 1.38 1.628 1.006l3.869-1.934c.317-.159.69-.159 1.006 0l4.994 2.497c.317.158.69.158 1.006 0z" /></svg>
        Real-Time Map
      </a>
      
      @if(auth()->user()->role == 'campus_director' || auth()->user()->role == 'system_admin')
        <a href="/history" class="flex items-center gap-3 p-3 hover:bg-slate-800/50 rounded-xl text-slate-400 hover:text-white transition-all">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m5.231 13.481L15 17.25m-4.5-15H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9zm3.75 11.625a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" /></svg>
          Hazard History Logs
        </a>
        <a href="/contacts" class="flex items-center gap-3 p-3 hover:bg-slate-800/50 rounded-xl text-slate-400 hover:text-white transition-all">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" /></svg>
          Alert Contacts
        </a>
      @endif

      @if(auth()->user()->role == 'system_admin')
        <div class="pt-6 pb-2 px-3 text-[10px] text-slate-500 uppercase font-black tracking-widest">IT Infrastructure</div>
        <a href="/nodes" class="flex items-center gap-3 p-3 hover:bg-slate-800/50 rounded-xl text-slate-400 hover:text-white transition-all"><svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5.25 14.25h13.5m-13.5 0a3 3 0 01-3-3m3 3a3 3 0 100 6h13.5a3 3 0 100-6m-16.5-3a3 3 0 013-3h13.5a3 3 0 013 3m-19.5 0a4.5 4.5 0 01.9-2.7L5.737 5.1a3.375 3.375 0 012.7-1.35h7.126c1.062 0 2.062.5 2.7 1.35l2.587 3.45a4.5 4.5 0 01.9 2.7m0 0a3 3 0 01-3 3m0 3h.008v.008h-.008v-.008zm0-6h.008v.008h-.008v-.008zm-3 6h.008v.008h-.008v-.008zm0-6h.008v.008h-.008v-.008z" /></svg> Node Management</a>
        <a href="/thresholds" class="flex items-center gap-3 p-3 hover:bg-slate-800/50 rounded-xl text-slate-400 hover:text-white transition-all"><svg class="w-5 h-5 text-amber-500" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6a7.5 7.5 0 107.5 7.5h-7.5V6z" /><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 10.5H21A7.5 7.5 0 0013.5 3v7.5z" /></svg> Threshold Config</a>
        <a href="/gateway" class="flex items-center gap-3 p-3 hover:bg-slate-800/50 rounded-xl text-slate-400 hover:text-white transition-all"><svg class="w-5 h-5 text-emerald-500" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 17.25v1.007a3 3 0 01-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0115 18.257V17.25m6-12V15a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 15V5.25m18 0A2.25 2.25 0 0018.75 3H5.25A2.25 2.25 0 003 5.25m18 0V12a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 12V5.25" /></svg> Gateway & VLAN</a>
        <a href="/backups" class="flex items-center gap-3 p-3 hover:bg-slate-800/50 rounded-xl text-slate-400 hover:text-white transition-all"><svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M20.25 6.375c0 2.278-3.694 4.125-8.25 4.125S3.75 8.653 3.75 6.375m16.5 0c0-2.278-3.694-4.125-8.25-4.125S3.75 4.097 3.75 6.375m16.5 0v11.25c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125V6.375m16.5 0v3.75m-16.5-3.75v3.75m16.5 0v3.75C20.25 16.153 16.556 18 12 18s-8.25-1.847-8.25-4.125v-3.75m16.5 0c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125" /></svg> System Backups</a>
      @endif
    </nav>

    <div class="p-6 bg-[#0B1120] text-sm flex flex-col gap-4">
      <div>
        <div class="text-slate-500 mb-1 text-[10px] uppercase font-black tracking-widest">Active Session</div>
        <div class="font-bold text-white flex items-center gap-2 text-xs">
          <span class="relative flex h-2.5 w-2.5">
            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
            <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-green-500"></span>
          </span>
          {{ auth()->user()->role == 'campus_director' ? 'Campus Director' : 'System Admin' }}
        </div>
      </div>
      <form method="POST" action="/logout">
        @csrf
        <button type="submit" class="w-full flex items-center justify-center gap-2 py-2.5 px-3 text-[10px] font-black uppercase tracking-widest text-slate-400 hover:text-white bg-slate-800/50 hover:bg-red-500/20 border border-slate-700 hover:border-red-500/50 rounded-xl transition-all">
          <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" /></svg>
          Terminate Session
        </button>
      </form>
    </div>
  </div>

  <div class="flex-1 flex flex-col h-full overflow-hidden w-full relative">
    <header class="bg-white/60 backdrop-blur-xl border-b border-slate-200 p-6 md:p-8 flex items-center gap-4 z-30 sticky top-0">
      <button onclick="toggleSidebar()" class="md:hidden p-2 -ml-2 text-slate-600 hover:bg-slate-100 rounded-lg">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"></path></svg>
      </button>
      <div>
        <div class="flex items-center gap-2 text-xs font-bold text-slate-400 uppercase tracking-widest mb-1">
          <a href="/dashboard" class="hover:text-indigo-500 transition-colors">Command Center</a>
          <span>/</span>
          <span class="text-red-500">Emergency Override</span>
        </div>
        <h1 class="text-2xl md:text-3xl font-black text-slate-800 tracking-tight">Manual Alert Dispatch</h1>
      </div>
    </header>

    <main class="p-4 md:p-8 flex-1 flex justify-center items-start overflow-y-auto pb-20">
      
      <div class="max-w-3xl w-full bg-white rounded-3xl shadow-xl overflow-hidden border border-slate-200/60 mt-4 md:mt-10">
        
        <div class="bg-red-50 p-8 border-b border-red-100 flex items-start md:items-center gap-6">
            <div class="w-16 h-16 bg-red-100 rounded-2xl flex items-center justify-center text-red-600 shrink-0 shadow-inner">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2.25m0 0v2.25m0-2.25h2.25m-4.5 0h2.25m-2.25 5.25h4.5m-4.5-10.5h4.5M12 2.25v1.5m0 16.5v1.5m-7.794-7.86l-1.06-1.06m17.708 0l-1.06 1.06M3 12h1.5m15 0h1.5m-3.206-7.86l1.06-1.06M6.354 18.354l-1.06 1.06" /></svg>
            </div>
            <div>
                <h2 class="text-red-700 text-xl md:text-2xl font-black tracking-tight">Confirm Manual Alert Dispatch</h2>
                <p class="text-red-500 text-sm font-medium mt-1">This action bypasses automated sensor logic and dispatches an immediate priority alert.</p>
            </div>
        </div>

        <div class="p-8 md:p-10 space-y-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 bg-slate-50 p-6 rounded-2xl border border-slate-100">
                <div>
                    <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest block mb-1">Protocol Type</span>
                    <span class="text-sm font-bold text-red-600 flex items-center gap-1.5">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 1.5H8.25A2.25 2.25 0 006 3.75v16.5a2.25 2.25 0 002.25 2.25h7.5A2.25 2.25 0 0018 20.25V3.75a2.25 2.25 0 00-2.25-2.25H13.5m-3 0V3h3V1.5m-3 0h3m-3 18.75h3" /></svg>
                        SMS Notification
                    </span>
                </div>
                <div>
                    <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest block mb-1">Target Recipients</span>
                    <span class="text-sm font-bold text-slate-800 flex items-center gap-1.5">
                        <svg class="w-4 h-4 text-indigo-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" /></svg>
                        All Registered Faculty
                    </span>
                </div>
                <div>
                    <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest block mb-1">Network Path</span>
                    <span class="text-sm font-bold text-indigo-600 flex items-center gap-1.5">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 3v1.5M4.5 8.25H3m18 0h-1.5M4.5 12H3m18 0h-1.5m-15 3.75H3m18 0h-1.5M8.25 19.5V21M12 3v1.5m0 15V21m3.75-18v1.5m0 15V21m-9-1.5h10.5a2.25 2.25 0 002.25-2.25V6.75a2.25 2.25 0 00-2.25-2.25H6.75A2.25 2.25 0 004.5 6.75v10.5a2.25 2.25 0 002.25 2.25z" /></svg>
                        VLAN 10 Priority Tag
                    </span>
                </div>
            </div>

            <div class="space-y-3">
                <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest block flex items-center gap-2">
                    <svg class="w-4 h-4 text-slate-300" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12.76c0 1.6 1.123 2.994 2.707 3.227 1.087.16 2.185.283 3.293.369V21l4.076-4.076a1.526 1.526 0 011.037-.443 48.282 48.282 0 005.68-.494c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" /></svg>
                    Broadcast Message Preview
                </span>
                <div class="bg-[#0F172A] p-6 md:p-8 rounded-2xl relative shadow-inner">
                    <div class="absolute top-0 left-0 w-2 h-full bg-red-500 rounded-l-2xl"></div>
                    <p class="text-red-100 text-sm md:text-base leading-relaxed italic font-medium">
                        "AEGIS-GUARD ALERT: Laguna State Polytechnic University is initiating an Emergency Response. Please secure all laboratory equipment and follow established evacuation protocols immediately."
                    </p>
                </div>
            </div>

            <form action="{{ route('manual.dispatch') }}" method="POST" class="pt-4 border-t border-slate-100 flex flex-col md:flex-row gap-4 justify-end">
                @csrf
                <a href="/dashboard" class="w-full md:w-auto px-8 py-4 text-center text-slate-500 hover:text-slate-800 bg-white hover:bg-slate-50 border border-slate-200 rounded-xl text-xs font-black uppercase tracking-widest transition-colors">
                    Cancel Action
                </a>
                <button type="submit" class="w-full md:w-auto px-10 py-4 flex items-center justify-center gap-3 bg-red-600 hover:bg-red-700 text-white font-black uppercase tracking-widest text-xs rounded-xl shadow-lg shadow-red-600/30 transition-all focus:ring-4 focus:ring-red-500/50">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5" /></svg>
                    Confirm & Dispatch Now
                </button>
            </form>
        </div>
      </div>
    </main>
  </div>

  <script>
    function toggleSidebar() {
        document.getElementById('sidebar').classList.toggle('-translate-x-full');
        document.getElementById('mobile-overlay').classList.toggle('hidden');
    }
  </script>
</body>
</html>