<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Storage;


class PostsController extends Controller
{
    public function create($category_id){
        return view('posts.create')->with('category_id', $category_id);
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'content' => 'required',
            'file' => 'nullable|max:1999'
        ]);


        // handle file upload
        if($request->hasFile('file')){
            // Get filename with the extension
            $fileNameWithExt = $request->file('file')->getClientOriginalName();
            // Get just filename
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // get extension
            $extension = $request->file('file')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;

            $path = $request->file('file')->storeAs('public/files/'.$request->input('category_id'), $fileNameToStore);
            
            
        } else {
            $fileNameToStore = 'No File'; 
        }
        //return $filenameToStore;

            
    $post = new Post;

    $post->category_id = $request->input('category_id');
    
    $post->name = $request->input('name');
    
    $post->content = $request->input('content');
    
    $post->file = $fileNameToStore;

    $post->save();
    
    return redirect('/categories/'.$request->input('category_id'))->with('success', 'Post uploaded');

    }

    public function show($id){
        $post = Post::find($id);
        return view('posts.show')->with('post', $post);
    }

    public function destroy($id){
        $post = Post::find($id);

        Storage::delete('public/files/'.$post->category_id.'/'.$post->file);
        $post->delete();
        return redirect('/')->with('success', 'Post Deleted');
    
}

public function edit($id){
        
    $post = Post::find($id);
    
    return view('posts.edit')->with('post', $post);
}

public function update(Request $request, $id){
      
$this->validate($request, [
    'name' => 'required',
    'content' => 'required',
    'file' => 'nullable|max:1999'
]);


// handle file upload
if($request->hasFile('file')){
    // Get filename with the extension
    $fileNameWithExt = $request->file('file')->getClientOriginalName();
    // Get just filename
    $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
    // get extension
    $extension = $request->file('file')->getClientOriginalExtension();
    // Filename to store
    $fileNameToStore = $fileName.'_'.time().'.'.$extension;

    $path = $request->file('file')->storeAs('public/files/'.$request->input('category_id'), $fileNameToStore);
    
} else {
    $fileNameToStore = 'No File'; 
}

$post = Post::find($id);

    Storage::delete('public/files/'.$post->category_id.'/'.$post->file);

    $post->category_id = $request->input('category_id');
    
    $post->name = $request->input('name');
    
    $post->content = $request->input('content');
    
    $post->file = $fileNameToStore;

    $post->save();
    
    return redirect('/categories/'.$request->input('category_id'))->with('success', 'Post updated');

}
    
}
