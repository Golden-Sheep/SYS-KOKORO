<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 24 Sep 2019 21:22:50 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Comprovanteusuario
 * 
 * @property int $usuarioId
 * @property int $fotoId
 * 
 * @property \App\Models\Usuario $usuario
 * @property \App\Models\Foto $foto
 *
 * @package App\Models
 */
class Comprovanteusuario extends Eloquent
{
	protected $table = 'comprovanteusuario';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'usuarioId' => 'int',
		'fotoId' => 'int'
	];

	public function usuario()
	{
		return $this->belongsTo(\App\Models\Usuario::class, 'usuarioId');
	}

	public function foto()
	{
		return $this->belongsTo(\App\Models\Foto::class, 'fotoId');
	}
}
