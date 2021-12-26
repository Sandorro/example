@extends('header')
@section('tit')
    Главная страница
@endsection
    @section('con')
        @php
        $dlina = count($arr);
        $kolstrok = intdiv($dlina, 4);
        $ostatok = fmod($dlina, 4);
        @endphp
        <table class="table table-striped">
            @for($a=0; $a<$kolstrok; $a++)
                <tr class="stroka">
                    @php
                      $i = 0;
                    @endphp
                    @while($i<=3)
                        <td class="stolbec">
                            <a href="good/{{$arr[$i+$a*4]['nom']}}/{{$arr[$i+$a*4]['categ']}}"><img src="{{$arr[$i+$a*4]['image']}}" width="200" alt="Изображение товара"></a>
                            <p><b>{{$arr[$i+$a*4]["header"]}}</b></p>
                            <p><b>{{$arr[$i+$a*4]["price"]}}</b></p>
                            <button type="submit" class="addToCart" data-id="{{$arr[$i+$a*4]['nom']}}" data-tabl="{{$arr[$i+$a*4]['categ']}}" name="dob">
                                {{ csrf_field() }}
                                Добавить в корзину</button>
                        </td>
                        @php
                            $i++;
                        @endphp
                    @endwhile
                </tr>
            @endfor
            @if ($ostatok != 0)
                <tr class="stroka">
                    @php
                      $i = 0;
                    @endphp
                    @while($i<$ostatok)
                        <td class="stolbec">
                            <a href="good/{{$arr[$i+$a*4]['nom']}}/{{$arr[$i+$a*4]['categ']}}"><img src="{{$arr[$i+$a*4]['image']}}" width="200" alt="Изображение товара"></a>
                            <p><b>{{$arr[$i+$a*4]["header"]}}</b></p>
                            <p><b>{{$arr[$i+$a*4]["price"]}}</b></p>
                            <button type="submit" class="addToCart" data-id="{{$arr[$i+$a*4]['nom']}}" data-tabl="{{$arr[$i+$a*4]['categ']}}" name="dob">
                                {{ csrf_field() }}
                                Добавить в корзину</button>
                        </td>
                        @php
                            $i++;
                        @endphp
                    @endwhile
                </tr>
            @endif
        </table>
    @endsection


