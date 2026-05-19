<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - AmikomEventHub</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <style>body { font-family: 'Plus Jakarta Sans', sans-serif; }</style>
</head>
<body class="bg-indigo-900 flex items-center justify-center min-h-screen">

    <div class="bg-white p-10 rounded-[2.5rem] shadow-2xl w-full max-w-sm text-center border border-indigo-800">

        <div class="w-16 h-16 bg-indigo-50 rounded-2xl flex items-center justify-center text-indigo-700 font-black text-2xl mx-auto mb-4 border border-indigo-100">
            AH
        </div>

        <h2 class="text-2xl font-black text-slate-800 mb-1">Admin Login</h2>
        <p class="text-sm text-slate-500 mb-8 font-medium">AmikomEventHub Dashboard</p>

        <form action="{{ route('login.post') }}" method="POST" class="space-y-5 text-left">
            @csrf

            @if($errors->any())
                <div class="bg-red-50 text-red-600 p-4 rounded-xl text-sm font-bold text-center border border-red-100">
                    {{ $errors->first() }}
                </div>
            @endif

            <div>
                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" class="w-full px-5 py-4 bg-slate-50 rounded-2xl border border-slate-200 focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-600 outline-none font-medium text-slate-700 transition" placeholder="admin@amikom.ac.id" required>
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Password</label>
                <input type="password" name="password" class="w-full px-5 py-4 bg-slate-50 rounded-2xl border border-slate-200 focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-600 outline-none font-medium text-slate-700 transition" placeholder="••••••••" required>
            </div>

            <button type="submit" class="w-full py-4 bg-indigo-600 hover:bg-indigo-700 text-white font-bold rounded-2xl shadow-lg shadow-indigo-200 transition active:scale-95 mt-4">
                Masuk
            </button>
        </form>
    </div>

</body>
</html>
