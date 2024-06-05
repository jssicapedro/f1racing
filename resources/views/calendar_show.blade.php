@extends('layout.layout')

@section('title', 'F1Racing')
<link rel="stylesheet" href="{{ asset('css/calendar_show.css') }}">
@push('links')

@endpush

@push('scripts')

@endpush

@section('main')
<div class="first_card">
    <div class="info">
        <div class="all_about">
            <div class="basic_info">
                <div class="dat">
                    <p>{{ \Carbon\Carbon::parse($prix->t1)->format('d') }} - {{\Carbon\Carbon::parse($prix->race)->format('d') }}</p>

                    @if (\Carbon\Carbon::parse($prix->t1)->format('M') == \Carbon\Carbon::parse($prix->race)->format('M'))
                    <p class="month">{{ \Carbon\Carbon::parse($prix->race)->format('M') }}</p>
                    @else
                    <p class="month">{{ \Carbon\Carbon::parse($prix->t1)->format('M')}} - {{\Carbon\Carbon::parse($prix->race)->format('M') }}</p>
                    @endif
                </div>
                <img class="country" src="{{ url('storage/country/'.$prix->prix->imgCountry) }}" alt="{{ $prix->prix->country}}">

            </div>
            <hr>
            <div class="country_gpname">
                <p class="country_name">{{$prix->prix->country}}</p>
                <p>Formula 1 {{$prix->prix->grandPrixName}}</p>
            </div>
            <hr>
            <img class="circuit" src="{{ url('storage/prix/'.$prix->prix->imgCircuts) }}" alt="">
        </div>
        <div class="banner">
            <img class="banner_img" src="{{ url('storage/prix/'.$prix->prix->imgBanner) }}" alt="">
        </div>
    </div>
</div>
<div class="raceWeek">
    <div class="title">
        <h2>RACE WEEKEND</h2>
        <h3>Formula 1 {{$prix->prix->grandPrixName}} {{$year}}</h3>
        <p>Track time</p>
    </div>
    <div class="parctice">
        @if (!empty($prix->race))
        <div class="day">
            <p class="dm"> {{\Carbon\Carbon::parse($prix->race)->format('d')}} <br> {{\Carbon\Carbon::parse($prix->race)->format('M')}}</p>
            <hr>
            <p class="dt"><span>Race</span> <br> {{\Carbon\Carbon::parse($prix->race)->format('H:i')}}</p>
        </div>
        @else
        @endif

        @if (!empty($prix->qualify))
        <div class="day">
            <p class="dm"> {{\Carbon\Carbon::parse($prix->qualify)->format('d')}} <br> {{\Carbon\Carbon::parse($prix->qualify)->format('M')}}</p>
            <hr>
            <p class="dt"><span>Qualify</span> <br> {{\Carbon\Carbon::parse($prix->qualify)->format('H:i')}}</p>
        </div>
        @else
        @endif

        @if (!empty($prix->sprint))
        <div class="day">
            <p class="dm"> {{\Carbon\Carbon::parse($prix->sprint)->format('d')}} <br> {{\Carbon\Carbon::parse($prix->sprint)->format('M')}}</p>
            <hr>
            <p class="dt"><span>Sprint</span> <br> {{\Carbon\Carbon::parse($prix->sprint)->format('H:i')}}</p>
        </div>
        @else
        @endif

        @if (!empty($prix->sprintQualify))
        <div class="day">
            <p class="dm"> {{\Carbon\Carbon::parse($prix->sprintQualify)->format('d')}} <br> {{\Carbon\Carbon::parse($prix->sprintQualify)->format('M')}}</p>
            <hr>
            <p class="dt"><span>Sprint Qualify</span> <br> {{\Carbon\Carbon::parse($prix->sprintQualify)->format('H:i')}}</p>
        </div>
        @else
        @endif

        @if (!empty($prix->t3))
        <div class="day">
            <p class="dm"> {{\Carbon\Carbon::parse($prix->t3)->format('d')}} <br> {{\Carbon\Carbon::parse($prix->t3)->format('M')}}</p>
            <hr>
            <p class="dt"><span>Practice 3</span> <br> {{\Carbon\Carbon::parse($prix->t3)->format('H:i')}}</p>
        </div>
        @else
        @endif

        @if (!empty($prix->t2))
        <div class="day">
            <p class="dm"> {{\Carbon\Carbon::parse($prix->t2)->format('d')}} <br> {{\Carbon\Carbon::parse($prix->t2)->format('M')}}</p>
            <hr>
            <p class="dt"><span>Practice 2</span> <br> {{\Carbon\Carbon::parse($prix->t2)->format('H:i')}}</p>
        </div>
        @else
        @endif

        @if (!empty($prix->t1))
        <div class="day">
            <p class="dm"> {{\Carbon\Carbon::parse($prix->t1)->format('d')}} <br> {{\Carbon\Carbon::parse($prix->t1)->format('M')}}</p>
            <hr>
            <p class="dt"><span>Practice 1</span> <br> {{\Carbon\Carbon::parse($prix->t1)->format('H:i')}}</p>
        </div>
        @else
        @endif
    </div>
    <h2>About</h2>
    <div class="about">
        <img src="{{ url('storage/prix/'.$prix->prix->imgAbout) }}" alt="">
        <div class="about_info info">
            <div class="ai1">
                <div>
                    <h3>First Year</h3>
                    <p>{{$prix->prix->firstGrandPrix}}</p>
                </div>
                <div>
                    <h3>Circuit Length</h3>
                    <p>{{$prix->prix->length}}</p>
                </div>
            </div>
            <div class="ai2">
                <div>
                    <h3>Race Distance</h3>
                    <p>{{$prix->prix->distance}}</p>
                </div>
                <div>
                    <h3>Laps</h3>
                    <p>{{$prix->prix->laps}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection