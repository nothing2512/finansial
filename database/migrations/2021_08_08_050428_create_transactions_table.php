<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();

            $table->bigInteger("userId");
            $table->bigInteger("type");
            $table->bigInteger("categoryId");
            $table->string("title")->nullable();
            $table->text("description")->nullable();
            $table->timestamp("datetime");
            $table->integer("status")->default(0);
            $table->string("attachment")->nullable();
            $table->integer("price");

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
        Schema::dropIfExists('transactions');
    }
}
