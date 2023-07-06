<?php

namespace App\Console\Commands;

use App\Models\OrderTiket;
use Illuminate\Console\Command;

class DeleteExpiredOrdersTiket extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ordersTiket:deleteOrders-tiket';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Pesanan Telah Di Hapus Dari List Karna Lewat Dari 24 Jam';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // return Command::SUCCESS;

        
        $orderTiket = OrderTiket::where('created_at', '<=', Carbon::now()->subHours(24))->get();

        foreach ($orderTikets as $orderTiket) {
            // Hapus order
            $orderTiket->delete();
        }

        $this->info('Expired orders have been deleted successfully.');
    }
}
