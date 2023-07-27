<!DOCTYPE html>
<html lang="en">

<head>
    <title>Warehouse &mdash; Details</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="Free-Template.co" />

    <link rel="shortcut icon" href="ftco-32x32.png">

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,900|Oswald:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="fonts\icomoon\style.css">

    <link rel="stylesheet" href="{{ asset('material') }}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('material') }}/css/jquery-ui.css">
    <link rel="stylesheet" href="{{ asset('material') }}/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ asset('material') }}/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="{{ asset('material') }}/css/owl.theme.default.min.css">

    <link rel="stylesheet" href="{{ asset('material') }}/css/jquery.fancybox.min.css">

    <link rel="stylesheet" href="{{ asset('material') }}/css/bootstrap-datepicker.css">

    <link rel="stylesheet" href="{{ asset('material') }}/fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="{{ asset('material') }}/css/aos.css">

    <link rel="stylesheet" href="{{ asset('material') }}/css/style.css">

</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

    <div class="site-wrap">

        <div class="site-mobile-menu site-navbar-target">
            <div class="site-mobile-menu-header">
                <div class="site-mobile-menu-close mt-3">
                    <span class="icon-close2 js-menu-toggle"></span>
                </div>
            </div>
            <div class="site-mobile-menu-body"></div>
        </div>


        <header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">

            <div class="container">
                <div class="row align-items-center">

                    <div class="col-6 col-xl-2">
                        <h1 class="mb-0 site-logo m-0 p-0"><a href="index.html" class="mb-0">Warehouse</a></h1>
                    </div>

                    <div class="col-12 col-md-10 d-none d-xl-block">
                        <nav class="site-navigation position-relative text-right" role="navigation">

                            <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                                <li><a href="#home-section" class="nav-link">Home</a></li>
                                <li><a href="#listings-section" class="nav-link active">Products</a></li>
                                <li><a href="#about-section" class="nav-link">About</a></li>
                            </ul>
                        </nav>
                    </div>


                    <div class="col-6 d-inline-block d-xl-none ml-md-0 py-3"><a href="#"
                            class="site-menu-toggle js-menu-toggle text-white float-right"><span
                                class="icon-menu h3"></span></a></div>

                </div>
            </div>

        </header>


        <div class="site-section" id="listings-section">

            <div class="site-section" id="properties-section">
                <div class="container">
                    <div class="row mb-5 align-items-center">
                        <div class="col-md-7 text-left">
                            <h2 class="section-title mb-3">Product Details</h2>
                        </div>
                    </div>

                    <form method="post" action="{{ route('admin.order.store') }}" class="form-horizontal">
                        @csrf
                        @method('put')


                        <div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <label>{{ __('Enter Your Name') }}</label>
                                    </div>
                                    <div class="col-sm-3 ">
                                        <input type="text" name="customer_name" id="customer_name" required=true>
                                    </div>
                                </div>
                                <br>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class=" text-primary">
                                            <th>
                                                Name
                                            </th>
                                            <th>
                                                Model
                                            </th>
                                            <th>
                                                Description
                                            </th>
                                            <th>
                                                Unit Price
                                            </th>
                                            <th>
                                                Quantity
                                            </th>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    {{ $product->value('name') }}
                                                </td>
                                                <td>
                                                    {{ $product->value('model') }}
                                                </td>
                                                <td>
                                                    {{ $product->value('description') }}
                                                </td>
                                                <td>
                                                    {{ $product->value('price') }} $
                                                </td>
                                                <td>
                                                    {{ $product->value('quantity') }}
                                                </td>

                                            </tr>

                                        </tbody>
                                    </table>

                                </div>
                                <div class="row">
                                    <div class="col-sm-2">
                                        <label>{{ __('Enter quantity') }}</label>

                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" name="quantity" id="quantity" required=true>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="p_serial_number"
                                value="{{ $product->value('p_serial_number') }}" />
                            <div class="card-footer ml-auto mr-auto text-center">
                                <button type="submit" class="btn btn-primary">{{ __('purchase') }}</button>
                            </div>
                        </div>
                    </form>


                </div>
            </div>


            <footer class="site-footer" id='about-section'>
                <div class="container">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-5">
                                    <h2 class="footer-heading mb-4">About Us</h2>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque facere laudantium
                                        magnam voluptatum autem. Amet aliquid nesciunt veritatis aliquam.</p>
                                </div>
                                <div class="col-md-3 mx-auto">
                                    <h2 class="footer-heading mb-4">Quick Links</h2>
                                    <ul class="list-unstyled">
                                        <li><a href="#">About Us</a></li>
                                        <li><a href="#">Services</a></li>
                                        <li><a href="#">Testimonials</a></li>
                                        <li><a href="#">Contact Us</a></li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-4">
                                <h2 class="footer-heading mb-4">Subscribe Newsletter</h2>
                                <form action="#" method="post" class="footer-subscribe">
                                    @csrf
                                    <div class="input-group mb-3">
                                        <input type="text"
                                            class="form-control border-secondary text-white bg-transparent"
                                            placeholder="Enter Email" aria-label="Enter Email"
                                            aria-describedby="button-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary text-black" type="button"
                                                id="button-addon2">Send</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="">
                                <h2 class="footer-heading mb-4">Follow Us</h2>
                                <a href="#" class="pl-0 pr-3"><span class="icon-facebook"></span></a>
                                <a href="#" class="pl-3 pr-3"><span class="icon-twitter"></span></a>
                                <a href="#" class="pl-3 pr-3"><span class="icon-instagram"></span></a>
                                <a href="#" class="pl-3 pr-3"><span class="icon-linkedin"></span></a>
                            </div>


                        </div>
                    </div>
                    <div class="row pt-5 mt-5 text-center">
                        <div class="col-md-12">
                            <div class="border-top pt-5">
                                <!-- Link back to Free-Template.co can't be removed. Template is licensed under CC BY 3.0. -->
                                <p class="copyright"><small>&copy;
                                        <script>
                                            document.write(new Date().getFullYear());
                                        </script> Warehouse. All Rights Reserved. Design by <a
                                            href="https://free-template.co" target="_blank">Free-Template.co</a>
                                    </small></p>
                            </div>
                        </div>

                    </div>
                </div>
            </footer>

        </div> <!-- .site-wrap -->

        <a href="#top" class="gototop"><span class="icon-angle-double-up"></span></a>

        <script src="{{ asset('material') }}/js/jquery-3.3.1.min.js"></script>
        <script src="{{ asset('material') }}/js/jquery-ui.js"></script>
        <script src="{{ asset('material') }}/js/popper.min.js"></script>
        <script src="{{ asset('material') }}/js/bootstrap.min.js"></script>
        <script src="{{ asset('material') }}/js/owl.carousel.min.js"></script>
        <script src="{{ asset('material') }}/js/jquery.countdown.min.js"></script>
        <script src="{{ asset('material') }}/js/bootstrap-datepicker.min.js"></script>
        <script src="{{ asset('material') }}/js/jquery.easing.1.3.js"></script>
        <script src="{{ asset('material') }}/js/aos.js"></script>
        <script src="{{ asset('material') }}/js/jquery.fancybox.min.js"></script>
        <script src="{{ asset('material') }}/js/jquery.sticky.js"></script>


        <script src="{{ asset('material') }}/js/main.js"></script>

</body>

</html>
