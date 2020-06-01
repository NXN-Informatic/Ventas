<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToPuestosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('puestos', function (Blueprint $table) {
            $table->string('nosotros', 1000)->nullable()->default('Deja que tus clientes te conozcan, Cuéntales un poco de ti y porque creaste este negocio. Demuestrales a tus clientes que hay personales reales y confiables con interesantes historias trabajando detrás de escena. Ayuda a los clientes a sentirse conectados ati y tu objetivo inspirará más consfianza en tu negocio.');
            $table->string('elegirnos', 1000)->nullable()->default('Usa esta sección para generar confianza y una conexión personal con tus clientes. Mientras más te conozcan más posibilidades existen de que compren en tu tienda. Explica porqué es este el mejor sitio para comprar lo que vendes. Remarca sobretodo que hace especial a tus productos o servicios. Por ejemplo, si tus productos tienen un estilo único, son personalizados, nacionales, importados? Este es el lugar para decirles a tus clientes cuan bueno es tu servicio y productos. Déjales una impresión memorable.');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('puestos', function (Blueprint $table) {
            $table->dropColumn('nosotros');
            $table->dropColumn('elegirnos');
        });
    }
}
