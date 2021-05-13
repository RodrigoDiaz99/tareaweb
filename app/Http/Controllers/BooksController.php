<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Book;
use Hamcrest\Core\HasToString;

class BooksController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    public function create()
    {
        return view('books.create');
    }

    public function show()
    {
        $book = Book::all();
        return view('books.show', compact('book'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'author' => 'required',

            'cover_file' => 'required|mimes:jpeg,bmp,png',
            'book_file' => 'required|mimetypes:application/pdf|max:10000'
        ]);

        $cover_file = $request->file('cover_file');
        $book_file = $request->file('book_file');

        if ($book_file && $cover_file) {

            //obtenemos el nombre del archivo
            $coverName = time(); //. $cover_file->getClientOriginalName();
            $bookName = time() . '.pdf'; // . $book_file->getClientOriginalName();

            // Img del libro o documento PDF.
            $pathCover = $cover_file->storeAs('public/covers', $coverName);

            // Almacenamos el archivo y tambien obtenemos el path en el cual será almacenado
            $pathDocument = $book_file->storeAs('public/books', $bookName);

            //Almacenamos los datos respectivos en la DB;
            Book::create([
                'name' => $request->name,
                'author' => $request->author,
                'book_path_url' => $pathDocument,
                'img_path_url' => $pathCover,
                'user_id' => auth()->user()->id
            ]);
        } else {
            return back();
        }
        if ($request->new == 'new') {
            return back()->with('success', 'Documento y Imagen gurdado con éxito');
        } else {
            return redirect()->route('book_index')->with('success', 'Documento y Imagen gurdado con éxito');
        }
    }

    public function edit($id)
    {
        $book = Book::find($id);
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, $id)
    {

        //Archivos nuevos a subir
        $cover_file = $request->file('cover_file');
        $book_file = $request->file('book_file');

        // Apartado de cuando se quieren modificar todos los campos;
        if ($cover_file && $book_file) {
            $request->validate([
                'name' => 'required',
                'author' => 'required',

                'cover_file' => 'required|mimes:jpeg,bmp,png',
                'book_file' => 'required|mimetypes:application/pdf|max:10000'
            ]);

            //Eliminamos archivos que estamos editando;
            Storage::delete($request->cover_delete);
            Storage::delete($request->book_delete);

            //obtenemos el nombre del archivo
            $coverName = time(); //. $cover_file->getClientOriginalName();
            $bookName = time() . '.pdf'; // . $book_file->getClientOriginalName();

            // Img del libro o documento PDF.
            $pathCover = $cover_file->storeAs('public/covers', $coverName);

            // Almacenamos el archivo y tambien obtenemos el path en el cual será almacenado
            $pathDocument = $book_file->storeAs('public/books', $bookName);

            //Almacenamos los datos respectivos en la DB;
            Book::where('id', $id)->update([
                'name' => $request->name,
                'author' => $request->author,
                'book_path_url' => $pathDocument,
                'img_path_url' => $pathCover
            ]);

            return redirect()->route('book_index')->with('update', 'Se actualizó la información junto con la imagen y documento del libro.');
        }

        // Apartado de cuando solo se quiere cambiar el cover del libro;
        elseif ($cover_file) {
            $request->validate([
                'name' => 'required',
                'author' => 'required',

                'cover_file' => 'required|mimes:jpeg,bmp,png',
                'book_file' => 'mimetypes:application/pdf|max:10000'
            ]);

            //Eliminamos archivos que estamos editando;
            Storage::delete($request->cover_delete);

            //obtenemos el nombre del archivo
            $coverName = time(); //. $cover_file->getClientOriginalName();

            // Img del libro o documento PDF.
            $pathCover = $cover_file->storeAs('public/covers', $coverName);

            //Almacenamos los datos respectivos en la DB;
            Book::where('id', $id)->update([
                'name' => $request->name,
                'author' => $request->author,
                'img_path_url' => $pathCover
            ]);

            return redirect()->route('book_index')->with('update', 'Se actualizó la información junto con la imagen del libro.');
        }

        // Apartado de cuando solo se quiere cambiar el file del libro
        elseif ($book_file) {
            $request->validate([
                'name' => 'required',
                'author' => 'required',

                'cover_file' => 'mimes:jpeg,bmp,png',
                'book_file' => 'required|mimetypes:application/pdf|max:10000'
            ]);

            //Eliminamos archivos que estamos editando;
            Storage::delete($request->book_delete);

            //obtenemos el nombre del archivo
            $bookName = time() . '.pdf'; // . $book_file->getClientOriginalName();;

            // Almacenamos el archivo y tambien obtenemos el path en el cual será almacenado
            $pathDocument = $book_file->storeAs('public/books', $bookName);

            //Almacenamos los datos respectivos en la DB;
            Book::where('id', $id)->update([
                'name' => $request->name,
                'author' => $request->author,
                'book_path_url' => $pathDocument,
            ]);

            return redirect()->route('book_index')->with('update', 'Se actualizó la información junto con el archivo del libro.');
        }

        // Apartado de cuando solo se quiere modificar el nombre y autor del libro
        elseif ($cover_file == '' && $book_file == '') {
            $request->validate([
                'name' => 'required',
                'author' => 'required',

                'cover_file' => 'mimes:jpeg,bmp,png',
                'book_file' => 'mimetypes:application/pdf|max:10000'
            ]);

            //Almacenamos los datos respectivos en la DB;
            Book::where('id', $id)->update([
                'name' => $request->name,
                'author' => $request->author
            ]);

            return redirect()->route('book_index')->with('update', 'Se actualizó la información del libro.');
        } else {
            return redirect()->route('book_index')->with('update', 'No se hicieron cambios. 4');
        }
    }

    public function download($id)
    {
        $DownloadBook = Book::find($id);

        return Storage::download($DownloadBook->book_path_url);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $DeleteBook = Book::find($id);

        //Eliminamos el registro de la db;
        $DeleteBook->delete();

        // Movemos el archivo de books a deleteBooks para mantener un backup;
        Storage::move($DeleteBook->book_path_url, 'deleteBooks/' . $DeleteBook->deleted_at . '.pdf');

        // Movemos el archivo de covers a deleteCovers para mantener un backup;
        Storage::move($DeleteBook->img_path_url, 'deleteCovers/' . $DeleteBook->deleted_at);

        return back()->with('delete', 'El libro se elimino con éxito.');
    }
}
