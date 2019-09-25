<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 24 Sep 2019 21:22:50 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Formacao
 * 
 * @property int $id
 * @property int $usuarioId
 * @property string $descricao
 * 
 * @property \App\Models\Usuario $usuario
 *
 * @package App\Models
 */
class Formacao extends Eloquent
{
	protected $table = 'formacao';
	public $timestamps = false;

	protected $casts = [
		'usuarioId' => 'int'
	];

	protected $fillable = [
		'descricao'
	];

	public function usuario()
	{
		return $this->belongsTo(\App\Models\Usuario::class, 'usuarioId');
	}
}
