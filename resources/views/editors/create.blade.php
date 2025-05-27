@extends('layouts.app')

@section('title', 'Dodaj proizvod')

@section('content')

<div class="header-spacer" style="height: 80px;"></div>

<div class="container my-5">
    <h2>Create new product</h2>

    <form method="POST" action="{{ route('proizvodi.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="naziv" class="form-label">Naziv</label>
            <input type="text" class="form-control" name="naziv" id="naziv" required>
        </div>

        <div class="mb-3">
            <label for="cena" class="form-label">Cena</label>
            <input type="number" class="form-control" name="cena" id="cena" required>
        </div>

        <div class="mb-3">
            <label for="tip" class="form-label">Tip</label>
            <input type="text" class="form-control" name="tip" id="tip" required>
        </div>

        <div class="mb-3">
            <label for="featured" class="form-label">Istaknut</label>
            <select name="featured" id="featured" class="form-select">
                <option value="0">Ne</option>
                <option value="1">Da</option>
            </select>
        </div>

        <div class="mb-3">
          <label for="opis" class="form-label">Opis</label>
          <textarea class="form-control" name="opis" id="opis">{{ old('opis') }}</textarea>
        </div>


        <div class="mb-3">
            <label for="slika" class="form-label">Slika</label>
            <input type="file" class="form-control" name="slika" id="slika" required>
        </div>

        <button type="submit" class="btn btn-success">Sačuvaj</button>
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

