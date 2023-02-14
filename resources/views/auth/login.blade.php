<!doctype html>
<html lang="en">
    
<!-- Mirrored from olaf-admin.envytheme.com/pages/session-lock-screen-with-image by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 09 Mar 2022 13:02:03 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
        <!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Vendors Min CSS -->
<link rel="stylesheet" href="{{ asset('assets/css/vendors.min.css')}}">
<!-- Style CSS -->
<link rel="stylesheet" href="{{ asset('assets/css/style.css')}}">
<!-- Responsive CSS -->
<link rel="stylesheet" href="{{ asset('assets/css/responsive.css')}}">

<title>Gestion des salaires</title>

<link rel="icon" type="image/png" href="{{ asset('aassets/img/favicon.png')}}">
    </head>

    <body>
        <!-- Main Content Layout -->
            <!-- Start Lock Screen Area -->
    <div class="lock-screen-area bg-image">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="lock-screen-content">
                    <div class="row m-0">
                        <div class="col-lg-5 p-0">
                            <div class="image">
                                <img src="{{ asset('assets/img/computer.png')}}" alt="image">
                            </div>
                        </div>

                        <div class="col-lg-7 p-0">
                            <div class="lock-screen-form">
                                <h2>Démarrez votre session</h2>

                                <form class="text-left" method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="form-group">
                                     
                                        <input type="email" class="form-control " name="email" placeholder="Adresse e-mail" 
                                        value="{{ old('email') }}" required
                                        autocomplete="email" autofocus>
                                        <span class="label-title">
                                            <i class='bx bx-envelope'></i>
                                        </span>
                                    </div>
                                   

                                    <div class="form-group">
                                        <input type="password" class="form-control" name="password" placeholder="Mot de passe" 
                                        required autocomplete="current-password">
                                        <span class="label-title">
                                            <i class='bx bx-lock-alt'></i>
                                        </span>
                                    </div>
                                    @error('email')
                                    <span class="" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    @error('password')
                                    <span class="" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                    <button type="submit" class="lock-screen-btn">Connexion</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Lock Screen Area -->

        <!-- Footer Scripts -->
        <!-- Vendors Min JS -->
<script src="{{ asset('assets/js/vendors.min.js')}}"></script>





<!-- To use template colors with Javascript -->
<div class="chartjs-colors">
    <div class="bg-primary"></div>
    <div class="bg-primary-light"></div>
    <div class="bg-secondary"></div>
    <div class="bg-info"></div>
    <div class="bg-success"></div>
    <div class="bg-success-light"></div>
    <div class="bg-danger"></div>
    <div class="bg-warning"></div>
    <div class="bg-purple"></div>
    <div class="bg-pink"></div>
</div>

<!-- jvectormap Min JS -->
<script src="{{ asset('assets/js/jvectormap-1.2.2.min.js')}}"></script>
<!-- jvectormap World Mill JS -->
<script src="{{ asset('assets/js/jvectormap-world-mill-en.js')}}"></script>

<!-- When the url is pages/maps then load the library -->

<!-- Custom JS -->
<script src="{{ asset('assets/js/custom.js')}}"></script>
    </body>

</html>
