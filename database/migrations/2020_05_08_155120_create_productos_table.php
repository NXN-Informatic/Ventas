<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo', 15)->nullable();
            $table->string('name', 50);
            $table->string('description', 1000)->nullable();
            $table->float('precio', 8,2);
            $table->integer('stock')->nullable();
            $table->boolean('activo')->default(true);
            $table->string('disponible')->default('in stock')->nullable();
            $table->string('condicion',20)->default('new')->nullable();
            $table->string('marca',30)->default('Propia')->nullable();
            $table->unsignedInteger('grupo_id');
            $table->foreign('grupo_id')->references('id')->on('grupos');
            $table->string('imagen_url',200)->default('https://www.feriatacna.com/img/images/shop/product/book-1.jpg')->nullable();
            $table->string('producto_url',100)->default('https://feriatacna.com/all/productos')->nullable()->after('condicion');
            $table->float('preciooferta', 8,2)->nullable();
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
        Schema::dropIfExists('productos');
    }
}
