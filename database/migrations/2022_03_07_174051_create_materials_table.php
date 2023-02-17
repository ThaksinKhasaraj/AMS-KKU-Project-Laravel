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
        Schema::create('materials', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->nullable()->constrained()->onDelete("cascade");
            $table->string('mateID')->unique();
            $table->string('mate_name')->nullable();
            $table->integer('mate_amount')->nullable();
            $table->unsignedDecimal('mate_price',8,2)->nullable();
            $table->string('mate_unit')->nullable();
            $table->text('mate_detail')->nullable();
            $table->string('mateImage')->nullable();
            $table->string('mate_status')->nullable();
            $table->string('mate_note')->nullable();
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
        Schema::dropIfExists('materials');
    }
};
