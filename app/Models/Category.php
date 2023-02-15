<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class Category extends Model
{
    use HasFactory;

    use Translatable;

    protected $translatable = ['name'];
 
    protected $guarded = [];
    public $parent_names = "";


    public function products()
    {
        return $this->hasMany(Product::class , 'category_id') ;
    }

    public function parentId()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }
    
    public function getFullNameAttribute()
    {
        
       $this->getParentsTree($this);
       /*  $parentName = $this->parentId ? $this->parentId->name : ""; */
        return "{$this->parent_names}  {$this->name}";
    }

    private function getParentsTree($category){

        if($category->parentId){
            $this->parent_names .= $category->parentId->name ;
            $this->parent_names .= "  |  ";
            
           $this->getParentsTree($category->parentId);
        }
        
    }
    public $additional_attributes = ['full_name'];  
}
