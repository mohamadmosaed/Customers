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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
           $table->string('customer_name');
           $table->string('activity');
           $table->string('mobile');
           $table->string('address');
           $table->string('program');
           $table->foreignId('agent_id')->references('id')->on('agents')->onDelete('cascade');
           $table->date('install_date');
           $table->date('support_end');
           $table->string('notes');
      $table->date('deleted_at')->nullable();
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
        Schema::dropIfExists('customers');
    }
};
