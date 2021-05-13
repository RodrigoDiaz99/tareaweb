<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Article;

class ArticlesController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $articles = Article::all();
        return view('articles.index', compact('articles'));
    }

    public function create()
    {
        return view('articles.create');
    }

    public function show()
    {
        $article = Article::all();
        return view('articles.show', compact('article'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'author' => 'required',

            'cover_file' => 'required|mimes:jpeg,bmp,png',
            'article_file' => 'required|mimetypes:application/pdf|max:10000'
        ]);

        $cover_file = $request->file('cover_file');
        $article_file = $request->file('article_file');

        if ($article_file && $cover_file) {

            //obtenemos el nombre del archivo
            $coverName = time(); //. $cover_file->getClientOriginalName();
            $articleName = time() . '.pdf'; // . $book_file->getClientOriginalName();
            
            // Img del libro o documento PDF.
            $pathCover = $cover_file->storeAs('public/covers', $coverName);

            // Almacenamos el archivo y tambien obtenemos el path en el cual será almacenado
            $pathDocument = $article_file->storeAs('public/article', $articleName);

            //Almacenamos los datos respectivos en la DB;
            Article::create([
                'name' => $request->name,
                'author' => $request->author,
                'article_path_url' => $pathDocument,
                'img_path_url' => $pathCover,
                'user_id' => auth()->user()->id,
            ]);
        } else {
            return back();

        }
        if($request->new == 'new'){
            return back()->with('success', 'Documento y Imagen gurdado con éxito');
        }else{
            return redirect()->route('article_index')->with('success', 'Documento y Imagen gurdado con éxito');
        }

    }

    public function edit($id){
        $articles = Article::find($id);
        return view('articles.edit', compact('articles'));
    }

    public function update(Request $request, $id){

        //Archivos nuevos a subir
        $cover_file = $request->file('cover_file');
        $article_file = $request->file('article_file');

        // Apartado de cuando se quieren modificar todos los campos;
        if($cover_file && $article_file){
            $request->validate([
                'name' => 'required',
                'author' => 'required',
    
                'cover_file' => 'required|mimes:jpeg,bmp,png',
                'article_file' => 'required|mimetypes:application/pdf|max:10000'
            ]);

            //Eliminamos archivos que estamos editando;
            Storage::delete($request->cover_delete);
            Storage::delete($request->article_delete);

            //obtenemos el nombre del archivo
            $coverName = time(); //. $cover_file->getClientOriginalName();
            $articleName = time() . '.pdf'; // . $book_file->getClientOriginalName();

            // Img del libro o documento PDF.
            $pathCover = $cover_file->storeAs('public/covers', $coverName);

            // Almacenamos el archivo y tambien obtenemos el path en el cual será almacenado
            $pathDocument = $article_file->storeAs('public/articles', $articleName);

            //Almacenamos los datos respectivos en la DB;
            Article::where('id', $id)->update([
                'name' => $request->name,
                'author' => $request->author,
                'article_path_url' => $pathDocument,
                'img_path_url' => $pathCover
            ]);

            return redirect()->route('article_index')->with('update', 'Se actualizó la información junto con la imagen y documento del libro.');

        }
        
        // Apartado de cuando solo se quiere cambiar el cover del libro;
        elseif($cover_file){
            $request->validate([
                'name' => 'required',
                'author' => 'required',
    
                'cover_file' => 'required|mimes:jpeg,bmp,png',
                'article_file' => 'mimetypes:application/pdf|max:10000'
            ]);

            //Eliminamos archivos que estamos editando;
            Storage::delete($request->cover_delete);

            //obtenemos el nombre del archivo
            $coverName = time(); //. $cover_file->getClientOriginalName();

            // Img del libro o documento PDF.
            $pathCover = $cover_file->storeAs('public/covers', $coverName);

            //Almacenamos los datos respectivos en la DB;
            Article::where('id', $id)->update([
                'name' => $request->name,
                'author' => $request->author,
                'img_path_url' => $pathCover
            ]);

            return redirect()->route('article_index')->with('update', 'Se actualizó la información junto con la imagen del libro.');
        }

        // Apartado de cuando solo se quiere cambiar el file del libro
        elseif($article_file){
            $request->validate([
                'name' => 'required',
                'author' => 'required',
    
                'cover_file' => 'mimes:jpeg,bmp,png',
                'article_file' => 'required|mimetypes:application/pdf|max:10000'
            ]);

            //Eliminamos archivos que estamos editando;
            Storage::delete($request->article_delete);

            //obtenemos el nombre del archivo
            $articleName = time() . '.pdf'; // . $book_file->getClientOriginalName();;

            // Almacenamos el archivo y tambien obtenemos el path en el cual será almacenado
            $pathDocument = $article_file->storeAs('public/articles', $articleName);

            //Almacenamos los datos respectivos en la DB;
            Article::where('id', $id)->update([
                'name' => $request->name,
                'author' => $request->author,
                'article_path_url' => $pathDocument,
            ]);

            return redirect()->route('article_index')->with('update', 'Se actualizó la información junto con el archivo del libro.');
        }

        // Apartado de cuando solo se quiere modificar el nombre y autor del libro
        elseif($cover_file == '' && $article_file == ''){
            $request->validate([
                'name' => 'required',
                'author' => 'required',
    
                'cover_file' => 'mimes:jpeg,bmp,png',
                'article_file' => 'mimetypes:application/pdf|max:10000'
            ]);

            //Almacenamos los datos respectivos en la DB;
            Article::where('id', $id)->update([
                'name' => $request->name,
                'author' => $request->author
            ]);

            return redirect()->route('article_index')->with('update', 'Se actualizó la información del libro.');
        }else {
            return redirect()->route('article_index')->with('update', 'No se hicieron cambios. 4');
        }
    }

    public function download(){

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $DeleteArticle = Article::find($id);

        //Eliminamos el registro de la db;
        $DeleteArticle->delete();

        // Movemos el archivo de books a deleteBooks para mantener un backup;
        Storage::move($DeleteArticle->article_path_url, 'deleteArticles/' . $DeleteArticle->deleted_at . '.pdf');

        // Movemos el archivo de covers a deleteCovers para mantener un backup;
        Storage::move($DeleteArticle->img_path_url, 'deleteCovers/' . $DeleteArticle->deleted_at);

        return back()->with('delete', 'El libro se elimino con éxito.');
    }
}
