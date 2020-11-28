<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="LogoSneaky.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
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
            $('.toggle').on('click', function() {
                $('.menu').toggleClass('active');
            });
            $('.dropdown-trigger').dropdown(); 
            $('select').formSelect();     
        });
    </script>
</head>
<body>
    <!-- drop down content-->
    <ul id='dropdown1' class='dropdown-content'>
        <li><a href="#!">Name</a></li>
        <li><a href="#!">Price</a></li>
    </ul>
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
    <!-- isi sign up -->
    <div class="container" style="max-width: 1920px; width: 80%;">
        <div class="row">
            <div class="col s12" style="background-color: #e0e0e0;">
                <h3>Sign Up.</h3>
            </div>
        </div>
        <div class="row">
            <div class="col s12">
                PERSONAL INFORMATION
            </div>
        </div>
        <div class="row">
            <form action="/handleRegister" method="POST" class="col s12">
            @csrf
                <div class="row">
                    <div class="input-field col s6">
                      <input id="first_name" name="first_name" type="text" class="validate">
                      <label for="first_name">First Name</label>
                      <div style="color:red;">{{ $errors->first('first_name') }}</div>
                    </div>
                    <div class="input-field col s6">
                      <input id="last_name" name="last_name" type="text" class="validate">
                      <label for="last_name">Last Name</label>
                      <div style="color:red;">{{ $errors->first('last_name') }}</div>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                      <input id="username" name="username" type="text" class="validate">
                      <label for="username">Username</label>
                      <div style="color:red;">{{ $errors->first('username') }}</div>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                      <input id="password" name="password" type="password" class="validate">
                      <label for="password">Password</label>
                      <div style="color:red;">{{ $errors->first('password') }}</div>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                      <input id="email" name="email" type="email" class="validate">
                      <label for="email">Email</label>
                      <div style="color:red;">{{ $errors->first('email') }}</div>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <select name="jenis_user">
                            <option value="" disabled selected>Pilih Jenis User</option>
                            <option value="customer">Customer</option>
                            <option value="seller">Seller</option>
                        </select>
                        <label>Jenis User</label>
                        <div style="color:red;">{{ $errors->first('jenis_user') }}</div>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <select name="provinsi">
                            <option value="" disabled selected>Pilih Provinsi</option>
                            @foreach ($provinsi as $p)
                                <option value="{{$p->nama_provinsi}}">{{$p->nama_provinsi}}</option>
                            @endforeach
                        </select>
                        <label>Provinsi</label>
                        <div style="color:red;">{{ $errors->first('provinsi') }}</div>
                    </div>
                    <div class="input-field col s6">
                        <select name="kota">
                            <option value="" disabled selected>Pilih Kota</option>
                            @foreach ($kota as $k)
                                <option value="{{$k->id_kota}}">{{$k->nama_kota}}</option>
                            @endforeach
                        </select>
                        <label>Kota</label>
                        <div style="color:red;">{{ $errors->first('kota') }}</div>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                      <textarea name="alamat" id="alamat" class="materialize-textarea"></textarea>
                      <label for="alamat">Alamat</label>
                      <div style="color:red;">{{ $errors->first('alamat') }}</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col s3 offset-s10">
                        <input type="submit" class="waves-effect waves-light btn grey lighten-2" style="" value="Sign Up">
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