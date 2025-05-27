@extends('layouts.app')

@section('title', 'Izmeni proizvod')

@section('content')

<div class="header-spacer" style="height: 80px;"></div>

<div class="container my-5">
    <h2>Edit product</h2>

    <form method="POST" action="{{ route('proizvodi.update', $proizvod->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="naziv" class="form-label">Naziv</label>
            <input type="text" class="form-control" name="naziv" id="naziv" value="{{ $proizvod->naziv }}" required>
        </div>

        <div class="mb-3">
            <label for="cena" class="form-label">Cena</label>
            <input type="number" class="form-control" name="cena" id="cena" value="{{ $proizvod->cena }}" required>
        </div>

        <div class="mb-3">
            <label for="tip" class="form-label">Tip</label>
            <input type="text" class="form-control" name="tip" id="tip" value="{{ $proizvod->tip }}" required>
        </div>

        <div class="mb-3">
            <label for="featured" class="form-label">Istaknut</label>
            <select name="featured" id="featured" class="form-select">
                <option value="0" {{ !$proizvod->featured ? 'selected' : '' }}>Ne</option>
                <option value="1" {{ $proizvod->featured ? 'selected' : '' }}>Da</option>
            </select>
        </div>

       <div class="mb-3">
            <label for="opis" class="form-label">Opis</label>
            <textarea class="form-control" name="opis" id="opis">{!! $proizvod->opis !!}</textarea>
        </div>


        <div class="mb-3">
            <label for="slika" class="form-label">Nova slika (opciono)</label>
            <input type="file" class="form-control" name="slika" id="slika">
        </div>

        @if($proizvod->slika)
            <div class="mb-3">
                <label class="form-label">Trenutna slika:</label><br>
                <img src="{{ asset($proizvod->slika) }}" alt="{{ $proizvod->naziv }}" width="200">
            </div>
        @endif

        <button type="submit" class="btn btn-primary">Ažuriraj</button>
    </form>
</div>
@endsection

@section('scripts')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Summernote CSS i JS -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.js"></script>

<script>
    $(document).ready(function() {
        $('#opis').summernote({
            placeholder: 'Unesite opis proizvoda...',
            tabsize: 2,
            height: 200
        });
    });
</script>
@endsection
