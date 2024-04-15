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
                <a class="linkDriver" href="#">
                    <div class="driverInfo">
                        <div class="all">
                            <div class="driver">
                                <div class="driverNameCountry">
                                    <h2 class="driverName">
                                        {{ $driver->firstName }}
                                        <br>
                                        <span class="lastName">{{ $driver->lastName }}</span>
                                    </h2>
                                    <img src="{{ url('storage/country/'.$driver->imgCountry.'.jpg') }}" alt="">
                                </div>
                                <hr>
                                <div class="driverTeam">
                                    <p>{{$driver->team->fullName}}</p>
                                </div>
                            </div>
                            <img class="driverNumImg" src="{{ url('storage/driver/'.$driver->imgNumber.'.png') }}" alt="">
                        </div>
                    </div>
                    <div class="driverImg">
                        <img src="{{ url('storage/driver/'.$driver->imgDriver.'.png') }}" alt="">
                    </div>
                </a>
            </li>
            @endforeach
        </ul>
    </div>
</div>

<div class="driver_mobile" role="group" aria-label="Splide Basic HTML Example">
    <ul class="list_driver">
        @foreach ($drivers as $driver)
        <li class="item_driver">
            <a class="linkDriver" href="#">
                <div class="driverInfo">
                    <div class="all">
                        <div class="driver">
                            <div class="driverNameCountry">
                                <h2 class="driverName">
                                    {{ $driver->firstName }}
                                    <br>
                                    <span class="lastName">{{ $driver->lastName }}</span>
                                </h2>
                                <img src="{{ url('storage/country/'.$driver->imgCountry.'.jpg') }}" alt="">
                            </div>
                            <hr>
                            <div class="driverTeam">
                                <p>{{$driver->team->fullName}}</p>
                            </div>
                        </div>
                        <img class="driverNumImg" src="{{ url('storage/driver/'.$driver->imgNumber.'.png') }}" alt="">
                    </div>
                </div>
                <div class="driverImg">
                    <img src="{{ url('storage/driver/'.$driver->imgDriver.'.png') }}" alt="">
                </div>
            </a>
        </li>
        @endforeach
    </ul>
</div>
@endsection