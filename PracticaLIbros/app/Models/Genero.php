<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Genero
 * 
 * @property int $id
 * @property string $genero
 * @property Carbon|null $created_at
 * @property Carbon|null $update_at
 * 
 * @property Collection|Libro[] $libros
 *
 * @package App\Models
 */
class Genero extends Model
{
	protected $table = 'generos';
	public $timestamps = true;

	protected $casts = [
		'update_at' => 'datetime'
	];

	protected $fillable = [
		'genero',
		'update_at'
	];

	public function libros()
	{
		return $this->hasMany(Libro::class);
	}
}
