<?php

namespace App\Exports;

use App\Models\Book;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;

class BooksExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
    	$books = DB::table('books')
            ->join('authors', 'books.author_id', '=', 'authors.id')
            ->select('title', 'first_name', 'last_name', 'middle_name', 'pages', 'year', 'publisher')
            ->get();
        return $books;
    }
}
