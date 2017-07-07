@extends('layouts.app')

@section('content')
    
    <!-- START -->
    <h1>メッセージ一覧</h1>
    
    @if (count($tasks) > 0)
        <ul>
            @foreach ($tasks as $task)
                <li>{!! link_to_route('tasks.show', $task->id, ['id' => $task->id]) !!}：{{ $task->content }}</li>
            @endforeach
        </ul>
    @endif
    <!-- /END -->
    
@endsection