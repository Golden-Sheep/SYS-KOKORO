<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToComprovanteusuarioTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('comprovanteusuario', function(Blueprint $table)
		{
			$table->foreign('usuarioId', 'comprovanteusuario_ibfk_1')->references('id')->on('usuario')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('fotoId', 'comprovanteusuario_ibfk_2')->references('id')->on('foto')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('comprovanteusuario', function(Blueprint $table)
		{
			$table->dropForeign('comprovanteusuario_ibfk_1');
			$table->dropForeign('comprovanteusuario_ibfk_2');
		});
	}

}
