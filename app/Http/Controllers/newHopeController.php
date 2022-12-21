<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;

class newHopeController extends Controller
{
    public function plusPost(Request $catch){

        $catch->validate([
            'title' => 'required',
            'content' => 'required'
        ]);
            $post = new Posts();
            $post->title = $catch->title;
            $post->content = $catch->title;
            $post->date = now();
            $post->save();
            return redirect()->route('home');
    }
}
