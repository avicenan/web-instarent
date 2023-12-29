@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
  <h1 class="h2">Kendaraan</h1>
</div>

@if(session()->has('success'))
  <div class="alert alert-success col-lg-10" role="alert">
    {{ session('success') }}
  </div>
@endif

<div class="table-responsive col-lg-10">
    <a href="/dashboard/vehicles/create" class="btn btn-primary mb-3">Tambah Kendaraan Baru</a>
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col" class="fsize-2">#</th>
          <th scope="col" class="fsize-2">Nama Kendaraan</th>
          <th scope="col" class="fsize-2">Plat Nomor</th>
          <th scope="col" class="fsize-2">Brand</th>
          <th scope="col" class="fsize-2">Tipe</th>
          <th scope="col" class="fsize-2">Warna</th>
          <th scope="col" class="fsize-2">Harga</th>
          <th scope="col" class="fsize-2">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($vehicles as $vehicle)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $vehicle->title }}</td>
            <td>{{ $vehicle->plate_num }}</td>
            <td>{{ $vehicle->brand->name}}</td>
            <td>{{ $vehicle->type->name }}</td>
            <td>{{ $vehicle->color }}</td>
            <td>IDR {{ number_format($vehicle->price) }}</td>
            <td>
                <a href="/dashboard/vehicles/{{ $vehicle->slug }}" class="badge bg-info"><i data-feather="eye"></i></a>
                <a href="/dashboard/vehicles/{{ $vehicle->slug}}/edit" class="badge bg-warning"><i data-feather="edit"></i></a>
                <form action="/dashboard/vehicles/{{ $vehicle->slug }}" method="post" class="d-inline">
                  @method('delete')
                  @csrf
                  <button class="badge bg-neutral500 border-0"  onclick="return confirm('Are you sure?')"><i data-feather="x-circle"></i></button>
                </form>
            </td>
        </tr>
        @endforeach
      </tbody>
    </table>
</div>
    
@endsection
