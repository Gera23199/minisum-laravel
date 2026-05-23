<?php

namespace App\Jobs;

use App\Models\Operacion;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Log;

class AnalizarOperacionJob implements ShouldQueue
{
    use Queueable;

    public function __construct(
        public int $operacionId
    ) {}

    public function handle(): void
    {
        $operacion = Operacion::find($this->operacionId);

        if (!$operacion) {
            return;
        }

        Log::info('Operación analizada correctamente', [
            'id' => $operacion->id,
            'nombre' => $operacion->nombre,
            'resultado' => $operacion->resultado,
        ]);
    }
}