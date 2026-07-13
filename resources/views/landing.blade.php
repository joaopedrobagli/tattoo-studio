<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dark Ink Studio</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Inter:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
        .bebas { font-family: 'Bebas Neue', sans-serif; }
        .neon { text-shadow: 0 0 10px #ef4444, 0 0 20px #ef4444; }
    </style>
</head>
<body class="bg-black text-white" style="font-family: 'Inter', sans-serif;">

    {{-- Header --}}
    <header class="fixed w-full top-0 z-50 bg-black/80 backdrop-blur border-b border-zinc-900">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <span class="bebas text-2xl tracking-widest text-red-500 neon">Dark Ink Studio</span>
            <nav class="hidden md:flex gap-10 text-xs tracking-widest uppercase text-zinc-400">
                <a href="#sobre" class="hover:text-white transition">Sobre</a>
                <a href="#estilos" class="hover:text-white transition">Estilos</a>
                <a href="#agendamento" class="hover:text-red-500 transition">Agendar</a>
            </nav>
        </div>
    </header>

    {{-- Hero --}}
    <section class="relative min-h-screen flex items-end bg-cover bg-center" style="background-image: url('/hero.png')">
        <div class="absolute inset-0 bg-gradient-to-t from-black via-black/60 to-black/20"></div>
        <div class="relative z-10 max-w-7xl mx-auto px-6 pb-24 w-full">
            <p class="text-xs tracking-widest text-red-500 uppercase mb-4">— Estúdio de Tatuagem</p>
            <h1 class="bebas text-7xl md:text-9xl leading-none mb-6">
                Arte que fica<br/>
                <span class="text-red-500 neon">na sua pele</span>
            </h1>
            <p class="text-zinc-400 text-base max-w-lg mb-10 leading-relaxed">
                Transformamos suas ideias em obras de arte permanentes. Cada traço é único, cada tatuagem conta uma história.
            </p>
            <a href="#agendamento" class="inline-block border border-red-600 text-red-500 px-8 py-3 text-xs tracking-widest uppercase hover:bg-red-600 hover:text-white transition">
                Agendar consulta
            </a>
        </div>
    </section>

    {{-- Sobre --}}
    <section id="sobre" class="py-24 bg-zinc-950">
        <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-2 gap-20 items-center">
            <div>
                <p class="text-xs tracking-widest text-red-500 uppercase mb-4">— Sobre nós</p>
                <h2 class="bebas text-6xl mb-8 leading-none">Mais de 10 anos<br/>de experiência</h2>
                <p class="text-zinc-400 leading-relaxed mb-4">
                    O Dark Ink Studio nasceu da paixão pela arte e pelo compromisso com a excelência. Nossa equipe de artistas especializados trabalha para transformar suas ideias em tatuagens únicas e duradouras.
                </p>
                <p class="text-zinc-400 leading-relaxed">
                    Utilizamos equipamentos de última geração e tintas premium para garantir segurança, qualidade e resultados excepcionais em cada sessão.
                </p>
            </div>
            <div class="grid grid-cols-2 gap-4">
                @foreach(['+500' => 'Clientes atendidos', '10+' => 'Anos de experiência', '100%' => 'Satisfação garantida', '5★' => 'Avaliação média'] as $num => $label)
                <div class="border border-zinc-800 p-6 text-center hover:border-red-900 transition">
                    <p class="bebas text-5xl text-red-500 mb-2">{{ $num }}</p>
                    <p class="text-zinc-500 text-xs tracking-widest uppercase">{{ $label }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Estilos --}}
    <section id="estilos" class="py-24 bg-black">
        <div class="max-w-7xl mx-auto px-6">
            <p class="text-xs tracking-widest text-red-500 uppercase mb-4">— O que fazemos</p>
            <h2 class="bebas text-6xl mb-16">Nossos estilos</h2>
            <div class="grid grid-cols-2 md:grid-cols-3 gap-px bg-zinc-900">
                @foreach(['Blackwork', 'Realismo', 'Old School', 'Minimalista', 'Aquarela', 'Geométrico'] as $estilo)
                <div class="bg-black p-8 hover:bg-zinc-950 transition group">
                    <p class="bebas text-3xl mb-3 group-hover:text-red-500 transition">{{ $estilo }}</p>
                    <p class="text-zinc-600 text-sm leading-relaxed">Arte única e personalizada no estilo {{ $estilo }}.</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Agendamento --}}
    <section id="agendamento" class="py-24 bg-zinc-950">
        <div class="max-w-2xl mx-auto px-6">
            <p class="text-xs tracking-widest text-red-500 uppercase mb-4">— Agendar</p>
            <h2 class="bebas text-6xl mb-4">Marque sua sessão</h2>
            <p class="text-zinc-500 mb-12 text-sm leading-relaxed">Preencha o formulário e entraremos em contato para confirmar seu agendamento.</p>

            @if(session('sucesso'))
                <div class="border border-red-900 bg-red-950/30 text-red-400 px-4 py-3 rounded mb-6 text-sm">
                    {{ session('sucesso') }}
                </div>
            @endif

            <form action="/agendamento" method="POST" class="flex flex-col gap-5">
                @csrf
                <div class="grid md:grid-cols-2 gap-5">
                    <div class="flex flex-col gap-2">
                        <label class="text-xs text-zinc-600 uppercase tracking-widest">Nome</label>
                        <input type="text" name="nome" value="{{ old('nome') }}"
                            class="bg-zinc-900 border border-zinc-800 px-4 py-3 text-sm outline-none focus:border-red-900 transition @error('nome') border-red-500 @enderror">
                        @error('nome') <p class="text-red-500 text-xs">{{ $message }}</p> @enderror
                    </div>
                    <div class="flex flex-col gap-2">
                        <label class="text-xs text-zinc-600 uppercase tracking-widest">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}"
                            class="bg-zinc-900 border border-zinc-800 px-4 py-3 text-sm outline-none focus:border-red-900 transition @error('email') border-red-500 @enderror">
                        @error('email') <p class="text-red-500 text-xs">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div class="grid md:grid-cols-2 gap-5">
                    <div class="flex flex-col gap-2">
                        <label class="text-xs text-zinc-600 uppercase tracking-widest">Telefone</label>
                        <input type="text" name="telefone" value="{{ old('telefone') }}"
                            class="bg-zinc-900 border border-zinc-800 px-4 py-3 text-sm outline-none focus:border-red-900 transition @error('telefone') border-red-500 @enderror">
                        @error('telefone') <p class="text-red-500 text-xs">{{ $message }}</p> @enderror
                    </div>
                    <div class="flex flex-col gap-2">
                        <label class="text-xs text-zinc-600 uppercase tracking-widest">Data desejada</label>
                        <input type="date" name="data_desejada" value="{{ old('data_desejada') }}"
                            class="bg-zinc-900 border border-zinc-800 px-4 py-3 text-sm outline-none focus:border-red-900 transition @error('data_desejada') border-red-500 @enderror">
                        @error('data_desejada') <p class="text-red-500 text-xs">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div class="flex flex-col gap-2">
                    <label class="text-xs text-zinc-600 uppercase tracking-widest">Estilo</label>
                    <select name="estilo" class="bg-zinc-900 border border-zinc-800 px-4 py-3 text-sm outline-none focus:border-red-900 transition @error('estilo') border-red-500 @enderror">
                        <option value="">Selecione um estilo</option>
                        @foreach(['Blackwork', 'Realismo', 'Old School', 'Minimalista', 'Aquarela', 'Geométrico'] as $estilo)
                            <option value="{{ $estilo }}" {{ old('estilo') == $estilo ? 'selected' : '' }}>{{ $estilo }}</option>
                        @endforeach
                    </select>
                    @error('estilo') <p class="text-red-500 text-xs">{{ $message }}</p> @enderror
                </div>

                <div class="flex flex-col gap-2">
                    <label class="text-xs text-zinc-600 uppercase tracking-widest">Mensagem (opcional)</label>
                    <textarea name="mensagem" rows="4"
                        class="bg-zinc-900 border border-zinc-800 px-4 py-3 text-sm outline-none focus:border-red-900 transition resize-none">{{ old('mensagem') }}</textarea>
                </div>

                <button type="submit" class="border border-red-600 text-red-500 py-4 text-xs tracking-widest uppercase hover:bg-red-600 hover:text-white transition">
                    Enviar agendamento
                </button>
            </form>
        </div>
    </section>

    {{-- Footer --}}
    <footer class="bg-black border-t border-zinc-900 py-8">
        <div class="max-w-7xl mx-auto px-6 flex justify-between items-center">
            <span class="bebas text-xl text-red-500 tracking-widest">Dark Ink Studio</span>
            <p class="text-zinc-700 text-xs tracking-widest uppercase">© 2026 Dark Ink Studio</p>
        </div>
    </footer>

</body>
</html>