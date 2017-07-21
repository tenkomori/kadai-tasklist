@extends('layouts.app')

@section('content')
    <div class="row">
        <aside class="col-xs-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">{{ $user->name }}</h3>
                </div>
                <div class="panel-body">
                    <img class="media-object img-rounded img-responsive" src="{{ Gravatar::src($user->email, 500) }}" alt="">
                </div>
            </div>
        </aside>
        <div class="col-xs-8">
        @if (count($tasks) > 10)
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>タスク</th>
                        <th>ステータス</th>
                    </tr>
                    @include('tasks.tasks', ['tasks' => $tasks])
                </thead>
            </table>
        @else
        <p>登録しているタスクはありません</p>
        @endif
        </div>
    </div>
@endsection