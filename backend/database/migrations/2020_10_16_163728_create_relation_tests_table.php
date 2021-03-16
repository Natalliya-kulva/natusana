<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelationTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->text('content')->nullable();
            $table->timestamps();
        });

        Schema::create('seo', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->string('keywords')->nullable();

            $table->unsignedBigInteger('article_id')->nullable();
            $table->foreign('article_id')->references('id')->on('articles');
        });

        Schema::create('painters', function (Blueprint $table) {
            $table->id();
            $table->string('username')->nullable();
            $table->string('bio')->nullable();
            $table->timestamps();
        });

        Schema::create('paintings', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('body')->nullable();
            $table->timestamp('completed_at')->useCurrent();

            $table->unsignedBigInteger('painter_id')->nullable();
            $table->foreign('painter_id')->references('id')->on('painters');

            $table->timestamps();
        });

        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->timestamps();
        });

        Schema::create('attributes', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->timestamps();
        });

        Schema::create('attribute_product', function (Blueprint $table) {
            $table->unsignedBigInteger('attribute_id')->nullable();
            $table->foreign('attribute_id')->references('id')->on('attributes');

            $table->unsignedBigInteger('product_id')->nullable();
            $table->foreign('product_id')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
        Schema::dropIfExists('seo');
        Schema::dropIfExists('painters');
        Schema::dropIfExists('paintings');
        Schema::dropIfExists('products');
        Schema::dropIfExists('attributes');
        Schema::dropIfExists('attribute_product');
    }
}
