<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="LogoSneaky.png">
    <title>Chat</title>
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
    .icon-edit, .input-field input:focus{
        color: #000 !important;
    }
    .input-field input:focus {
        border-bottom: 1px solid #cfcfcf !important;
        box-shadow: 0 1px 0 0 #cfcfcf !important
    }
    textarea:focus{
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
                @if (empty($user_logon))
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
                @elseif($user_logon->jenis_user == "customer")
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
                @else
                    <li onclick="location.href='{{ url('') }}';">Home</li>
                    <li onclick="location.href='{{ url('goForum') }}';">Community</li>
                    <li onclick="location.href='{{ url('goChat') }}';"><i class="material-icons">chat</i>Chat</li>
                    @if (empty($user_logon))
                        <li onclick="location.href='{{ url('goLogin') }}';">Login</li>
                    @else
                        <li onclick="location.href='{{ url('goAccdash') }}';">{{$user_logon->nama}}</li>
                    @endif
                    <li onclick="location.href='{{url('myItem')}}';">My item</li>
                    <li onclick="location.href='{{url('myOrder')}}';">My Order</li>
                    <li onclick="location.href='{{url('goContact')}}';">Contact</li>
                @endif
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
    <!-- isi chat -->
    <div class="container" style="max-width: 1920px; width: 80%;">
        <div class="row">
            <div class="col s12" style="background-color: #e0e0e0;">
                <h3>Chat</h3>
            </div>
        </div>
        <div class="row">
            <div class="col s4" style="border: 2px solid rgb(156, 156, 156);">
                @foreach($allChat as $all)
                    <div class="row" style="padding-left:15px; width:100%;padding-top:12px;">
                        @foreach($allUser as $u)
                            @if($all->id_tujuan == $u->id_user)
                                @if($currChat != null)
                                    @if($u->id_user == $currChat[0]->id_tujuan || $u->id_user == $currChat[0]->id_user)
                                        <div style="color:darkblue;font-size:150%;">
                                            {{$u->nama}}
                                        </div>
                                    @else
                                        <form action="/goChat" method="POST">
                                            @csrf
                                            <input type="hidden" name="id_tujuan" value="{{$u->id_user}}">
                                            <input type="submit" value="{{$u->nama}}" style="border:none;color:black;">
                                        </form>
                                    @endif
                                @else
                                    <form action="/goChat" method="POST">
                                        @csrf
                                        <input type="hidden" name="id_tujuan" value="{{$u->id_user}}">
                                        <input type="submit" value="{{$u->nama}}" style="border:none;color:black;">
                                    </form>
                                @endif
                            @endif
                        @endforeach
                    </div>
                    <hr>
                @endforeach
            </div>
            @if($currChat == null)
            
            @else
                <div class="col s8" style="border: 2px solid rgb(156, 156, 156);">
                    @foreach($currChat as $c)
                        <div class="row" style="">
                            <!-- ini isi chat -->
                            @if($c->id_user == $user_logon->id_user)
                                <div style="margin:20px 10px;right:0;position:relative;" class="right">
                                    <div style="padding:1px 20px;background-color:lightgreen;width:400px;">
                                        <p>{{$c->isi_chat}}</p>
                                    </div>
                                    <div style="font-size:70%;color:gray;" class="right">
                                        {{$c->created_at}}
                                    </div>
                                </div>
                            @else
                                <div style="margin:20px 10px;right:0;position:relative;">
                                    <div style="padding:1px 20px;background-color:lightgray;width:400px;">
                                        <p>{{$c->isi_chat}}</p>
                                    </div>
                                    <div style="font-size:70%;color:gray;">
                                        {{$c->created_at}}
                                    </div>
                                </div>
                            @endif
                        </div>
                    @endforeach
                    <hr>
                    <div class="row">
                        <form class="col s12" action="/sendChat" method="POST">
                            @csrf
                            <div class="input-field col s10">
                                <i class="material-icons prefix icon-edit">mode_edit</i>
                                <textarea placehodler="Message here" id="icon_prefix2" class="materialize-textarea" name="msg"></textarea>
                            </div>
                            <div class="input-field col s1">
                                @if($currChat[0]->id_user==$user_logon->id_user)
                                    <input type="hidden" name="id_tujuan" value="{{$currChat[0]->id_tujuan}}">
                                @else
                                    <input type="hidden" name="id_tujuan" value="{{$currChat[0]->id_user}}">
                                @endif
                                <button class="btn waves-effect waves-light grey lighten-1" type="submit" name="action">
                                    <i class="material-icons right">send</i>
                                </button>
                            </div>
                            <div style="color:red;">{{ $errors->first('msg') }}</div>
                        </form>
                    </div>
                </div>
                
            @endif
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