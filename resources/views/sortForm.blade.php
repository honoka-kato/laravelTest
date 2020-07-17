<!DOCTYPE html>
<html>
    <head>
        <title>ソートフォーム</title>
        <meta charset="utf-8">
    </head>
        <h3>ソート関数フォーム</h3>
        <form action="/SortController" method="get">
            数字を入力してください：<input type="text" name="numArray">
            <select name="formFlag" size="1">
                <option value="0">昇順</option>
                <option value="1">降順</option>
            </select>
            実行回数：<input type="text" name="formcount">
            <input type="submit" value="送信">
        </form>
    <body>
    </bpdy>
</html>