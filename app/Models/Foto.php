<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 24 Sep 2019 21:22:50 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Foto
 * 
 * @property int $id
 * @property string $localArquivo
 * 
 * @property \Illuminate\Database\Eloquent\Collection $comprovanteusuarios
 * @property \Illuminate\Database\Eloquent\Collection $usuarios
 *
 * @package App\Models
 */
class Foto extends Eloquent
{
	protected $table = 'foto';
	public $timestamps = false;

	protected $fillable = [
		'localArquivo'
	];

	public function comprovanteusuarios()
	{
		return $this->hasMany(\App\Models\Comprovanteusuario::class, 'fotoId');
	}

	public function usuarios()
	{
		return $this->hasMany(\App\Models\Usuario::class, 'fotoId');
	}
}
