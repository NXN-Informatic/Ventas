<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('productos', function (Blueprint $table) {
            $table->boolean('disponible')->default(true)->nullable();
            $table->string('condicion',20)->default('nuevo')->nullable();
            $table->string('marca',30)->nullable();
            $table->float('preciooferta', 5,2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('productos', function (Blueprint $table) {
            $table->dropColumn('disponible');
            $table->dropColumn('condicion');
            $table->dropColumn('marca');
            $table->dropColumn('preciooferta');
        });
    }
}
