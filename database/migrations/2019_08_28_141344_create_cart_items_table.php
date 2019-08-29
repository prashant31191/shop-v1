<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart_items', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('product_id')->nullable();
            $table->bigInteger('cart_id')->nullable();

            $table->tinyInteger('amount')->nullable(); // 4 lenght

            $table->timestamps();
            $table->softDeletes(); // ca sa putem reversa stergerea

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cart_items');
    }
}
