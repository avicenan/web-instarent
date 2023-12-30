@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 border-bottom">
  <h1 class="h2">Dashboard</h1>
</div>

<div class="">
  <div class="row">
    <div class="col-8 border-end border-bottom p-3">
      <div class="row">
        <div class="col text-start">
          <h2 class="fsize-5 fweig-medium">List Kendaraan</h2>
        </div>
        <div class="col text-end">
          <a href="/dashboard/rents" class="btn btn-sm shadow-sm border-0" style="background-color: #f5fcfa"><span class="fsize-2 text-success fweig-semibold">Lihat Semua</span></a>
        </div>
      </div>
      <div class="fsize-4 mb-2 txt-ntrl500">Secondary text</div>
      <div class="card">
        <div class="card-body p-1">
          <table class="table table-striped table-sm">
            <thead>
              <tr>
                <th scope="col" class="fsize-2">#</th>
                <th scope="col" class="fsize-2" colspan="2">Nama Kendaraan</th>
                <th scope="col" class="fsize-2">Plat Nomor</th>
                <th scope="col" class="fsize-2">Brand</th>
                <th scope="col" class="fsize-2">Tipe</th>
                <th scope="col" class="fsize-2">Warna</th>
                <th scope="col" class="fsize-2">Harga</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($vehicles as $vehicle)
              <tr>
                  <td class="align-middle">{{ $loop->iteration }}</td>
                  @if ($vehicle->image)
                    <td class="align-middle"> <img src="{{ asset('storage/'.$vehicle->image) }}" class="img-fluid" style="max-height: 60px" alt=""></td>
                  @else
                    <td class="align-middle"><img src="{{ asset('img/no-image.png') }}" class="img-fluid" style="max-height: 60px" alt=""></td>
                  @endif
                  <td class="align-middle">{{ $vehicle->title }}</td>
                  <td class="align-middle">{{ $vehicle->plate_num }}</td>
                  <td class="align-middle">{{ $vehicle->brand->name}}</td>
                  <td class="align-middle">{{ $vehicle->type->name }}</td>
                  <td class="align-middle">{{ $vehicle->color }}</td>
                  <td class="align-middle">IDR {{ number_format($vehicle->price) }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="col-4 p-3 border-bottom text-center my-auto p-4">
      <img src="{{ asset('img/instarent-logo.png') }}" class="img-fluid" style="max-height: 320px" alt="" title="saia bingung gimana buat pie chart XD">
    </div>
  </div>
  <div class="row">
    <div class="col p-3 border-end">
      <div class="row">
        <div class="col text-start">
          <h2 class="fsize-4 fweig-medium">Riwayat Sewa</h2>
        </div>
        <div class="col text-end">
          <a href="/dashboard/rents?status=done" class="btn btn-sm shadow-sm border-0" style="background-color: #f5fcfa"><span class="fsize-2 text-success fweig-semibold">Lihat Semua</span></a>
        </div>
      </div>
      <div class="fsize-4 mb-2 txt-ntrl500">Seluruh penyewaan yang sudah selesai</div>
      <table class="table table-striped table-sm">
        <tbody>
          @foreach ($rents->where('status_id', 5) as $rent)
          <tr>
              @if ($rent->vehicle->image)
                <td class="align-middle"> <img src="{{ asset('storage/'.$rent->vehicle->image) }}" class="img-fluid" style="max-height: 60px" alt=""></td>
              @else
                <td class="align-middle"><img src="{{ asset('img/no-image.png') }}" class="img-fluid" style="max-height: 60px" alt=""></td>
              @endif
              <td class="align-middle">{{ $rent->vehicle->brand->name . ' ' . $rent->vehicle->title }}</td>
              <td class="align-middle">IDR {{ number_format($rent->total_price) }}</td>
              <td class="align-middle">{{ \Carbon\Carbon::parse($rent->updated_at)->diffForHumans() }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <div class="col p-3 border-end">
      <div class="row">
        <div class="col text-start">
          <h2 class="fsize-4 fweig-medium">Sewa aktif </h2>
        </div>
        <div class="col text-end">
          <a href="/dashboard/rents?status=on-rent" class="btn btn-sm shadow-sm border-0" style="background-color: #f5fcfa"><span class="fsize-2 text-success fweig-semibold">Lihat Semua</span></a>
        </div>
      </div>
      <div class="fsize-4 mb-2 txt-ntrl500">Kendaraan yang sedang aktif di sewa</div>
      <table class="table table-striped table-sm">
        <tbody>
          @foreach ($rents as $rent)
          <tr>
              @if ($rent->vehicle->image)
                <td class="align-middle"> <img src="{{ asset('storage/'.$rent->vehicle->image) }}" class="img-fluid" style="max-height: 60px" alt=""></td>
              @else
                <td class="align-middle"><img src="{{ asset('img/no-image.png') }}" class="img-fluid" style="max-height: 60px" alt=""></td>
              @endif
              <td class="align-middle">{{ $rent->vehicle->brand->name . ' ' . $rent->vehicle->title }}</td>
              <td class="align-middle">{{ $rent->rute_tujuan }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <div class="col p-3">
      <div class="row">
        <div class="col text-start">
          <h2 class="fsize-4 fweig-medium">Menunggu Konfirmasi </h2>
        </div>
        <div class="col text-end">
          <a href="/dashboard/rents?status=booked" class="btn btn-sm shadow-sm border-0" style="background-color: #f5fcfa"><span class="fsize-2 text-success fweig-semibold">Lihat Semua</span></a>
        </div>
      </div>
      <div class="fsize-4 mb-2 txt-ntrl500">Pengajuan sewa menunggu konfirmasi</div>
      <table class="table table-striped table-sm">
        <tbody>
          @foreach ($rents->where('status_id', 2) as $rent)
          <tr>
              @if ($rent->vehicle->image)
                <td class="align-middle"> <img src="{{ asset('storage/'.$rent->vehicle->image) }}" class="img-fluid" style="max-height: 60px" alt=""></td>
              @else
                <td class="align-middle"><img src="{{ asset('img/no-image.png') }}" class="img-fluid" style="max-height: 60px" alt=""></td>
              @endif
              <td class="align-middle">{{ $rent->vehicle->brand->name . ' ' . $rent->vehicle->title }}</td>
              <td class="align-middle">{{ $rent->status->name }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
    
@endsection
