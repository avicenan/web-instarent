@extends('rent.layouts.main')
    
@section('rent-container')

<form action="{{ route('rent.create.step.three.post') }}" method="POST" enctype="multipart/form-data">
    @csrf

    {{-- Hidden Input --}}
    <input type="hidden" name="status_id" id="status_id" value="{{ $status_id->id }}" hidden>
    <input type="hidden" name="total_price" id="total_price" value="{{ $total_price }}" hidden>
    
    <div class="terms-conditions my-3 mt-4 bg-white shadow-sm p-5 rounded-3" id="terms-conditions">
        <h5 class="fweig-bold fsize-7" id="step-title">Syarat dan Ketentuan</h5>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row my-3">
            <div class="col">
                <h5>Peraturan</h5>
                <pre>
    1.  Memiliki KTM/KTP/SIM ( Mahasiswa Aktif ) " Alumni : Foto Ijazah, Surat Kelulusan
    2.  Syarat Konsumen Umum : Memiliki Identitas Seperti : KTP, SIM, KK, SKCK, NPWP, ID Card Perusahaan Bekerja (Wajib)
    3.  Kendaraan hanya boleh dikemudikan oleh orang yang memiliki SIM
    4.  Dilarang membawa, merusak, menghilangkan fasilitas yang ada dialam mobil seperti (Dompet Kunci, STNK, Adaptor Casan, Cable AUX, E-toll, Kunci-kunci dongkrak, dll)
    5.  Penyewa wajib lapor kepada admin Maksimal 6 Jam sebelum habis masa pakai sewa. bila ingin memperpanjang masa sewa (tidak bisa menambah durasi sewa jika sudah ada bookingan)
    6.  Denda keterlambatan pengembalian unit dikenakan cas sebesar 10% “perjamnya“ dihitung dari harga sewa per 24 jamnya.
    7.  Jarum indikator bensin kendaraan harus kembali seperti awal, atau dikenakan biaya tambahan (pengisian BBM sesuaikan dengan kebutuhan perjalanan anda)
    8.  Penyewa bertanggung jawab secara penuh mengganti kerugian akibat kehilangan, kerusakan, kelalaian, dan lain-lain, termasuk pelanggaran hukum.
    9.  Jika terjadinya accident, penyewa wajib menyelesaikan permasalahan yang ada. Dan akan dihitung sewa selama masa perbaikan berlangsung sesuai dengan harga sewa yang berlaku.
    10. Terdapat Minimal Sewa tujuan Pesisir Pantai dan Luar Pulau arah Jawa Tengah yang dapat dikonfirmasi melalui admin
                </pre>
                <h5>Ketentuan Umum</h5>
                <pre>
    1.  Cancel/Batal sewa = NO REFUND
    2.  Kendaraan tidak boleh dipindah tangankan
    3.  Cek kembali barang bawaan anda setelah selesai penyewaan dikarenakan unit kendaraan akan tersewa kembali oleh konsumen lain, Pihak Instarent tidak bertanggung jawab jika ada barang tertinggal/hilang milik penyewa.
    4.  Pihak Instarent tidak bertanggung Jawab atas segala tindakan penyewa yang melawan hukum
    5.  Wajib memvideokan Unit yang disewa saat pengambilan.
    6.  Unit Motor tidak bisa di bawa ke Luar Kota
    7.  Konsumen yang telah mengisi formulir penyewaan berarti menyetujui semua syarat dan ketentuan yang berlaku.
    8.  Apabila Rute Tidak Sesuai atau Keluar Jalur tanpa adanya konfirmasi kepada Admin, penyewa berhak dikenakan DENDA atau PENARIKAN PAKSA UNIT tersebut (Semua Biaya Operasional penarikan di tanggung penyewa secara penuh)
                </pre>
            </div>
        </div>
        <div class="row">
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input @error('tnc') is-invalid @enderror" id="tnc" name="tnc" value="agree" required>
                <label class="form-check-label fw-medium fsize-2" for="tnc">Dengan dipahaminya ketentuan ini, penyewa menyetujui seluruh <a href="terms-conditions">persyaratan dan ketentuan</a> yang berlaku. Apabila melanggar ketentuan tersebut maka pihak InstaRent berhak untuk menempuh jalur hukum sesuai dengan Undang-Undang yang berlaku </label>
                @error('tnc')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
       
        <div class="card-footer">
            <div class="row">
                <div class="col text-start">
                    <a href="{{ route('rent.create.step.two') }}" class="btn btn-danger pull-right"><i data-feather="arrow-left"></i> Kembali</a>
                </div>
                <div class="col text-end">
                    <button type="submit" class="btn btn-warning">Pembayaran <i data-feather="arrow-right"></i></button>
                </div>
            </div>
        </div>
    </div>
</form>

@endsection