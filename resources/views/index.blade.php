@extends('layout.layout')

@section('title', 'F1Racing')

@section('links')
<link rel="stylesheet" href="{{asset('css/index.css')}}">
<link rel="stylesheet" href="{{asset('css/slider.css')}}">
@endsection

@section('script')
<script src="{{ asset('js/driverSplid.js') }}"></script>
<script>
    function mostrarConteudo(link) {
        // Ocultar todos os conteúdos
        var content = document.querySelectorAll("#classification_content > div");
        for (var i = 0; i < content.length; i++) {
            content[i].classList.add("hidden");
        }

        // Mostrar apenas o conteúdo selecionado
        var id = link.getAttribute("href").substring(1);
        var element = document.getElementById(id);
        if (element) {
            element.classList.remove("hidden");
        }

        // Remover a classe "active" de todos os links
        var links = document.querySelectorAll(".classification_menu a");
        for (var j = 0; j < links.length; j++) {
            links[j].classList.remove("active");
        }

        // Adicionar a classe "active" ao link clicado
        link.classList.add("active");
    }
</script>
@endsection

@section('main')
<div class="ActualyRace">
    <div class="screen1">
        <div class="infoActualyRace">
            <p class="btnRed">At the moment</p>
            <div class="country">
                <img src="{{asset('img/country/qatar.jpg')}}" alt="">
                <p>Qatar</p>
            </div>
            <h1>FORMULA 1 <br>BAHRAIN GRAND PRIX 2024</h1>
            <div class="date">
                <p class="date">29 FEV 2024 - 2 MAR 2024</p>
                <a href="#" class="btnBlack">More</a>
            </div>
        </div>
        <div class="ActualyRaceImg">
            <img src="{{asset('img/prix/bahrain.png')}}" alt="">
        </div>
    </div>
    <div class="nextRace">
        <img src="{{ asset('img/country/UnitedKingdom.png') }}" alt="">
        <div class="infoNextRace">
            <p class="titleRed">Comming</p>
            <h2>Formula 1<br> Saudi Arabian Grand Prix 2024</h2>
            <p class="date">7 MAR 2024 - 9 MAR 2024</p>
        </div>
    </div>
</div>
<div class="drivers">
    <div class="splide splide_default" role="group" aria-label="Splide Basic HTML Example">
        <div class="splide__track">
            <ul class="splide__list">
                @foreach ($drivers as $driver)
                <li class="splide__slide">
                    <div class="driverInfo">
                        <img src="{{ asset('img/time/mercedes.png') }}" alt="">
                        <h2 class="driverName">{{ $driver->firstName }} {{ $driver->lastName }}</h2>
                        <div class="driverNumCou">
                            <p>{{ $driver->number }}</p>
                            <img src="{{ asset('img/country/UnitedKingdom.png') }}" alt="">
                        </div>
                    </div>
                    <div class="driverImg">
                        <img src="{{asset('img/driver/LewisHamilton.png')}}" alt="">
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="splide splide_mobile" role="group" aria-label="Splide Basic HTML Example">
        <div class="splide__track">
            <ul class="splide__list">

                @foreach ($drivers as $driver)
                <li class="splide__slide">
                    <div class="driverInfo">
                        <img src="{{ asset('img/time/mercedes.png') }}" alt="">
                        <h2 class="driverName">{{ $driver->firstName }} {{ $driver->lastName }}</h2>
                        <div class="driverNumCou">
                            <p>44</p>
                            <img src="{{ asset('img/country/UnitedKingdom.png') }}" alt="">
                        </div>
                    </div>
                    <div class="driverImg">
                        <img src="{{asset('img/driver/LewisHamilton.png')}}" alt="">
                    </div>
                </li>
                @endforeach

            </ul>
        </div>
    </div>
    <div class="splide splide_mobile_800" role="group" aria-label="Splide Basic HTML Example">
        <div class="splide__track">
            <ul class="splide__list">
                <li class="splide__slide">
                    <div class="driverInfo">
                        <img src="{{ asset('img/time/mercedes.png') }}" alt="">
                        <h2 class="driverName">Lewis Hamilton</h2>
                        <div class="driverNumCou">
                            <p>44</p>
                            <img src="{{ asset('img/country/UnitedKingdom.png') }}" alt="">
                        </div>
                    </div>
                    <div class="driverImg">
                        <img src="{{asset('img/driver/LewisHamilton.png')}}" alt="">
                    </div>
                </li>
                <li class="splide__slide">
                    <div class="driverInfo">
                        <img src="{{ asset('img/time/mercedes.png') }}" alt="">
                        <h2 class="driverName">Lewis Hamilton</h2>
                        <div class="driverNumCou">
                            <p>44</p>
                            <img src="{{ asset('img/country/UnitedKingdom.png') }}" alt="">
                        </div>
                    </div>
                    <div class="driverImg">
                        <img src="{{asset('img/driver/LewisHamilton.png')}}" alt="">
                    </div>
                </li>
                <li class="splide__slide">
                    <div class="driverInfo">
                        <img src="{{ asset('img/time/mercedes.png') }}" alt="">
                        <h2 class="driverName">Max Verstappen</h2>
                        <div class="driverNumCou">
                            <p>44</p>
                            <img src="{{ asset('img/country/UnitedKingdom.png') }}" alt="">
                        </div>
                    </div>
                    <div class="driverImg">
                        <img src="{{asset('img/driver/LewisHamilton.png')}}" alt="">
                    </div>
                </li>
                <li class="splide__slide">
                    <div class="driverInfo">
                        <img src="{{ asset('img/time/mercedes.png') }}" alt="">
                        <h2 class="driverName">Lewis Hamilton</h2>
                        <div class="driverNumCou">
                            <p>44</p>
                            <img src="{{ asset('img/country/UnitedKingdom.png') }}" alt="">
                        </div>
                    </div>
                    <div class="driverImg">
                        <img src="{{asset('img/driver/LewisHamilton.png')}}" alt="">
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="position_img">
    <img src="{{asset('img/F1Racing/background_callendar.png')}}" alt="" class="img_calendar">
</div>
<div class="races">
    <div class="races__">
        <div class="actuallyRace">
            <img src="{{asset('img/country/qatar.jpg')}}" alt="">
            <h3><span>Country</span> <br> Grand Prix</h3>
            <p class="days">29 Fev 2024 - 2 Mar 2024</p>
            <div class="pqs">
                <p><span class="pqsSubtitle">Parctice 1 - thusday:</span> 11:30h - 12:30h</p>
                <p><span class="pqsSubtitle">Parctice 2 - thusday:</span> 15:00h - 16:00h</p>
                <p><span class="pqsSubtitle">Parctice 3 - Friday:</span> 12:30h - 13:30h</p>
                <p><span class="pqsSubtitle">Qualifying - Friday:</span> 16:00h - 17:00h</p>
            </div>
            <h3 class="race_day">Race Day</h3>
            <p><span class="pqsSubtitle">Saturday</span> 15:00h - 17:00h</p>
            <a class="btnRed" href="#">More</a>
        </div>
        <div class="fullRaces">
            <div class="splide splide_callendar" role="group" aria-label="Splide Basic HTML Example">
                <div class="splide__track">
                    <ul class="splide__list">
                        <li class="splide__slide">
                            <img src="{{asset('img/country/UnitedKingdom.png')}}" alt="">
                            <p class="intervalDate">Start: 7MAR <br> End: 9MAR</p>
                            <p class="raceDay">RACE DAY</p>
                            <p class="hourRace">17h - 19h</p>
                            <hr>
                        </li>
                        <li class="splide__slide">
                            <img src="{{asset('img/country/UnitedKingdom.png')}}" alt="">
                            <p class="intervalDate">Start: 7MAR <br> End: 9MAR</p>
                            <p class="raceDay">RACE DAY</p>
                            <p class="hourRace">17h - 19h</p>
                            <hr>
                        </li>
                        <li class="splide__slide">
                            <img src="{{asset('img/country/UnitedKingdom.png')}}" alt="">
                            <p class="intervalDate">Start: 7MAR <br> End: 9MAR</p>
                            <p class="raceDay">RACE DAY</p>
                            <p class="hourRace">17h - 19h</p>
                            <hr>
                        </li>
                        <li class="splide__slide">
                            <img src="{{asset('img/country/UnitedKingdom.png')}}" alt="">
                            <p class="intervalDate">Start: 7MAR <br> End: 9MAR</p>
                            <p class="raceDay">RACE DAY</p>
                            <p class="hourRace">17h - 19h</p>
                            <hr>
                        </li>
                        <li class="splide__slide">
                            <img src="{{asset('img/country/qatar.jpg')}}" alt="">
                            <p class="intervalDate">Start: 7MAR <br> End: 9MAR</p>
                            <p class="raceDay">RACE DAY</p>
                            <p class="hourRace">17h - 19h</p>
                            <hr>
                        </li>
                        <li class="splide__slide">
                            <img src="{{asset('img/country/qatar.jpg')}}" alt="">
                            <p class="intervalDate">Start: 7MAR <br> End: 9MAR</p>
                            <p class="raceDay">RACE DAY</p>
                            <p class="hourRace">17h - 19h</p>
                            <hr>
                        </li>
                        <li class="splide__slide">
                            <img src="{{asset('img/country/qatar.jpg')}}" alt="">
                            <p class="intervalDate">Start: 7MAR <br> End: 9MAR</p>
                            <p class="raceDay">RACE DAY</p>
                            <p class="hourRace">17h - 19h</p>
                            <hr>
                        </li>
                        <li class="splide__slide">
                            <img src="{{asset('img/country/qatar.jpg')}}" alt="">
                            <p class="intervalDate">Start: 7MAR <br> End: 9MAR</p>
                            <p class="raceDay">RACE DAY</p>
                            <p class="hourRace">17h - 19h</p>
                            <hr>
                        </li>
                        <li class="splide__slide">
                            <img src="{{asset('img/country/UnitedKingdom.png')}}" alt="">
                            <p class="intervalDate">Start: 7MAR <br> End: 9MAR</p>
                            <p class="raceDay">RACE DAY</p>
                            <p class="hourRace">17h - 19h</p>
                            <hr>
                        </li>
                        <li class="splide__slide">
                            <img src="{{asset('img/country/UnitedKingdom.png')}}" alt="">
                            <p class="intervalDate">Start: 7MAR <br> End: 9MAR</p>
                            <p class="raceDay">RACE DAY</p>
                            <p class="hourRace">17h - 19h</p>
                            <hr>
                        </li>
                        <li class="splide__slide">
                            <img src="{{asset('img/country/UnitedKingdom.png')}}" alt="">
                            <p class="intervalDate">Start: 7MAR <br> End: 9MAR</p>
                            <p class="raceDay">RACE DAY</p>
                            <p class="hourRace">17h - 19h</p>
                            <hr>
                        </li>
                        <li class="splide__slide">
                            <img src="{{asset('img/country/UnitedKingdom.png')}}" alt="">
                            <p class="intervalDate">Start: 7MAR <br> End: 9MAR</p>
                            <p class="raceDay">RACE DAY</p>
                            <p class="hourRace">17h - 19h</p>
                            <hr>
                        </li>
                        <li class="splide__slide">
                            <img src="{{asset('img/country/qatar.jpg')}}" alt="">
                            <p class="intervalDate">Start: 7MAR <br> End: 9MAR</p>
                            <p class="raceDay">RACE DAY</p>
                            <p class="hourRace">17h - 19h</p>
                            <hr>
                        </li>
                        <li class="splide__slide">
                            <img src="{{asset('img/country/qatar.jpg')}}" alt="">
                            <p class="intervalDate">Start: 7MAR <br> End: 9MAR</p>
                            <p class="raceDay">RACE DAY</p>
                            <p class="hourRace">17h - 19h</p>
                            <hr>
                        </li>
                        <li class="splide__slide">
                            <img src="{{asset('img/country/qatar.jpg')}}" alt="">
                            <p class="intervalDate">Start: 7MAR <br> End: 9MAR</p>
                            <p class="raceDay">RACE DAY</p>
                            <p class="hourRace">17h - 19h</p>
                            <hr>
                        </li>
                        <li class="splide__slide">
                            <img src="{{asset('img/country/qatar.jpg')}}" alt="">
                            <p class="intervalDate">Start: 7MAR <br> End: 9MAR</p>
                            <p class="raceDay">RACE DAY</p>
                            <p class="hourRace">17h - 19h</p>
                            <hr>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="classification">
    <h1>Classification</h1>
    <div class="classification_menu">
        <ul>
            <li><a href="#Drivers" class="active" onclick="mostrarConteudo(this)">Drivers</a></li>
            <li><a href="#Constructors" onclick="mostrarConteudo(this)">Constructors</a></li>
            <li><a href="#LastRace" onclick="mostrarConteudo(this)">Last Race</a></li>
        </ul>
    </div>
    <div id="classification_content">
        <div id="Drivers">
            <div class="classificarion_drivers_top">
                <div class="top">
                    <img src="{{ asset('img/driver/LewisHamilton_profile.png') }}" alt="">
                    <p class="top-name">1. Max Verstappen</p>
                    <p class="top-team">Red Bull</p>
                    <p class="podium"><span>60</span> times on the podium</p>
                    <p class="points"><span>1557</span> points</p>
                    <p class="GP"><span>141</span> Grand Prix entered</p>
                </div>
                <div class="top">
                    <img src="{{ asset('img/driver/LewisHamilton_profile.png') }}" alt="">
                    <p class="top-name">1. Max Verstappen</p>
                    <p class="top-team">Red Bull</p>
                    <p class="podium"><span>60</span> times on the podium</p>
                    <p class="points"><span>1557</span> points</p>
                    <p class="GP"><span>141</span> Grand Prix entered</p>
                </div>
                <div class="top">
                    <img src="{{ asset('img/driver/LewisHamilton_profile.png') }}" alt="">
                    <p class="top-name">1. Max Verstappen</p>
                    <p class="top-team">Red Bull</p>
                    <p class="podium"><span>60</span> times on the podium</p>
                    <p class="points"><span>1557</span> points</p>
                    <p class="GP"><span>141</span> Grand Prix entered</p>
                </div>
            </div>
            <div class="classification_drivers">
                @foreach ($drivers as $driver)
                <div class="drivers_list">
                    <div class="driver_info">
                        <p>{{$driver->number.'. '.$driver->firstName.' '.$driver->lastName}} <img src="{{ asset('img/country/UnitedKingdom.png') }}" alt=""><br>Mercedes</p>
                    </div>
                    <div class="driver_achievements">
                        @if($driver->podiums == 0)
                        <p>- <span>times on the podium</span></p>
                        @else
                        <p>{{$driver->podiums}} <span>times on the podium</span></p>
                        @endif

                        @if($driver->points == 0)
                        <p>- <span>points</span></p>
                        @else
                        <p>{{$driver->points}} <span>points</span></p>
                        @endif

                        @if($driver->grandPrix == 0)
                        <p>- <span>Grand Prix entered</span></p>
                        @else
                        <p>{{$driver->grandPrix}} <span>Grand Prix entered</span></p>
                        @endif

                    </div>
                </div>
                @endforeach

            </div>
        </div>
        <div id="Constructors" class="hidden">
            Conteúdo dos Constructors
        </div>
        <div id="LastRace" class="hidden">
            Conteúdo da Last Race
        </div>
    </div>


</div>
@endsection