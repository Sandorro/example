<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <base href="/">
    <title>Музыкальный магазин</title>
    <link rel="stylesheet" type="text/css" href={{asset("/css/app.css")}}>

    <link rel="icon" href="././znak.ico" type="image/x-icon">
    <script
        src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous"></script>
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        *{
            margin: 0;
            padding: 0;
        }

        .stroka{
            border: 2px solid #000000;
        }

        .stolbec{
            border: 2px solid #000000;
        }


        #headerheader{
            position: relative;
            /*position: absolute;*/
            /*margin: auto;*/
            margin-top: 0px;
            padding: 0;
            /*width: 1500px;*/
            height: 200px;
            background-color: #2323c7;
            /*margin-bottom: 10px;*/
        }

        #nazvanie{
            color: #FFFFFF;
            font: 40px Georgia;
            text-align: center;     /* отступ слева */
        }

        #descript{
            /*position: relative;*/
            margin-top: 0px;
            width: 300px;
            color: gold;
            font-style: italic;
            /*margin: 70px 0 0 30px;*/
            font-size: 22px;
        }



        #classification{
            position: absolute;
            margin-top: 0px;
            text-align: center;
            width: 300px;
            height: 792px;
            color: #000000;
            background-color: #c96a30;
            outline: 1px solid #000000;
        }

        #content {
            position: relative;
            overflow-y: auto;
            /*margin: auto;*/
            margin-top: 0px;
            margin-left: 300px;
            /*width: 1200px;*/
            height: 792px;
            text-align: center;
            background-color: #FFFFFF;
            outline: 1px solid #000000;
        }


        #add{
            color: white;
            background-color: #6e8ddc;
        }

        #korzinka{
            position: absolute;
            margin-top: 200px;
            width: 1500px;
            height: 1000px;
            background-color: green;
        }

        #footerfooter{
            position: relative;

            /*margin-top: 1000px;*/
            height: 100px;
            background-color: #2323c7;
            text-align: center;
            color: white;

        }

        .div-table{
            display: table;
            width: 100%;
            height: 100%;
        }

        .div-table-cell{
            display: table-cell;
            text-align: center;
            vertical-align: middle;
        }


        #vvod{
            text-align: center;
        }
    </style>
    {{--    <style>--}}
    {{--        @import url("../resources/views/layout/mainPage.css");--}}
    {{--    </style>--}}
</head>
<body id="tablica">
<div id="headerheader">
    <div class="div-table">
        <div class="div-table-cell">
            <h1 id="nazvanie">Музыкальный магазин</h1>

            <p id="descript">Я вас категорически приветствую!</p>

            <ul class="nav  nav-justified">
                @if (Route::has('login'))
                    @auth
                <li class="nav-item">
                    <form action="./dashboard" method="post">
                        @CSRF
                        <button class="btn btn-primary" type="submit" style="background-color: red">Личный кабинет
                        </button>
                    </form>
                </li>
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="post">
                        @CSRF
                        <button class="btn btn-primary" type="submit" style="background-color: red">Выход</button>
                    </form>
                </li>
                    @else
                <li class="nav-item">
                    <a href="{{ route('login') }}" class="btn btn-primary" style="background-color: red">Вход</a>
                </li>
                        @if (Route::has('register'))
                <li class="nav-item">
                    <a href="{{ route('register') }}" class="btn btn-primary" style="background-color: red">Регистрация</a>
                </li>
                        @endif
                    @endauth
                @endif
                <li class="nav-item">
                    <form action="./cart" method="post">
                        @CSRF
                        <button class="btn btn-primary" type="submit" style="background-color: red">Корзина</button>
                    </form>
                </li>

                <li class="nav-item">
                    <form action="mainPage" method="get">
                        <button class="btn btn-primary" type="submit" style="background-color: red">Главная страница
                        </button>
                    </form>
                </li>
            </ul>
        </div>

    </div>
</div>


<div id="classification">

    <p style="text-align: center"><u>Выберите категорию:</u></p>
    <?php $catList = App\Models\Category::select('id', 'cat', 'tabl')->get() ?>
    <form action="/index.php" method="post">
        <button class="btn btn-primary" type="submit">Все</button>
    </form>
    <br>
    @foreach ($catList as $c):
        <form action="/good/{{$c['tabl']}}" method="post">
            <button class="btn btn-primary" type="submit">{{$c['cat']}}</button>
        </form>
    @endforeach
        <br>
        <br>
        <p>Показать товары дороже заданной цены:</p>
        <form action="/getListOver" method="post">
            {{ csrf_field() }}
            <p>
                <input  name="dor" type="number" size="40" style="margin: auto">
                <br>
                <input type="submit" value="Показать">
            </p>
        </form>
        <p>Показать товары дешевле заданной цены:</p>
        <form action="/getListLess" method="post">
            {{ csrf_field() }}
            <p>
                <input  name="desh" type="number" size="40" style="margin: auto">
                <br>
                <input type="submit" value="Показать">
            </p>
        </form>
</div>

<div id="content">
    @yield('con')
</div>

<div id="footerfooter">
    <div class="div-table">
        <div class="div-table-cell">
            <p>Контактный телефон: 89646686114</p>
            <?php echo date("d.m.Y"); ?>
        </div>
    </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script src="{{asset('/main.js')}}"></script>
</body>
</html>



