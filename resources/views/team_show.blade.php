@extends('layout.layout')

@section('title', 'F1Racing - Constructors')

@push('links')
<link rel="stylesheet" href="{{ asset('css/team_show.css') }}">
@endpush

@section('main')
<h1>{{$team->name}}</h1>
<div class="content">
    <div class="information">
        <div class="about" style="background-color: {{$team->color == '#FFFFFF' ? '#FF7F00': $team->color}}">
            <div class="about_">
                <h2>Basic Information</h2>
                <p>Full Name <span class="about__">{{$team->fullName}}</span></p>
                <p>Base <span class="about__">{{$team->base}} <img src="{{ url('storage/country/'.$team->imgCountry) }}" alt="{{$team->country}}"></span></p>
                <p>First Year <span class="about__">{{$team->firstTeamEntry}}</span></p>
            </div>
            <div class="chiefs">
                <h2>Team</h2>
                <p>Team Chief <span>{{$team->teamChief}}</span></p>
                <p>Technical Chief <span>{{$team->technicalChief}}</span></p>
            </div>
            @foreach ($cars as $car)
            <div class="car">
                <h2>Car</h2>
                <p>Chassis <span>{{$car->chassis}}</span></p>
                <p>Power Unit <span>{{$car->powerUnit}}</span></p>
            </div>
            @endforeach
        </div>
    
    </div>
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

@push('scripts')
@endpush