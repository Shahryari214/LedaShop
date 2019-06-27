<?php
/**
 * Created by PhpStorm.
 * User: ledashop
 * Date: 6/4/2017
 * Time: 8:12 PM
 */

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
trait Slug
{
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
        return "/category/$this->slug";
    }
}