<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="LogoSneaky.png">
    <title>Edit Account</title>
    <!-- materialize -->
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/css/materialize.min.css') }}"  media="screen,projection"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <!-- swiper  -->
    <link rel="stylesheet" href="{{asset('assets/css/swiper.min.css')}}">
    <!-- navbar -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/navbar.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/footer.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/swiper.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/cart.css')}}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="https://kit.fontawesome.com/c39198c184.js" crossorigin="anonymous"></script>
    <style>
    .swiper-container {
        width: 98%;
        height: 25%;
    }
    .tulisan{
        color: grey;
        font-family: 'Roboto Condensed', sans-serif;
    }
    </style>
    <script>
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
            $('.tabs').tabs();      
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
    <!-- isi dash -->
    <div class="container" style="max-width: 1920px; width: 80%;">
        <div class="row">
            <div class="col s12" style="background-color: #e0e0e0;">
                <h3>Edit Account</h3>
            </div>
        </div>
        <div class="row">
            <div class="col s3">
                <a href="/goAccdash" class="tulisan">Account Dashboard</a>
                <hr>
                <a href="/goEditacc" class="tulisan">Edit Account</a>
                <hr>
                <a href="/goAdress" class="tulisan">Address Book</a>
                <hr>
                <a href="/goMyorder" class="tulisan">My Orders</a>
                <hr>
                <a href="/goWishlist" class="tulisan">My Wishlist</a>
                <hr>
                <a href="/logout" class="tulisan" style="color:red;">Logout</a>
                <hr>
            </div>
           
                <div class="col s8 offset-s1">
                <form action="{{url('/handleEditInfo')}}" method="post">
                @csrf
                    
                    <div class="row">
                        @if (Session::has('msg'))
                            <div class="col s12" style="background-color: lightgreen; border-left: 5px solid green; margin-top: 20px; padding: 10px;">
                                <div class="font" style="font-size: 12pt;">
                                    {{ Session::get('msg') }}
                                </div>
                            </div>
                        @endif
                        <div class="col s12" style="border: 2px solid #cfcfc4;">
                            <span class="tulisan" style="font-size:20px;">
                                Account Information
                            </span>
                            <hr>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input name="nama" type="text" class="validate" value="{{$user_logon->nama}}">
                                    <label for="first_name" style="color:#8c8c8c">Full Name</label>
                                    <div style="color:red;">{{ $errors->first('name') }}</div>
                                </div>
                                <div class="input-field col s12">
                                    <input name="email" type="email" class="validate" value="{{$user_logon->email}}">
                                    <label for="email" style="color:#8c8c8c">Email</label>
                                    <div style="color:red;">{{ $errors->first('email') }}</div>
                                </div>
                            </div>
                            <input type="submit" class="waves-effect waves-light btn grey lighten-2" style="margin:10px;float:right;" value="Save">
                        </div>
                    </div>
                </form>
                <form action="{{url('/handleEditPassword')}}" method="post">
                @csrf
                    <div class="row">
                        @if (Session::has('msg_pass_error'))
                            <div class="col s12" style="background-color: #FAEBE7; border-left: 5px solid #DF280A; margin-top: 20px; padding: 10px;">
                                <div class="font" style="font-size: 12pt;">
                                    {{ Session::get('msg_pass_error') }}
                                </div>
                            </div>
                        @endif
                        @if (Session::has('msg_pass'))
                            <div class="col s12" style="background-color: lightgreen; border-left: 5px solid green; margin-top: 20px; padding: 10px;">
                                <div class="font" style="font-size: 12pt;">
                                    {{ Session::get('msg_pass') }}
                                </div>
                            </div>
                        @endif
                        <div class="col s12" style="border: 2px solid #cfcfc4;">
                            <span class="tulisan" style="font-size:20px;">
                                Change Password
                            </span>
                            <hr>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input name="curr_password" type="password" class="validate">
                                    <label for="first_name" style="color:#8c8c8c">Current Password</label>
                                    <div style="color:red;">{{ $errors->first('curr_password') }}</div>
                                </div>
                                <div class="input-field col s6">
                                    <input name="new_password" type="password" class="validate">
                                    <label for="last_name" style="color:#8c8c8c">New Password</label>
                                    <div style="color:red;">{{ $errors->first('new_password') }}</div>
                                </div>
                                <div class="input-field col s6">
                                    <input name="confirm_password" type="password" class="validate">
                                    <label for="last_name" style="color:#8c8c8c">Confirm Password</label>
                                    <div style="color:red;">{{ $errors->first('confirm_password') }}</div>
                                </div>
                            </div>
                            <input type="submit" class="waves-effect waves-light btn grey lighten-2" style="margin:10px;float:right;" value="Save">
                        </div>
                    </div>
                </div>
                </form>
            
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
    <script>
        $('.toggle').on('click', function() {
            $('.menu').toggleClass('active');
        });
    </script>
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