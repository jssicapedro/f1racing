@extends('layout.layout')

@section('title', 'F1Racing - Constructors')

@push('links')
<link rel="stylesheet" href="{{ asset('css/team_show.css') }}">
<link rel="stylesheet" href="{{ asset('css/layout.css') }}">
<style>
    @media (max-width: 700px) {
        .driver {
            border-top: 10px solid {
                    {
                    $team->color =='#FFFFFF' ? '#FF7F00': $team->color
                }
            }

            ;

            border-left: 5px solid {
                    {
                    $team->color =='#FFFFFF' ? '#FF7F00': $team->color
                }
            }

            ;
        }
    }
</style>
@endpush


@push('scripts')
<script>
    /* document.addEventListener('DOMContentLoaded', function () {
        var countryCode = "{{ $team->country_code }}"; // Certifique-se de que o código do país está correto

        if (countryCode) {
            var flagUrl = `https://flagcdn.com/w320/${countryCode.toLowerCase()}.png`;
            var flagImg = document.getElementById('country-flag');
            flagImg.src = flagUrl;
            flagImg.style.display = 'block';
        }
    }); */
</script>
@endpush

@section('main')
<h1>{{$team->name}}</h1>
<div class="content">
    <div class="information">
        <div class="about" style="background-color: {{$team->color == '#FFFFFF' ? '#FF7F00': $team->color}}">
            <div class="about_">
                <h2>Basic Information</h2>
                <p>Full Name <span class="about__">{{$team->fullName}}</span></p>
                <p>Base
                    <span class="about__">{{$team->base}}
                        <!-- <img src="{{ url('storage/country/'.$team->imgCountry) }}" alt="{{$team->country}}"> -->

                        @if($team->flag_url)
                        <img src="{{ $team->flag_url }}" srcset="{{ $team->flag_url }} 1x,
    {{ $team->flag_url }} 2x,
    {{ $team->flag_url }} 3x" width="16" height="12" alt="Flag of {{ $team->country }}">
                        @endif
                    </span>
                </p>
                <p>First Year <span class="about__">{{$team->firstTeamEntry}}</span></p>
            </div>
            <div class="chiefs">
                <h2>Team</h2>
                <p>Team Chief <span>{{$team->teamChief}}</span></p>
                <p>Technical Chief <span>{{$team->technicalChief}}</span></p>
            </div>
            <div class="car">
                <h2>Car</h2>
                @if(!empty($cars->chassis))
                <p>Chassis <span>{{$cars->chassis}}</span></p>
                @endif
                @if(!empty($cars->powerUnit))
                <p>Power Unit <span>{{$cars->powerUnit}}</span></p>
                @endif
            </div>
        </div>

    </div>
    <h2 class=" title title_drivers">Drivers</h2>
    <div class="drivers">
        @foreach ($drivers as $driver)
        <div class="driver">
            <a class="linkDriver" href="{{ route('driver.show', ['id' => $driver->idDriver]) }}">
                <h1>{{$driver->name}}
                    <span>
                        <img src="{{ url('storage/driver/'.$driver->imgNumber) }}" alt="{{$driver->number}}">
                    </span>
                </h1>
                <img src="{{ url('storage/driver/'.$driver->imgDriver) }}" alt="{{$driver->name}}">
            </a>
        </div>
        @endforeach
    </div>
</div>
@endsection