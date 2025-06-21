<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UpdateLoanInterest extends Command
{
    protected $signature = 'loans:update-interest';
    protected $description = 'Actualizar los intereses de las cuotas en mora';

    public function handle()
    {
        $today = Carbon::today();

        // Consulta las cuotas en mora
        $loans = DB::table('loans')
            ->where('loans_estado', 'Pendiente')
            ->whereDate('loans_fecha_ultimo_pago', '<', $today)
            ->get();

        foreach ($loans as $loan) {
            $daysLate = $today->diffInDays(Carbon::parse($loan->loans_fecha_ultimo_pago));

            // Calcula el nuevo interés
            $additionalInterest = $loan->loans_valor_prestado * 0.01 * $daysLate; // 1% de interés por día en mora
            $newInterest = $loan->loans_intereses + $additionalInterest;

            // Actualiza el interés en la base de datos
            DB::table('loans')
                ->where('id', $loan->id)
                ->update(['loans_intereses' => $newInterest]);
        }

        $this->info('Intereses actualizados para los préstamos en mora.');
    }
}
