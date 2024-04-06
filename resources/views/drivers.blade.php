@extends('layout.layout')

@section('title', 'F1Racing')

@section('links')
<link rel="stylesheet" href="{{ asset('css/driver.css') }}">
<link rel="stylesheet" href="{{ asset('css/slider.css') }}">
@endsection

@section('script')
<script src="{{ asset('js/driversDriverSplid.js') }}"></script>
@endsection

@section('main')
<div class="splide splide_driver" role="group" aria-label="Splide Basic HTML Example">
    <div class="splide__track">
        <ul class="splide__list">
            @foreach ($drivers as $driver)
            <li class="splide__slide">
                <div class="driverInfo">
                    <div>
                        <div class="driverAbout">
                            <h2 class="driverName">{{ $driver->firstName }}<br> {{ $driver->lastName }}</h2>
                            <img src="{{ url('storage/country/'.$driver->imgCountry.'.jpg') }}" alt="">
                        </div>
                        <hr>
                        <p>{{$driver->team->name}}</p>
                        <img src="{{ url('storage/driver/'.$driver->imgNumber.'.png') }}" alt="">
                    </div>
                </div>
                <div class="driverImg">
                    <img src="{{ url('storage/driver/'.$driver->imgDriver.'.png') }}" alt="">
                </div>
            </li>
            @endforeach
        </ul>
    </div>
</div>
@endsection