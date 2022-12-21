<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use App\Notifications\postCreated;
use Flasher\Prime\FlasherInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index(){

        $posts = Posts::all();
        return view('posts', [
            'rahims'=> $posts

        ]);

    }

    public function add(Request $r, FlasherInterface $flasher){
        
        $r->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        // if($r->fails()){
            
        //     $flasher->addWarning('please fill all the fields');
        //     return redirect()->back();

        // }

        
        $post = new Posts();
        $post->title = $r->title;
        $post->content = $r->content;
        $post->date = now();
        $post->save();
        
        $user = Auth::user();
        $user->notify(new postCreated($post));

        $flasher->addSuccess('post has been created');

        return redirect()->route('lara-post');

    }
    public function editpost($id){

        $post = Posts::findOrFail($id);

        return view('edit', [
            'posts' => $post,
        ]);
        
    }

    public function update($id, Request $request, FlasherInterface $flasher){
        $updatedpost = Posts::findOrFail($id);
        $request->validate([
                'title' => 'required',
                'content' => 'required'
        ]);

        $updatedpost->title = $request->title;
        $updatedpost->content = $request->content;
        $updatedpost->save();

        $flasher->addSuccess('posts updated successfully');

        return redirect()->route('lara-post');
    }

    public function delete($id, FlasherInterface $flasher){
            $deletepost = Posts::findOrFail($id);
            $deletepost-> delete();

            $flasher->addSuccess('Post deleted');
            return redirect()->route('lara-post');

    }
    
}
