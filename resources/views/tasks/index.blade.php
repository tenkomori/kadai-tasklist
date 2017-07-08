@extends('layouts.app')

@section('content')
    
    <!-- START -->
    <h1>タスク一覧</h1>
    
    @if (count($tasks) > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>タスク</th>
                    <th>ステータス</th>
                </tr>
                <tbody>
                    @foreach ($tasks as $task)
                    <tr>
                        <td>{!! link_to_route('tasks.show', $task->id, ['id' => $task->id]) !!}</td>
                        <td>{{ $task->content }}</td>
                        <td>{{ $task->status }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </thead>
        </table>
    @endif
    <!-- /END -->
    
    {!! link_to_route('tasks.create', '新しいタスクを追加する', null, ['class' => 'btn btn-primary']) !!}
    
@endsection