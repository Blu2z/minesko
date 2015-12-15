<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Validator;

class Service extends Model
{
    use SoftDeletes;

    protected $table = 'services';

    protected $dates = ['deleted_at'];

    protected $fillable = ['title', 'keywords', 'description', 'text', 'img'];

    protected $hidden = [ 'deleted_at', 'created_at', 'updated_at'];

    protected static $rules = [
        'title'  => 'required|max:100',
        'keywords' => 'max:100',
        'description' => 'max:150',
        'img' => 'mimes:image',
    ];

    public function validator(array $data)
    {
        return Validator::make($data, self::$rules);
    }

    public function getObjects() {
        return $this->revers()->get();
    }

    public function scopeRevers($query){
        $query->orderBy('id', 'desc');
    }

    public function geByAlias($alias){
        return $this->where('alias', $alias)->get();
    }

    public function getOnTop(){
        return $this->where('on_top', '=', 1)->get();
    }
}
