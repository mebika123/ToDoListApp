<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    @stack('style')
    <title>ToDoList</title>
</head>

<body>
    <div class="d-flex">
        <section class="sidebar">
            <aside class="position-fixed">
                <div class="menu p-3">
                    <div class="d-flex justify-content-between align-items-center pt-4">
                        <a href="#" class="text-light fw-semibold fs-4 text-toggle">ToDoList</a>
                        <i class="fa-solid fa-bars text-light fa-lg" id="toggle-bar"></i>
                    </div>
                    <div class="menu-content pt-4">
                        <ul class="menu-list ps-0 d-flex flex-column gap-2">
                            <li class="menu-item mb-4">
                                <a href="{{ route('dashboard') }}" class="menu-btn text-light">
                                    <div class="d-flex gap-3 align-items-center">
                                        <i class="fa-solid fa-border-all fa-lg"></i>
                                        <span class="f-14 fw-medium text-toggle">Dashboard</span>
                                    </div>
                                </a>
                            </li>
                            <li class="menu-item mb-4">
                                <a href="{{ route('task.index') }}" class="menu-btn text-light">
                                    <div class="d-flex gap-3 align-items-center">
                                        <i class="fa-solid fa-list-check fa-lg"></i>
                                        <span class="f-14 fw-medium text-toggle">Tasks</span>
                                    </div>
                                </a>
                            </li>
                            <li class="menu-item mb-4">
                                <a href="{{ route('category.index') }}" class="menu-btn text-light">
                                    <div class="d-flex gap-3 align-items-center">
                                        <i class="fa-solid fa-icons fa-lg"></i>
                                        <span class="f-14 fw-medium text-toggle">Categories</span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </aside>
        </section>
        <section class="section-right flex-grow-1">
            <div class="container">
            <header>
                    <div class="d-flex justify-content-between align-items-center pt-4 px-2 ">
                        <div class="search-content d-flex align-items-center gap-3">
                            
                            {{-- <a href="" class="fw-semibold fs-4 color-purple">ToDoList</a>
                            <div class="search-bar position-relative">
                                <form action="">
                                    <input type="text" placeholder="Search here" class="search-input py-1 px-2">
                                </form>
                                <div class="search-icon position-absolute top-50 translate-middle">
                                    <i class="fa-solid fa-magnifying-glass color-purple"></i>
                                </div>
                            </div> --}}
                        </div>
                        <div class="user-info d-flex align-items-center gap-3">
                            <span class="d-none d-lg-inline-flex">{{ Auth::user()->name }}</span>
                            <form method="POST" action="{{ route('logout') }}" id="logout-form">
                                @csrf
                            <button class="btn btn-primary">Log Out</button>
                            </form>
                        </div>
                    </div>
            </header>
            <section class="main-section">

                <div class="mt-5">
                    @yield('content')                    
                </div>
            </section>
        </div>
        </section>
    </div>



    <script src="{{ asset('js/main.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous">
    </script>
    @stack('script')
    <script>
       $(document).ready(function () {
    $('#toggle-bar').on('click', function () {
        $('.sidebar').toggleClass('collapsed');
        $('aside').toggleClass('collapsed');
        $('#toggle-bar').toggleClass('ps-3');
        $('.text-toggle').toggleClass('d-none');
        $('.menu-item .d-flex').toggleClass('justify-content-center');
    });
});
    </script>
</body>

</html>
