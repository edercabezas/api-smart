<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
     use HasFactory;

    public $timestamps = true;

	protected $table = 'products';
	protected $fillable = [
		'category_id',
        'name',
        'description',
        'price',
        'stock'

	];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
