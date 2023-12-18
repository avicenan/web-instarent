@extends('rent.layouts.main')
    
@section('rent-container')

{{-- <form action="/rent" method="POST">
    <input type="text" disabled value="{{ $vehicle->title }}">
    <input type="datetime-local" disabled value="{{ $start_date }}">
    <input type="datetime-local" disabled value="{{ $end_date }}">
</form> --}}


<form action="{{ route('rent.create.step.three.post') }}" method="POST" enctype="multipart/form-data">
    @csrf
    
    <div class="personal-data my-3 mt-4 border border-1 p-3 rounded-3">
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
        <div class="row g-4 my-3">

            <div class="col">
                {{ $rent->ktp }}
            </div>
        </div>
       
        <div class="card-footer">
            <div class="row">
                <div class="col text-start">
                    <a href="{{ route('rent.create.step.two') }}" class="btn btn-danger pull-right"><i data-feather="arrow-left"></i> Kembali</a>
                </div>
                <div class="col text-end">
                    <button type="submit" class="btn btn-warning">Lanjut <i data-feather="arrow-right"></i></button>
                </div>
            </div>
        </div>
    </div>
</form>

{{ $rent }}

<img src="{{ asset('storage/'.$rent->ktp) }}" alt="">

@endsection