<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Category extends Model
{
    use HasFactory;
    protected $fillable=['name','icon','image'];
    
    public function articles()
    {
        if(Auth::user()) {
            return $this->hasMany(Article::class)->where('is_accepted', 1)->where('user_id', '!=', Auth::user()->id);  
        } else {
            return $this->hasMany(Article::class)->where('is_accepted', 1);  
        }
        
    }
}
