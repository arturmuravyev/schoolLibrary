<?php

namespace App\Http\Controllers;
use App\Models\Book;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\BooksExport;
use Illuminate\Support\Facades\Config;
class ExcelExportController extends Controller
{
    public static function export()
    {
    	$filename = config('app.excel_file');
		Excel::download(new BooksExport, $filename);
        return redirect('/')->with('success', 'Выгружено в Excel');
    }
}
