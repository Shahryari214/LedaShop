<?php
/**
 * Created by PhpStorm.
 * User: ledashop
 * Date: 6/4/2017
 * Time: 8:12 PM
 */

namespace App\Models;
use Kalnoy\Nestedset\NodeTrait;

trait Node
{
    use NodeTrait;
    public function categories()
    {
        return $this->hasMany(category::class , 'parent_id' , 'id')->latest();
    }
    public function Children()
    {
        return $this->hasMany($this, 'parent');
    }

    public function Parent()
    {
        return $this->hasOne($this,'id','parent');
    }
}