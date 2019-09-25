<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFormacaoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('formacao', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('usuarioId')->index('usuarioId');
			$table->string('descricao', 100);
			$table->primary(['id','usuarioId']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('formacao');
	}

}
