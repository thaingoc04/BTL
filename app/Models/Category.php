<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Category
 *
 * @property int $id
 * @property string|null $color
 * @property string|null $description
 * @property string|null $name
 * @property int|null $status
 * @property int|null $user_id
 *
 * @property User|null $user
 * @property Collection|Plan[] $plans
 * @property Collection|Transaction[] $transactions
 *
 * @package App\Models
 */

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';
	public $timestamps = false;

	protected $casts = [
		'status' => 'int',
		'user_id' => 'int',
		'color' => 'string'
	];

	protected $fillable = [
		'color',
		'description',
		'name',
		'status',
		'user_id'
	];

    public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function plans()
	{
		return $this->belongsToMany(Plan::class, 'plan_category')
					->withPivot('id', 'ammount');
	}

	public function transactions()
	{
		return $this->hasMany(Transaction::class);
	}
}
