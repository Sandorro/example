<?php header("Content-Type: text/plain; charset=utf-8"); ?>
@extends('header')
@section('tit')
    Личный кабинет
@endsection
@section('con')

<h3>Добро пожаловать в личный кабинет!</h3>
<br>
<br>

    <?php $orderList = App\Models\Order::getOrders(); ?>
@if(count($orderList)==0)
    <h5>Пока что Вы ничего не заказали. Исправьте это!</h5>

@else($orderList)
    <h5>Ваша история заказов:</h5>
<table border="2" class="table table-striped">
    <th class="stolbec">Дата заказа</th>
    <th class="stolbec">Товары</th>
    <th class="stolbec">Стоимость</th>
    @foreach ($orderList as $o)
    <tr class="stroka">
        <td class="stolbec">{{$o->data}}</td>
        <td class="stolbec">
            <?php $perenos = str_replace(')', ")\n", $o->tovars); ?>
            <?php echo nl2br($perenos); ?>
        </td>
        <td class="stolbec">{{$o->price}}</td>
    </tr>
    @endforeach
</table>
@endif
@endsection
