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
        Schema::create('withdraw_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('withdraw_id')->nullable()->constrained()->onDelete("cascade");
            $table->foreignId('material_id')->nullable()->constrained()->onDelete("cascade");
            $table->integer('amount')->nullable();
            $table->integer('checkout_amount')->nullable();
            $table->string('note')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('withdraw_details');
    }
};
