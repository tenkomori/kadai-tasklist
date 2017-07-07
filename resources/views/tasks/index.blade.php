@extends('layouts.app')

@section('content')
    
    <!-- START -->
    <h1>タスク一覧</h1>
    
    @if (count($tasks) > 0)
        <ul>
            @foreach ($tasks as $task)
                <li>{!! link_to_route('tasks.show', $task->id, ['id' => $task->id]) !!}：{{ $task->content }} 【{{ $task->status }}】 </li>
            @endforeach
        </ul>
    @endif
    <!-- /END -->
    
    {!! link_to_route('tasks.create', '新しいタスクを追加する') !!}
    
@endsection