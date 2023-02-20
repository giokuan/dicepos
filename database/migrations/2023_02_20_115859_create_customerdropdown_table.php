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
        // Schema::create('customerdropdown', function (Blueprint $table) {
        //     $table->id();
        //     $table->timestamps();
        // });
        
        Schema::create('customer_names', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });


        Schema::create('customer_ids', function (Blueprint $table) {
            $table->id();
            $table->integer('customer_id');
            $table->integer('customer_name');
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
        Schema::dropIfExists('customer_names');
        Schema::dropIfExists('customer_ids');
    }
};
