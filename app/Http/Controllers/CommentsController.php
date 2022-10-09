<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comments;

class CommentsController extends Controller
{
    public function createComment(Request $request){
        $request -> validate([
            'name' => 'required|string|max:400',
            'email' => 'required|max:400|email',             
            'comment' => 'required|string',
             'website' => 'url|nullable',
            'comment_id' => 'required|integer',
            'comment_type' => 'required|boolean',
            'post_id' => 'required|integer'
        ]);

        Comments::create([
            'name' =>  $request -> input('name'),
            'email' => $request -> input('email'),
            'website' => $request->input('website'),
            'comment' => $request->input('comment') ,
            'comment_id' => $request->input('comment_id'),
            'comment_type' => $request->input('comment_type'),
            'post_id' =>  $request->input('post_id')
        ]);

        return redirect( route('post.index', [ 
                   'category' => $request -> input('category') ,
                   'slug' => $request -> input('slug')
               ])) ;
    }     
}
