<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tests', function (Blueprint $table) {
            $table->id();

            $table->string('text')->nullable();
            $table->text('textarea')->nullable();

            $table->string('radio_str')->nullable();
            $table->smallInteger('radio_int')->nullable();
            $table->boolean('radio_bool')->nullable();

            $table->json('checkbox_str')->nullable();

            $table->string('select_str')->nullable();
            $table->smallInteger('select_int')->nullable();

            $table->string('image')->nullable();
            $table->string('file')->nullable();
            $table->json('multiple_images')->nullable();

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
        Schema::dropIfExists('tests');
    }
}
