<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;
    protected $table = 'comments' ;
    protected $fillable = [ 'name' , 'email' , 'website' , 'comment_id' , 'post_id' , 'comment' , 'comment_type'];
    
    public function posts(){
        return $this-> belongsTo( Posts::class ) ;
    }
    public function replies(){
         return $this-> hasMany(Replies::class) ;
    }
}
