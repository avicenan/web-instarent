@extends('rent.layouts.main')
    
@section('rent-container')

{{-- <form action="/rent" method="POST">
    <input type="text" disabled value="{{ $vehicle->title }}">
    <input type="datetime-local" disabled value="{{ $start_date }}">
    <input type="datetime-local" disabled value="{{ $end_date }}">
</form> --}}

<div class="row justify-content-center">
    <div class="col-8">
        <div class="progress-bar" style="padding: 30px">
            <div class="position-relative m-4" style="height: 20px">
                <div class="progress" role="progressbar" aria-label="Progress" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="height: 1px;">
                  <div class="progress-bar bg-success" style="width: 100%"></div>
                </div>
                <div class="row">
                    <div class="col-3 position-absolute top-0" style="right: 85%">
                        <div class="row justify-content-center">
                            <div class="col">
                                <button type="button" class="translate-middle btn btn-sm btn-success rounded-pill" style="width: 2rem; height:2rem;">1</button>
                                <h6 class="me-4 fweig-reg" style="font-size: 1vw">Data Diri</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-3 position-absolute top-0" style="right: 53%">
                        <div class="row justify-content-center">
                            <div class="col">
                                <button type="button" class="translate-middle btn btn-sm btn-success rounded-pill border-0" style="width: 2rem; height:2rem;">2</button>
                                <h6 class="me-4 fweig-reg" style="font-size: 1vw; ">Rincian Sewa</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-3 position-absolute top-0" style="right: 18%">
                        <div class="row justify-content-center">
                            <div class="col">
                                <button type="button" class="translate-middle btn btn-sm btn-success rounded-pill border-0" style="width: 2rem; height:2rem;">3</button>
                                <h6 class="me-4 fweig-reg" style="font-size: 1vw;">Syarat<br>dan Ketentuan</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-3 position-absolute top-0" style="right: -15%">
                        <div class="row justify-content-center">
                            <div class="col">
                                <button type="button" class="translate-middle btn btn-sm btn-success rounded-pill border-0" style="width: 2rem; height:2rem;">4</button>
                                <h6 class="me-5 fweig-reg" style="font-size: 1vw;">Pembayaran</h6>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <button type="button" class="position-absolute top-0 translate-middle btn btn-sm btn-success rounded-pill" style="width: 2rem; height:2rem; right: 93%">1</button>
                <button type="button" class="position-absolute top-0 translate-middle btn btn-sm btn-secondary rounded-pill" style="width: 2rem; height:2rem; right: 66%">2</button>
                <button type="button" class="position-absolute top-0 translate-middle btn btn-sm btn-secondary rounded-pill" style="width: 2rem; height:2rem; right: 33%">3</button>
                <button type="button" class="position-absolute top-0 translate-middle btn btn-sm btn-secondary rounded-pill" style="width: 2rem; height:2rem; right: -3%">4</button> --}}
            </div>
        </div>
    </div>
</div>

{{-- <form action="{{ route('rent.create.checkout.post') }}" method="POST" enctype="multipart/form-data">
    @csrf --}}
    
    <div class="payment my-3 bg-white shadow-sm p-4 rounded-3" id="terms-conditions">
        <h5 class="fweig-bold fsize-7" id="step-title">Rincian Pembayaran</h5>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row">
            <div class="col-5">
                <div class="img-thumbnail border-0 my-auto text-center w-100">
                    @if ($vehicle->image)
                    <img src="{{ asset('/storage/'.$vehicle->image) }}" alt="" class="img-fluid" style="max-height: 160px">
                    @else
                    <img src="../img/no-image.png" alt="" class="img-fluid" style="max-height: 160px">
                    @endif
                </div>
            </div>
            <div class="col-7">
                <h4 class="mb-3 fweig-medium">{{ $vehicle->brand->name . " " . $vehicle->title }}</h4>
                <div class="fsize-3 my-1 fweig-semibold">Tanggal Sewa : <span class="ms-3 bg-light rounded-3 p-1 fweig-reg">{{ $start_date->toDayDateTimeString() }}</span></div>
                <div class="fsize-3 my-1 fweig-semibold">Tanggall Kembali : <span class="ms-3 bg-light rounded-3 p-1 fweig-reg">{{ $end_date->toDayDateTimeString() }}</span></div>
                <div class="fsize-3 my-1 fweig-semibold">Durasi : <span class="ms-3 bg-light rounded-3 p-1 fweig-reg">{{ $duration }} hari</span></div>
                <div class="fsize-3 my-1 fweig-semibold">Status : <span class="ms-3 fweig-reg" ><button class="border-0 rounded-3 @if ($rent->status_id == 2) btn btn-warning p-1 @endif">{{ $status->name }}</button></span> </div>
            </div>
        </div>
        <div class="totals-price">
            <div class="px-2"><hr class=""></div>
            <h6 class="font-monospace fweig-medium">Rincian Biaya</h6>
            <div class="row justify-content-center mb-4 g-0">
                <div class="col">
                    <p class="font-monospace fsize-2 m-0">Sewa {{ $vehicle->brand->name . " " . $vehicle->title }}</p>
                    <p class="font-monospace fsize-2 m-0">Biaya jasa</p>
                    <p class="font-monospace fsize-2 fweig-medium mt-3">Total</p>
                </div>
                <div class="col text-end">
                    <p class="font-monospace fsize-2 m-0">{{ number_format($rent_price) }}</p>
                    <p class="font-monospace fsize-2 m-0">{{ number_format($rent_fees) }}</p>
                    <div class="mt-1" style="border-bottom: 1px dotted; opacity: 30%"></div>
                    <p class="font-monospace fsize-2 fweig-medium mt-3 ">IDR {{ number_format($total_price) }}</p>
                </div>
            </div>
        </div>
        <div class="row">
            {{-- <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input @error('tnc') is-invalid @enderror" id="tnc" name="tnc" value="agree" required>
                <label class="form-check-label fw-medium" for="tnc">Dengan dipahaminya ketentuan ini, penyewa menyetujui seluruh <a href="terms-conditions">persyaratan dan ketentuan</a> yang berlaku. Apabila melanggar ketentuan tersebut maka pihak InstaRent berhak untuk menempuh jalur hukum sesuai dengan Undang-Undang yang berlaku </label>
                @error('tnc')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div> --}}
        </div>
       
        <div class="card-footer">
            <div class="row">
                <div class="col text-start">
                    @if ($rent->status_id == 1)
                        <form action="/cancel" method="post">
                            @csrf
                            <button class="btn btn-danger pull-right" id="cancel-rent" onclick="return confirm('apakah anda yakin ingin membatalkan penyewaan?')><i data-feather="x"></i> Batalkan</button>
                        </form>
                    @else
                        <h6 class="mt-2 fweig-reg"><i data-feather="check" class="text-success"></i> Pembayaran Berhasil Dilakukan</h6>
                    @endif

                </div>
                <div class="col text-end">
                    @if ($rent->status_id == 1)
                        <button type="button" class="btn btn-success" id="pay-button">Bayar Sekarang</button>
                    @else
                        <a href="/" class="btn btn-outline-success btn-sm">Ke Halaman Utama</a>
                        <a href="/profile" class="btn btn-success">Lihat Detail Reservasi</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
{{-- </form> --}}

@endsection

@section('scripts')
{{-- <script>
    document.getElementById('pay-button').onclick = function(){
        alert('tesss');
    };
</script> --}}
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="<Set your ClientKey here>"></script>
    <script type="text/javascript">
      document.getElementById('pay-button').onclick = function(){
        // SnapToken acquired from previous step
        snap.pay('{{ $rent->snap_token }}', {
          // Optional
          onSuccess: function(result){
            /* You may add your own js here, this is just example */ 
            window.location.href = '{{ route('rent.success') }}'
          },
          // Optional
          onPending: function(result){
            /* You may add your own js here, this is just example */ document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
          },
          // Optional
          onError: function(result){
            /* You may add your own js here, this is just example */ document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
          }
        });
      };
    </script>
@endsection