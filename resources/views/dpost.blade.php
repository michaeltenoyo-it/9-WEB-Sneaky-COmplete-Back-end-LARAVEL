<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="LogoSneaky.png">
    <title>Detail Post</title>
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
    <!-- isi dpost -->
    <div class="container" style="max-width: 1920px; width: 80%;">
        <div class="row">
            <div class="col s12" style="background-color: #e0e0e0;">
                <h3>{{$post->judul_post}}</h3>
            </div>
        </div>
        <div class="row">
            <div class="col s8 offset-s2">
                <div class="row" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                    <div class="col s12">
                        <div class="row" >
                            
                        </div>
                        <div class="row">
                            <div class="col s12" style="color:gray;font-size:100%;">
                            @foreach($user as $u)
                                @if($u->id_user == $post->id_user)
                                    By : {{$u->nama}}
                                @endif
                            @endforeach
                            </div>
                            <div class="col s12">
                                <img src="{{asset('assets/images/post/'.$post->id_post.'.jpeg')}}" alt="image couldn't loaded" width="100%">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12">
                                <p>{{$post->caption_post}}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col s3" style="color: green;font-size:200%;">
                                <i class="material-icons">thumb_up</i> {{$post->total_up}}
                            </div>
                            <div class="col s3" style="color: red;font-size:200%;">
                                <i class="material-icons">thumb_down</i> {{$post->total_down}}
                            </div>
                        </div>
                        <div class="row">
                            
                        </div>
                        @foreach($rpost as $rv)
                            <div class="row">
                                @if($rv->thumbs == 1)
                                    <div class="col s1" style="color: green;">
                                        <i class="material-icons">thumb_up</i>
                                    </div>
                                @else
                                    <div class="col s1" style="color: red;">
                                        <i class="material-icons">thumb_down</i>
                                    </div>
                                @endif
                                <div class="col s2 tulisan" style="color:black;">
                                    @foreach($user as $u)
                                        @if($u->id_user == $rv->id_user)
                                            {{$u->nama}}
                                        @endif
                                    @endforeach
                                </div>
                                <div class="col s8">
                                    {{$rv->komentar_post}}
                                </div>
                            </div>
                        @endforeach

                        <form class="col s12" method="post" action="/handleRpost">
                            @csrf
                            <input type="hidden" name="id_post" value="{{$post->id_post}}">
                            <div class="input-field col s6">
                                <i class="material-icons prefix icon-edit">mode_edit</i>
                                <textarea name="comment" placehodler="Message here" id="icon_prefix2" class="materialize-textarea"></textarea>
                            </div>
                            <div class="input-field col s4">
                            <select name="thumbs">
                                <option value="up">UP</option>
                                <option value="down">DOWN</option>
                            </select>
                            <label>Thumbs</label>
                            </div>
                            <div class="input-field col s1">
                                <button class="btn waves-effect waves-light grey lighten-1" type="submit" name="action">
                                    <i class="material-icons right">send</i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if($user_logon->jenis_user == "seller")
        <div class="container" style="border-radius:50px;position:fixed;right:0;bottom:25px;width:220px;height:80px;background-color:#02075d;padding:1%;">
            <div class="row">
                <div class="col s12">
                    <form action="/approve" method="GET">
                        <button class="waves-effect waves-light btn grey lighten-2" style="color: #02075d;font-family: 'Roboto Condensed', sans-serif;font-weight: bold;">Approve Design!</button>
                    </form>
                </div>
            </div>
        </div>
    @endif
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
        $(document).ready(function(){
            $('select').formSelect();
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