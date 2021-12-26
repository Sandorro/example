@extends('header')
@section('tit')
    Личный кабинет
@endsection
@section('con')

<h3>Добро пожаловать в личный кабинет!</h3>
<br>
<br>
<h5>Ваша история заказов:</h5>
    <?php $orderList = App\Models\Order::getOrders(); ?>
<table border="2" class="table table-striped">
    <th class="stolbec">Дата заказа</th>
    <th class="stolbec">Товары</th>
    <th class="stolbec">Стоимость</th>
    @foreach ($orderList as $o)
    <tr class="stroka">
        <td class="stolbec">{{$o->data}}</td>
        <td class="stolbec">
            {{$o->tovars}}
        </td>
        <td class="stolbec">{{$o->price}}</td>
    </tr>
    @endforeach
</table>

@endsection
