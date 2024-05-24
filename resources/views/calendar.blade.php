@extends('layout.layout')

@section('title', 'F1Racing')
<link rel="stylesheet" href="{{ asset('css/calendar.css') }}">
@push('links')

@endpush

@push('scripts')

@endpush

@section('main')
@if($nextRace)
<div class="next-race">
    <div class="info">
        <div class="dat_country">
            <div class="dat">
                <p>{{ $nextRace->t1->format('d'). ' - ' .$nextRace->race->format('d') }}</p>
                @if ($nextRace->t1->format('M') == $nextRace->race->format('M'))
                <p class="month">{{ $nextRace->race->format('M') }}</p>
                @else
                <p class="month">{{ $nextRace->t1->format('M'). ' - ' .$nextRace->race->format('M') }}</p>
                @endif
            </div>
            <img src="{{ url('storage/country/'.$nextRace->prix->imgCountry) }}" alt="{{ $nextRace->prix->country}}">
        </div>
        <hr>
        <div class="country_gpname">
            <p class="next_country">{{$nextRace->prix->country}}</p>
            <p>{{$nextRace->prix->grandPrixName}}</p>
        </div>
        <hr>
        <div class="parctice">
            @if (!empty($nextRace->t1))
            <p>Practice 1: {{$nextRace->t1->format('d M')}}</p>
            @endif
            @if (!empty($nextRace->t2))
            <p>Practice 2: {{$nextRace->t2->format('d M')}}</p>
            @endif
            @if (!empty($nextRace->t3))
            <p>Practice 3: {{$nextRace->t3->format('d/M')}}</p>
            @endif
            @if (!empty($nextRace->sprintQualify))
            <p>Sprint Qualify: {{$nextRace->sprintQualify->format('d/M')}}</p>
            @endif
            @if (!empty($nextRace->sprint))
            <p>Sprint: {{$nextRace->sprint->format('d/M')}}</p>
            @endif
            @if (!empty($nextRace->qualify))
            <p>Qualify: {{$nextRace->qualify->format('d/M')}}</p>
            @endif
            @if (!empty($nextRace->race))
            <p>Race Day: {{$nextRace->race->format('d/M')}}</p>
            @endif
        </div>
    </div>
    <img class="circuit" src="{{ url('storage/prix/'.$nextRace->prix->imgCircuts) }}" alt="">
</div>
@endif
<h2 class="title">Next Races</h2>
<div class="others">
    @foreach ($calendar as $race)
        <div class="race">
            <div class="dat_country">
                <div class="dat">
                    <p>{{ $race->t1->format('d'). ' - ' .$race->race->format('d') }}</p>
                    @if ($race->t1->format('M') == $race->race->format('M'))
                    <p class="month">{{ $race->race->format('M') }}</p>
                    @else
                    <p class="month">{{ $race->t1->format('M'). ' - ' .$race->race->format('M') }}</p>
                    @endif
                </div>
                <img src="{{ url('storage/country/'.$race->prix->imgCountry) }}" alt="{{ $race->prix->country}}">
            </div>
            <hr>
            <div class="country_gpname">
                <p class="next_country">{{$race->prix->country}}</p>
                <p>{{$race->prix->grandPrixName}}</p>
            </div>
            <hr>
            <div class="image">
               <img src="{{ url('storage/prix/'.$race->prix->imgCircuts) }}" alt="{{ $race->prix->name}}">
            </div>
        </div>
    @endforeach
</div>
@endsection