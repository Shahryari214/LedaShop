<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class product extends Model
{
    protected $guarded = ['id'];

    public function categories() {
        return $this->belongsToMany('App\Models\Category','category_products')->withTimestamps();
    }
    
    protected $casts = [
        'images' => 'array'
    ];

    use Sluggable;

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
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
        return "/product/$this->slug";
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
