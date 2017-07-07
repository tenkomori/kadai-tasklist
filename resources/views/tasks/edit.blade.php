@extends('layouts.app')

@section('content')
    
    <!-- START -->
    <h1>id: {{ $task->id }} のタスク編集ページ</h1>
    
    {!! Form::model($task, ['route' => ['tasks.update', $task->id], 'method' => 'put']) !!}
    
        {!! Form::label('content', 'タスク：') !!}
        {!! Form::text('content') !!}

        {!! Form::label('status', 'ステータス：') !!}
        {!! Form::select('status', [
            '完了' => '完了',
            '期限超過' => '期限超過',
            '進行中' => '進行中',
            '未開始' => '未開始']
        ) !!}
        
        {!! Form::submit('更新') !!}
    
    {!! Form::close() !!}
    <!-- /END -->
    
@endsection