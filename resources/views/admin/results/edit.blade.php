@extends('layout.layout')

@section('title', 'F1Racing')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@push('links')

@endpush

@push('scripts')
<script>
    document.getElementById('generateFieldsButton').addEventListener('click', function() {
        generateFields();
    });

    function generateFields() {
        const prix = document.getElementById('Prix_idPrix');
        const laps = prix.options[prix.selectedIndex].getAttribute('data-laps');

        resultsFields.innerHTML = '';
        for (let i = 0; i < entries; i++) {

            let fastLapNumberOptions = '';
            for (let j = 1; j <= laps; j++) {
                fastLapNumberOptions += `<option value="${j}">${j}</option>`;
            }
        }
    }
</script>
@endpush


@section('main')
@include('admin.partials.admin-navbar')
<div class="content">
    <div class="info">
        <a class="btnBlack" href="{{ route('admin.results') }}">Return list</a>
        <h1>{{ $result->driver->name.' - '.$result->prix->name.' - '.$result->grandprix->name }}</h1>
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        <form action="{{ route('admin.results.update', $result->idResults) }}" method="POST">
            @csrf
            @method('PUT')
            <div>
                <label class="form-label">Id Result</label>
                <input type="text" class="form-control" value="{{ $result->idResults }}" readonly>
            </div>

            <div class="item">
                <div class="item_content">
                    <label class="form-label">Race</label>
                    <select class="form-control" name="Prix_idPrix">
                        <option value="{{ $result->prix->idPrix }}" selected>{{ $result->prix->idPrix.' - '.$result->prix->name }}</option>
                        @foreach($prix as $gp)
                        <option value="{{ $gp->id }}" {{ $gp->id == $result->Prix_idPrix ? 'selected' : '' }}>{{ $gp->idPrix.' - '.$gp->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="item_content">
                    <label class="form-label">Grand Prix</label>
                    <select class="form-control" name="GrandPrix_idGrandPrix">
                        <option value="{{ $result->grandprix->idGrandPrix }}" selected>{{ $result->grandprix->idGrandPrix.' - '.$result->grandprix->name }}</option>
                        @foreach($grandprix as $gp)
                        <option value="{{ $gp->id }}" {{ $gp->id == $result->GrandPrix_idGrandPrix ? 'selected' : '' }}>{{ $gp->idGrandPrix.' - '.$gp->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="item">
                <div class="item_content">
                    <label class="form-label">Driver</label>
                    <select class="form-control" name="Prix_idPrix">
                        <option value="{{ $result->prix->id }}" selected>{{ $result->driver->idDriver.' - '.$result->driver->name }}</option>
                        @foreach($drivers as $d)
                        <option value="{{ $d->idDriver }}" {{ $d->idDriver == $result->Driver_idDriver ? 'selected' : '' }}>{{ $d->idDriver.' - '.$d->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="item">
                <div class="item_content">
                    <label for="position">Position</label>
                    <select class="form-control" id="position" name="position" required>
                        @for ($n = 1; $n <= 20; $n++) <option value="{{ $n }}">{{ $n }}</option>
                            @endfor
                            <option value="NC">NC</option>
                            <option value="DNF">DNF</option>
                    </select>
                </div>
                <div class="item_content">
                    <label for="points">Points</label>
                    <input type="number" class="form-control" id="points" name="points" min="0" max="26" required>
                </div>
            </div>


            <div class="item">
                <div class="item_content">
                    <label for="fastLapNumber${i}">Fast Lap Nº</label>
                    <select class="form-control" id="fastLapNumber${i}" name="results[${i}][fastLapNumber]">
                        <option value="">Select Fast Lap Number</option>
                        ${fastLapNumberOptions}
                    </select>
                </div>
                <div class="item_content">
                    <label for="fastLapTime${i}">Fast Lap Time</label>
                    <input type="text" class="form-control" id="fastLapTime${i}" name="results[${i}][fastLapTime]" pattern="\\d{1}:\\d{2}\\.\\d{3}" placeholder="1:36.156">
                </div>
            </div>



            <!-- <div class="item dates">
                @if(isset($result->t1))
                <div class="item_content">
                    <label class="form-label">T1</label>
                    <input type="datetime-local" class="form-control" id="event_date_time" name="t1" value="{{ $result->t1 }}">
                </div>
                @endif

                @if(isset($result->t2))
                <div class="item_content">
                    <label class="form-label">T2</label>
                    <input type="datetime-local" class="form-control" id="event_date_time" name="t2" value="{{ $result->t2 }}">
                </div>
                @endif

                @if(isset($result->t3))
                <div class="item_content">
                    <label class="form-label">T3</label>
                    <input type="datetime-local" class="form-control" id="event_date_time" name="t3" value="{{ $result->t3 }}">
                </div>
                @endif

                @if(isset($result->qualifysprint))
                <div class="item_content">
                    <label class="form-label">Qualify Sprint</label>
                    <input type="datetime-local" class="form-control" id="event_date_time" name="qualifysprint" value="{{ $result->qualifysprint }}">
                </div>
                @endif

                @if(isset($result->sprint))
                <div class="item_content">
                    <label class="form-label">Sprint</label>
                    <input type="datetime-local" class="form-control" id="event_date_time" name="sprint" value="{{ $result->sprint }}">
                </div>
                @endif

                @if(isset($result->qualify))
                <div class="item_content">
                    <label class="form-label">Qualify</label>
                    <input type="datetime-local" class="form-control" id="event_date_time" name="qualify" value="{{ $result->qualify }}">
                </div>
                @endif

                @if(isset($result->race))
                <div class="item_content">
                    <label class="form-label">Race</label>
                    <input type="datetime-local" class="form-control" id="event_date_time" name="race" value="{{ $result->race }}">
                </div>
                @endif
            </div> -->

            <button type="submit" class="btn btn-primary">Update Event</button>
        </form>
        <form action="#" method="POST" onsubmit="return confirmDelete(event)">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </div>
    <!-- Modal de confirmação -->
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmDeleteLabel">Confirm Delete</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this event?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" id="confirmDeleteButton">Delete</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection