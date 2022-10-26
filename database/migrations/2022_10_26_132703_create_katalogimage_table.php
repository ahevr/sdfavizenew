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
        Schema::create('katalogimage', function (Blueprint $table) {
            $table->id();
            $table->string("image");
            $table->unsignedBigInteger("katalogs_id");
            $table->foreign('katalogs_id')->references('id')->on('katalogs')->onDelete("cascade");
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
        Schema::dropIfExists('katalogimage');
    }
};
