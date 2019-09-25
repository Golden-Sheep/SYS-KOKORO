<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsuarioTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('usuario', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('nome', 50);
			$table->string('email', 50)->unique('email');
			$table->string('password', 100);
			$table->integer('cargo');
			$table->date('dataNascimento');
			$table->boolean('cadastroAprovado');
			$table->integer('fotoId')->nullable()->index('fotoId');
			$table->string('telefone', 20)->nullable();
			$table->string('celular', 20)->nullable();
			$table->string('endereco', 80)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('usuario');
	}

}
