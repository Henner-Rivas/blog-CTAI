<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EducacionController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('can:admin.posts.index')->only('index');
        $this->middleware('can:admin.posts.create')->only('create', 'store');

        $this->middleware('can:admin.posts.edit')->only('edit', 'update');
        $this->middleware('can:admin.posts.destroy')->only('destroy');
    }
    public function index(Request $request)
    {
        $search = $request->search;

        $categories = Category::pluck('name', 'id');

        $posts =   Post::where('name', 'LIKE', "%{$search}%")->where('category_id', '=', 3)->latest()->paginate();
        return view('admin.educacion.index', ['posts' => $posts, 'categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $tags = Tag::all();
        $categories = Category::pluck('name', 'id');

        return view('admin.educacion.create', ['categories' => $categories, 'tags' => $tags]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {


        /*         return $request->file('file');
        */


        $post = Post::create($request->all());

        if ($request->file('file')) {
            $url =  Storage::put('public/posts', $request->file('file'));
            $post->image()->create(['url' => $url]);
        }


        /*       if ($request->file('pdf')) {
            $url =  Storage::put('public/posts', $request->file('pdf'));
            $post->image()->create(['url2' => $url]);
        } */
        if ($request->hasFile('pdf')) {

            $url =  Storage::put('public/archivos', $request->file('pdf'));

            $post->image = $url;
            $post->save();
        }



        if ($request->tags) {
            $post->tags()->attach($request->tags);
        }
        return redirect()->route('admin.educacion.edit', $post)->with('info', 'se ha creado el articulo con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //

        /*         return view('admin.posts.show', ['post' => $post]);
 */
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $plane)
    {
        $tags = Tag::all();
        $categories = Category::pluck('name', 'id');

        return view('admin.educacion.edit', ['plane' => $plane, 'tags' => $tags, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorePostRequest $request, Post $plane)
    {
        $plane->update($request->all());
        if ($request->file('file')) {
            $url =  Storage::put('public/posts', $request->file('file'));
            if ($plane->image) {
                Storage::delete($plane->image->url);
                $plane->image->update([
                    'url' => $url,
                ]);
            } else {
                $plane->image()->create([
                    'url' => $url
                ]);
            }
        }

        $tags = Tag::all();
        $categories = Category::pluck('name', 'id');


        if ($request->tags) {
            $plane->tags()->sync($request->tags);
        }
        return redirect()->route('admin.educacion.edit', ['plane' => $plane, 'tags' => $tags, 'categories' => $categories])->with('info', 'Se ha actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $plane)
    {

        if ($plane->image) {
            Storage::delete($plane->image->url);
        }
        $plane->delete();
        return redirect()->route('admin.educacion.index')->with('info', 'La articulo se ha eliminado con exito');
    }
}
