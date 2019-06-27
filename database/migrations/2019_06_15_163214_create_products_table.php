<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('title');//عنوان محصول
            $table->string('slug');
            $table->text('body');
            $table->string('price',50);
            $table->text('images');
            $table->string('tags');
            $table->string('formats');
            $table->string('size_disk');// حجم فایل دانلودی
            $table->string('size_documents');//سایز فایل
            $table->string('mode');// مد فایل دانلودی
            $table->string('resolution');// رزولیشن فایل دانلودی
            $table->text('description');
            $table->boolean('status')->nullable();
            $table->integer('viewCount')->default(0);
            $table->integer('commentCount')->default(0);
            $table->integer('buyCount')->default(0);// تعداد خرید محصول
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
        Schema::dropIfExists('products');
    }
}
