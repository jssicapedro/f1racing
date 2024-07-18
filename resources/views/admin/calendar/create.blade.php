@extends('layout.layout')

@section('title', 'F1Racing')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@push('links')

@endpush

@push('scripts')
<script>
    document.getElementById('sprintCheckbox').addEventListener('change', function() {
        if (this.checked) {
            document.getElementById('sprintFields').style.display = 'block';
            document.getElementById('nonSprintFields').style.display = 'none';
        } else {
            document.getElementById('sprintFields').style.display = 'none';
            document.getElementById('nonSprintFields').style.display = 'block';
        }
    });
</script>
@endpush


@section('main')
@include('admin.partials.admin-navbar')
<div class="content">
    <div class="info">
        <a class="btnBlack" href="{{ route('admin.calendar') }}">Return list</a>
        <h1>New Race</h1>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('admin.calendar.store') }}" method="POST">
            @csrf
            <div>
                <label class="form-label">Id</label>
                <input type="text" class="form-control" value="{{ $nextId }}" readonly>
            </div>

            <div class="item">
                <div class="item_content">
                    <label class="form-label">Prix</label>
                    <select class="form-control" name="Prix_idPrix" required>
                        @foreach($prix as $p)
                        <option value="{{ $p->idPrix }}">{{ $p->idPrix .' - '. $p->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="item_content">
                    <label class="form-label">Grand Prix</label>
                    <select class="form-control" name="GrandPrix_idGrandPrix" required>
                        @foreach($grandprix as $gp)
                        <option value="{{ $gp->idGrandPrix }}">{{ $gp->idGrandPrix .' - '. $gp->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="mb-3 form-check">
                <label class="form-check-label" for="sprintCheckbox">With Sprint</label>
                <input type="checkbox" class="form-check-input" id="sprintCheckbox" name="with_sprint" value="1">
            </div>

            <div id="sprintFields" style="display: none;">
                <div class="item dates">
                    <div class="mb-3">
                        <label for="sprint_t1" class="form-label">T1</label>
                        <input type="datetime-local" class="form-control" id="sprint_t1" name="sprint_t1">
                    </div>
                    <div class="mb-3">
                        <label for="sprintQualify" class="form-label">Qualify Sprint</label>
                        <input type="datetime-local" class="form-control" id="sprintQualify" name="sprintQualify">
                    </div>
                    <div class="mb-3">
                        <label for="sprint" class="form-label">Sprint</label>
                        <input type="datetime-local" class="form-control" id="sprint" name="sprint">
                    </div>
                    <div class="mb-3">
                        <label for="sprint_qualify" class="form-label">Qualify</label>
                        <input type="datetime-local" class="form-control" id="sprint_qualify" name="sprint_qualify">
                    </div>
                    <div class="mb-3">
                        <label for="sprint_race" class="form-label">Race</label>
                        <input type="datetime-local" class="form-control" id="sprint_race" name="sprint_race">
                    </div>
                </div>
            </div>

            <div id="nonSprintFields" style="display: block;">
                <div class="item dates">
                    <div class="item_content">
                        <label for="nonSprintT1" class="form-label">T1</label>
                        <input type="datetime-local" class="form-control" id="nonSprintT1" name="t1">
                    </div>
                    <div class="item_content">
                        <label for="t2" class="form-label">T2</label>
                        <input type="datetime-local" class="form-control" id="t2" name="t2">
                    </div>
                    <div class="item_content">
                        <label for="t3" class="form-label">T3</label>
                        <input type="datetime-local" class="form-control" id="t3" name="t3">
                    </div>
                    <div class="item_content">
                        <label for="qualify" class="form-label">Qualify</label>
                        <input type="datetime-local" class="form-control" id="qualify" name="qualify">
                    </div>
                    <div class="item_content">
                        <label for="race" class="form-label">Race</label>
                        <input type="datetime-local" class="form-control" id="race" name="race">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Add New</button>
        </form>
    </div>
</div>
@endsection