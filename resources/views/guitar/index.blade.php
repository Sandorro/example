<x-guest-layout>
{{--<!doctype html>--}}
{{--<html lang="en">--}}
{{--<head>--}}
{{--    <meta charset="UTF-8">--}}
{{--    <meta name="viewport"--}}
{{--          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">--}}
{{--    <meta http-equiv="X-UA-Compatible" content="ie=edge">--}}
{{--    <title>Document</title>--}}
{{--</head>--}}
{{--<body>--}}
<table>
    @isset($arr)
    @foreach($arr as $g)
        <tr>
            <td>
                {{$g['nom']}}
            </td>
            <td>
                <b>{{$g['header']}}</b>
            </td>
            <td>
                {{$g['price']}}
            </td>
        </tr>
    @endforeach
    @endisset
</table>
{{--        {{$allCollection->links()}}--}}
</body>
</html>
</x-guest-layout>
