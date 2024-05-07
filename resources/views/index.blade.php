@extends('layout.layout')

@section('title', 'F1Racing')

@push('links')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
<link rel="stylesheet" href="{{ asset('css/slider.css') }}">
@endpush


@section('main')
<div class="ActualyRace">
    <div class="screen1">
        <div class="infoActualyRace">
            <p class="btnRed">At the moment</p>
            <div class="country">
                <img src="{{ asset('img/country/qatar.jpg') }}" alt="">
                <p>Qatar</p>
            </div>
            <h1>FORMULA 1 <br>BAHRAIN GRAND PRIX 2024</h1>
            <div class="date">
                <p class="date">29 FEV 2024 - 2 MAR 2024</p>
                <a href="#" class="btnBlack">More</a>
            </div>
        </div>
        <div class="ActualyRaceImg">
            <img src="{{ asset('img/prix/bahrain.png') }}" alt="">
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
                        <img src="{{ $driver->team ?  url('storage/team/'.$driver->team->imgLogo) : '' }}" alt="">
                        <h2 class="driverName">{{ $driver->firstName }}<br> {{ $driver->lastName }}</h2>
                        <div class="driverNumCou">
                            <img src="{{ url('storage/driver/'.$driver->imgNumber) }}" alt="">
                            <img src="{{ url('storage/country/'.$driver->imgCountry) }}" alt="">
                        </div>
                    </div>
                    <div class="driverImg">
                        <img src="{{ url('storage/driver/'.$driver->imgDriver) }}" alt="">
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
                        <img src="{{ $driver->team ?  url('storage/team/'.$driver->team->imgLogo) : '' }}" alt="">
                        <h2 class="driverName">{{ $driver->firstName }}<br> {{ $driver->lastName }}</h2>
                        <div class="driverNumCou">
                            <p>{{ $driver->number }}</p>
                            <img src="{{ url('storage/country/'.$driver->imgCountry) }}" alt="">
                        </div>
                    </div>
                    <div class="driverImg">
                        <img src="{{ url('storage/driver/'.$driver->imgDriver) }}" alt="">
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="splide splide_mobile_800" role="group" aria-label="Splide Basic HTML Example">
        <div class="splide__track">
            <ul class="splide__list">

                @foreach ($drivers as $driver)
                <li class="splide__slide">
                    <div class="driverInfo">
                        <img src="{{ $driver->team ?  url('storage/team/'.$driver->team->imgLogo) : '' }}" alt="">
                        <h2 class="driverName">{{ $driver->firstName }}<br> {{ $driver->lastName }}</h2>
                        <div class="driverNumCou">
                            <p>{{ $driver->number }}</p>
                            <img src="{{ url('storage/country/'.$driver->imgCountry) }}" alt="">
                        </div>
                    </div>
                    <div class="driverImg">
                        <img src="{{ url('storage/driver/'.$driver->imgDriver) }}" alt="">
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
<div class="position_img">
    <img src="{{ asset('img/F1Racing/background_callendar_.png') }}" alt="" class="img_calendar">
</div>
<div class="races">
    <div class="races__">
        <div class="actuallyRace">
            <img src="{{ asset('img/country/qatar.jpg') }}" alt="">
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
                            <img src="{{ asset('img/country/UnitedKingdom.png') }}" alt="">
                            <p class="intervalDate">Start: 7MAR <br> End: 9MAR</p>
                            <p class="raceDay">RACE DAY</p>
                            <p class="hourRace">17h - 19h</p>
                            <hr>
                        </li>
                        <li class="splide__slide">
                            <img src="{{ asset('img/country/UnitedKingdom.png') }}" alt="">
                            <p class="intervalDate">Start: 7MAR <br> End: 9MAR</p>
                            <p class="raceDay">RACE DAY</p>
                            <p class="hourRace">17h - 19h</p>
                            <hr>
                        </li>
                        <li class="splide__slide">
                            <img src="{{ asset('img/country/UnitedKingdom.png') }}" alt="">
                            <p class="intervalDate">Start: 7MAR <br> End: 9MAR</p>
                            <p class="raceDay">RACE DAY</p>
                            <p class="hourRace">17h - 19h</p>
                            <hr>
                        </li>
                        <li class="splide__slide">
                            <img src="{{ asset('img/country/UnitedKingdom.png') }}" alt="">
                            <p class="intervalDate">Start: 7MAR <br> End: 9MAR</p>
                            <p class="raceDay">RACE DAY</p>
                            <p class="hourRace">17h - 19h</p>
                            <hr>
                        </li>
                        <li class="splide__slide">
                            <img src="{{ asset('img/country/qatar.jpg') }}" alt="">
                            <p class="intervalDate">Start: 7MAR <br> End: 9MAR</p>
                            <p class="raceDay">RACE DAY</p>
                            <p class="hourRace">17h - 19h</p>
                            <hr>
                        </li>
                        <li class="splide__slide">
                            <img src="{{ asset('img/country/qatar.jpg') }}" alt="">
                            <p class="intervalDate">Start: 7MAR <br> End: 9MAR</p>
                            <p class="raceDay">RACE DAY</p>
                            <p class="hourRace">17h - 19h</p>
                            <hr>
                        </li>
                        <li class="splide__slide">
                            <img src="{{ asset('img/country/qatar.jpg') }}" alt="">
                            <p class="intervalDate">Start: 7MAR <br> End: 9MAR</p>
                            <p class="raceDay">RACE DAY</p>
                            <p class="hourRace">17h - 19h</p>
                            <hr>
                        </li>
                        <li class="splide__slide">
                            <img src="{{ asset('img/country/qatar.jpg') }}" alt="">
                            <p class="intervalDate">Start: 7MAR <br> End: 9MAR</p>
                            <p class="raceDay">RACE DAY</p>
                            <p class="hourRace">17h - 19h</p>
                            <hr>
                        </li>
                        <li class="splide__slide">
                            <img src="{{ asset('img/country/UnitedKingdom.png') }}" alt="">
                            <p class="intervalDate">Start: 7MAR <br> End: 9MAR</p>
                            <p class="raceDay">RACE DAY</p>
                            <p class="hourRace">17h - 19h</p>
                            <hr>
                        </li>
                        <li class="splide__slide">
                            <img src="{{ asset('img/country/UnitedKingdom.png') }}" alt="">
                            <p class="intervalDate">Start: 7MAR <br> End: 9MAR</p>
                            <p class="raceDay">RACE DAY</p>
                            <p class="hourRace">17h - 19h</p>
                            <hr>
                        </li>
                        <li class="splide__slide">
                            <img src="{{ asset('img/country/UnitedKingdom.png') }}" alt="">
                            <p class="intervalDate">Start: 7MAR <br> End: 9MAR</p>
                            <p class="raceDay">RACE DAY</p>
                            <p class="hourRace">17h - 19h</p>
                            <hr>
                        </li>
                        <li class="splide__slide">
                            <img src="{{ asset('img/country/UnitedKingdom.png') }}" alt="">
                            <p class="intervalDate">Start: 7MAR <br> End: 9MAR</p>
                            <p class="raceDay">RACE DAY</p>
                            <p class="hourRace">17h - 19h</p>
                            <hr>
                        </li>
                        <li class="splide__slide">
                            <img src="{{ asset('img/country/qatar.jpg') }}" alt="">
                            <p class="intervalDate">Start: 7MAR <br> End: 9MAR</p>
                            <p class="raceDay">RACE DAY</p>
                            <p class="hourRace">17h - 19h</p>
                            <hr>
                        </li>
                        <li class="splide__slide">
                            <img src="{{ asset('img/country/qatar.jpg') }}" alt="">
                            <p class="intervalDate">Start: 7MAR <br> End: 9MAR</p>
                            <p class="raceDay">RACE DAY</p>
                            <p class="hourRace">17h - 19h</p>
                            <hr>
                        </li>
                        <li class="splide__slide">
                            <img src="{{ asset('img/country/qatar.jpg') }}" alt="">
                            <p class="intervalDate">Start: 7MAR <br> End: 9MAR</p>
                            <p class="raceDay">RACE DAY</p>
                            <p class="hourRace">17h - 19h</p>
                            <hr>
                        </li>
                        <li class="splide__slide">
                            <img src="{{ asset('img/country/qatar.jpg') }}" alt="">
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
                @forelse ($topDrivers as $top)
                <div class="top">
                    <img src="{{ url('storage/driver/'.$top->imgDriverProfile) }}" alt="">
                    <p class="top-name">{{ $loop->iteration }}.{{ $top->firstName . ' ' . $top->lastName }}</p>

                    @if ($top->team)
                    <p class="top-team">{{ $top->team->name }}</p>
                    @else
                    <p class="top-team">Sem equip</p>
                    @endif
                    
                    
                    @if ($top->podiums == 0)
                    <p class="podium">- <span>times on the podium</span></p>
                    @else
                    <p class="podium">{{ $top->podiums }} <span>times on the podium</span></p>
                    @endif
                    
                    
                    @if ($top->points == 0)
                    <p class="points">- <span>points</span></p>
                    @else
                    <p class="points">{{ $top->points }} <span>points</span></p>
                    @endif
                    
                    @if ($top->grandPrix == 0)
                    <p class="GP">- <span>Grand Prix entered</span></p>
                    @else
                    <p class="GP">{{ $top->grandPrix }} <span>Grand Prix entered</span></p>
                    @endif
                </div>
                @empty
                <li>Null</li>
                @endforelse
            </div>
            <div class="classification_drivers">
                @foreach ($otherDrivers as $otherDriver)
                <div class="drivers_list">
                    <div class="driver_info">
                        <p>{{ $loop->iteration + 3 . '. ' . $otherDriver->firstName . ' ' . $otherDriver->lastName }}
                            <img src="{{ url('storage/country/'.$otherDriver->imgCountry) }}" alt=""><br>
                            @if ($otherDriver->team)
                            {{ $otherDriver->team->name }}
                            @else
                            Null
                            @endif
                        </p>
                    </div>
                    <div class="driver_achievements">
                        @if ($otherDriver->podiums == 0)
                        <p>- <span>times on the podium</span></p>
                        @else
                        <p>{{ $otherDriver->podiums }} <span>times on the podium</span></p>
                        @endif
                        
                        @if ($otherDriver->points == 0)
                        <p>- <span>points</span></p>
                        @else
                        <p>{{ $otherDriver->points }} <span>points</span></p>
                        @endif
                        
                        @if ($otherDriver->grandPrix == 0)
                        <p>- <span>Grand Prix entered</span></p>
                        @else
                        <p>{{ $otherDriver->grandPrix }} <span>Grand Prix entered</span></p>
                        @endif
                        
                    </div>
                </div>
                @endforeach

            </div>
        </div>
        <div id="Constructors" class="hidden">
            <div class="classification_teams">
                @foreach ($teams as $team)
                <div class="teams_list">
                    <div class="teams_info">
                        <div>
                            <p>{{ $loop->iteration . '. ' . $team->name}}
                                <img src="{{ url('storage/team/'.$team->imgLogo) }}" alt=""><br>
                            </p>
                        </div>
                    </div>
                    <div class="team_achievements">
                        <p><span>Entry at </span>{{ $team->firstTeamEntry }} </p>
                        <p><span>Base </span>{{ $team->base }} </p>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
        <div id="LastRace" class="hidden">
            @if ($results->count() > 0)
            <table>
                <thead>
                    <tr>
                        <th>Position</th>
                        <th>Driver</th>
                        <th>Points</th>
                        <th>Team</th>
                        <th>Best Time</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($results as $result)
                    <tr>
                        <td>{{ $result->position }}</td>
                        <td><img src="{{ url('storage/driver/'.$result->driver->imgDriverProfile) }}" alt="{{ $result->driver->name }}" title="{{ $result->driver->name }}"></td>
                        <td>{{ $result->points }}</td>
                        <td><img src="{{ url('storage/team/'.$result->driver->team->imgLogo) }}" alt="{{ $result->driver->team->name }}" title="{{ $result->driver->team->name }}"></td>
                        <td>{{ $result->fastLapTime }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <p>Não há resultados disponíveis.</p>
            @endif
        </div>
    </div>  
</div>
@endsection

@push('scripts')
<script src="{{ asset('js/indexDriverSplid.js') }}"></script>
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
@endpush