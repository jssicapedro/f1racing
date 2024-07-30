@extends('layout.layout')

@section('title', 'F1Racing')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@push('links')

@endpush

@push('scripts')
@endpush


@section('main')
@include('admin.partials.admin-navbar')
<div class="content">
    <div class="info">
        <a class="btnBlack" href="{{ route('admin.track') }}">Return list</a>
        <h1>{{$prix->idPrix . ' - ' . $prix->name}}</h1>
        <form action="{{ route('admin.track.update', $prix->idPrix) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="title">
                <h1>Informations</h1>
                <hr>
            </div>
            <div class="item">
                <div class="item-content">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{$prix->name}}">
                    </div>
                    @if ($errors->has('name'))
                    <div class="text-danger">{{ $errors->first('name') }}</div>
                    @endif
                </div>
                <div class="item-content">
                    <div class="mb-3">
                        <label for="grandPrixName" class="form-label">GrandPrix name</label>
                        <input type="text" class="form-control" id="grandPrixName" name="grandPrixName" value="{{$prix->grandPrixName}}">
                    </div>
                    @if ($errors->has('grandPrixName'))
                    <div class="text-danger">{{ $errors->first('grandPrixName') }}</div>
                    @endif
                </div>
                <div class="item-content">
                    <div class="mb-3">
                        <label for="comunName" class="form-label">Comun name</label>
                        <input type="text" class="form-control" id="comunName" name="comunName" value="{{$prix->comunName}}">
                    </div>
                    @if ($errors->has('comunName'))
                    <div class="text-danger">{{ $errors->first('comunName') }}</div>
                    @endif
                </div>
            </div>
            <div class="item">
                <div class="item-content">
                    <div class="mb-3">
                        <label for="country" class="form-label">Country</label>
                        <input type="text" class="form-control" id="country" name="country" value="{{$prix->country}}">
                    </div>
                    @if ($errors->has('country'))
                    <div class="text-danger">{{ $errors->first('country') }}</div>
                    @endif
                </div>
                <div class="item-content">
                    <div class="mb-3">
                        <label for="firstGrandPrix" class="form-label">First GrandPrix</label>
                        <input type="text" class="form-control" id="firstGrandPrix" name="firstGrandPrix" value="{{$prix->firstGrandPrix}}">
                    </div>
                    @if ($errors->has('firstGrandPrix'))
                    <div class="text-danger">{{ $errors->first('firstGrandPrix') }}</div>
                    @endif
                </div>
            </div>
            <div class="item">
                <div class="item-content">
                    <div class="mb-3">
                        <label for="distance" class="form-label">Distance</label>
                        <input type="float" class="form-control" id="distance" name="distance" value="{{$prix->distance}}">
                    </div>
                    @if ($errors->has('distance'))
                    <div class="text-danger">{{ $errors->first('distance') }}</div>
                    @endif
                </div>
                <div class="item-content">
                    <div class="mb-3">
                        <label for="length" class="form-label">Length</label>
                        <input type="float" class="form-control" id="length" name="length" value="{{$prix->length}}">
                    </div>
                    @if ($errors->has('length'))
                    <div class="text-danger">{{ $errors->first('length') }}</div>
                    @endif
                </div>
                <div class="item-content">
                    <div class="mb-3">
                        <label for="laps" class="form-label">Laps</label>
                        <input type="number" class="form-control" id="laps" name="laps" value="{{$prix->laps}}">
                    </div>
                    @if ($errors->has('lap'))
                    <div class="text-danger">{{ $errors->first('lap') }}</div>
                    @endif
                </div>
            </div>
            <div class="item" style="width:80%">
                <div class="item-content" style="width:100%">
                    <div class="mb-3">
                        <label for="info" class="form-label">Information</label>
                        <textarea class="form-control" id="info" name="info">{{$prix->info}}</textarea>
                    </div>
                    @if ($errors->has('info'))
                    <div class="text-danger">{{ $errors->first('info') }}</div>
                    @endif
                </div>
            </div>


            <div class="title">
                <h1>Image</h1>
                <hr>
            </div>
            <div class="item item-img">
                <div class="item-content-img">
                    <label class="form-label" for="imgCircuts">Circut</label>
                    <img src="{{url('storage/prix/'.$prix->imgCircuts)}}" alt="{{$prix->name}}">
                    <input type="file" class="form-control" name="imgCircuts">
                    @if ($errors->has('imgCircuts'))
                    <div class="text-danger">{{ $errors->first('imgCircuts') }}</div>
                    @endif
                </div>
                <div class="item-content-img">
                    <label class="form-label" for="imgBanner">Banner</label>
                    <img src="{{url('storage/prix/'.$prix->imgBanner)}}" alt="{{$prix->name}}">
                    <input type="file" class="form-control" name="imgBanner">
                    @if ($errors->has('imgBanner'))
                    <div class="text-danger">{{ $errors->first('imgBanner') }}</div>
                    @endif
                </div>
                <div class="item-content-img">
                    <label class="form-label" for="imgAbout">About</label>
                    <img src="{{url('storage/prix/'.$prix->imgAbout)}}" alt="{{$prix->name}}">
                    <input type="file" class="form-control" name="imgAbout">
                    @if ($errors->has('imgAbout'))
                    <div class="text-danger">{{ $errors->first('imgAbout') }}</div>
                    @endif
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Update Event</button>
        </form>
    </div>
</div>
@endsection