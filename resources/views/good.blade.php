@extends('header')
@section('tit')
    Описание товара
@endsection
@section('con')
@isset($opisanie)
    <h1>{{$opisanie[0]["header"]}}</h1>
    <img src="{{$opisanie[0]["image"]}}" alt="Изображение товара" style="margin: auto" width="500">
    <button type="submit" class="addToCart" data-id="{{$id}}" data-tabl="{{$tabl}}" name="dob">
        {{ csrf_field() }}
        Добавить в корзину</button>
    <table class="table">
        @foreach($opisanie  as $g)
            <tr>
                <td class="stolbec"><b>Тип</b></td>
                <td class="stolbec">{{$g["type"]}}</td>
            </tr>
            <tr>
                <td class="stolbec"><b>Страна-производитель</b></td>
                <td class="stolbec">{{$g["country"]}}</td>
            </tr>
            @if ($tabl == "guitars"):
            <tr>
                <td class="stolbec"><b>Материал струн</b></td>
                <td class="stolbec">{{$g["strun"]}}</td>
            </tr>
            <tr>
                <td class="stolbec"><b>Материал грифа</b></td>
                <td class="stolbec">{{$g["grif"]}}</td>
            </tr>
            <tr>
                <td class="stolbec"><b>Материал деки</b></td>
                <td class="stolbec">{{$g["deka"]}}</td>
            </tr>
            @endif
            @if ($tabl == "sints"):
                <tr>
                    <td class="stolbec"><b>Количество клавиш</b></td>
                    <td class="stolbec">{{$g["klav"]}}</td>
                </tr>
                <tr>
                    <td class="stolbec"><b>Количество звуков</b></td>
                    <td class="stolbec">{{$g["zvuk"]}}</td>
                </tr>
            @endif
            <tr>
                <td class="stolbec"><b>Цена</b></td>
                <td class="stolbec">{{$g["price"]}} рублей</td>
            </tr>
            <tr>
                <td class="stolbec"><b>Описание</b></td>
                <td class="stolbec">{{$g["comment"]}}</td>
            </tr>
        @endforeach
    @endisset
</table>

@endsection
