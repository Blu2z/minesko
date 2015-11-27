<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Validator;

class Collection extends Model
{
    use SoftDeletes;
    
    protected $table = 'collections';

    protected $dates = ['deleted_at'];

    protected $fillable = ['active', 'alias', 'title', 'keywords', 'description', 'img', 'alt'];

    protected $hidden = [ 'deleted_at', 'created_at', 'updated_at'];

    protected static $rules = [
        'active' => 'boolean',
        'alias' => 'required|max:255|regex:([a-z0-9\-])|unique:collections,alias',
        'title'  => 'required|max:255|unique:collections,title',
        'keywords' => 'max:100',
        'description' => 'max:150',
        'img' => 'unique:collections,img',
        'alt' => 'max:255',
    ];

    public function validator(array $data)
    {
        return Validator::make($data, self::$rules);
    }

    public function galleries(){
        return $this->hasMany('App\CollectionsGallery')->get();
    }
    
    public function getActive() {
        return $this->revers()->active()->paginate(10);
    }

    public function scopeRevers($query){
        $query->orderBy('id', 'desc');
    }

    public function scopeActive($query){
        $query->where(['active' => 1]);
    }

    public function getByAlias($alias){
        return $this->where('alias', $alias)->get();
    }
}