@extends('layout.layout')

@section('title', 'F1Racing')
<link rel="stylesheet" href="{{ asset('css/calendar.css') }}">
@push('links')

@endpush

@push('scripts')

@endpush

@section('main')
<div class="next-race">
    <a class="link" href="{{ route('calendar.show', ['id' => $nextRace->idCalendar]) }}">
        <div class="info">
            <div class="dat_country">
                <div class="dat">
                    <p>{{ \Carbon\Carbon::parse($nextRace->t1)->format('d') }} - {{\Carbon\Carbon::parse($nextRace->race)->format('d') }}</p>
                    @if (\Carbon\Carbon::parse($nextRace->t1)->format('M') == \Carbon\Carbon::parse($nextRace->race)->format('M'))
                    <p class="month">{{ \Carbon\Carbon::parse($nextRace->race)->format('M') }}</p>
                    @else
                    <p class="month">{{ \Carbon\Carbon::parse($nextRace->t1)->format('M')}} - {{\Carbon\Carbon::parse($nextRace->race)->format('M') }}</p>
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
                <div>
                    @if (!empty($nextRace->t1))
                    <p>Practice 1: </p>
                    @else

                    @endif

                    @if (!empty($nextRace->t2))
                    <p>Practice 2: </p>
                    @else
                    @endif

                    @if (!empty($nextRace->t3))
                    <p>Practice 3: </p>
                    @else
                    @endif

                    @if (!empty($nextRace->sprintQualify))
                    <p>Sprint Qualify: </p>
                    @else
                    @endif

                    @if (!empty($nextRace->sprint))
                    <p>Sprint: </p>
                    @else
                    @endif

                    @if (!empty($nextRace->qualify))
                    <p>Qualify: </p>
                    @else
                    @endif

                    @if (!empty($nextRace->race))
                    <p>Race Day: </p>
                    @else
                    @endif
                </div>
                <div>
                    @if (!empty($nextRace->t1))
                    <p> {{\Carbon\Carbon::parse($nextRace->t1)->format('d/M')}}</p>
                    @else

                    @endif

                    @if (!empty($nextRace->t2))
                    <p> {{\Carbon\Carbon::parse($nextRace->t2)->format('d/M')}}</p>
                    @else
                    @endif

                    @if (!empty($nextRace->t3))
                    <p> {{\Carbon\Carbon::parse($nextRace->t3)->format('d/M')}}</p>
                    @else
                    @endif

                    @if (!empty($nextRace->sprintQualify))
                    <p> {{\Carbon\Carbon::parse($nextRace->sprintQualify)->format('d/M')}}</p>
                    @else
                    @endif

                    @if (!empty($nextRace->sprint))
                    <p> {{\Carbon\Carbon::parse($nextRace->sprint)->format('d/M')}}</p>
                    @else
                    @endif

                    @if (!empty($nextRace->qualify))
                    <p> {{\Carbon\Carbon::parse($nextRace->qualify)->format('d/M')}}</p>
                    @else
                    @endif

                    @if (!empty($nextRace->race))
                    <p> {{\Carbon\Carbon::parse($nextRace->race)->format('d/M')}}</p>
                    @else
                    @endif
                </div>
            </div>
        </div>
    </a>
    <img class="circuit" src="{{ url('storage/prix/'.$nextRace->prix->imgCircuts) }}" alt="">
</div>



<h2 class="title">Next Races</h2>
<div class="others">
    @foreach ($upcomingRaces as $race)
    <a class="link" href="{{ route('calendar.show', ['id' => $race->idCalendar]) }}">
        <div class="race">
            <div class="dat_country">
                <div class="dat">
                    <p>{{ \Carbon\Carbon::parse($race->t1)->format('d')}} - {{\Carbon\Carbon::parse($race->race)->format('d') }}</p>
                    @if (\Carbon\Carbon::parse($race->t1)->format('M') == \Carbon\Carbon::parse($race->race)->format('M'))
                    <p class="month">{{ \Carbon\Carbon::parse($race->race)->format('M') }}</p>
                    @else
                    <p class="month">{{ \Carbon\Carbon::parse($race->t1)->format('M')}} - {{\Carbon\Carbon::parse($race->race)->format('M') }}</p>
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
    </a>
    @endforeach
</div>
@endsection