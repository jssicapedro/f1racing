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
                <p>{{ $nextRace->race->format('M') }}</p>
                @else
                <p>{{ $nextRace->t1->format('M'). ' - ' .$nextRace->race->format('M') }}</p>
                @endif
            </div>
            <img src="{{ url('storage/country/'.$nextRace->prix->imgCountry) }}" alt="{{ $nextRace->prix->country}}">
        </div>
        <hr>
        <div class="country_gpname">
            <p>{{$nextRace->prix->country}}</p>
            <p>{{$nextRace->prix->grandPrixName}}</p>
        </div>
        <hr>
        <div class="parctice">
            @if ($nextRace->t1)
            <p>Practice 1: {{$nextRace->t1->format('d M')}}</p>
            @endif
            @if ($nextRace->t2)
            <p>Practice 2: {{$nextRace->t2->format('d M')}}</p>
            @endif
            @if ($nextRace->t3)
            <p>Practice 3: {{$nextRace->t3->format('d/M')}}</p>
            @endif
            @if ($nextRace->sprintQualify)
            <p>Sprint Qualify: {{$nextRace->sprintQualify->format('d/M')}}</p>
            @endif
            @if ($nextRace->sprint)
            <p>Sprint: {{$nextRace->sprint->format('d/M')}}</p>
            @endif
            @if ($nextRace->qualify)
            <p>Qualify: {{$nextRace->qualify->format('d/M')}}</p>
            @endif
            @if ($nextRace->race)
            <p>Corrida: {{$nextRace->race->format('d/M')}}</p>
            @endif
        </div>
    </div>
    <img class="circuit" src="{{ url('storage/prix/'.$nextRace->prix->imgCircuts) }}" alt="">
</div>



@endif

<!-- @foreach ($calendar as $race)
    <h2>{{$race->prix->name}}</h2>        
    <p>T1:{{$race->T1}}     T2:{{$race->T2}}    T3:{{$race->T3}}</p>
@endforeach -->
@endsection