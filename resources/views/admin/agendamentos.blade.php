<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin — Agendamentos</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Inter:wght@300;400;500&display=swap" rel="stylesheet">
    <style>.bebas { font-family: 'Bebas Neue', sans-serif; }</style>
</head>
<body class="bg-zinc-950 text-white min-h-screen" style="font-family: 'Inter', sans-serif;">

    <header class="bg-black border-b border-zinc-900 px-8 py-4 flex justify-between items-center">
        <span class="bebas text-xl text-red-500 tracking-widest">Dark Ink Studio — Admin</span>
        <a href="/admin/logout" class="text-xs text-zinc-500 uppercase tracking-widest hover:text-white transition">Sair</a>
    </header>

    <main class="max-w-6xl mx-auto px-8 py-12">

        <div class="flex justify-between items-center mb-10">
            <h1 class="bebas text-5xl">Agendamentos</h1>
            <span class="text-xs text-zinc-500 uppercase tracking-widest">{{ $agendamentos->count() }} total</span>
        </div>

        @if(session('sucesso'))
            <div class="border border-red-900 bg-red-950/30 text-red-400 px-4 py-3 mb-6 text-sm">
                {{ session('sucesso') }}
            </div>
        @endif

        @if($agendamentos->isEmpty())
            <div class="text-center py-20">
                <p class="text-zinc-600 text-sm uppercase tracking-widest">Nenhum agendamento ainda</p>
            </div>
        @else
            <div class="flex flex-col gap-4">
                @foreach($agendamentos as $agendamento)
                <div class="bg-black border border-zinc-900 p-6 flex flex-col md:flex-row justify-between gap-6">
                    <div class="flex flex-col gap-1">
                        <p class="font-medium text-white">{{ $agendamento->nome }}</p>
                        <p class="text-sm text-zinc-500">{{ $agendamento->email }} · {{ $agendamento->telefone }}</p>
                        <p class="text-sm text-zinc-400 mt-1">{{ $agendamento->estilo }} — {{ \Carbon\Carbon::parse($agendamento->data_desejada)->format('d/m/Y') }}</p>
                        @if($agendamento->mensagem)
                            <p class="text-xs text-zinc-600 mt-1 italic">"{{ $agendamento->mensagem }}"</p>
                        @endif
                    </div>

                    <div class="flex items-center gap-4 shrink-0">
                        <span class="text-xs uppercase tracking-widest px-3 py-1 border
                            @if($agendamento->status === 'pendente') border-yellow-800 text-yellow-600
                            @elseif($agendamento->status === 'confirmado') border-green-800 text-green-500
                            @else border-red-900 text-red-500
                            @endif">
                            {{ $agendamento->status }}
                        </span>

                        <form action="/admin/agendamentos/{{ $agendamento->id }}" method="POST" class="flex gap-2">
                            @csrf
                            @method('PATCH')
                            <select name="status" class="bg-zinc-900 border border-zinc-800 text-xs px-3 py-2 outline-none">
                                <option value="pendente" {{ $agendamento->status === 'pendente' ? 'selected' : '' }}>Pendente</option>
                                <option value="confirmado" {{ $agendamento->status === 'confirmado' ? 'selected' : '' }}>Confirmado</option>
                                <option value="cancelado" {{ $agendamento->status === 'cancelado' ? 'selected' : '' }}>Cancelado</option>
                            </select>
                            <button type="submit" class="border border-zinc-700 text-zinc-400 text-xs px-4 py-2 hover:border-white hover:text-white transition uppercase tracking-widest">
                                Salvar
                            </button>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>
        @endif
    </main>

</body>
</html>