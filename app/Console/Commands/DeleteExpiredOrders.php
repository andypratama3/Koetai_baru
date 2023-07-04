<?php

namespace App\Console\Commands;

use App\Models\OrderShop;
use Illuminate\Support\Carbon;
use Illuminate\Console\Command;

class DeleteExpiredOrders extends Command
{
    protected $signature = 'orders:delete-expired';

    protected $description = 'Delete expired orders from the database';

    public function handle()
    {

        $expiredOrders = OrderShop::where('status','Unpaid')->where('created_at', '<=', Carbon::now()->subHours(24))->get();

        foreach ($expiredOrders as $order) {
            // Hapus order
            $order->delete();
        }

        $this->info('Expired orders have been deleted successfully.');
    }
}
