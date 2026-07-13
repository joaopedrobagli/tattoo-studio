<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin — Dark Ink Studio</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Inter:wght@300;400;500&display=swap" rel="stylesheet">
    <style>.bebas { font-family: 'Bebas Neue', sans-serif; }</style>
</head>
<body class="bg-black text-white min-h-screen flex items-center justify-center" style="font-family: 'Inter', sans-serif;">

    <div class="w-full max-w-sm px-6">
        <p class="bebas text-3xl text-red-500 tracking-widest mb-8 text-center">Dark Ink Studio</p>

        @if(session('erro'))
            <div class="border border-red-900 bg-red-950/30 text-red-400 px-4 py-3 mb-6 text-sm">
                {{ session('erro') }}
            </div>
        @endif

        <form action="/admin/login" method="POST" class="flex flex-col gap-4">
            @csrf
            <div class="flex flex-col gap-2">
                <label class="text-xs text-zinc-600 uppercase tracking-widest">Senha</label>
                <input type="password" name="senha"
                    class="bg-zinc-900 border border-zinc-800 px-4 py-3 text-sm outline-none focus:border-red-900 transition">
            </div>
            <button type="submit" class="border border-red-600 text-red-500 py-3 text-xs tracking-widest uppercase hover:bg-red-600 hover:text-white transition mt-2">
                Entrar
            </button>
        </form>
    </div>

</body>
</html>