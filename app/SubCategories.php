<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategories extends Model
{
     // Sub category has only one main category
     public function subcategories(){
    	return $this->belongsTo('App\ParentCategory');
    }
}
