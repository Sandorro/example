@extends('header')
@section('tit')
    Показ категории
@endsection
@section('con')
@isset($arr)
    @foreach($arr as $g)
        <tr>
            <td>
                <a href="/good/{{$g['nom']}}/{{$g['categ']}}"> {{$g['header']}} </a>
            </td>
            <td>
                {{$g['price']}}
            </td>
            <td>
                <button type="submit" class="add-cart" data-tabl="{{$g['categ']}}" data-id="{{$g['nom']}}" name="add">
                    Добавить в корзину
                </button>
            </td>
        </tr>
    @endforeach
@endisset
@endsection
