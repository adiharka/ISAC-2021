<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTakePacketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('take_packets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('packet_id');
            $table->string('question_order')->nullable();
            $table->tinyInteger('mark')->nullable();
            $table->timestamp('start')->nullable();
            $table->dateTime('end')->nullable();
            $table->boolean('finished')->default(0);
            $table->timestamp('updated_at')->nullable();
            // $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('packet_id')->references('id')->on('packets')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('take_packets');
    }
}
