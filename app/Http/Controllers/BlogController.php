<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogRequest;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['blogs']= Blog::paginate(3);
        return view('backends.blogs.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backends.blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogRequest $request)
    {
        $createblog = Blog::create([
            'title' => $request->title,
            'discription' => $request->discription,
            'images' => $request->file('images')->store('images/blog'),
        ]);
        if (empty($createblog)) {
            return back()->with('ERROR', "Fill Kor age");
        }        
        return redirect()->route('blog.index')->with('SUCCESS', "Valo Korsesis");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        $data['blog'] = $blog;
        return view('backends.blogs.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        $upblog = $blog;
        $upblog->title = $request->title;
        $upblog->discription = $request->discription;
        $upblog->images = $request->file('images')->store('images');       
        if ($upblog->update()){
            return redirect()->route('blog.index')->with('SUCCESS', "Valo Korsesis");
        }
        return back()->with('ERROR', "Fill Kor age");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        if ($blog->delete()){
            return redirect()->route('blog.index')->with('SUCCESS', "Valo Korsesis");
        }
        return back()->with('ERROR', "Pari na");

    }

    public function copypost($copypost)
    {
        $blogpostcopy = Blog::where('id',$copypost)->first();
        $createblog = Blog::create([
            'title' => $blogpostcopy->title,
            'discription' => $blogpostcopy->discription,
            'images' => $blogpostcopy->images,
        ]);
        if (empty($createblog)) {
            return back()->with('ERROR', "Fill Kor age");
        }        
        return redirect()->route('blog.index')->with('SUCCESS', "Valo Korsesis");
        
    }
}
