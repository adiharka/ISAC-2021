<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('packet_id');
            $table->integer('point')->default(1);
            $table->string('number');
            $table->string('question', 1200);
            $table->boolean('imgAnswer')->default(0);
            $table->string('A');
            $table->string('B');
            $table->string('C');
            $table->string('D');
            $table->string('E');
            $table->string('img')->nullable();
            $table->string('right_answer', 1);
            $table->timestamps();

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
        Schema::dropIfExists('questions');
    }
}
