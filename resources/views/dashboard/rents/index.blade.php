@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Pengajuan Sewa</h1>
</div>

<form action="/dashboard/rents" id="filter">
  @csrf

  @if (request('search') || request('status')) 
    <input type="hidden" name="search" value="{{ request('search') }}">
    <input type="hidden" name="status" value="{{ request('status') }}">
  @endif

  <ul class="nav nav-tabs mb-3">
    <li class="nav-item">
      <button class="nav-link {{ request('status') == null ? 'active' : '' }}" value="" name="status">Semua</button>
    </li>
    <li class="nav-item position-relative">
      <button class="nav-link {{ request('status') == 'booked'? 'active' : '' }}" value='booked' name="status">Dibayarkan</button>
      <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill" style="background-color: #E4A11B">
        {{ count($all_rents->where('status_id', 2)) }}
        <span class="visually-hidden">menunggu konfirmasi</span>
      </span>
    </li>
    <li class="nav-item">
      <button class="nav-link {{ request('status') == 'confirmed'? 'active' : '' }}" value='confirmed' name="status">Terkonfirmasi</button>
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
    <li class="nav-item position-relative">
      <button class="nav-link {{ request('status') == 'issued'? 'active' : '' }}" value='issued' name="status">Bermasalah</button>
      <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill" style="background-color: #DC4C64">
        {{ count($all_rents->where('status_id', 7)) }}
        <span class="visually-hidden">sewa bermasalah</span>
      </span>
    </li>
  </ul>
  <div class="input-group mb-3">
    <input type="text" class="form-control" name="search" id="search" placeholder="Cari sewa" value="{{ request('search') }}" aria-label="Cari sewa" aria-describedby="button-addon2">
    <button class="btn btn-warning" type="submit" id="button-addon2"><i data-feather="search" class="mb-1"></i></button>
  </div>
</form>

@if(session()->has('success'))
  <div class="alert alert-success col-lg-10" role="alert">
    {{ session('success') }}
  </div>
@endif

<div class="col-lg-10">
       @if ($rents)
       @foreach ($rents as $rent)
       <div class="card my-2 border position-relative">
         <div class="position-absolute rounded-end-0 rounded-1" style="width: 7px; height: 100%;top:0; background-color: {{ $rent->status->color }}"></div>
         <div class="ms-2 card-header fweig-semibold row">
           <div class="col text-start ps-0">
             <img src="{{ asset('img/no-image.png') }}" class="rounded-circle me-2 ms-0" alt="" style="height: 24px; width: 24px;">
           {{ $rent->nama_lengkap }}
           </div>
           <div class="col text-end text-secondary fweig-reg">
             <span class="fsize-2">ID Sewa #{{ $rent->id }}</span>
             <span class="ms-2 fsize-2">{{ \Carbon\Carbon::parse($rent->created_at)->diffForHumans() }}</span>
           </div>
         </div>
         <div class="mx-2 card-body">
           <div class="row my-2">
             <div class="col">
               <div class="fweig-semibold mb-2">Detail Penyewa</div>
               <div class="fsize-2 font-monospace lh-base mb-1">{{ $rent->pekerjaan }}</div>
               <div class="fsize-2 font-monospace lh-base mb-1">{{ $rent->alamat }}</div>
               <div class="fsize-2 font-monospace lh-base mb-1">{{ $rent->telp_num }}</div>
             </div>
             <div class="col">
               <div class="fweig-semibold mb-2">Rincian Sewa</div>
               <div class="fsize-2 font-monospace lh-base mb-1">Mulai: {{ $rent->start_date }}</div>
               <div class="fsize-2 font-monospace lh-base mb-1">Akhir: {{ $rent->end_date }}</div>
               <div class="fsize-2 font-monospace lh-base mb-1">'in durasi'</div>
             </div>
             <div class="col">
               <div class="fweig-semibold mb-2">Biaya</div>
               <div class="fsize-2 font-monospace lh-base mb-1">IDR {{ number_format($rent->total_price) }}</div>
               <div class="fsize-2 font-monospace lh-base mb-1">@if ($rent->status->slug == 'unpaid') Belum Lunas @else Lunas @endif</div>
             </div>
             <div class="col">
               <div class="fweig-semibold mb-2">Detail Kendaraan</div>
               <div class="fsize-2 font-monospace lh-base mb-1">{{ $rent->vehicle->plate_num }}</div>
               <div class="fsize-2 font-monospace lh-base mb-1">{{ $rent->vehicle->brand->name . ' ' . $rent->vehicle->title }}</div>
             </div>
           </div>
           <div class="row">
             <div class="col-4 text-start">
               <span class="badge text-white rounded-pill" style="background-color: {{ $rent->status->color }}"><span class="fweig-semibold">{{ $rent->status->name }}</span></span>
             </div>
             <div class="col-8 text-end">
                 <a href="/dashboard/rents/{{ $rent->id }}" class="badge bg-info text-decoration-none"><span class="fweig-semibold me-2">Detail</span> <i data-feather="eye"></i></a>
                 @if (!in_array($rent->status->id, [1, 5, 6, 7]))
                   <a href="/dashboard/rents/{{ $rent->id }}/edit" class="mx-1 badge bg-success text-decoration-none"><span class="fweig-semibold me-2">Lanjutkan Proses</span> <i data-feather="chevrons-right"></i></a>
                 @endif
                 @if (!in_array($rent->status->id, [5, 6, 7]))
                   <form action="/dashboard/rents/{{ $rent->id }}" method="post" class="d-inline">
                     @method('put')
                     @csrf
                     <input type="text" name="status_id" id="status_id" value=7 hidden>
                     <button type="submit" class="badge bg-neutral500 border-0"  onclick="return confirm('Apa anda yakin ingin membatalkan?')"><span class="fweig-semibold me-2">Permasalahkan</span> <i data-feather="alert-circle"></i></button>
                   </form>
                 @endif
             </div>
           </div>
         </div>
         <div class="position-absolute rounded-start-0 rounded-1" style="width: 7px; height: 100%;top:0;right:0;background-color: {{ $rent->status->color }}"></div>
       </div>
       @endforeach
       @else
       <p>Mohon maaf saat ini beluma ada sewa yang masuk</p>
       @endif
</div>
    
@endsection
