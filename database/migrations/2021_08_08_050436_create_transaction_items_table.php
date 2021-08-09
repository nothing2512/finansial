<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_items', function (Blueprint $table) {
            $table->id();

            $table->bigInteger("productId");
            $table->integer("amount");
            $table->bigInteger("categoryId")->default(0);
            $table->string("name");
            $table->text("description");
            $table->string("photo");
            $table->integer("price");
            $table->integer("discount");
            $table->integer("discount_type");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaction_items');
    }
}
