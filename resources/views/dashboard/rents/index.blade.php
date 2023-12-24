@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Pengajuan Sewa</h1>
</div>

<form action="/dashboard/rents" id="filter">
  @csrf
  <ul class="nav nav-tabs mb-3">
    <li class="nav-item">
      <button class="nav-link {{ request('status') == null ? 'active' : '' }}" value="" name="status">All</button>
    </li>
    <li class="nav-item">
      <button class="nav-link {{ request('status') == 'booked'? 'active' : '' }}" value='booked' name="status">Dibayarkan</button>
    </li>
    <li class="nav-item">
      <button class="nav-link {{ request('status') == 'confirmed'? 'active' : '' }}" value='confirmed' name="status">Menunggu Sewa</button>
    </li>
    <li class="nav-item">
      <button class="nav-link {{ request('status') == 'on-rent'? 'active' : '' }}" value='on-rent' name="status">Aktif Sewa</button>
    </li>
    <li class="nav-item">
      <button class="nav-link {{ request('status') == 'done'? 'active' : '' }}" value='done' name="status">Selesai</button>
    </li>
    <li class="nav-item">
      <button class="nav-link {{ request('status') == 'cancel'? 'active' : '' }}" value='cancel' name="status">Dibatalkan</button>
    </li>
    <li class="nav-item">
      <button class="nav-link {{ request('status') == 'issued'? 'active' : '' }}" value='issued' name="status">Bermasalah</button>
    </li>
  </ul>
</form>

<div class="table-responsive col-lg-8">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nama Penyewa</th>
          <th scope="col">Brand</th>
          <th scope="col">Nama Kendaraan</th>
          <th scope="col">Plat Nomor</th>
          <th scope="col">Warna</th>
          <th scope="col">Status</th>
          <th scope="col">Mulai Sewa</th>
          <th scope="col">Akhir Sewa</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($rents as $rent)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $rent->nama_lengkap }}</td>
            <td>{{ $rent->vehicle->brand->name }}</td>
            <td>{{ $rent->vehicle->title }}</td>
            <td>{{ $rent->vehicle->plate_num }}</td>
            <td>{{ $rent->vehicle->color }}</td>
            <td>{{ $rent->status->name }}</td>
            <td>{{ $rent->start_date }}</td>
            <td>{{ $rent->end_date }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
</div>
    
@endsection
