<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable=['name','category_id'];
    protected $hidden=['created_at','updated_at'];

    public function category(){

        return $this->belongsTo(Category::class,'category_id','id',);
    }
    public function scopeStartedAt($q , $data){
        return $q->where('created_at','>',Carbon::parse($data));
    }
}
