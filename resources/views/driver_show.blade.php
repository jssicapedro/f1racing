@extends('layout.layout')

@section('title', 'F1Racing - Constructors')

@section('links')
<link rel="stylesheet" href="{{ asset('css/driver_show.css') }}">
@endsection

@section('script')

@endsection

@section('main')
<div class="about">
    <div class="image">
        <img src="{{ url('storage/driver/'.$driver->imgDriver) }}" alt="{{$driver->imgDriver}}">
    </div>
    <div class="info">
        <div class="name">
            <h2>{{$driver->firstName}}</h2>
            <h1>{{$driver->lastName}}</h1>
        </div>
        <div class="team_country">
            <div class="team">
                <h3>Team</h3>
                <p>{{$driver->team->fullName}}</p>
            </div>
            <div class="country">
                <h3>Team</h3>
                <p>{{$driver->country}}</p>
            </div>
        </div>
        <div class="podium_points">
            <div class="podium">
                <h3>Podiums</h3>
                <p>{{$driver->podiums}}</p>
            </div>
            <div class="points">
            <h3>Points</h3>
                @foreach ($points as $point)
                    @if ($point->idDriver == $driver->idDriver)
                        <p>{{ $point->totalPoints }}</p>
                    @endif
                @endforeach
            </div>
        </div>
        <div class="grandPrix">
            <h3>Grands Prix entered</h3>
            <p>{{$driver->grandPrix}}</p>
        </div>
        <div class="birth_born">
        <div class="birth">
                <h3>Birthday</h3>
                <p>{{$driver->birth}}</p>
            </div>
            <div class="born">
                <h3>Born</h3>
                <p>{{$driver->placeBirth}}</p>
            </div>
        </div>

    </div>
</div>
@endsection