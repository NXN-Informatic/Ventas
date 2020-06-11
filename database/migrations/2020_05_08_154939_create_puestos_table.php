<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePuestosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('puestos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 120)->unique();
            $table->string('description', 500)->nullable()->default('La tienda líder en venta de artículos (rellene) en Tacna. La mejor calidad, al mejor precio que se encuentra en el mercado.');
            $table->string('phone2', 13)->nullable();
            $table->integer('calification')->unsigned()->default(4);
            $table->string('phone', 13)->nullable();
            $table->float('precio_min', 8,2)->nullable();
            $table->string('perfil', 50)->nullable();
            $table->string('banner', 50)->nullable();
            $table->integer('maxproductos')->default(20);
            $table->integer('maxsubcategorias')->default(5);
            $table->string('nosotros', 1000)->nullable()->default('Deja que tus clientes te conozcan, Cuéntales un poco de ti y porque creaste este negocio. Demuestrales a tus clientes que hay personales reales y confiables con interesantes historias trabajando detrás de escena. Ayuda a los clientes a sentirse conectados ati y tu objetivo inspirará más consfianza en tu negocio.');
            $table->string('elegirnos', 1000)->nullable()->default('Usa esta sección para generar confianza y una conexión personal con tus clientes. Mientras más te conozcan más posibilidades existen de que compren en tu tienda. Explica porqué es este el mejor sitio para comprar lo que vendes. Remarca sobretodo que hace especial a tus productos o servicios. Por ejemplo, si tus productos tienen un estilo único, son personalizados, nacionales, importados? Este es el lugar para decirles a tus clientes cuan bueno es tu servicio y productos. Déjales una impresión memorable.');
            $table->unsignedInteger('plan_id')->nullable();
            $table->foreign('plan_id')->references('id')->on('plans')->default(1);
            $table->boolean('completado')->nullable()->default(false);
            $table->string('urlcatalog',100)->nullable();
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
        Schema::dropIfExists('puestos');
    }
}
