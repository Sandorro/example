<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<table>
    @isset($opisanie)
        @foreach($opisanie  as $g)
            <tr>
                <td>
                    {{$g->header}}
                </td>
                <td>
                    {{$g->price}}
                </td>
                <td>
                    {{$g->type}}
                </td>
                <td>
                    <button type="submit" class="add-cart" data-tabl="{{$tabl}}" data-id="{{$id}}" name="add">Добавить в корзину</button>
                </td>
            </tr>
        @endforeach
    @endisset
</table>

</body>
</html>

