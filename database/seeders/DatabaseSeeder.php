<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Customer;
use App\Models\Merchandise;
use App\Models\Purchase;
use App\Models\PurchasedItem;
use App\Models\Sale;
use App\Models\SoldItem;
use App\Models\Supplier;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserSeeder::class);
        $this->call(MerchandiseSeeder::class);
        $this->call(SupplierSeeder::class);
        $this->call(CustomerSeeder::class);
        $this->call(PurchaseSeeder::class);
        $this->call(SaleSeeder::class);
        $this->call(PurchasedItemSeeder::class);
        $this->call(SoldItemSeeder::class);

    }
}
