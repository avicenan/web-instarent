<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/entry.css') }}">

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,500;0,700;1,300;1,400;1,700&family=Recursive&family=Rubik:ital,wght@0,400;0,500;0,600;0,700;1,500&display=swap" rel="stylesheet">

    <title>Instarent || ...</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="banner-section col-lg-4 bg-prim position-relative" style="height: 100%">
                <div class="container p-3" style="height: 100%">
                    <div class="row">
                        <div class="col-md-12" style="z-index:3;">
                            <h1 class="fs-4 fw-semibold text-white text-center mb-3">Bersama Kendaraan Impianmu, Mulailah Berpetualang Dengan InstaRent!</h1>
                            <img class="mb-3 img-fluid my-5" src="/img/entry-hero-vehicle.png" alt="">
                            <h1 class="fs-4 fw-semibold text-white text-start mt-5">#OnTheGoWithInstaRent</h1>
                        </div>
                        <div class="col-md-12 inner-ellip position-absolute" style="width: 479px;
                            height: 485px;
                            flex-shrink: 0; border-radius: 485px;
                            background: linear-gradient(325deg, rgba(255, 213, 62, 0.50) 0.74%, rgba(82, 183, 136, 0.50) 46.34%, rgba(255, 170, 234, 0.50) 100%);
                            box-shadow: 0px 24px 96px 0px rgba(1, 11, 64, 0.12);
                            filter: blur(10px); top:25%; right:5%; z-index:2;">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 bg-white vh-100">
                <div class="container p-5">
                    <div class="row mb-5">
                        <div class="col-md-12">
                            <img src="img/instarent-logo.png" class="me-2 float-start" alt="" width="45px">
                            <h2 class="fweig-bold fs-5 mt-2 mx-3">InstaRent</h2>
                        </div>
                    </div>
                    <div class="row mb-5">
                        <div class="col-md-12">
                            @yield('form-container')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>