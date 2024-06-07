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
                <img src="{{ url('storage/country/'.$currentRace->prix->imgCountry) }}" alt="">
                <p>{{$currentRace->prix->country}}</p>
            </div>
            <h1>FORMULA 1 <br>{{$currentRace->prix->name}}</h1>
            <div class="date">
                <p class="date">{{ \Carbon\Carbon::parse($currentRace->t1)->format('d M y') }} - {{\Carbon\Carbon::parse($currentRace->race)->format('d M y') }}</p>
                <a href="{{ route('calendar.show', ['id' => $currentRace->idCalendar]) }}" class="btnBlack">More</a>
            </div>
        </div>
        <div class="ActualyRaceImg">
            <img src="{{ url('storage/prix/'.$currentRace->prix->imgAbout) }}" alt="">
        </div>
    </div>
    <a href="{{ route('calendar.show', ['id' => $upcomingRace->idCalendar]) }}" style="text-decoration: none;">
        <div class="nextRace">
            <img style="width: 20%;" src="{{ url('storage/country/'.$upcomingRace->prix->imgCountry) }}" alt="">
            <div class="infoNextRace">
                <p class="titleRed">Comming</p>
                <h2 style="color: black;">Formula 1<br> {{$upcomingRace->prix->name}}</h2>
                <p class="date">{{ \Carbon\Carbon::parse($upcomingRace->t1)->format('d M y') }} - {{\Carbon\Carbon::parse($upcomingRace->race)->format('d M y') }}</p>
            </div>
        </div>
    </a>
</div>
<div class="drivers">
    <div class="splide splide_default" role="group" aria-label="Splide Basic HTML Example">
        <div class="splide__track">
            <ul class="splide__list">
                @foreach ($drivers as $driver)
                <li class="splide__slide">
                    <a class="nDecoration" href="{{ route('driver.show', ['id' => $driver->idDriver]) }}">
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
                </a>
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
                    <a class="nDecoration" href="{{ route('driver.show', ['id' => $driver->idDriver]) }}">
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
                </a>
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
                    <a class="nDecoration" href="{{ route('driver.show', ['id' => $driver->idDriver]) }}">
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
                </a>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
<div class="position_img">
    <img src="{{ asset('img/F1Racing/background_calendar_.png') }}" alt="" class="img_calendar">
</div>
<div class="races">
    <div class="races__">
        <div class="actuallyRace">
            <img src="{{ url('storage/country/'.$currentRace->prix->imgCountry) }}" alt="">
            <h3><span>{{$currentRace->prix->country}}</span> <br> Grand Prix</h3>
            <p class="days">{{ \Carbon\Carbon::parse($currentRace->t1)->format('d M y') }} - {{\Carbon\Carbon::parse($currentRace->race)->format('d M y') }}</p>
            <div class="pqs">
                @if (!empty($currentRace->t1))
                <p><span class="pqsSubtitle">Parctice 1: {{ \Carbon\Carbon::parse($currentRace->t1)->format('l')}}</span> {{\Carbon\Carbon::parse($currentRace->t1)->format('h:i')}}</p>
                @else
                @endif
                @if (!empty($currentRace->t2))
                <p><span class="pqsSubtitle">Parctice 2: {{ \Carbon\Carbon::parse($currentRace->t2)->format('l')}}</span> {{\Carbon\Carbon::parse($currentRace->t2)->format('h:i')}}</p>
                @else
                @endif
                @if (!empty($currentRace->t3))
                <p><span class="pqsSubtitle">Parctice 3: {{ \Carbon\Carbon::parse($currentRace->t3)->format('l')}}</span> {{\Carbon\Carbon::parse($currentRace->t3)->format('h:i')}}</p>
                @else
                @endif
                @if (!empty($currentRace->sprintQualify))
                <p><span class="pqsSubtitle">Sprint Qualify: {{ \Carbon\Carbon::parse($currentRace->sprintQualify)->format('l')}}</span> {{\Carbon\Carbon::parse($currentRace->sprintQualify)->format('h:i')}}</p>
                @else
                @endif
                @if (!empty($currentRace->sprint))
                <p><span class="pqsSubtitle">Sprint: {{ \Carbon\Carbon::parse($currentRace->sprint)->format('l')}}</span> {{\Carbon\Carbon::parse($currentRace->sprint)->format('h:i')}}</p>
                @else
                @endif
                @if (!empty($currentRace->qualify))
                <p><span class="pqsSubtitle">Qualify: {{ \Carbon\Carbon::parse($currentRace->qualify)->format('l')}}</span> {{\Carbon\Carbon::parse($currentRace->qualify)->format('h:i')}}</p>
                @else
                @endif
            </div>
            <h3 class="race_day">Race Day</h3>
            @if (!empty($currentRace->race))
            <p><span class="pqsSubtitle">{{ \Carbon\Carbon::parse($currentRace->race)->format('l')}}</span> {{\Carbon\Carbon::parse($currentRace->race)->format('h:i')}}</p>
            @else
            @endif
            <a class="btnRed" href="{{ route('calendar.show', ['id' => $currentRace->idCalendar]) }}">More</a>
        </div>
        <div class="fullRaces">
            <div class="splide splide_calendar" role="group" aria-label="Splide Basic HTML Example">
                <div class="splide__track">
                    <ul class="splide__list">
                        @if (empty($nextRaces->race))
                        @foreach ($nextRaces as $nextRace)
                        <li class="splide__slide">
                            <img style="width: 20%; margin-bottom: 10px;" src="{{ url('storage/country/'.$nextRace->prix->imgCountry) }}" alt="">
                            <p class="intervalDate">Start: {{\Carbon\Carbon::parse($nextRace->t1)->format('d M')}} <br> End: {{\Carbon\Carbon::parse($nextRace->race)->format('d M')}}</p>
                            <p class="raceDay">RACE DAY</p>
                            <p class="hourRace">{{\Carbon\Carbon::parse($nextRace->race)->format('dM')}}</p>
                            <a href="{{ route('calendar.show', ['id' => $nextRace->idCalendar]) }}" class="btnRed">More</a>
                            <hr>
                        </li>
                        @endforeach
                        @else
                        <p>Sem informação de proximas corridas</p>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="classification">
    <h1>Classification</h1>
    <p>(Sem Sprint)</p>
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
                <a class="nDecoration cardDriver" href="{{ route('driver.show', ['id' => $top->idDriver]) }}">
                    <div class="top">
                        <img src="{{ url('storage/driver/'.$top->imgDriverProfile) }}" alt="">
                        <p class="top-name">{{ $loop->iteration }}.{{ $top->firstName . ' ' . $top->lastName }}</p>
                        @if ($top->team)
                        <p class="top-team">{{ $top->team->name }}</p>
                        @else
                        <p class="top-team">Sem equipa</p>
                        @endif
                        @if ($top->podiums == 0)
                        <p class="podium"> - <span>times on the podium</span></p>
                        @else
                        <p class="podium">{{ $top->podiums }} <span>times on the podium</span></p>
                        @endif
                        @if (isset($top->points))
                        <p class="points">{{ $top->points }} <span>points</span></p>
                        @else
                        <p class="points"> - <span>points</span></p>
                        @endif
                        @if ($top->grandPrix == 0)
                        <p class="GP">- <span>Grand Prix entered</span></p>
                        @else
                        <p class="GP">{{ $top->grandPrix }} <span>Grand Prix entered</span></p>
                        @endif
                    </div>
                </a>
                @empty
                <li>Null</li>
                @endforelse
            </div>
            <div class="classification_drivers">
                @foreach ($otherDrivers as $otherDriver)
                <a class="nDecoration" href="{{ route('driver.show', ['id' => $top->idDriver]) }}">
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
                            @if (isset($otherDriver->points))
                            <p class="points">{{ $otherDriver->points }} <span>points</span></p>
                            @else
                            <p class="points"> - <span>points</span></p>
                            @endif
                            @if ($otherDriver->grandPrix == 0)
                            <p>- <span>Grand Prix entered</span></p>
                            @else
                            <p>{{ $otherDriver->grandPrix }} <span>Grand Prix entered</span></p>
                            @endif
                        </div>
                    </div>
                </a>
                @endforeach

            </div>
        </div>
        <div id="Constructors" class="hidden">
            <div class="classification_teams">
                @foreach ($teams as $team)
                <a class="nDecoration" href="{{ route('team.show', ['id' => $team->idTeam]) }}">
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
                </a>
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
                        <td>
                            @if($result->driver && $result->driver->team && $result->driver->team->imgLogo)
                            <img src="{{ url('storage/team/' . $result->driver->team->imgLogo) }}" alt="{{ $result->driver->team->name }}" title="{{ $result->driver->team->name }}">
                            @else
                            {{ $result->driver->team->name ?? 'Unknown Team' }}
                            @endif
                        </td>
                        @if(!empty($result->fastLapTime))
                        <td>{{ $result->fastLapTime }}</td>
                        @else
                        <td>-</td>
                        @endif
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