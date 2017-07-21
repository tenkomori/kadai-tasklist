@extends('layouts.app')

@section('content')
    
    <!-- START -->
    @if (Auth::check())
    <h1>新規タスク作成ページ</h1>
    <div class="row">
        <div class="col-xs-12 col-sm-offset-2 col-sm-8 col-lg-offset-3 col-lg-6">
            
            {!! Form::open(['route' => 'tasks.store']) !!}
                
                <div class="form-group">
                    {!! Form::label('content', 'タスク：') !!}
                    {!! Form::text('content', null, ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('status', 'ステータス：') !!}
                    {!! Form::select('status', [
                        '完了' => '完了',
                        '期限超過' => '期限超過',
                        '進行中' => '進行中',
                        '未開始' => '未開始']
                    , null, ['class' => 'form-control']) !!}
                </div>
                
                {!! Form::submit('登録', ['class' => 'btn btn-primary']) !!}
                
            {!! Form::close() !!}
        </div>
    </div>
    <!-- /END -->
    @else
    <a href="/">トップページへ戻る</a>
    @endif
    
@endsection