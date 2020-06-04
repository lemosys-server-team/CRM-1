<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'parent_id', 'is_active'
    ];


    // For get sub categories of a category
    public function children(){
        return $this->hasMany(ProductCategory::class, 'parent_id');
    }

     // For get parent category of a category
    public function parent(){
        return $this->belongsTo(ProductCategory::class, 'parent_id', 'id');
    }

}
