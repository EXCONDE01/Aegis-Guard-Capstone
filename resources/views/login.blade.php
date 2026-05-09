<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aegis-Guard | Secure Access</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex h-screen bg-[#0F172A] font-sans text-slate-900 overflow-hidden relative">
    
    <div class="absolute inset-0 z-0 overflow-hidden pointer-events-none">
        <div class="absolute -top-[30%] -right-[10%] w-[70%] h-[70%] rounded-full bg-indigo-600/20 blur-[120px]"></div>
        <div class="absolute -bottom-[30%] -left-[10%] w-[60%] h-[60%] rounded-full bg-blue-600/20 blur-[120px]"></div>
    </div>

    <div class="relative z-10 flex w-full h-full">
        
        <div class="hidden lg:flex flex-col justify-center items-start w-1/2 p-20 text-white relative">
            <div class="flex items-center gap-3 text-3xl font-black tracking-tight mb-8">
                <div class="w-10 h-10 bg-indigo-500 rounded-xl flex items-center justify-center shadow-lg shadow-indigo-500/30">
                    <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M12.516 2.17a.75.75 0 00-1.032 0 11.209 11.209 0 01-7.877 3.08.75.75 0 00-.722.515A12.74 12.74 0 002.25 9.75c0 5.942 4.064 10.933 9.563 12.348a.749.749 0 00.374 0c5.499-1.415 9.563-6.406 9.563-12.348 0-1.39-.223-2.73-.635-3.985a.75.75 0 00-.722-.516l-.143.001c-2.996 0-5.717-1.17-7.734-3.08zm3.094 8.016a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" /></svg>
                </div>
                Aegis-Guard
            </div>
            
            <h1 class="text-5xl font-extrabold leading-tight mb-6 text-transparent bg-clip-text bg-gradient-to-r from-white to-slate-400">
                Enterprise Safety <br> & Infrastructure Hub
            </h1>
            
            <p class="text-lg text-slate-400 font-medium max-w-md leading-relaxed mb-12">
                Real-time environmental monitoring, automated hazard detection, and manual override capabilities for the LSPU Campus.
            </p>
            
            <div class="flex gap-4 text-sm font-bold text-slate-300">
                <div class="flex items-center gap-2.5 bg-white/5 px-5 py-2.5 rounded-xl border border-white/10 backdrop-blur-sm shadow-xl">
                    <span class="relative flex h-2.5 w-2.5">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-green-500"></span>
                    </span> 
                    Core Systems Online
                </div>
                <div class="flex items-center gap-2 bg-white/5 px-5 py-2.5 rounded-xl border border-white/10 backdrop-blur-sm shadow-xl">
                    <svg class="w-4 h-4 text-indigo-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z"></path></svg>
                    256-bit Encrypted
                </div>
            </div>
        </div>

        <div class="w-full lg:w-1/2 flex flex-col items-center justify-center p-6 relative">
            
            <div class="lg:hidden flex items-center gap-3 text-2xl font-black tracking-tight text-white mb-10">
                <div class="w-8 h-8 bg-indigo-500 rounded-lg flex items-center justify-center shadow-lg shadow-indigo-500/30">
                    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M12.516 2.17a.75.75 0 00-1.032 0 11.209 11.209 0 01-7.877 3.08.75.75 0 00-.722.515A12.74 12.74 0 002.25 9.75c0 5.942 4.064 10.933 9.563 12.348a.749.749 0 00.374 0c5.499-1.415 9.563-6.406 9.563-12.348 0-1.39-.223-2.73-.635-3.985a.75.75 0 00-.722-.516l-.143.001c-2.996 0-5.717-1.17-7.734-3.08zm3.094 8.016a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" /></svg>
                </div>
                Aegis-Guard
            </div>

            <div class="w-full max-w-md bg-white/90 backdrop-blur-2xl p-8 md:p-10 rounded-3xl shadow-2xl border border-white/50">
                <div class="text-center mb-10">
                    <h2 class="text-3xl font-black text-slate-800 tracking-tight">Access Portal</h2>
                    <p class="text-sm font-semibold text-slate-500 mt-2">Enter your administrative credentials</p>
                </div>

                @if(session('error'))
                <div class="mb-8 p-4 bg-red-50 border-l-4 border-red-500 rounded-r-xl flex items-start gap-3 shadow-sm">
                    <svg class="w-5 h-5 text-red-500 mt-0.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                    <p class="text-sm font-bold text-red-700">{{ session('error') }}</p>
                </div>
                @endif

                <form action="/login" method="POST" class="space-y-6">
                    @csrf
                    
                    <div>
                        <label class="block text-[10px] font-black uppercase text-slate-500 tracking-widest mb-2">Email Address</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75"></path></svg>
                            </div>
                            <input type="email" name="email" required placeholder="admin@lspu.edu.ph" class="w-full bg-white border border-slate-200 text-slate-900 text-sm font-bold rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 block pl-11 p-3.5 outline-none transition-all shadow-sm">
                        </div>
                    </div>

                    <div>
                        <label class="block text-[10px] font-black uppercase text-slate-500 tracking-widest mb-2">Security Password</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z"></path></svg>
                            </div>
                            <input type="password" name="password" required placeholder="••••••••" class="w-full bg-white border border-slate-200 text-slate-900 text-sm font-bold rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 block pl-11 p-3.5 outline-none transition-all shadow-sm">
                        </div>
                    </div>

                    <button type="submit" class="w-full flex items-center justify-center gap-3 text-white bg-indigo-600 hover:bg-indigo-700 font-black uppercase tracking-widest text-xs rounded-xl px-5 py-4 text-center shadow-lg shadow-indigo-600/30 transition-all focus:ring-4 focus:ring-indigo-500/50 mt-6">
                        Establish Connection
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75"></path></svg>
                    </button>
                </form>
                
                <div class="mt-8 pt-6 border-t border-slate-100 flex items-center justify-center gap-2">
                    <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                    <span class="text-[10px] font-bold text-slate-500 uppercase tracking-widest">Authorized Personnel Only</span>
                </div>
            </div>
            
            <div class="absolute bottom-6 w-full text-center hidden md:block">
                <p class="text-[10px] font-bold text-slate-500 uppercase tracking-widest">Aegis-Guard Core v1.0.0 • LSPU Infrastructure</p>
            </div>
        </div>
    </div>

</body>
</html>