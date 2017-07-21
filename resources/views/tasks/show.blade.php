@extends('layouts.app')

@section('content')
    
    <!-- START -->
    @if (Auth::user() && Auth::user()->id == $task->user_id)
    <?php $user = Auth::user(); ?>
    
    <h1>id = {{ $task->id }} のタスク詳細ページ</h1>
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <td>{{ $task->id }}</td>
        </tr>
        <tr>
            <th>タスク</th>
            <td>{{ $task->content }}</td>
        </tr>
        <tr>
            <th>ステータス</th>
            <td>{{ $task->status }}</td>
        </tr>
        
    </table>
    
    {!! link_to_route('tasks.edit', 'このタスク編集', ['id' => $task->id], ['class' => 'btn btn-defalt pull-left']) !!}
    
    {!! Form::model($task, ['route' => ['tasks.destroy', $task->id], 'method' => 'delete']) !!}
        {!! Form::submit('削除', ['class' => 'btn btn-danger pull-right']) !!}
    {!! Form::close() !!}
    <!-- /END -->
    @else
    <a href="/">トップページへ戻る</a>
    @endif
    
@endsection