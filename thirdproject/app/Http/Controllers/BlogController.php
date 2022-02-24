<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    protected $blog;
    protected $blogs;
    public function index()
    {
        return view('add-blog');
    }

    public function create(Request $request)
    {
        $this->blogs = new Blog();
        $this->blog->title   = $request->title;
        $this->blog->author  = $request->author;
        $this->blog->description = $request->description;
        $this->blog->save();

        return redirect()->back()->with('message', 'student information save successfully');
    }
    public function blog()
    {
        $this->blogs = Blog::orderBy('id', 'desc')->get();
        return view('manage-blog', ['blogs' => $this->blogs]);
    }

    public function edit($id)
    {
        $this->blog = Blog::find($id);

        return view('edit-blog', [ 'blog'=> $this->blog]);
    }
}
