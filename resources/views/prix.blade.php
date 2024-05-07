@extends('layout.layout')

@section('title', 'F1Racing')

@push('links')
<link rel="stylesheet" href="{{ asset('css/prix.css') }}">
@endpush

@section('main')
<form action="{{ route('prix') }}" method="GET">
    <input type="checkbox" name="all" id="all" {{ $filter === 'all' ? 'checked' : '' }}>
    <label for="all">All</label>
    <select name="filter" id="filter">
        <option value="" disabled selected>Country</option>
        @foreach($countries as $country)
        <option value="{{ $country }}" {{ $filter === $country ? 'selected' : '' }}>{{ $country }}</option>
        @endforeach
    </select>
</form>
<div class="prixs">
    @foreach ($prixs as $prix)
    <a class="prix" href="{{ route('prix.show', ['id' => $prix->idPrix]) }}">
        <div class="img_country">
            <img class="country" src="{{ url('storage/country/'.$prix->imgCountry) }}" alt="{{ $prix->country}}">
        </div>
        <hr>
        <div class="info">
            <p>{{$prix->country}}</p>
            <p>{{$prix->name}}</p>
            <p>{{$prix->grandPrixName}}</p>
        </div>
        <hr>
        <img src="{{ url('storage/prix/'.$prix->imgCircuts) }}" alt="">
    </a>
    @endforeach
</div>
{{ $prixs->links() }}
@endsection

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#filter').change(function() {
            // Submeter automaticamente o formulário quando o filtro é alterado
            $(this).closest('form').submit();
        });

        $('#all').change(function() {
            if ($(this).is(':checked')) {
                $('#filter').prop('disable', true);
                $('#filter').val('');
            } else {
                $('#filter').prop('disable', false);
            }
            window.location.href = "{{ route('prix') }}";
        });
    });
</script>
@endpush