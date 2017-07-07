@extends('layouts.app')

@section('content')
    
    <!-- START -->
    <h1>新規タスク作成ページ</h1>
    
    {!! Form::model($task, ['route' => 'tasks.store']) !!}
        
        {!! Form::label('content', 'タスク：') !!}
        {!! Form::text('content') !!}
        
        {!! Form::label('status', 'ステータス：') !!}
        {!! Form::select('status', [
            '完了' => '完了',
            '期限超過' => '期限超過',
            '進行中' => '進行中',
            '未開始' => '未開始']
        ) !!}
        
        {!! Form::submit('投稿') !!}
        
    {!! Form::close() !!}
    <!-- /END -->
    
@endsection