@extends('layout.layout')

@section('title', 'F1Racing')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@push('links')

@endpush

@push('scripts')
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script>
    function confirmDelete(event) {
        event.preventDefault();
        $('#confirmDeleteModal').modal('show');
        $('#confirmDeleteButton').on('click', function() {
            event.target.submit();
        });
        return false;
    }
</script>
@endpush


@section('main')
@include('admin.partials.admin-navbar')
<div class="content">
    <div class="info">
        <a class="btnBlack" href="{{ route('admin.calendar') }}">Return list</a>
        <h1>{{ $day->prix->idPrix.' - '.$day->prix->name }}</h1>
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        <form action="{{ route('admin.calendar.update', $day->idCalendar) }}" method="POST">
            @csrf
            @method('PUT')
            @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div>
                <label class="form-label">Id Calendar</label>
                <input type="text" class="form-control" value="{{ $day->idCalendar }}" readonly>
            </div>

            <div class="item">
                <div class="item_content">
                    <label class="form-label">Race</label>
                    <select class="form-control" name="Prix_idPrix">
                        <option value="{{ $day->prix->id }}" selected>{{ $day->prix->idPrix.' - '.$day->prix->name }}</option>
                        @foreach($prix as $p)
                        <option value="{{ $p->id }}" {{ $p->id == $day->Prix_idPrix ? 'selected' : '' }}>{{ $p->idPrix.' - '.$p->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="item_content">
                    <label class="form-label">Grand Prix</label>
                    <select class="form-control" name="GrandPrix_idGrandPrix">
                        <option value="{{ $day->grandprix->idGrandPrix }}" selected>{{ $day->grandprix->idGrandPrix.' - '.$day->grandprix->name }}</option>
                        @foreach($grandprix as $gp)
                        <option value="{{ $gp->id }}" {{ $gp->id == $day->GrandPrix_idGrandPrix ? 'selected' : '' }}>{{ $gp->idGrandPrix.' - '.$gp->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="item dates">
                @if(isset($day->t1))
                <div class="item_content">
                    <label class="form-label">T1</label>
                    <input type="datetime-local" class="form-control" id="event_date_time" name="t1" value="{{ $day->t1 }}">
                </div>
                @endif

                @if(isset($day->t2))
                <div class="item_content">
                    <label class="form-label">T2</label>
                    <input type="datetime-local" class="form-control" id="event_date_time" name="t2" value="{{ $day->t2 }}">
                </div>
                @endif

                @if(isset($day->t3))
                <div class="item_content">
                    <label class="form-label">T3</label>
                    <input type="datetime-local" class="form-control" id="event_date_time" name="t3" value="{{ $day->t3 }}">
                </div>
                @endif

                @if(isset($day->qualifysprint))
                <div class="item_content">
                    <label class="form-label">Qualify Sprint</label>
                    <input type="datetime-local" class="form-control" id="event_date_time" name="qualifysprint" value="{{ $day->qualifysprint }}">
                </div>
                @endif

                @if(isset($day->sprint))
                <div class="item_content">
                    <label class="form-label">Sprint</label>
                    <input type="datetime-local" class="form-control" id="event_date_time" name="sprint" value="{{ $day->sprint }}">
                </div>
                @endif

                @if(isset($day->qualify))
                <div class="item_content">
                    <label class="form-label">Qualify</label>
                    <input type="datetime-local" class="form-control" id="event_date_time" name="qualify" value="{{ $day->qualify }}">
                </div>
                @endif

                @if(isset($day->race))
                <div class="item_content">
                    <label class="form-label">Race</label>
                    <input type="datetime-local" class="form-control" id="event_date_time" name="race" value="{{ $day->race }}">
                </div>
                @endif
            </div>

            <button type="submit" class="btn btn-primary">Update Event</button>
        </form>
    </div>
</div>
@endsection