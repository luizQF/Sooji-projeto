<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;
use App\Models\Tarefa;
use Carbon\Carbon;


Schedule::call(function () {
    Tarefa::where('venc_date', '<', Carbon::today())
        ->where('situacaoAtual', 'pendente')
        ->update(['situacaoAtual' => 'vencido']);
})->daily();

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');
