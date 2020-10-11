@extends('layouts.app')

@section('title')
    Редактирование Книги
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Редактировать Книгу</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-warning" href="{{ route('books.index') }}" title="Назад"> <i class="fas fa-backward "></i> </a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger mt-3">
            <strong>Упс!</strong> Что-то пошло не так...<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('books.update', $book->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Название:</strong>
                    <input type="text" name="title" value="{{ $book->title }}" class="form-control" placeholder="Название">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Год выпуска:</strong>
                    <textarea class="form-control" style="height:50px" name="introduction"
                        placeholder="Год">{{ $book->year }}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Страниц:</strong>
                    <input type="text" name="pages" class="form-control" placeholder="Страниц"
                        value="{{ $book->pages }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Издатель:</strong>
                    <input type="publisher" name="cost" class="form-control" placeholder="Издатель"
                        value="{{ $book->publisher }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Сохранить</button>
            </div>
        </div>

    </form>
@endsection