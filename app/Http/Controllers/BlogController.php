<?php

namespace App\Http\Controllers;

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
        $data = Blog::all();
        return view('backend.blog.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul'=>'required',
            'konten'=>'required',
            'thumbnail'=>'required',
            'status'=>'required',
        ]);

        try {
            $in = [
                'judul' => $request['judul'],
                'thumbnail' => $request['thumbnail'],
                'konten' => $request['konten'],
                'status' => $request['status'],
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];
            Blog::create($in);
            return redirect('/blog');
        } catch (\Throwable $th) {
            return redirect('/blog/create');
        }
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
        return view('backend.blog.edit', compact('blog'));
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
        $request->validate([
            'judul'=>'required',
            'konten'=>'required',
            'thumbnail'=>'required',
            'status'=>'required',
        ]);

        try {
            $in = [
                'judul' => $request['judul'],
                'thumbnail' => $request['thumbnail'],
                'konten' => $request['konten'],
                'status' => $request['status'],
                'updated_at' => date('Y-m-d H:i:s'),
            ];
            Blog::where('id',$blog->id)->update($in);
            return redirect('/blog');
        } catch (\Throwable $th) {
            return $th;
            return redirect('/blog/'.$blog->id.'/edit');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        try {

            Blog::where('id',$blog->id)->delete();
            return redirect('/blog');
        } catch (\Throwable $th) {
            return $th;
            return redirect('/blog');
        }
    }
}
