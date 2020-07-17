<!DOCTYPE html>
<html>
    <head>
        <title>並べ替え</title>
        <meta charset="utf-8">
    </head>
    <body>
        <h2>ソート関数</h2>
        @foreach($num as $n)
        <p>{{ $n }}</p>
        @endforeach
        <p>実行回数：{{ $count }}</p>
        <p>処理時間：{{ $sumTime }}秒</p>
    </body>
</html>