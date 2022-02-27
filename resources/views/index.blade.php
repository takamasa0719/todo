<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/reset.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="card">
            <h2 class="title">Todo List</h2>
            <div class="todo">
            @if (count($errors) > 0)
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            @endif
                <form class="todo-form" action="/todo/create" method="post">
                    @csrf
                    <input class="add" type="text" name="content">
                    <input class="add-btn" type="submit" value="追加">
                </form>
                <table>
                    <tr>
                        <th>作成日</th>
                        <th>タスク名</th>
                        <th>更新</th>
                        <th>削除</th>
                    </tr>
                    @foreach ($items as $item)
                    <tr>
                        <td>
                            {{$item->created_at}}
                        </td>
                        <form method="post" action="/todo/update?id={{$item->id}}">
                                @csrf
                        <td>
                            <input type="text" class="input-update" value="{{$item->content}}" name="content">
                        </td>
                        <td>
                                <button class="btn-update">更新</button>
                        </td>
                        </form>
                        <td>
                            <form method="post" action="/todo/delete?id={{$item->id}}">
                                @csrf
                                <button class="btn-delete" name="delete">削除</button>
                            </form>
                        </td>   
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</body>
</html>