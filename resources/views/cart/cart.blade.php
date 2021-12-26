@extends('header')
@section('tit')
    Корзина
@endsection
@section('con')
<h1>Корзина</h1>
    @isset($arr)
        <table id="tablica">
            <tr class="stroka">
                <th class="stolbec">Название</th>
                <th class="stolbec">Цена</th>
                <th class="stolbec">Изображение</th>
                <th class="stolbec">Количество</th>
                <th class="stolbec"> </th>
            </tr>
            @foreach ($arr as $s)
            <tr class="stroka">
                <td class="stolbec">{{$s["header"]}}</td>
                <td class="stolbec">{{$s["price"]}}</td>
                <td class="stolbec"><img src="{{$s['image']}}" alt="Изображение товара" width="200"></td>
                <td class="stolbec">{{$s["dubler"]}}</td>
                <td class="stolbec">
                    <form method="post" class="deleteFromCart" data-id="{{$s["kolvo"]}}">
                        @csrf
                        {{method_field('POST')}}
                    <input type="button" value="Удалить из корзины">
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    @endisset
    <button id="sch" data-id="1">Посчитать количество товаров</button>
    <h3 id="cart-count">---</h3>
    <button id="price">Посчитать общую стоимость</button>
    <h3 id="price-output">---</h3>
    <a href="order" class="btn btn-primary">Оформить заказ!</a>
@endsection

{{--@if ((session()->has('auth')))--}}

{{--@endif--}}
