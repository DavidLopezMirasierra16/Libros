<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Libro
 * 
 * @property int $id
 * @property string $titulo
 * @property string|null $descripcion
 * @property string|null $imagen
 * @property int $autor_id
 * @property int $genero_id
 * @property Carbon|null $created_at
 * @property Carbon|null $update_at
 * 
 * @property Autore $autore
 * @property Genero $genero
 *
 * @package App\Models
 */
class Libro extends Model
{
	protected $table = 'libros';
	public $timestamps = true;

	protected $casts = [
		'autor_id' => 'int',
		'genero_id' => 'int',
		'update_at' => 'datetime'
	];

	protected $fillable = [
		'titulo',
		'descripcion',
		'imagen',
		'autor_id',
		'genero_id',
		'update_at'
	];

	public function autore()
	{
		return $this->belongsTo(Autore::class, 'autor_id');
	}

	public function genero()
	{
		return $this->belongsTo(Genero::class);
	}
}
