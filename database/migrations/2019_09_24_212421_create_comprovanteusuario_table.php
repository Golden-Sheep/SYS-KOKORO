<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateComprovanteusuarioTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('comprovanteusuario', function(Blueprint $table)
		{
			$table->integer('usuarioId');
			$table->integer('fotoId')->index('fotoId');
			$table->primary(['usuarioId','fotoId']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('comprovanteusuario');
	}

}
