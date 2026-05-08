<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alert Contacts | Aegis-Guard</title>
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
      <a href="/history" class="block p-3 hover:bg-slate-800 rounded-lg text-slate-300 transition-colors">📜 Hazard History Logs</a>
      <a href="/contacts" class="block p-3 bg-blue-600/40 border border-blue-500/50 rounded-lg font-semibold text-white shadow-inner">📞 Alert Contacts</a>
    </nav>
  </div>

  <div class="flex-1 flex flex-col h-full overflow-hidden">
    <header class="bg-white shadow-sm p-6 border-b border-slate-200">
      <h1 class="text-2xl font-extrabold text-[#0B2447] tracking-tight">Alert Contact Management</h1>
      <p class="text-sm text-slate-500 font-medium">Configure automated SMS and Push notification recipients</p>
    </header>

    <main class="p-8 flex-1 overflow-y-auto space-y-8">
      
      <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
        <div class="bg-slate-50 p-4 border-b border-slate-200">
          <h2 class="text-sm font-bold text-slate-700 flex items-center gap-2">👤 Add New Emergency Contact</h2>
        </div>
        
        <form action="/contacts" method="POST" class="p-6 grid grid-cols-1 md:grid-cols-2 gap-6">
          @csrf <div>
            <label class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2">Full Name</label>
            <input type="text" name="full_name" placeholder="e.g. Juan Dela Cruz" required class="w-full px-4 py-3 rounded-lg bg-slate-50 border border-slate-200 focus:border-blue-500 outline-none text-sm">
          </div>
          <div>
            <label class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2">Designation</label>
            <input type="text" name="designation" placeholder="e.g. Dean, College of Engineering" required class="w-full px-4 py-3 rounded-lg bg-slate-50 border border-slate-200 focus:border-blue-500 outline-none text-sm">
          </div>
          <div class="md:col-span-2">
            <label class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2">Mobile Number</label>
            <div class="flex">
              <span class="bg-slate-100 border border-slate-200 border-r-0 px-4 py-3 rounded-l-lg text-sm text-slate-500 font-bold">+63</span>
              <input type="tel" name="mobile_number" placeholder="912 345 6789" required class="flex-1 px-4 py-3 rounded-r-lg bg-white border border-slate-200 focus:border-blue-500 outline-none text-sm font-mono">
            </div>
          </div>
          <div class="md:col-span-2 pt-2">
            <button type="submit" class="bg-[#0B2447] hover:bg-[#153a6e] text-white font-bold py-3 px-6 rounded-lg text-sm shadow-md transition-colors">
              Save Contact
            </button>
          </div>
        </form>
      </div>

      <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
        <div class="bg-slate-50 p-4 border-b border-slate-200">
          <h2 class="text-sm font-bold text-slate-700">Authorized Personnel Directory</h2>
        </div>
        <table class="w-full text-left text-sm">
          <thead class="text-[10px] text-slate-400 uppercase tracking-widest border-b border-slate-100">
            <tr>
              <th class="p-4">Name</th>
              <th class="p-4">Position</th>
              <th class="p-4">Contact No.</th>
            </tr>
          </thead>
          <tbody>
            @foreach($contacts as $contact)
            <tr class="border-b border-slate-50 hover:bg-slate-50">
              <td class="p-4 font-bold text-slate-700">{{ $contact->full_name }}</td>
              <td class="p-4 text-slate-500">{{ $contact->designation }}</td>
              <td class="p-4 font-mono text-slate-600">+63 {{ $contact->mobile_number }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>

    </main>
  </div>
</body>
</html>