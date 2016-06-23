@extends('student.layout')

@section('title', 'showページだよ')
@section('content')

    <h1>詳細表示</h1>

    <div class="row">
        <div class="col-sm-12">
            <a href="/events" class="btn btn-primary" style="margin:20px 0 20px 0;">戻る</a>
        </div>
    </div>

    <!-- table -->
    <table class="table table-striped">
        <tr><td>ID</td><td>{{$event->id}}</tr>
        <tr><td>タイトル</td><td>{{$event->title}}</tr>
        <tr><td>内容</td><td>{{$event->body}}</tr>
    </table>

@stop