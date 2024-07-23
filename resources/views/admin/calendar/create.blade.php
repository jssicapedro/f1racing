@extends('layout.layout')

@section('title', 'F1Racing')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@push('links')

@endpush

@push('scripts')
<script>
    function toggleSprintFields() {
        var sprintTrue = document.getElementById('sprintTrue');
        var sprintFalse = document.getElementById('sprintFalse');
        var sprintFields = document.getElementById('sprintFields');
        var nonSprintFields = document.getElementById('nonSprintFields');
        var withSprintField = document.getElementById('with_sprint');

        if (sprintTrue.checked) {
            sprintFields.style.display = 'block';
            nonSprintFields.style.display = 'none';
            withSprintField.value = 'true';
        } else if (sprintFalse.checked) {
            sprintFields.style.display = 'none';
            nonSprintFields.style.display = 'block';
            withSprintField.value = 'false';
        }
    }

    // Inicializa o estado correto dos campos ao carregar a página
    document.addEventListener('DOMContentLoaded', function() {
        toggleSprintFields();
    });
</script>
@endpush


@section('main')
@include('admin.partials.admin-navbar')
<div class="content">
    <div class="info">
        <a class="btnBlack" href="{{ route('admin.calendar') }}">Return list</a>
        <h1>New Race</h1>
        <form action="{{ route('admin.calendar.store') }}" method="POST">
            @csrf
            @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div>
                <label class="form-label">Id</label>
                <input type="text" class="form-control" value="{{ $nextId }}" readonly>
            </div>

            <div class="item">
                <div class="item_content">
                    <label class="form-label">Race</label>
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

            <div>
                <label class="form-check-label" for="sprintTrue">With Sprint</label>
                <div>
                    <input type="radio" class="form-check-input" id="sprintTrue" name="with_sprint" value="true" onclick="toggleSprintFields()"> Yes
                </div> 
                <div>
                <input type="radio" class="form-check-input" id="sprintFalse" name="with_sprint" value="false" onclick="toggleSprintFields()" checked> No
                </div>
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