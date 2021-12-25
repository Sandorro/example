@extends('header')
@section('con')
@isset($opisanie)
    <h1>{{$opisanie[0]->header}}</h1>
    <img src="{{$opisanie[0]->image}}" alt="Изображение товара" style="margin: auto">
    <table class="table">
        @foreach($opisanie  as $g)
            <tr>
                <td class="stolbec"><b>Тип</b></td>
                <td class="stolbec">{{$g->type}}</td>
            </tr>
            <tr>
                <td class="stolbec"><b>Страна-производитель</b></td>
                <td class="stolbec">{{$g->country}}</td>
            </tr>
            <tr>
                <td class="stolbec"><b>Материал струн</b></td>
                <td class="stolbec">{{$g->strun}}</td>
            </tr>
            <tr>
                <td class="stolbec"><b>Материал грифа</b></td>
                <td class="stolbec">{{$g->grif}}</td>
            </tr>
            <tr>
                <td class="stolbec"><b>Материал деки</b></td>
                <td class="stolbec">{{$g->deka}}</td>
            </tr>
            <tr>
                <td class="stolbec"><b>Цена</b></td>
                <td class="stolbec">{{$g->price}} рублей</td>
            </tr>
            <tr>
                <td class="stolbec"><b>Описание</b></td>
                <td class="stolbec">{{$g->comment}}</td>
            </tr>
        @endforeach
    @endisset
</table>

@endsection
