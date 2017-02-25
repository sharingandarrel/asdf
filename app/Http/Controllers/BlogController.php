<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;

class BlogController extends Controller
{
    public function index()
    {

    	$blogs = Blog::orderBy('created_at', 'desc')->get();
    	return view('blog.index',compact('blogs'));
    }

    public function create()
    {
    	return view('blog.create');
    }

    public function edit($id)
    {
    	$blog = Blog::find($id);
    	return view('blog.edit', compact('blog'));
    }

    public function update(Request $request, $id)
    {
    	$this->validate($request, [
    			'title'=>'Required',
    			'description'=>'Required'
    		]);

    	$blog = Blog::find($id);
    	$blogUpdate = $request->all();
    	$blog->update($blogUpdate);	
    	return redirect('blog');
    }

    public function destroy($id)
    {
    	$blog = Blog::find($id);
    	$blog->delete();
    	return redirect('blog');
    }

    public function store(Request $request)
    {
    	$this->validate($request, [
    			'title'=>'Required',
    			'description'=>'Required'
    		]);

    	$blog = $request->all();
    	Blog::create($blog);
    	return redirect('blog');
    }
}
