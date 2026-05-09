<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aegis-Guard | Alert Contacts</title>
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
      <a href="/contacts" class="flex items-center gap-3 p-3 bg-indigo-600/10 text-indigo-400 rounded-xl shadow-inner ring-1 ring-indigo-500/20 transition-all">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" /></svg>
        Alert Contacts
      </a>
      @endif

      @if(auth()->user()->role == 'system_admin')
        <div class="pt-6 pb-2 px-3 text-[10px] text-slate-500 uppercase font-black tracking-widest">IT Infrastructure</div>
        <a href="/nodes" class="flex items-center gap-3 p-3 hover:bg-slate-800/50 rounded-xl text-slate-400 hover:text-white transition-all border border-transparent hover:border-slate-700">
          <svg class="w-5 h-5 text-amber-500" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5.25 14.25h13.5m-13.5 0a3 3 0 01-3-3m3 3a3 3 0 100 6h13.5a3 3 0 100-6m-16.5-3a3 3 0 013-3h13.5a3 3 0 013 3m-19.5 0a4.5 4.5 0 01.9-2.7L5.737 5.1a3.375 3.375 0 012.7-1.35h7.126c1.062 0 2.062.5 2.7 1.35l2.587 3.45a4.5 4.5 0 01.9 2.7m0 0a3 3 0 01-3 3m0 3h.008v.008h-.008v-.008zm0-6h.008v.008h-.008v-.008zm-3 6h.008v.008h-.008v-.008zm0-6h.008v.008h-.008v-.008z" /></svg>
          Node Management
        </a>
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
    <header class="bg-white/60 backdrop-blur-xl border-b border-slate-200 p-6 md:p-8 flex justify-between items-center z-30 sticky top-0">
      <div class="flex items-center gap-4">
        <button onclick="toggleSidebar()" class="md:hidden p-2 -ml-2 text-slate-600 hover:bg-slate-100 rounded-lg">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"></path></svg>
        </button>
        <div>
          <h1 class="text-2xl md:text-3xl font-black text-slate-800 tracking-tight">Emergency Alert Contacts</h1>
          <p class="text-xs md:text-sm text-slate-500 font-semibold mt-1">Manage SMS and Push Notification recipients</p>
        </div>
      </div>

      <div class="flex items-center gap-6">
        <div class="hidden md:block text-right mr-4">
          <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Network Status</p>
          <p class="text-xs font-black text-green-600 flex items-center justify-end gap-1.5 mt-0.5">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            Secure & Encrypted
          </p>
        </div>
        
        <div class="relative group">
            <button class="relative p-2.5 text-slate-600 bg-white rounded-full border border-slate-200 shadow-sm hover:bg-slate-50 transition-colors">
                <span class="absolute top-0 right-0 w-2.5 h-2.5 bg-red-500 rounded-full animate-pulse ring-2 ring-white"></span>
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" /></svg>
            </button>
            <div class="absolute right-0 mt-2 w-80 bg-white rounded-2xl shadow-xl border border-slate-100 hidden group-hover:block overflow-hidden transition-all">
                <div class="p-4 border-b border-slate-100 bg-slate-50">
                    <h4 class="font-black text-slate-800 text-sm">Recent Alerts</h4>
                </div>
                <div class="p-4 text-xs text-slate-600 space-y-3">
                    <div class="flex gap-3 items-start">
                        <div class="w-2 h-2 mt-1.5 rounded-full bg-red-500 shrink-0"></div>
                        <div><p class="font-bold text-slate-800">Critical Temp: Lab 304</p><p class="text-[10px] text-slate-400">2 minutes ago</p></div>
                    </div>
                </div>
                <a href="/history" class="block text-center p-3 bg-slate-50 text-[10px] font-black uppercase text-indigo-600 hover:bg-slate-100">View All Logs</a>
            </div>
        </div>
      </div>
    </header>

    <main class="p-4 md:p-8 flex-1 overflow-y-auto pb-20">
      <div class="grid grid-cols-1 xl:grid-cols-3 gap-8">
        
        <div class="xl:col-span-1">
          <div class="bg-white p-8 rounded-3xl shadow-sm border border-slate-200/60 sticky top-8">
            <div class="mb-6">
              <h2 class="text-lg font-black text-slate-800">Register New Contact</h2>
              <p class="text-xs text-slate-500 font-medium mt-1">Add a faculty member to the automated emergency SMS dispatch list.</p>
            </div>
            <form action="/contacts" method="POST" class="space-y-5">
              @csrf
              <div>
                <label class="block text-[10px] font-black uppercase text-slate-500 tracking-widest mb-1.5">Full Name</label>
                <input type="text" name="full_name" required placeholder="Dr. Juan Dela Cruz" class="w-full bg-slate-50 border border-slate-200 rounded-xl p-3 text-sm text-slate-800 font-medium focus:ring-2 focus:ring-indigo-500 outline-none">
              </div>
              <div>
                <label class="block text-[10px] font-black uppercase text-slate-500 tracking-widest mb-1.5">Designation</label>
                <input type="text" name="designation" required placeholder="Dean, College of Engineering" class="w-full bg-slate-50 border border-slate-200 rounded-xl p-3 text-sm text-slate-800 font-medium focus:ring-2 focus:ring-indigo-500 outline-none">
              </div>
              <div>
                <label class="block text-[10px] font-black uppercase text-slate-500 tracking-widest mb-1.5">Mobile Number</label>
                <div class="flex">
                  <span class="inline-flex items-center px-4 bg-slate-100 border border-r-0 border-slate-200 rounded-l-xl text-slate-500 text-sm font-bold">+63</span>
                  <input type="text" name="mobile_number" required placeholder="9123456789" class="w-full bg-slate-50 border border-slate-200 rounded-r-xl p-3 text-sm text-slate-800 font-medium focus:ring-2 focus:ring-indigo-500 outline-none">
                </div>
              </div>
              <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-black uppercase tracking-widest text-xs py-3.5 rounded-xl shadow-lg transition-all mt-4">
                Save Contact
              </button>
            </form>
          </div>
        </div>

        <div class="xl:col-span-2">
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @forelse($contacts as $contact)
              <div class="bg-white p-6 rounded-3xl shadow-sm border border-slate-200/60 flex items-start gap-4">
                <div class="w-12 h-12 rounded-full bg-indigo-50 text-indigo-600 flex items-center justify-center font-black text-xl border border-indigo-100 shrink-0">
                  {{ substr($contact->full_name, 0, 1) }}
                </div>
                <div class="flex-1">
                  <h3 class="text-base font-black text-slate-800">{{ $contact->full_name }}</h3>
                  <p class="text-xs font-bold text-slate-500 mt-0.5">{{ $contact->designation }}</p>
                  
                  <div class="mt-4 pt-4 border-t border-slate-100 flex items-center justify-between">
                    <span class="flex items-center gap-1.5 text-sm font-bold text-slate-700">
                      <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 1.5H8.25A2.25 2.25 0 006 3.75v16.5a2.25 2.25 0 002.25 2.25h7.5A2.25 2.25 0 0018 20.25V3.75a2.25 2.25 0 00-2.25-2.25H13.5m-3 0V3h3V1.5m-3 0h3m-3 18.75h3" /></svg>
                      0{{ $contact->mobile_number }}
                    </span>
                  </div>
                </div>
              </div>
            @empty
              <div class="col-span-full text-center p-16 bg-white rounded-3xl border border-dashed border-slate-300">
                  <svg class="w-12 h-12 text-slate-300 mx-auto mb-4" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M22 10.5h-6m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.646-6.374-1.766z" /></svg>
                  <h3 class="text-lg font-black text-slate-800">Directory is Empty</h3>
                  <p class="text-sm text-slate-500 mt-2 font-medium">No emergency contacts have been registered yet.</p>
              </div>
            @endforelse
          </div>
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