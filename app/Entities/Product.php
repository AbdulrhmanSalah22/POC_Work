<?php

namespace App\Entities;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Product.
 *
 * @package namespace App\Entities;
 */
class Product extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable=['name','category_id'];
    protected $hidden=['created_at','updated_at'];

    public function category(){

        return $this->belongsTo(Category::class,'category_id','id',);
    }

}
