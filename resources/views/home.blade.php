@section('title', 'Home')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="">

    <link rel="icon" type="image/png" href="{{ asset('assets/images/logo.jpg') }}">

    <title>{{ config('app.name', 'Laravel') }} | @yield('title')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css?family=Averia+Serif+Libre|Open+Sans:300,400,600,700|Baloo+Thambi+2|Barlow+Semi+Condensed:ital,wght@1,100|Montserrat:wght@200;300;500;700|Poppins:wght@100;200;300;500;700|Roboto:wght@300&display=swap"
        rel="stylesheet" />
    <script src="https://kit.fontawesome.com/c23fedd423.js" crossorigin="anonymous"></script>
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

</head>

<body class="font-sans antialiased dark:bg-black dark:text-white/50">
    <div class="bg-customWhite-50 text-black/50 dark:bg-black dark:text-white/50">
        @include('layouts.navbar')

        <main class="transition-all duration-200 ease-in-out">
            <!-- Container Carousel -->
            <div class="bg-customWhite-50">
                <section class="relative min-h-screen flex items-center justify-center">
                </section>
            </div>

        </main>
        @include('layouts.footer')
</body>
<script src="https://unpkg.com/scrollreveal"></script>
<script>

    /*===== SCROLL REVEAL ANIMATION =====*/
    const sr = ScrollReveal({
        origin: 'top',
        distance: '60px',
        duration: 2000,
        delay: 200,
        //     reset: true
    });

    // sr.reveal('.about, .ket',{});
    sr.reveal('.judul1, .judul2', { delay: 400 });
    sr.reveal('.home__social-icon', { interval: 200 });
    sr.reveal('.skills__data, .work__img, .contact__input', { interval: 200 });
</script>

<!-- Script Java -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        function parallaxEffect() {
            let scrollPosition = $(window).scrollTop();
            let elementHeight = $('.parallax-section').outerHeight();
            let offset = scrollPosition / elementHeight * 0.5; // Adjust this value for different speed

            $('.parallax-section').css('background-position', `center calc(50% + ${offset}px)`);
        }

        $(window).on('scroll', parallaxEffect);
    });
</script>

</html>
