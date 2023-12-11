@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
    <h1 class="h2">Tambah Kendaraan Baru</h1>
</div>

<div class="col-lg-8">
  <a href="/dashboard/vehicles" class="btn btn-success mx-1 mb-3"><i data-feather="arrow-left"></i> Kembali ke Halaman Kendaraan</a>
  <form method="post" action="/dashboard/vehicles">
      @csrf
      <div class="mb-3">
        <label for="title" class="form-label">Nama Kendaraan</label>
        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" autofocus>
        @error('title')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="plate_num" class="form-label">Nomor Polisi</label>
        <input type="text" class="form-control @error('plate_num') is-invalid @enderror" id="plate_num" name="plate_num" value={{ old('plate_num') }}>
        @error('plate_num')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="slug" class="form-label">Slug</label>
        <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" readonly value={{ old('slug') }}>
        @error('slug')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="category_id" class="form-label">Kategori</label>
        <select class="form-select @error('category_id') is-invalid @enderror" name="category_id"  value={{ old('category_id') }}>
          <option disabled selected value> -- select an option -- </option>
          @foreach($categories as $category)
              <option value="{{ $category->id }}">{{ $category->name }}</option>
          @endforeach
        </select>
        @error('category_id')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="brand_id" class="form-label">Merek</label>
        <select class="form-select @error('brand_id') is-invalid @enderror" name="brand_id"  value={{ old('brand_id') }}>
          <option disabled selected value> -- select an option -- </option>
          @foreach($brands as $brand)
              <option value="{{ $brand->id }}">{{ $brand->name }}</option>
          @endforeach
        </select>
        @error('brand_id')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="type_id" class="form-label">Tipe</label>
        <select class="form-select @error('type_id') is-invalid @enderror" name="type_id"  value={{ old('type_id') }}>
          <option disabled selected value> -- select an option -- </option>
          @foreach($types as $type)
              <option value="{{ $type->id }}">{{ $type->name }}</option>
          @endforeach
        </select>
        @error('type_id')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="transmission" class="form-label">Transmisi</label>
        <select class="form-select @error('transmission') is-invalid @enderror" name="transmission"  value={{ old('transmission') }}>
          <option disabled selected value> -- select an option -- </option>
          <option value="Automatic">Automatic</option>
          <option value="Automatic">Manual</option>
          <option value="Automatic">Electric Vehicle</option>
        </select>
        @error('transmission')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="capacity" class="form-label">Kapasitas</label>
        <input type="number" class="form-control @error('capacity') is-invalid @enderror" id="capacity" name="capacity" value={{ old('capacity') }}>
        @error('capacity')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="power" class="form-label">Tenaga</label>
        <input type="number" class="form-control @error('power') is-invalid @enderror" id="power" name="power" value={{ old('power') }}>
        @error('power')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="price" class="form-label">Harga</label>
        <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value={{ old('price') }}>
        @error('price')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="color" class="form-label">Warna</label>
        <input type="text" class="form-control @error('color') is-invalid @enderror" id="color" name="color" value={{ old('color') }}>
        @error('color')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="extras" class="form-label">Tambahan</label>
        <textarea class="form-control @error('extras') is-invalid @enderror" id="extras" name="extras" rows="3" value={{ old('extras') }}></textarea>
        <div id="extrasHelp" class="form-text">Isi spesifikasi atau item tambahan</div>
      </div>
      
      <button type="submit" class="btn btn-primary">Tambah</button>
  </form>
</div>

<script>
    const title = document.querySelector('#title');
    const plate_num = document.querySelector('#plate_num');
    const slug = document.querySelector('#slug');

    plate_num.addEventListener('change', function() {
        fetch('/dashboard/vehicles/checkSlug?title=' + title.value + '&plate_num=' + plate_num.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)
    });

    title.addEventListener('change', function() {
        fetch('/dashboard/vehicles/checkSlug?title=' + title.value + '&plate_num=' + plate_num.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)
    });
</script>
@endsection