@extends('student.layout.app')

@section('title', 'editページだよ')

@section('content')

    <h1>編集画面</h1>

    <div>
    <a href="/events" class="btn btn-primary" style="margin:20px 0px 20px 0px;">戻る</a>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- form -->
    <form method="post" action="/events/{{$event->id}}">

        <div class="form-group">
            <label>タイトル</label>
            <input type="text" name="title" value="{{$event->title}}" class="form-control">
        </div>

        <div class="form-group">
            <label>内容</label>
            <input type="text" name="body" value="{{$event->body}}" class="form-control">
        </div>

        <div class="form-group">
            <label>カテゴリー：</label>
            <select name="category_id" class="form-control">
            {{-- <option value="{{$event->category_id}}">{{$event->category_table_name}}</option> --}}
            <option value="1">新卒採用</option>
            <option value="2">中途採用</option>
            <option value="3">就活セミナー</option>
            <option value="4">合同説明会</option>
            </select>
        </div>
        <div class="controls">

    </div>


        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <input type="hidden" name="_method" value="PUT">
        <input type="submit" value="更新" class="btn btn-primary">

    </form>

@stop