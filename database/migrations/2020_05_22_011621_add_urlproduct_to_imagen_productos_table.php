<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUrlproductToImagenProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('imagen_productos', function (Blueprint $table) {
            $table->string('imagen_url',200)->default('https://www.feriatacna.com/img/images/shop/product/book-1.jpg')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('imagen_productos', function (Blueprint $table) {
            $table->dropColumn('imagen_url');
        });
    }
}
