<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AgendamentoController;
use App\Http\Controllers\Admin\AdminController;

// Landing page
Route::get('/', function () {
    return view('landing');
});

// Agendamento
Route::post('/agendamento', [AgendamentoController::class, 'store']);

// Admin
Route::get('/admin', [AdminController::class, 'loginForm']);
Route::post('/admin/login', [AdminController::class, 'login']);
Route::get('/admin/logout', [AdminController::class, 'logout']);
Route::get('/admin/agendamentos', [AdminController::class, 'agendamentos']);
Route::patch('/admin/agendamentos/{agendamento}', [AdminController::class, 'atualizarStatus']);