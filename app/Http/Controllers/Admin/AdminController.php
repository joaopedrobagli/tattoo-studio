<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Agendamento;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    private string $senha = 'tattoo@admin123';

    public function loginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        if ($request->senha === $this->senha) {
            session(['admin_logado' => true]);
            return redirect('/admin/agendamentos');
        }

        return back()->with('erro', 'Senha incorreta.');
    }

    public function logout()
    {
        session()->forget('admin_logado');
        return redirect('/admin');
    }

    public function agendamentos()
    {
        if (!session('admin_logado')) {
            return redirect('/admin');
        }

        $agendamentos = Agendamento::orderBy('data_desejada', 'asc')->get();
        return view('admin.agendamentos', compact('agendamentos'));
    }

    public function atualizarStatus(Request $request, Agendamento $agendamento)
    {
        if (!session('admin_logado')) {
            return redirect('/admin');
        }

        $agendamento->update(['status' => $request->status]);
        return back()->with('sucesso', 'Status atualizado!');
    }
}