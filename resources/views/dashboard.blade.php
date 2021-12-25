<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-jet-welcome />
                <h1>Hello</h1>
            </div>
        </div>
    </div>
</x-app-layout>

<h3>Добро пожаловать!</h3>


    <?php $orderList = App\Models\Order::getOrders(); ?>
    {{var_dump($orderList)}}
{{--    {{dd($orderList)}}--}}
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
<a href="/changeLogin">Сменить логин</a>
