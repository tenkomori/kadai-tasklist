@extends('layouts.app')

@section('content')
    
    <!-- START -->
    @if (Auth::check())
    <?php $user = Auth::user(); ?>
    <h1>{{ $user->name }} さんのタスク一覧</h1>
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
        <p>{!! link_to_route('tasks.create', '新しいタスクを追加する', null, ['class' => 'btn btn-primary']) !!}</p>
    @else
        <div class="center jumbotron">
            <div class="text-center">
                <h1>Welcome to the TaskList</h1>
                {!! link_to_route('signup.get', '新規会員登録', null, ['class' => 'btn btn-lg btn-primary']) !!}
            </div>
        </div>
    
    @endif
    <!-- /END -->
    
@endsection