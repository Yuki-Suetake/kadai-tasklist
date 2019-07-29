@extends('layouts.app')

@section('content')

<!-- Controllerから渡されたデータ($tasks)を一覧表示させる-->
    <h1>タスク一覧</h1>
    @if (count($tasks) > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>id</th>
                    <th>ステイタス</th>
                    <th>タスク</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $task)
                <tr>
                    <td>{!! link_to_route('tasks.show', $task->id, ['id' => $task->id]) !!}</td>
                    <td>{{ $task->status}}</td>
                    <td>{{ $task->content }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <!--Tasks Modelのレコードの一覧(1ページ25件ずつ)を確認できる-->
    {{ $tasks->render('pagination::bootstrap-4') }}
    <!--IndexかのViewからCreateのViewへ遷移できるリンク-->
    {!! link_to_route('tasks.create', '新規タスク', null, ['class' => 'btn btn-primary']) !!}

@endsection