<!doctype html>
<html lang="en">
    <head>
        <title>HRMIS</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        {{-- Bootstrap --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
        {{-- Font Awesome --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        {{-- Public assets --}}
        <link rel="stylesheet" href="{{ asset('css/nav.css') }}"></link>
        <script type="text/javascript" src="{{ asset('js/nav.js') }}"></script>
    </head>
    <script>
        $(document).ready(function () {
            $("#sidebarCollapse").on("click", function () {
                $("#sidebar").toggleClass("navbar-active");
                // $("#content").toggleClass("active");

                // Hide/show the dashboard and attendance links based on the sidebar state
                if ($("#sidebar").hasClass("navbar-active")) {
                    $("#sidebar").removeClass("col-auto h1").addClass("col-2");
                    $("#dashboardLink, #logo a, #user-info").show('slow');
                } else {
                    $("#sidebar").removeClass("col-2").addClass("col-auto h1");
                    $("#dashboardLink, #logo a, #user-info").hide('slow');
                }
            });

        });
    </script>
    <body>
        <div class="wrapper container-fluid p-0 d-flex">
            <nav id="sidebar" class="navbar-active bg-light vh-100 col-2">
                <h4 class="d-flex align-items-center justify-content-center" id="logo">
                    <a href="index.html">HSAC-HRMIS</a>
                </h4>
                <div id="user-panel" class="d-flex p-2 justify-content-center">
                    <div class="d-flex "><span class="fa-regular fa-user h1 d-inline-block mx-0"></span></div>
                    <div id="user-info" class="ms-2">
                        <span class="d-block">Mark Oliver Roman</span>
                        <span><i class="fa-solid fa-globe text-success"></i> Online</span>
                    </div>
                </div>
                <ul class="list-group mb-5 p-2">
                    <li class="list-group-item">
                        <a href="#"><span class="fa fa-gauge"></span><i id="dashboardLink"> Dashboard</i></a>
                    </li>
                    <li class="list-group-item">
                        <a data-bs-toggle="collapse" href="#records-management" role="button" aria-expanded="false" aria-controls="records-management">
                            <span class="fa-regular fa-rectangle-list"></span>
                            <span id="dashboardLink">
                                Records Management <i class="fa-solid fa-caret-down"></i>
                            </span> 
                        </a>
                        <div class="collapse" id="records-management">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <a href="#"><i class="fa-solid fa-list-check"></i><i id="dashboardLink"> My Attendance</i></a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </nav>

            <!-- Page Content  -->
            <div id="content" >

                <nav class="navbar navbar-expand navbar-light bg-secondary">
                    <div class="container-fluid d-flex">
                        {{-- sidebar fa-bars --}}
                        <button type="button" id="sidebarCollapse" class="btn btn-primary mx-0">
                            <i class="fa fa-bars"></i>
                            <span class="sr-only">Toggle Menu</span>
                        </button>
                        {{-- header fa-bars --}}
                        {{-- <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <i class="fa fa-bars"></i>
                        </button> --}}

                        <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarSupportedContent">
                            <ul class="nav navbar-nav ml-auto">
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><span class="fa fa-bell"></span> <span class="d-none d-md-inline-block">Notification</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><span class="fa fa-user"></span> <span class="d-none d-md-inline-block">User</span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <div class="p-5">
                    <h2 class="mb-4">Home</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>
            </div>
        </div>
            
    </body>
</html>
<script>

</script>