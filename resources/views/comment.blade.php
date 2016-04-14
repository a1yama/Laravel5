<!DOCTYPE html>
<html>
    <head>
        <title>コメント</title>
    </head>
    <body>
        @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        @endif

        {!! Form::open(['route' => 'comment.store']) !!}
            {!! Form::text('comment', null) !!}
            {!! Form::submit('Comment') !!}
        {!! Form::close() !!}

        <ul>
            @foreach($comments as $comment)
                <li>{{{ $comment->comment }}}</li>
            @endforeach
        </ul>
        <p>
            {!! link_to(route('comment.delete'), '全部削除') !!}
        </p>
    </body>
</html>
