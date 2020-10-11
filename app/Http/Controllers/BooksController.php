<?php

namespace App\Http\Controllers;
use App\Models\Book;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::orderBy('id', 'desc')
        ->paginate(25);

        return view('books.index')->with('books', $books);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authors = Author::orderBy('id', 'desc')
        ->get();
        return view('books.create')->with([
            'authors' => $authors,
            'covers' => $this->getPossibleCovers()
        ]);
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
            'title' => 'required',
            'author_id' => 'required'
        ]);

        Book::create($request->all());

        return redirect()->route('books.index')
            ->with('success', 'Книга добавлена');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {

        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required'
        ]);
        $book->update($request->all());

        return redirect()->route('books.index')
            ->with('success', 'Книга была успешно отредактирована');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('books.index')
            ->with('success', 'Книга Удалена');
    }

    public static function getPossibleCovers()
    {
     $type = DB::select( DB::raw("SHOW COLUMNS FROM books WHERE Field = 'cover'") )[0]->Type;
     preg_match('/^enum\((.*)\)$/', $type, $matches);
     $enum = array();
     foreach( explode(',', $matches[1]) as $value )
     {
       $v = trim( $value, "'" );
       array_push($enum, $v);
     }
     return $enum;
    }
}
