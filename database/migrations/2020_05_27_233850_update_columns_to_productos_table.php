<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateColumnsToProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('productos', function (Blueprint $table) {
            $table->string('disponible')->default('in stock')->nullable()->change();
            $table->string('condicion',20)->default('new')->nullable()->change();
            $table->string('marca',30)->default('Propia')->nullable()->change();
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
        });
    }
}
