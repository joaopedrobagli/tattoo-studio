# Dark Ink Studio — Sistema de Agendamento

Site institucional e sistema de agendamento para estúdio de tatuagem, desenvolvido com Laravel 12 + PHP + SQLite. Inclui landing page pública com formulário de agendamento e painel administrativo protegido por senha.

## 🚀 Tecnologias

- [Laravel 12](https://laravel.com/) — framework PHP para backend e rotas
- [Blade](https://laravel.com/docs/blade) — template engine do Laravel para as views
- [Tailwind CSS](https://tailwindcss.com/) — estilização via CDN
- [SQLite](https://www.sqlite.org/) — banco de dados local
- [Bebas Neue](https://fonts.google.com/specimen/Bebas+Neue) — tipografia

## ✅ Funcionalidades

**Landing page pública:**
- Hero com imagem de fundo e tipografia impactante
- Seção sobre o estúdio com estatísticas
- Grid de estilos oferecidos (Blackwork, Realismo, Old School, etc)
- Formulário de agendamento com validação completa

**Painel administrativo:**
- Login protegido por senha
- Listagem de todos os agendamentos
- Atualização de status (Pendente / Confirmado / Cancelado)

## 💡 Conceitos aplicados

- MVC com Laravel (Model, View, Controller)
- Migrations e Eloquent ORM para banco de dados
- Validação de formulários com `$request->validate()`
- Autenticação simples via sessão PHP
- Route Model Binding
- Flash messages para feedback ao usuário
- Blade directives (`@foreach`, `@if`, `@error`, `@csrf`, `@method`)

## 🛠️ Como rodar localmente

```bash
# Clone o repositório
git clone https://github.com/joaopedrobagli/tattoo-studio.git

# Entre na pasta
cd tattoo-studio

# Instale as dependências
composer install

# Copie o arquivo de ambiente
cp .env.example .env

# Gere a chave da aplicação
php artisan key:generate

# Rode as migrations
php artisan migrate

# Inicie o servidor
php artisan serve
```

Acesse `http://localhost:8000` no navegador.

**Painel admin:** `http://localhost:8000/admin`
**Senha:** `tattoo@admin123`

## 📁 Estrutura principal

```
app/
  Http/Controllers/
    AgendamentoController.php   — salva agendamentos do formulário
    Admin/AdminController.php   — login, listagem e atualização de status
  Models/
    Agendamento.php             — model do agendamento
database/
  migrations/                  — criação da tabela agendamentos
resources/views/
  landing.blade.php            — landing page pública
  admin/
    login.blade.php            — tela de login do admin
    agendamentos.blade.php     — painel com listagem
routes/
  web.php                      — todas as rotas da aplicação
```

## 👨‍💻 Autor

João Pedro Bagli — [LinkedIn](https://linkedin.com/in/joaopedrobagli) · [Portfólio](https://joaopedrobagli.netlify.app) · [GitHub](https://github.com/joaopedrobagli)