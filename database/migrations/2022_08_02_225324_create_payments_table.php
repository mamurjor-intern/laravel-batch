<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('method')->nullable();
            $table->string('card_number')->nullable();
            $table->string('transaction_id')->nullable();
            $table->string('cash_on_delivery')->nullable();
            $table->string('currency')->nullable();
            $table->string('amount')->nullable();
            $table->string('payment_date')->nullable();
            $table->enum('payment_status',[0,1,2])->default(0);
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
        Schema::dropIfExists('payments');
    }
};
