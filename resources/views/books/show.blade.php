@extends('layouts.app')

@section('title')
    Просмотр Книги
@endsection

@section('content')
    <div class="row mt-3">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>  {{ $book->title }}</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-warning" href="{{ route('books.index') }}" title="Назад"> <i class="fas fa-backward "></i> </a>
            </div>
        </div>
    </div>

    <div class="row  col-lg-12 mt-3">
        <div class="card ">
        <div class="card-header">
            Детали
        </div>
        <div class="card-body">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Название:</strong>
                {{ $book->title }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Автор:</strong>
                {{ $book->author->first_name . ' ' . $book->author->last_name}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Страниц:</strong>
                {{ $book->pages }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Год издания:</strong>
                {{ $book->year }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Издатель:</strong>
                {{ $book->publisher }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Создана:</strong>
                {{ date_format($book->created_at, 'jS M Y') }}
            </div>
        </div>
        </div>
        </div>
    </div>
@endsection