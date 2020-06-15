<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangecolumnnameToCentroscomercialesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('centroscomerciales', function (Blueprint $table) {
            $table->renameColumn('imagen1', 'banner');
            $table->renameColumn('imagen2', 'logo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('centroscomerciales', function (Blueprint $table) {
            $table->dropColumn('banner');
            $table->dropColumn('logo');
        });
    }
}
