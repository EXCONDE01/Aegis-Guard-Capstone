<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Aegis-Guard | Secure Login</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-[#0F172A] flex items-center justify-center p-6 font-sans text-slate-200">
  
  <div class="bg-[#1E293B] rounded-2xl shadow-2xl flex max-w-4xl w-full overflow-hidden border border-slate-700">
    
    <div class="w-2/5 bg-[#0B2447] p-10 text-white flex flex-col justify-between relative overflow-hidden">
      <div class="z-10">
        <div class="flex items-center gap-2 text-xl font-black tracking-tighter mb-2">
          <span class="bg-amber-500 text-white p-1 rounded shadow-lg text-sm">🛡️</span> Aegis-Guard
        </div>
        <span class="text-[10px] text-amber-400 tracking-[0.2em] uppercase font-black">LSPU Secure Access</span>
      </div>

      <div class="z-10 my-10">
        <h2 class="text-2xl font-black leading-tight mb-4 uppercase tracking-wide">Command Center</h2>
        <p class="text-blue-200 text-xs leading-relaxed font-medium">
          Authorized LSPU personnel only. Access point for environmental monitoring, hazard logs, and emergency SMS dispatch protocols.
        </p>
      </div>

      <div class="z-10">
        <div class="inline-flex items-center gap-2 bg-black/20 px-4 py-2 rounded-lg border border-white/10 text-[10px] font-bold uppercase tracking-widest">
          System Status: <span class="text-green-400 animate-pulse">ONLINE</span>
        </div>
      </div>
    </div>

    <div class="w-3/5 p-12 flex flex-col justify-center bg-[#1E293B] z-10">
      <div class="mb-8">
        <h3 class="text-xl font-black text-white uppercase tracking-wider">Administrator Auth</h3>
        <p class="text-slate-400 text-xs mt-1">Please verify your credentials to continue.</p>
      </div>

      @if($errors->any())
        <div class="bg-red-500/10 border border-red-500/50 text-red-400 px-4 py-3 rounded-lg text-xs font-bold mb-6">
          {{ $errors->first() }}
        </div>
      @endif

      <form method="POST" action="/login" class="space-y-5">
        @csrf
        
        <div>
          <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-2">University Email</label>
          <input type="email" name="email" placeholder="admin@lspu.edu.ph" required class="w-full px-4 py-3 rounded-lg bg-[#0F172A] border border-slate-700 focus:border-blue-500 text-blue-300 outline-none transition-all text-sm font-mono">
        </div>

        <div>
          <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-2">Security Credential</label>
          <input type="password" name="password" placeholder="••••••••" required class="w-full px-4 py-3 rounded-lg bg-[#0F172A] border border-slate-700 focus:border-blue-500 text-blue-300 outline-none transition-all text-sm font-mono tracking-widest">
        </div>

        <div class="pt-2">
          <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 transition-colors text-white font-black py-3.5 px-4 rounded-lg shadow-lg shadow-blue-500/20 text-xs uppercase tracking-widest">
            Initialize Session
          </button>
        </div>
      </form>
    </div>

  </div>
</body>
</html>