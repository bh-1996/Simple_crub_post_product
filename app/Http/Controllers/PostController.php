<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use File;

class PostController extends Controller
{
    
    public function index()
    {
        //
        $post= Post::latest()->paginate('10');
        return view('post.index')->with(['post'=>$post]);
    }

  
    public function postAdd()
    {
        return view('post.add');
    }

  
    public function store(Request $request)
    {
        $post=new Post();
        $post->post_name = $request->post_name;
        $post->post_content = $request->post_content;
        // if (isset($request->post_image) && !empty($request->post_image)) {
        //     $post->post_image = UploadImage($request->post_image, 'addimage');
        // }
        if($request->hasfile('post_image'))
        {
            $destination='public/addimage/'.$post->post_image;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $file =$request->file('post_image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('addimage/',$filename);
            $post->post_image=$filename;

        }
            if($post->save());
            {
            return redirect()->route('index')->with('Success','Post created successfully..!');
            }
            return redirect()->back();
    }


    public function show(Post $post)
    {
        //
    }

    public function postEdit($id)
    {
        $post = Post::find($id);
        if ($post) {
            return view("post.edit", ['post' => $post]);
        }
        return Redirect::back();
        
    }


    public function postUpdate(Request $request)
    {
        $post = Post::find($request->id);
        $post->post_name = $request->post_name;
        $post->post_content = $request->post_content;
        if($request->hasfile('post_image'))
        {
            $destination='public/addimage/'.$post->post_image;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $file =$request->file('post_image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('addimage/',$filename);
            $post->post_image=$filename;

        }
            if($post->update());
            {
            return redirect()->route('index')->with('Success','Post Update successfully..!');
            }
            return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $post=Post::find($id);
        $post->delete();
        return redirect()->back();
    }
}
