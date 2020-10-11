@extends('layouts.app')

@section('title')
    Добавить Книгу
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Добавить Книгу</h2>
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
    <form action="{{ route('books.store') }}" method="POST" >
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                <div class="form-group">
                    <strong>Название Книги:</strong>
                    <input type="text" name="title" class="form-control" placeholder="Название">
                </div>
            </div>

            <div class="input-group col-xs-12 col-sm-12 col-md-12 mb-3">
              <div class="input-group-prepend">
                <label class="input-group-text" for="inputGroupSelect01">Автор</label>
              </div>
              <select class="custom-select" name="author_id" id="inputGroupSelect01">
                @foreach ($authors as $author)
                    <option value="{{$author->id}}">{{$author->last_name . ' ' . $author->first_name . ' ' . $author->middle_name}}</option>
                @endforeach
              </select>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Количество страниц:</strong>
                    <input type="text" name="pages" class="form-control" placeholder="Количество">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Год выпуска:</strong>
                    <input type="text" name="year" class="form-control" placeholder="Год">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Издатель:</strong>
                   <input type="text" name="publisher" class="form-control" placeholder="Издатель">
                </div>
            </div>
            <div class="input-group col-xs-12 col-sm-12 col-md-12 mb-3">
              <div class="input-group-prepend">
                <label class="input-group-text" for="inputGroupSelect01">Обложка</label>
              </div>
              <select class="custom-select" name="cover" id="inputGroupSelect01">
                @foreach ($covers as $cover)
                    <option value="{{$cover}}">{{$cover}}</option>
                @endforeach
              </select>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Добавить</button>
            </div>
        </div>

    </form>
@endsection