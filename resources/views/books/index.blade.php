@extends('layouts.app')

@section('title')
    Книги
@endsection

@section('content')
    <div class="row ">
        <div class="col-lg-12 margin-tb ">
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('books.create') }}" title="Добавить Книгу"> <i class="fas fa-plus-circle"></i>
                Добавить
                </a>
                <a class="btn btn-primary" href="{{ route('download') }}" title="Выгрузить в Excel"> <i class="fas fa-upload"></i>
                Выгрузить в Excel
                </a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success mt-3">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered table-responsive-lg mt-3">
        <tr>
            <th>No</th>
            <th>Название</th>
            <th>Автор</th>
            <th>Страниц</th>
            <th>Год Выпуска</th>
            <th>Издатель</th>
            <th>Обложка</th>
            <th width="280px">Действие</th>
        </tr>
        @foreach ($books as $book)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $book->title }}</td>
                <td>{{ $book->author->first_name . ' ' . $book->author->last_name}}</td>
                <td>{{ $book->pages }}</td>
                <td>{{ $book->year }}</td>
                <td>{{ $book->publisher }}</td>
                <td>{{ $book->cover }}</td>
                <td>
                    <form action="{{ route('books.destroy', $book->id) }}" method="POST">

                        <a href="{{ route('books.show', $book->id) }}" title="show">
                            <i class="fas fa-eye text-success  fa-lg ml-3"></i>
                        </a>

                        <a href="{{ route('books.edit', $book->id) }}">
                            <i class="fas fa-edit  fa-lg ml-3 "></i>

                        </a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" title="delete" style="border: none; cursor: pointer; background-color:transparent;">
                            <i class="fas fa-trash fa-lg text-danger ml-3"></i>

                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

@endsection