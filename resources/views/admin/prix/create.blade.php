@extends('layout.layout')

@section('title', 'F1Racing')
@push('links')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endpush

@push('scripts')
<script>
    $(document).ready(function() {
        $('#firstGrandPrix').datepicker({
            format: 'yyyy',
            viewMode: 'years',
            minViewMode: 'years'
        });
    });
</script>
@endpush


@section('main')
@include('admin.partials.admin-navbar')
<div class="content">
    <div class="info">
        <a class="btnBlack" href="{{ route('admin.track') }}">Return list</a>
        <h1>New Track</h1>
        <form action="{{ route('admin.track.store') }}" method="POST">
            @csrf
            <div class="title">
                <h1>Informations</h1>
                <hr>
            </div>
            <div class="item">
                <div class="item-content">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    @if ($errors->has('name'))
                    <div class="text-danger">{{ $errors->first('name') }}</div>
                    @endif
                </div>
                <div class="item-content">
                    <div class="mb-3">
                        <label for="grandPrixName" class="form-label">GrandPrix name</label>
                        <input type="text" class="form-control" id="grandPrixName" name="grandPrixName">
                    </div>
                    @if ($errors->has('grandPrixName'))
                    <div class="text-danger">{{ $errors->first('grandPrixName') }}</div>
                    @endif
                </div>
                <div class="item-content">
                    <div class="mb-3">
                        <label for="comunName" class="form-label">Comun name</label>
                        <input type="text" class="form-control" id="comunName" name="comunName">
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
                        <input type="text" class="form-control" id="country" name="country">
                    </div>
                    @if ($errors->has('country'))
                    <div class="text-danger">{{ $errors->first('country') }}</div>
                    @endif
                </div>
                <div class="item-content">
                    <div class="mb-3">
                        <label for="firstGrandPrix" class="form-label">First GrandPrix</label>
                        <input type="text" class="form-control" id="firstGrandPrix" name="firstGrandPrix">
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
                        <input type="float" class="form-control" id="distance" name="distance">
                    </div>
                    @if ($errors->has('distance'))
                    <div class="text-danger">{{ $errors->first('distance') }}</div>
                    @endif
                </div>
                <div class="item-content">
                    <div class="mb-3">
                        <label for="length" class="form-label">Length</label>
                        <input type="float" class="form-control" id="length" name="length">
                    </div>
                    @if ($errors->has('length'))
                    <div class="text-danger">{{ $errors->first('length') }}</div>
                    @endif
                </div>
                <div class="item-content">
                    <div class="mb-3">
                        <label for="lap" class="form-label">Lap</label>
                        <input type="number" class="form-control" id="lap" name="lap">
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
                        <textarea class="form-control" id="info" name="info"></textarea>
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
            <div class="item">
                <div class="mb-3">
                    <label class="form-label" for="circuits">Circuits</label>
                    <input type="file" class="form-control" name="circuits">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="banner">Banner</label>
                    <input type="file" class="form-control" name="banner">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="about">About</label>
                    <input type="file" class="form-control" name="about">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="country">Country</label>
                    <input type="file" class="form-control" name="country">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Add New</button>
        </form>
    </div>
</div>
@endsection