<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;
use Cviebrock\EloquentSluggable\Sluggable;

class category extends Model
{
    use NodeTrait,Sluggable;
    
    protected $guarded = ['id'];

    public function Products() {
        return $this->belongsToMany('App\Models\Product','category_products')
        ->orderBy('created_at','DESC')
        ->paginate(10);
    }


    public function categories()
    {
        return $this->hasMany(category::class , 'parent_id' , 'id')->latest();
    }

    // public function Children()
    // {
    //     return $this->hasMany($this, 'parent');
    // }

    // public function Parent()
    // {
    //     return $this->hasOne($this,'id','parent');
    // }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function path()
    {
        return "/category/$this->slug";
    }
}
