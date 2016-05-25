@extends('layouts.app')
@section('title', 'Homeページだよ')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!
                </div>
@can('if_admin')
hello admin
@else
hello user
@endcan
            </div>
        </div>
    </div>
</div>
@endsection
