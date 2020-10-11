<?php

namespace App\Exports;

use App\Models\Book;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BooksExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {

    	$books = DB::table('books')
            ->join('authors', 'books.author_id', '=', 'authors.id')
            ->select('title', DB::raw("CONCAT(first_name, ' ', last_name, ' ', middle_name) AS full_name"), 'pages', 'year', 'publisher')
            ->get();
        return $books;
    }

    public function headings() : array
    {
       return [
            'Название', 
            'ФИО', 
            'Страницы', 
            'Год', 
            'Издатель'
        ];
    }
}
