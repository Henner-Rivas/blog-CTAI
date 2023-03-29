<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Storage;

use App\Http\Controllers\Controller;
use App\Models\Document;
use App\Models\Post;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Cast\Double;
use PhpParser\Node\Stmt\TryCatch;

class ArchivoController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;



        $archivos =   Document::where('name', 'LIKE', "%{$search}%")->latest()->paginate();

        return view('admin.archivos.index', ['archivos' => $archivos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        return view('admin.archivos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {




        $reg = new Document;
        $reg->name = $request->get('name');
        /*         $reg->slug = $request->get('slug');
 */
        if ($request->hasFile('file')) {

            $url =  Storage::put('public/archivos', $request->file('file'));

            $reg->document = $url;
        }

        $reg->save();
        /*         dd($request);
 */        /*         return $request->file('file');
        */

        return redirect()->route('admin.archivos.index')->with('info', 'se ha creado el articulo con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
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
    public function edit(/* Post $post */)
    {
        /*     $tags = Tag::all();
        $categories = Category::pluck('name', 'id');

        return view('admin.posts.edit', ['post' => $post, 'tags' => $tags, 'categories' => $categories]);
  */
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $post->update($request->all());
        if ($request->file('file')) {
            $url =  Storage::put('public/posts', $request->file('file'));
            if ($post->image) {
                Storage::delete($post->image->url);
                $post->image->update([
                    'url' => $url,
                ]);
            } else {
                $post->image()->create([
                    'url' => $url
                ]);
            }
        }
        /*         $this->authorize('author', $post);
 */
        /*    $tags = Tag::all();
        $categories = Category::pluck('name', 'id');


        if ($request->tags) {
            $post->tags()->sync($request->tags);
        }
        return redirect()->route('admin.posts.edit', ['post' => $post, 'tags' => $tags, 'categories' => $categories])->with('info', 'Se ha actualizado con exito');
   */
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document $archivo)
    {
        $archivo->delete();
        Storage::delete($archivo->document);

        return redirect()->route('admin.archivos.index')->with('info', 'El archivo se ha eliminado con exito');
    }
}
