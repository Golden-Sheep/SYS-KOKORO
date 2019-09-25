<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 24 Sep 2019 21:22:50 +0000.
 */

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Usuario
 *
 * @property int $id
 * @property string $nome
 * @property string $email
 * @property string $password
 * @property int $cargo
 * @property \Carbon\Carbon $dataNascimento
 * @property bool $cadastroAprovado
 * @property int $fotoId
 * @property string $telefone
 * @property string $celular
 * @property string $endereco
 *
 * @property \App\Models\Foto $foto
 * @property \Illuminate\Database\Eloquent\Collection $comprovanteusuarios
 * @property \Illuminate\Database\Eloquent\Collection $formacaos
 *
 * @package App\Models
 */
class Usuario extends Authenticatable
{
	protected $table = 'usuario';
	public $timestamps = false;

	protected $casts = [
		'cargo' => 'int',
		'cadastroAprovado' => 'bool',
		'fotoId' => 'int'
	];

    protected $hidden = [
        'password'
    ];

	protected $dates = [
		'dataNascimento'
	];

	protected $fillable = [
		'nome',
		'email',
		'cargo',
		'dataNascimento',
		'cadastroAprovado',
		'fotoId',
		'telefone',
		'celular',
		'endereco'
	];

	public function foto()
	{
		return $this->belongsTo(\App\Models\Foto::class, 'fotoId');
	}

	public function comprovanteusuarios()
	{
		return $this->hasMany(\App\Models\Comprovanteusuario::class, 'usuarioId');
	}

	public function formacaos()
	{
		return $this->hasMany(\App\Models\Formacao::class, 'usuarioId');
	}

    public function getAuthPassword()
    {
        return bcrypt($this->password);
    }
}
