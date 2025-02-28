<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Autore
 * 
 * @property int $id
 * @property string $nombre
 * @property Carbon|null $created_at
 * @property Carbon|null $update_at
 * 
 * @property Collection|Libro[] $libros
 *
 * @package App\Models
 */
class Autore extends Model
{
	protected $table = 'autores';
	public $timestamps = true;

	protected $casts = [
		'update_at' => 'datetime'
	];

	protected $fillable = [
		'nombre',
		'update_at'
	];

	public function libros()
	{
		return $this->hasMany(Libro::class, 'autor_id');
	}
}
