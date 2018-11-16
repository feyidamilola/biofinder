<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ParentCategory extends Model

{
    // protected $primaryKey = 'category_name';

    //parent category has many sub categories
    public function parentcategory(){
    	return $this->hasMany('App\Category');
    }
}
