@extends('/layouts/app')
@section('content')
<body>
<div>
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
                    <button type="button" class="deleteFromCart" data-id="{{$s["kolvo"]}}">Удалить из корзины</button>
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
</div>
@endsection

{{--@if ((session()->has('auth')))--}}

{{--@endif--}}
