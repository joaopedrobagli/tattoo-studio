<?php

namespace App\Http\Controllers;

use App\Models\Agendamento;
use Illuminate\Http\Request;

class AgendamentoController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nome'         => 'required|string|max:255',
            'email'        => 'required|email',
            'telefone'     => 'required|string|max:20',
            'estilo'       => 'required|string',
            'data_desejada' => 'required|date|after:today',
            'mensagem'     => 'nullable|string',
        ]);

        Agendamento::create($request->all());

        return redirect('/')->with('sucesso', 'Agendamento realizado! Entraremos em contato em breve.');
    }
}