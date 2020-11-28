<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="LogoSneaky.png">
    <title>Account Dashboard</title>
    <!-- materialize -->
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/materialize.min.css')}}"  media="screen,projection"/>
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
    .input-field input:focus {
        border-bottom: 1px solid #cfcfcf !important;
        box-shadow: 0 1px 0 0 #cfcfcf !important
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
                <h3>Account Dashboard</h3>
            </div>
        </div>
        <div class="row">
            <div class="col s3">
                @if($user_logon->jenis_user == "customer")
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
                @else
                    <a href="/goAccdash" class="tulisan">Account Dashboard</a>
                    <hr>
                    <a href="/goEditacc" class="tulisan">Edit Account</a>
                    <hr>
                    <a href="/logout" class="tulisan" style="color:red;">Logout</a>
                    <hr>
                @endif
                
            </div>
            <div class="col s8 offset-s1">
                <div class="row">
                    <div class="col s12">
                        Hi <span class="nama-cust">{{$user_logon->nama}}!</span> &nbsp&nbsp<b>Thanks for joining Sneaky</b>
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12">
                        <span class="tulisan" style="color:black; font-size:200%;">NEW ORDERS</span>&nbsp&nbsp<a href="" class="tulisan">VIEW ALL</a>
                    </div>
                </div>
                @if(empty($order))
                    <h5>No Order</h5>
                @else
                    <div class="row">
                        <div class="col s12">
                            <table>
                                <thead style="background-color: #cfcfcf;opacity: 0.7;">
                                <tr>
                                    <th>Name</th>
                                    <th>Item Name</th>
                                    <th>Item Price</th>
                                </tr>
                                </thead>
                        
                                <tbody>
                                
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endif
                <div class="row">
                    <div class="col s12">
                        <div class="row">
                            <span class="tulisan" style="font-size:24px;">Account Information</span>
                        </div>
                        <div class="row">
                            <div class="col s12" style="border: 2px solid #cfcfc4; padding:20px;">
                                <span class="tulisan" style="font-size:20px;">
                                    Contact Information
                                </span>
                                <a href="{{url('/goEditacc')}}"><i class="material-icons right">create</i></a>
                                <hr>
                                {{$user_logon->nama}}
                                <br>
                                {{$user_logon->email}}
                                <br>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12" style="border: 2px solid #cfcfc4;padding:20px;">
                                <span class="tulisan" style="font-size:20px;">
                                    Address Information
                                </span>
                                <a href=""><i class="material-icons right">create</i></a>
                                <hr>
                                <div class="row">
                                    <div class="col s12">
                                        <span class="tulisan" style="font-size:17px;">
                                            Shipping Address
                                        </span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s12">
                                        <h5>{{$user_logon->alamat_user}}</h5>
                                    </div>
                                </div>
                            </div>
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
                            <li><a href=""><i class="fab fa-twitter fa-3x"></i><span style="margin-left:6px;"> @SneakyIndonesia </span></a></li>
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