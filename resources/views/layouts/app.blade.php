<!doctype html>
<html lang="en">

<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Vendors Min CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css"/>
 
    <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    
    <link rel="stylesheet" href="{{ asset('assets/css/vendors.min.css') }}">
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">



    <title>Gestion des salaires</title>

    <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png"') }}">
</head>

<body>
    <!-- Side Menu -->
    <!-- Start Sidemenu Area -->
    <div class="sidemenu-area">
        <div class="sidemenu-header">
            <a href="{{ asset('index.html') }}" class="navbar-brand d-flex align-items-center">

                <span>Gestion salaire</span>
            </a>

            <div class="burger-menu d-none d-lg-block">
                <span class="top-bar"></span>
                <span class="middle-bar"></span>
                <span class="bottom-bar"></span>
            </div>

            <div class="responsive-burger-menu d-block d-lg-none">
                <span class="top-bar"></span>
                <span class="middle-bar"></span>
                <span class="bottom-bar"></span>
            </div>
        </div>

        <div class="sidemenu-body">
            <ul class="sidemenu-nav metisMenu h-100" id="sidemenu-nav" data-simplebar>
                <li class="nav-item-title">Main</li>



                <li class="nav-item ">
                    <a href="{{ route('treatment.index') }}" class="nav-link">
                        <span class="icon"><i class='bx bx-file'></i></span>
                        <span class="menu-title">Traitement salaire</span>
                    </a>
                </li>

                <li class="nav-item ">
                    <a href="{{ route('loan.index') }}" class="nav-link">
                        <span class="icon"><i class='bx bx-receipt'></i></span>
                        <span class="menu-title">Gestion des prêts</span>
                    </a>
                </li>

{{-- 
                <li class="nav-item ">
                    <a href="{{ route('stat.index') }}" class="nav-link">
                        <span class="icon"><i class='bx bx-table'></i></span>
                        <span class="menu-title">Etat des salaires</span>
                    </a>
                </li>
 --}}

                <li class="nav-item">
                    <a href="#" class="collapsed-nav-link nav-link" aria-expanded="false">
                        <span class="icon"><i class='bx bx-badge-check'></i></span>
                        <span class="menu-title">Paramètres</span>
                    </a>

                    <ul class="sidemenu-nav-second-level">
                        <li class="nav-item ">
                            <a href="{{ route('home') }}" class="nav-link">
                                <span class="icon"><i class='bx bx-right-arrow-alt'></i></span>
                                <span class="menu-title">Salariés</span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="{{ route('countries.index') }}" class="nav-link">
                                <span class="icon"><i class='bx bx-right-arrow-alt'></i></span>
                                <span class="menu-title">Pays</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item ">

                    <a href="{{ route('logout') }}" class="nav-link">
                        <span class="icon"><i class='bx bx-log-out'></i></span>
                        <span class="menu-title">Déconnexion</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <!-- End Sidemenu Area -->

    <!-- Main Content Wrapper -->
    <div class="main-content d-flex flex-column">
        <!-- Top Navbar -->
        <!-- Top Navbar Area -->
        <nav class="navbar top-navbar navbar-expand">
            <div class="collapse navbar-collapse" id="navbarSupportContent">
                <div class="responsive-burger-menu d-block d-lg-none">
                    <span class="top-bar"></span>
                    <span class="middle-bar"></span>
                    <span class="bottom-bar"></span>
                </div>

                <ul class="navbar-nav left-nav align-items-center">


                </ul>

                <div class="nav-search-form d-none ml-auto d-md-block">

                </div>

                <ul class="navbar-nav right-nav align-items-center">
                    <li class="nav-item">
                        <a class="nav-link bx-fullscreen-btn" id="fullscreen-button">
                            <i class="bx bx-fullscreen"></i>
                        </a>
                    </li>

                    <li class="nav-item dropdown profile-nav-item">
                        <a href="#" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <div class="menu-profile">
                                <span class="name">Bonjour! {{ Auth::user()->name }}</span>
                                <img src="assets/img/user1.jpg" class="rounded-circle" alt="image">
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- End Top Navbar Area -->

        <!-- Main Content Layout -->
        <!-- Breadcrumb Area -->


        <!-- End Breadcrumb Area -->
        <div class="py-4">
            @yield('content')
        </div>

        <!-- Footer -->
        <div class="flex-grow-1"></div>

        <!-- Start Footer -->
        <footer class="footer-area">
            <div class="row align-items-center">
                <div class="col-lg-6 col-sm-6 col-md-6">
                    <p>Copyright <i class='bx bx-copyright'></i> {{ date('Y') }}<a href="#"></a>. All rights
                        reserved</p>
                </div>


            </div>
        </footer>
        <!-- End Footer -->
    </div>
    <!-- End Main Content Wrapper -->
   
    <!-- Footer Scripts -->
    <!-- Vendors Min JS -->
    <script >
      $(document).ready( function () {
         $('#myTable').DataTable();
        } )
    </script>
    <script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="../assets/js/vendors.min.js"></script>


    <!-- ChartJS -->
    <script src="../assets/js/chartjs/chartjs.min.js"></script>
    
    <!-- When the url is charts/chartjs then load the library -->



    <!-- jvectormap Min JS -->
    <script src="{{ asset('assets/js/jvectormap-1.2.2.min.js') }}"></script>
    <!-- jvectormap World Mill JS -->
    <script src="{{ asset('assets/js/jvectormap-world-mill-en.js') }}"></script>

    <!-- When the url is pages/maps then load the library -->

    <!-- Custom JS -->
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    
    <script>
        $(document).ready(function() {


            $("#treatmentForm").submit(function(event) {
                event.preventDefault();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "POST",
                    url: $("#treatmentForm").attr('action'),
                    data: {
                        '_token': '{{ csrf_token() }}',
                        'matricule': $('#matricule').val(),
                        'date': $('#date').val(),
                        'pay': $('#pay').val()
                    },
                    success: function(response) {
                        if (response == "succès") {
                            location.reload();
                        }
                    }
                });
            });


            $('body').on('change', '#agent', function() {
                $.ajax({
                    type: 'POST',
                    url: '/employee-info',
                    data: {
                        '_token': '{{ csrf_token() }}',
                        'employe': $(this).val()
                    },
                    success: function(response) {

                        if (response) {

                            $('#cardInfo').show();
                            $('#tableTraitement').hide();
                            $('#recherche').hide();
                            $('#name').val(response.info['name']);
                            $('#matricule').val(response.info['matricule']);
                            $('#account').val(response.info['account']);
                            $('#salary').val(response.info['salary']);
                            $('#sex').val(response.info['sex']);
                            $('#country').val(response.info['country']['name']);
                            $('#montantPret').val(response.montantTotal);
                            $('#reste').val(response.reste);

                            if (response.montantTotal != 0) {
                                $('#apayer').show();
                            } else {
                                $('#apayer').hide();
                            }
                        }
                    }
                });

            });
            $('body').on('click', '#edition', function() {
                $('#name').val($(this).attr('data-name'));
                document.forms.save.action = '/countries/' + $(this).attr('data-id') + '/edit';
            });

            $('body').on('click', '#delete', function() {
                document.forms.deleteform.action = '/countries/' + $(this).attr('data-id') + '/delete';
            });

            $('body').on('click', '#editionEmploye', function() {

                $('#name').val($(this).attr('data-name'));
                $('#matricule').val($(this).attr('data-matricule'));
                $('#account').val($(this).attr('data-account'));
                $('#salary').val($(this).attr('data-salary'));
                $('#sex').val($(this).attr('data-sex')).trigger('change');
                $('#country').val($(this).attr('data-country')).trigger('change');

                document.forms.save.action = '/employees/' + $(this).attr('data-id') + '/edit';
            });

            $('body').on('click', '#deleteEmploye', function() {
                document.forms.deleteform.action = '/employees/' + $(this).attr('data-id') + '/delete';
            });
        });
    </script>
   
</body>

</html>
