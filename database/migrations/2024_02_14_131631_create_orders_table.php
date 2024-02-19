<?php

// database/migrations/xxxx_xx_xx_create_orders_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->decimal('total_price');
            $table->json('products');
            $table->decimal('stopa_poreza')->nullable();
            $table->decimal('popust')->nullable();
            $table->string('ime_prezime');
            $table->string('email');
            $table->string('broj_telefona');
            $table->string('adresa');
            $table->string('grad');
            $table->string('drzava');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
