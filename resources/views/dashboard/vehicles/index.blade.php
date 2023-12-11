@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
  <h1 class="h2">Kendaraan</h1>
</div>

@if(session()->has('success'))
  <div class="alert alert-success" role="alert">
    {{ session('success') }}
  </div>
@endif

<div class="table-responsive col-lg-8">
    <a href="/dashboard/vehicles/create" class="btn btn-primary mb-3">Tambah Kendaraan Baru</a>
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nama Kendaraan</th>
          <th scope="col">Plat Nomor</th>
          <th scope="col">Brand</th>
          <th scope="col">Tipe</th>
          <th scope="col">Warna</th>
          <th scope="col">Harga</th>
          <th scope="col">Action</th>
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
            <td>IDR {{ $vehicle->price }}</td>
            <td>
                <a href="/dashboard/vehicles/{{ $vehicle->slug }}" class="badge bg-info"><i data-feather="eye"></i></a>
                <a href="#" class="badge bg-warning"><i data-feather="edit"></i></a>
                <a href="#" class="badge bg-danger"><i data-feather="x-circle"></i></a>
            </td>
        </tr>
        @endforeach
      </tbody>
    </table>
</div>
    
@endsection
