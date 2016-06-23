@extends('admin.layouts.admin')
@section('title', 'Homeページだよ')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!そしてあなたは管理者権限をもっています。
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
