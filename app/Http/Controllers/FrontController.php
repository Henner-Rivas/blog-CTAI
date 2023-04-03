<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Document;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Counter;
use Faker\Provider\Lorem;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Awssat\Visits\Visits;

class FrontController extends Controller
{
    public function index(Request $request)
    {

        $sliders = Post::where('status', 2)->where('category_id', '=', 2)->latest()->paginate(6);

        $posts = Post::where('status', 2)->where('category_id', '=', 1)->latest()->paginate(8);
        return view('pages.home', ['posts' => $posts, 'postsSlider' => $sliders]);
    }

    public function comunicacion()
    {


        $posts = Post::where('status', 2)->where('category_id', '=', 1)->latest()->paginate(8);
        return view('pages.comunicacion', ['posts' => $posts]);
    }
    public function contratacion()
    {


        $posts = Post::where('status', 2)->where('category_id', '=', 5)->latest()->paginate();

        return view('pages.contratacion', ['posts' => $posts]);
    }
    public function show_contratacion(Post $post)
    {
        $posts = Post::where('status', 2)->where('category_id', '=', 5)->latest()->paginate();

        return view('pages.show-contratacion', ['post' => $post, 'posts' => $posts]);
    }
    public function show_comunicacion(Post $post)
    {
        return view('pages.show-comunicacion', ['post' => $post]);
    }
    public function show_educacion(Post $post)
    {
        return view('pages.show-educacion', ['post' => $post]);
    }
    public function show_convocatoria(Post $post)
    {
        return view('pages.show-convocatoria', ['post' => $post]);
    }
    public function show_programa(Post $post)
    {
        return view('pages.show-programa', ['post' => $post]);
    }

    public function storeComment(Request $request, Post $post)
    {

        $request->validate([
            'description' => 'required',
        ], [
            'name.required' => 'Este campo es requerido',
        ]);
        $comentario = new Comment();
        $comentario->description = $request->description;
        $comentario->role = $request->role;
        $comentario->parent_id = $request->parent_id;
        $comentario->post_id = $request->post_id;
        /*         dd($comentario);
 */
        /*         $parent_id = \Auth()->id();
        if ($parent_id) {
            $parent_id = \Auth()->id();
        } else {
            $parent_id = null;

 */

        $user_id = \Auth()->id();
        if ($user_id) {
            $user_id = \Auth()->id();
        } else {
            $user_id = 2;
        }
        $comentario->user_id = $user_id;


        $post->comments()->save($comentario);

        return redirect()->back()->with('info', 'comentario recibido con exito');
    }




    public function educacion()
    {

        $posts =   Post::where('category_id', '=', 3)->latest()->paginate(2);
        return view('pages.educacion', ['posts' => $posts]);
    }
    public function programas()
    {

        $posts =   Post::where('category_id', '=', 4)->latest()->paginate();
        return view('pages.programas', ['posts' => $posts]);
    }
    public function vision()
    {
        return view('pages.vision');
    }
    public function convocatoria()
    {
        $posts =   Post::where('category_id', '=', 4)->latest()->paginate(2);
        return view('pages.convocatoria', ['posts' => $posts]);
    }

    public function estructura()
    {
        return view('pages.estructura');
    }
    public function contactanos()
    {
        return view('pages.contactanos');
    }
    public function objetivo()
    {
        return view('pages.objetivo');
    }
    public function mision()
    {
        return view('pages.mision');
    }
    public function prensa()
    {
        return view('pages.sala-prensa');
    }
    public function show_articulo(Post $post)
    {

        $similares = Post::where('category_id', $post->category_id)->where('status', 2)->where('id', '!=', $post->id)->take(5)->get();
        $this->authorize('published', $post);

        return view('posts.show', ['post' => $post, 'similares' => $similares]);
    }
    public function show_similar(Post $post)
    {

        $similares = Post::where('category_id', $post->category_id)->where('status', 2)->where('id', '!=', $post->id)->take(5)->get();
        $this->authorize('published', $post);

        return view('posts.show-similar', ['post' => $post, 'similares' => $similares]);
    }

    public function search(Request $request)
    {
        $search = $request->search;

        $posts =   Post::where('status', 2)->where('name', 'LIKE', "%{$search}%")->orwhere('body', 'LIKE', "%{$search}%")->orwhere('extract', 'LIKE', "%{$search}%")->latest()->paginate(5);

        return view('posts.search', ['posts' => $posts, 'search' => $search]);
    }

    public function tag(Tag $tag)
    {


        $posts = $tag->posts()->where('status', 2)->latest('id')->paginate(6);

        return view('posts.tags', ['posts' => $posts, 'tag' => $tag]);

        return $tag;
    }

    public function slider()
    {
        $posts = Post::where('status', 2)->where('category_id', '=', 2)->latest()->paginate(6);


        return view('pages.home', ['postsSlider', $posts]);
    }




    public function documents()
    {

        $archivos =   Document::latest()->paginate();

        return view('pages.documents', ['archivos' => $archivos]);
    }
    public function programs()
    {
        return view('pages.documents');
    }

    public function counter(Request $request)
    {
        // Verificar si el usuario ya ha sido contado
        if (!$request->cookie('visited')) {
            // Establecer la cookie con un identificador único
            $cookie = cookie('visited', uniqid(), 60); // 300s

            // Actualizar el contador de visitas
            $counters = Counter::latest()->paginate(1);
            $views = 0;
            foreach ($counters as $key => $value) {
                $views = $value;
            }

            $views = intval($views['views']) + 1;
            $counter = new Counter();
            $counter->views = $views;
            $counter->save();
            return response('Contador actualizado')->withCookie($cookie);

            // Enviar la cookie con la respuesta
        }
    }
}
