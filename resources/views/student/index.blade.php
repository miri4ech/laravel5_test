@extends('student.layouts.app')

@section('title', 'indexページだよ')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <h1>データ一覧</h1>

            <!-- table -->
            <table class="table table-striped">
                <tr>
                    <th>ID</th>
                    <th>タイトル</th>
                    <th>内容</th>
                    <th>カテゴリー</th>
                    <th>詳細</th>
                    <th>編集</th>
                    <th>削除</th>
                </tr>
                @foreach($events as $event)
                    <tr>
                        <td>{{$event->id}}</td>
                        <td>{{$event->title}}</td>
                        <td>{{$event->body}}</td>
                        <td>{{$event->category_table_name}}</td>
                        <td><a href="/events/{{$event->id}}" class="btn btn-info btn-sm">詳細</a></td>
                        <td><a href="/events/edit/{{$event->id}}" class="btn btn-default btn-sm">編集</a></td>
                        <td>
                            <form method="post" action="/events/destroy/{{$event->id}}">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <input type="submit" value="削除" class="btn btn-danger btn-sm btn-destroy">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>



            <h1>新規ユーザー作成</h1>

            <hr/>
            {{-- エラーの表示を追加 --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            {{-- formの開始タグを作成 --}}
            {!! Form::open() !!}
                <div class="form-group">
                    {!! Form::label('title', 'タイトル：') !!}
                    {!! Form::text('title', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('body', '内容：') !!}
                    {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
                </div>
                <div class="control-group">
                    {{ Form::label('category_id','カテゴリー：',array('class'=>'control-label')) }}
                    {{ Form::select('category_id',array('1'=>'新卒採用','2'=>'中途採用','3'=>'就活セミナー','4'=>'合同説明'),'1') }}
                </div>    
                <div class="form-group">
                    {!! Form::submit('作成', ['class' => 'btn btn-primary']) !!}
                </div>
            {{-- formの終了タグを作成 --}}
            {!! Form::close() !!} 
            </div>
        </div>
    </div>
</div>
@section('script')
$(function(){
    $(".btn-destroy").click(function(){
        if(confirm("本当に削除しますか？")){
            //削除
        }else{
            //cancel
            return false;
        }
    });
});
@stop
@endsection


