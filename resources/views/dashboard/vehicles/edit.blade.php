@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
    <h1 class="h2">Ubah Data Kendaraaan</h1>
</div>

<div class="col-lg-8">
  <a href="/dashboard/vehicles" class="btn btn-success mx-1 mb-3"><i data-feather="arrow-left"></i> Kembali ke Halaman Kendaraan</a>
  <form method="post" action="/dashboard/vehicles/{{ $vehicle->slug }}" enctype="multipart/form-data">
      @method('put')
      @csrf
      <div class="mb-3">
        <label for="title" class="form-label">Nama Kendaraan</label>
        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $vehicle->title) }}" autofocus>
        @error('title')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="plate_num" class="form-label">Nomor Polisi</label>
        <input type="text" class="form-control @error('plate_num') is-invalid @enderror" id="plate_num" name="plate_num" value={{ old('plate_num', $vehicle->plate_num) }}>
        @error('plate_num')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="slug" class="form-label">Slug</label>
        <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" readonly disabled value={{ old('slug', $vehicle->slug) }}>
        @error('slug')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="category_id" class="form-label">Kategori</label>
        <select class="form-select @error('category_id') is-invalid @enderror" name="category_id">
          <option disabled selected value> -- select an option -- </option>
          @foreach($categories as $category)
              @if(old('category_id', $vehicle->category_id) == $category->id)
                <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
              @else
                <option value="{{ $category->id }}">{{ $category->name }}</option>
              @endif
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
        <select class="form-select @error('brand_id') is-invalid @enderror" name="brand_id">
          <option disabled selected value> -- select an option -- </option>
          @foreach($brands as $brand)
            @if(old('brand_id', $vehicle->brand_id) == $brand->id)
              <option value="{{ $brand->id }}" selected>{{ $brand->name }}</option>
            @else
              <option value="{{ $brand->id }}">{{ $brand->name }}</option>
            @endif
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
        <select class="form-select @error('type_id') is-invalid @enderror" name="type_id">
          <option disabled selected value> -- select an option -- </option>
          @foreach($types as $type)
            @if(old('type_id', $vehicle->type_id) == $type->id)
              <option value="{{ $type->id }}" selected>{{ $type->name }}</option>
            @else
            <option value="{{ $type->id }}">{{ $type->name }}</option>
            @endif
          @endforeach
        </select>
        @error('type_id')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="transmission_id" class="form-label">Transmisi</label>
        <select class="form-select @error('transmission_id') is-invalid @enderror" name="transmission_id">
          <option disabled selected value> -- select an option -- </option>
          @foreach($transmissions as $transmission)
            @if(old('transmission_id', $vehicle->transmission_id) == $transmission->id)
              <option value="{{ $transmission->id }}" selected>{{ $transmission->name }}</option>
            @else
              <option value="{{ $transmission->id }}">{{ $transmission->name }}</option>
            @endif
          @endforeach
        </select>
        @error('transmission')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="capacity" class="form-label">Kapasitas</label>
        <input type="number" class="form-control @error('capacity') is-invalid @enderror" id="capacity" name="capacity" value={{ old('capacity', $vehicle->capacity) }}>
        @error('capacity')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="power" class="form-label">Tenaga</label>
        <input type="number" class="form-control @error('power') is-invalid @enderror" id="power" name="power" value={{ old('power', $vehicle->power) }}>
        @error('power')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="price" class="form-label">Harga</label>
        <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value={{ old('price', $vehicle->price) }}>
        @error('price')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="color" class="form-label">Warna</label>
        <input type="text" class="form-control @error('color') is-invalid @enderror" id="color" name="color" value={{ old('color', $vehicle->color) }}>
        @error('color')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="image" class="form-label">Foto Mobil</label>
        <input type="hidden" name="oldImage" value="{{ $vehicle->image }}">
        @if ($vehicle->image)
          <img src="{{ asset('storage/' . $vehicle->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block img-thumbnail">
        @else
          <img class="img-preview img-fluid mb-3 col-sm-5">
        @endif
        <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
        @error('image')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="extras" class="form-label">Tambahan</label>
        <input type="text" class="form-control @error('extras') is-invalid @enderror" id="extras" name="extras" rows="3" value={{ old('extras', $vehicle->extras) }}>
        <div id="extrasHelp" class="form-text">Isi spesifikasi atau item tambahan</div>
      </div>
      
      <button type="submit" class="btn btn-primary">Perbarui Kendaraan</button>
  </form>
</div>

<script>
  function previewImage() {
      const image = document.querySelector('#image');
      const imgPreview = document.querySelector('.img-preview');

      imgPreview.style.display = 'block';
      imgPreview.classList.add('img-thumbnail');

      const oFReader = new FileReader();
      oFReader.readAsDataURL(image.files[0]);

      oFReader.onload = function(oFREvent) {
        imgPreview.src = oFREvent.target.result;
      }
    }
</script>
@endsection