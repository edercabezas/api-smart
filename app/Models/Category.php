<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
     use HasFactory;

    public $timestamps = true;

	protected $table = 'categories';
	protected $fillable = [
		'name',
		'description'
	];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
