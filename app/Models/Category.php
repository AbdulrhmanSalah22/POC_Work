<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

class Category extends Model
{
    use HasFactory, NodeTrait;

    protected $fillable = ['name'];
    protected $hidden = ['created_at', 'updated_at'];


    public function products()
    {

        return $this->hasMany(Product::class, 'category_id', 'id');
    }

}
