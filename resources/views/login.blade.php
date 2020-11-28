<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="LogoSneaky.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- materialize -->
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/css/materialize.min.css') }}"  media="screen,projection"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <!-- swiper  -->
    <link rel="stylesheet" href="{{asset('assets/css/swiper.min.css')}}">
    <!-- navbar -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/navbar.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/footer.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/swiper.css')}}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="https://kit.fontawesome.com/c39198c184.js" crossorigin="anonymous"></script>
    <style>
    .swiper-container {
        width: 98%;
        height: 25%;
    }
    .icon-brow{
        color: #cfcfcf;
    }
    i, .input-field input:focus{
    color: #000 !important;
    }
    .input-field input:focus {
        border-bottom: 1px solid #cfcfcf !important;
        box-shadow: 0 1px 0 0 #cfcfcf !important
    }

    input[type=submit]{
        color: #02075d;
        font-family: 'Roboto Condensed', sans-serif;
        font-weight: bold;
    }
    </style><script>
        $(document).ready(function(){
            $('a[href="#search"]').on('click', function(event) {                    
                $('#search').addClass('open');
                $('#search > form > input[type="search"]').focus();
            });            
            $('#search, #search button.close').on('click keyup', function(event) {
                if (event.target == this || event.target.className == 'close' || event.keyCode == 27) {
                    $(this).removeClass('open');
                }
            });      
            $('.toggle').on('click', function() {
                $('.menu').toggleClass('active');
            });      
        });
    </script>
</head>
<body>
    <div id="search"> 
        <form role="search" id="searchform" action="/search" method="get">
            <input value="" name="q" type="search" placeholder="Type to search"/>
        </form>
    </div>
    <div class='menu'>
        <span class='toggle'>
            <i></i>
            <i></i>
            <i></i>
        </span>
        <div class='menuContent'>
            <ul>
                <li onclick="location.href='{{ url('') }}';">Home</li>
                <li><a href="#search" style="text-decoration: none; color: black;">Search</a></li>
                <li onclick="location.href='{{ url('goForum') }}';">Community</li>
                @if (empty($user_logon))
                    <li onclick="location.href='{{ url('goLogin') }}';">Login</li>
                @else
                    <li onclick="location.href='{{ url('goAccdash') }}';">{{$user_logon->nama}}</li>
                @endif
                <li onclick="location.href='{{ url('goChat') }}';"><i class="material-icons">chat</i>Chat</li>
                <li onclick="location.href='{{url('goCart')}}';">Cart</li>
                <li onclick="location.href='{{url('goContact')}}';">Contact</li>
            </ul>
        </div>
    </div>
    <div class="swiper-container swiper1">
        <div class="swiper-wrapper">
            <div class="swiper-slide" style="background-image:url({{asset('assets/images/SwiperFoto/1.jpeg')}})"></div>
            <div class="swiper-slide" style="background-image:url({{asset('assets/images/SwiperFoto/2.jpeg')}})"></div>
            <div class="swiper-slide" style="background-image:url({{asset('assets/images/SwiperFoto/3.jpeg')}})"></div>
            <div class="swiper-slide" style="background-image:url({{asset('assets/images/SwiperFoto/4.jpeg')}})"></div>
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination swiper-pagination-white"></div>
        <!-- Add Arrows -->
        <div class="swiper-button-next swiper-button"></div>
        <div class="swiper-button-prev swiper-button"></div>
    </div>
    <!-- isi login -->
    <div class="container" style="max-width: 1920px; width: 80%;">
        <div class="row">
            <div class="col s12" style="background-color: #e0e0e0;">
                <h3>Login or Sign Up.</h3>
            </div>
        </div>
        <div class="row">
            <!-- login -->
            <form action="{{url('/handleLogin')}}" method="POST">
                @csrf
                <div class="col s6">
                    <div class="content">
                        <div class="judul">
                            <h5 style="font-family: 'Roboto Condensed', sans-serif;font-weight: bold;">Login</h5>
                        </div>
                        <div class="loginForm">
                        @if (Session::has('msg'))
                            <div class="col s12" style="background-color: #FAEBE7; border-left: 5px solid #DF280A; margin-top: 20px; padding: 10px;">
                                <div class="font" style="font-size: 12pt;">
                                    {{ Session::get('msg') }}
                                </div>
                            </div>
                        @endif
                            <div class="row">
                                <div class="input-field col s8">
                                    <i class="material-icons prefix">account_circle</i>
                                    <label for="first_name">User Name</label>
                                    <input name="username" type="text" class="validate">
                                    <div style="color:red;">{{ $errors->first('username') }}</div>
                                </div>
                                <div class="input-field col s8">
                                    <i class="material-icons prefix">vpn_key</i>
                                    <label for="last_name">Password</label>
                                    <input name="password" type="password" class="validate">
                                    <div style="color:red;">{{ $errors->first('password') }}</div>
                                </div>
                            </div>
                            <div class="col s3 offset-s3">
                                <input type="submit" class="waves-effect waves-light btn grey lighten-2" style="" value="login">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            
            <!-- sign up -->
            <div class="col s6">
                <div class="content">
                    <div class="judul">
                        <h5 style="font-family: 'Roboto Condensed', sans-serif;font-weight: bold;">New User</h5>
                    </div>
                    <div class="desc" style="margin-top:10px;">
                        REGISTER NOW ! IT'S FREE
                    </div>
                    <ul>
                    <li><h4>Customer</h4></li>
                    <li>Order your favorite sneakers</li>
                    <li>Get along with our community</li>
                    <li>Create your own design</li>
                    <li><h4>Seller</h4></li>
                    <li>Become our partner</li>
                    <li>Open your own shop for 24 hours</li>
                    <li>500.000 customers are coming everyday</li>
                    </ul>
                    <div class="row">
                        <div class="col s6">
                            <a href="{{ url('/goRegister') }}" class="waves-effect waves-light btn grey lighten-2" style="color: #02075d;font-family: 'Roboto Condensed', sans-serif;font-weight: bold;">REGISTER NOW</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- dibawah ini footer -->
    <footer>
        <div class="container">
            <div class="footer">
                <div class="row">
                    <div class="col s3">
                        <img src="{{asset('assets/images/LogoSneaky.png')}}" alt="logo" srcset="">
                    </div>
                    <div class="col s3 offset-s1 kaki1">
                        <ul>
                            <li><a href="">About Us</a></li>
                            <li><a href="">Privacy Policy</a></li>
                            <li><a href="">Terms & Condition</a></li>
                            <li><a href="">FAQ</a></li>
                            <li><a href="">Contact Us</a></li>
                        </ul>
                    </div>
                    <div class="col s4 offset-s1 kaki2">
                        <h4 style="font-family: 'Roboto Condensed', sans-serif;">FOLLOW US.</h3>
                        <ul>
                            <li><a href=""><i class="fab fa-facebook-f fa-3x"></i><span style="margin-left:25px;"> SneakyIndonesia </span></a></li>
                            <li><a href=""><i class="fab fa-twitter fa-3x"></i><span style="margin-left:6px;"> @SneakyIndones </span></a></li>
                            <li><a href=""><i class="fab fa-instagram fa-3x" aria-hidden="true"></i><span style="margin-left:11px;"> Sneaky_Indonesia </span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container">
                <div class="row">
                    <p class="copyright col s12">© 2020 Sneaky . All Rights Reserved.</p>
                </div>
            </div>
        </div>
    </footer>
    <script type="text/javascript" src="{{asset('assets/js/swiper.min.js')}}"></script>
    <script>
        var swiper = new Swiper('.swiper1', {
        spaceBetween: 30,
        centeredSlides: true,
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        });
    </script>
    
</body>
</html>