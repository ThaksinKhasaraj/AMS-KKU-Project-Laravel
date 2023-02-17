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
        Schema::create('withdraws', function (Blueprint $table) {
            $table->id();
            $table->string('withdraw_num')->nullable();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete("cascade");
            //$table->foreignId('department_id')->nullable()->constrained()->onDelete("cascade");
            $table->integer('status')->default(0);
            $table->integer('withdraw_status')->default(0);
            $table->integer('approve_mng')->default(0);
            $table->integer('approve_spo')->default(0);
            $table->string('spo_user')->nullable();
            $table->integer('approve_dir')->default(0);
            $table->string('dir_user')->nullable();
            $table->integer('approve_success')->default(0);
            $table->string('pay_user')->nullable();
            //$table->integer('total')->default(0);
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
        Schema::dropIfExists('withdraws');
    }
};
