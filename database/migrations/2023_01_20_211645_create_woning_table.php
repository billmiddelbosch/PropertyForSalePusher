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
        Schema::create('woning', function (Blueprint $table) {
            $table->id();
            $table->string('plaats');
            $table->string('straat');
            $table->integer('nr');
            $table->string('addition');
            $table->string('postcode');
            $table->date('datum');
            $table->boolean('status');
            $table->string('jumbaId');
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
        Schema::dropIfExists('woning');
    }
};
