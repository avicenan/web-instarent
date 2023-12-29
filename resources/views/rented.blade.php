@extends('layouts.main')

@section('container')

<h1 class="mt-5 mb-4 fsize-5 fweig-medium">Riwayat Sewa</h1>

@if(session()->has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@foreach($rents as $rent)
<div class="card my-2 border-0 shadow-sm position-relative col-10">
    <div class="position-absolute rounded-end-0 rounded-1" style="width: 7px; height: 100%;top:0; background-color: {{ $rent->status->color }}"></div>
    <div class="mx-2 card-header bg-white fweig-semibold row">
      <div class="col text-start ps-0">
        <img src="{{ asset('img/no-image.png') }}" class="rounded-circle me-2 ms-0" alt="" style="height: 24px; width: 24px;">
        <span>{{ $rent->nama_lengkap }}</span>
      </div>
      <div class="col text-end text-secondary fweig-reg">
        <span class="fsize-2">ID Sewa #{{ $rent->id }}</span>
        <span class="ms-2 fsize-2">{{ \Carbon\Carbon::parse($rent->created_at)->diffForHumans() }}</span>
      </div>
    </div>
    <div class="card-body py-1">
      <div class="row my-2">
        <div class="col text-center">
          {{-- <div class="fweig-semibold mb-2">Detail Penyewa</div>
          <div class="fsize-2 font-monospace lh-base mb-1">{{ $rent->pekerjaan }}</div>
          <div class="fsize-2 font-monospace lh-base mb-1">{{ $rent->alamat }}</div>
          <div class="fsize-2 font-monospace lh-base mb-1">{{ $rent->telp_num }}</div> --}}
          @if ($rent->vehicle->image)
            <img src="{{ asset('storage/' . $rent->vehicle->image) }}" class="img-fluid" alt="">
          @else
            <img src="{{ asset('img/no-image.png') }}" class="img-fluid" alt="" style="max-height: 150px">
          @endif
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
        <div class="col-4 d-flex justify-content-start align-items-center">
          <div class="badge text-white rounded-pill" style="background-color: {{ $rent->status->color }}"><span class="fweig-semibold">{{ $rent->status->name }}</span></div>
        </div>
        <div class="col-8 d-flex justify-content-end align-items-center">
            @if ($rent->review)
                @for($i=0; $i < $rent->review->rating; $i++)
                    <span
                        class="star text-warning">★
                    </span>
                @endfor
                @for($i=0; $i < 5-$rent->review->rating; $i++)
                    <span
                        class="star">★
                    </span>
                @endfor
            @else
              @if ($rent->status->id == 5)
              <button type="button" class="badge bg-warning border-0" id="reviewModalInput" data-bs-toggle="modal" data-bs-target="#reviewModal"><span class="fweig-semibold me-2 text-dark ">Beri Ulasan</span> <i data-feather="smile" class="text-dark"></i></button>
              @endif
            @endif
            
            <a href="/dashboard/rents/{{ $rent->id }}" class="badge bg-info text-decoration-none ms-3"><span class="fweig-semibold me-2">Detail</span> <i data-feather="eye"></i></a>
        </div>
      </div>
    </div>
    <div class="position-absolute rounded-start-0 rounded-1" style="width: 7px; height: 100%;top:0;right:0;background-color: {{ $rent->status->color }}"></div>
  </div>

  {{-- Review Modal --}}
    <form action="/review" method="post">
    @csrf
        <div class="modal fade" id="reviewModal" tabindex="-1" aria-labelledby="reviewModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header p-2">
                <h1 class="modal-title fs-6" id="reviewModalLabel">Ulasan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                {{-- Stars Rate --}}
                    <div class="star-card text-center mb-3">
                        <h1 class="fsize-3">1 Mengecewakan, 5 Luar Biasa</h1>
                        <span onclick="gfg(1)"
                            class="star">★
                        </span>
                        <span onclick="gfg(2)"
                            class="star">★
                        </span>
                        <span onclick="gfg(3)"
                            class="star">★
                        </span>
                        <span onclick="gfg(4)"
                            class="star">★
                        </span>
                        <span onclick="gfg(5)"
                            class="star">★
                        </span>
                    </div>
                    <div class="form">
                        <input type="hidden" name="rating" id="output" required>
                        <h2 class="fsize-2 fweig-reg">Bagaimana pendapatmu setelah melakukan penyewaan?</h2>
                        <textarea name="review" class="fsize-2 p-2" id="" rows="4" cols="70" placeholder="Masukkan kata..." required></textarea>
                        <input type="hidden" name="rent_id" value="{{ $rent->id }}" required>
                    </div>
                {{-- Stars Rate --}}
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                </div>
            </div>
            </div>
        </div>
    </form>

@endforeach

<script>
    const reviewModal = document.getElementById('reviewModal')
    const reviewModalInput = document.getElementById('reviewModalInput')

    reviewModal.addEventListener('shown.bs.modal', () => {
    reviewModalInput.focus()
    });

    // star rating
    let stars = document.getElementsByClassName("star");
    let output = document.getElementById("output");
    
    // Funtion to update rating
    function gfg(n) {
        remove();
        for (let i = 0; i < n; i++) {
            if (n == 1) cls = "one";
            else if (n == 2) cls = "two";
            else if (n == 3) cls = "three";
            else if (n == 4) cls = "four";
            else if (n == 5) cls = "five";
            stars[i].className = "star " + cls;
        }
        output.value = n;
    }
    
    // To remove the pre-applied styling
    function remove() {
        let i = 0;
        while (i < 5) {
            stars[i].className = "star";
            i++;
        }
    }
    
</script>
@endsection