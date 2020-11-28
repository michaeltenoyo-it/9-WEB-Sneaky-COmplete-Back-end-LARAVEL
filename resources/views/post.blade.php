<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="LogoSneaky.png">
    <title>Account Dashboard</title>
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
<body data-rsssl=1>
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
    <!-- isi post -->
    <div class="container" style="max-width: 1920px; width: 80%;">
        <div class="row">
            <div class="col s12" style="background-color: #e0e0e0;">
                <h3>SNEAKY COMMUNITY</h3>
            </div>
        </div>
        @if($user_logon->jenis_user == "customer")
                <div class="row" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                    <div class="col s12">
                        <div class="input-field col s12">
                        <div class="row">
                            <h5>Share your design!</h5>
                                <input placeholder="Placeholder" id="judul_post" type="text" class="validate" name="judul_post">
                                <label for="judul_post">Judul Post</label>
                                <div style="color:red;"><span id="err-judul"></span></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s8">
                                <!--Upload Canvas-->
                                <div class="row">
                                    <div class="col s3">
                                        <div class="row">
                                            <div class="col s12">
                                                <img onclick="ctxdef()" id="canvas-default" width="100%" height="150" src="{{asset('assets/images/canvas/canvas-default.png')}}" alt="Plimsoll images">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col s12">
                                                <img onclick="ctxathletic()" id="canvas-athletic" width="100%" height="150" src="{{asset('assets/images/canvas/canvas-athletic.png')}}" alt="Athletic images">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col s12">
                                                <img onclick="ctxhightop()" id="canvas-hightop" width="100%" height="150" src="{{asset('assets/images/canvas/canvas-hightop.png')}}" alt="Hightop images">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col s12">
                                                <img onclick="ctxown()" id="canvas-own" width="100%" height="150" src="{{asset('assets/images/SwiperFoto/null-img.jpeg')}}" alt="Upload images">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col s9">
                                        <span></span>
                                        <div id="paint" style="border:1px solid black;">
                                            <canvas id="myCanvas" style="width: 100%;height: 670px;" name="myCanvas"></canvas>
                                        </div>
                                        Main Color : 
                                        <button type="button" onclick="change('red')" style="background-color:red;width: 10px;height: 15px;"></button>
                                        <button type="button" onclick="change('orange')" style="background-color:orange;width: 10px;height: 15px;"></button>
                                        <button type="button" onclick="change('yellow')" style="background-color:yellow;width: 10px;height: 15px;"></button>
                                        <button type="button" onclick="change('lightgreen')" style="background-color:lightgreen;width: 10px;height: 15px;"></button>
                                        <button type="button" onclick="change('green')" style="background-color:green;width: 10px;height: 15px;"></button>
                                        <button type="button" onclick="change('cyan')" style="background-color:cyan;width: 10px;height: 15px;"></button>
                                        <button type="button" onclick="change('blue')" style="background-color:blue;width: 10px;height: 15px;"></button>
                                        <button type="button" onclick="change('pink')" style="background-color:pink;width: 10px;height: 15px;"></button>
                                        <button type="button" onclick="change('purple')" style="background-color:purple;width: 10px;height: 15px;"></button>
                                        <button type="button" onclick="change('brown')" style="background-color:brown;width: 10px;height: 15px;"></button>
                                        <button type="button" onclick="change('lightsalmon')" style="background-color:lightsalmon;width: 10px;height: 15px;"></button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s2 offset-s3">
                                        <input type="file" name="upload" id="upload"/>
                                    </div>
                                    <div class="col s2 offset-s3">
                                        <div id="buttons">
                                            <input type="button" id="clear" value="Clear" class="waves-effect waves-light btn grey lighten-2" style="color: #02075d;font-family: 'Roboto Condensed', sans-serif;font-weight: bold;">
                                        </div>
                                    </div>
                                    <div class="col s2">
                                        <button onclick="post()" type="button" class="waves-effect waves-light btn grey lighten-2" style="width:140px;color: #02075d;font-family: 'Roboto Condensed', sans-serif;font-weight: bold;">
                                            Post
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="col s4">
                                <textarea placeholder="Caption..." id="isi_post" class="materialize-textarea bottom" style="height: 100%;" name="isi_post"></textarea>
                                <div style="color:red;"><span id="err-isi"></span></div>
                            </div>
                        </div>
                    </div>
                </div>
        @endif
        <div class="row">
            <div class="col s6 offset-s3">
                <hr>
                @foreach($post as $p)
                    <div class="row" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                        <div class="col s12">
                            <div class="row" >
                                
                            </div>
                            <div class="row">
                                <div class="col s12" style="color:gray;font-size:100%;">
                                @foreach($user as $u)
                                    @if($u->id_user == $p->id_user)
                                        By : {{$u->nama}}
                                    @endif
                                @endforeach
                                </div>
                                <div class="col s12" style="color:gray;font-size:100%;">
                                <h3>{{$p->judul_post}}</h3>
                                </div>
                                <div class="col s12">
                                    <img src="{{asset('assets/images/post/'.$p->id_post.'.jpeg')}}" alt="image couldn't loaded" width="100%">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12">
                                    <p>{{$p->caption_post}}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col s3" style="color: green;font-size:200%;">
                                    <i class="material-icons">thumb_up</i> {{$p->total_up}}
                                </div>
                                <div class="col s3" style="color: red;font-size:200%;">
                                    <i class="material-icons">thumb_down</i> {{$p->total_down}}
                                </div>
                                <div class="col s6" style="color: black;font-size:200%;">
                                    <form action="/dpost" method="POST">
                                        @csrf
                                        <input type="hidden" name="id_post" value="{{$p->id_post}}">
                                        <button type="submit" class="waves-effect waves-light btn grey lighten-2" style="color: #02075d;font-family: 'Roboto Condensed', sans-serif;font-weight: bold;">Response Me!</button>
                                    </form>
                                </div>
                            </div>
                            <div class="row">
                                
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    @if($user_logon->jenis_user == "customer")
        <div class="container" style="border-radius:50px;position:fixed;right:0;bottom:25px;width:160px;height:80px;background-color:#02075d;padding:1%;">
            <div class="row">
                <div class="col s12">
                    <form action="/myPost" method="GET">
                        <button class="waves-effect waves-light btn grey lighten-2" style="color: #02075d;font-family: 'Roboto Condensed', sans-serif;font-weight: bold;">My Post</button>
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
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                $('#canvas-own').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#upload").change(function() {
            readURL(this);
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
    <script>
        var canvas = document.getElementById('myCanvas');
        var ctx = canvas.getContext('2d');
        
        var painting = document.getElementById('paint');
        var paint_style = getComputedStyle(painting);
        canvas.width = parseInt(paint_style.getPropertyValue('width'));
        canvas.height = parseInt(paint_style.getPropertyValue('height'));

        var mouse = {x: 0, y: 0};
        
        canvas.addEventListener('mousemove', function(e) {
        mouse.x = e.pageX - this.offsetLeft;
        mouse.y = e.pageY - this.offsetTop;
        }, false);
        
        function change(color){
            let canvas = document.getElementById('myCanvas');
            let ctx = canvas.getContext('2d');
            ctx.fillStyle = color;
            ctx.fillRect(0,0,canvas.width,canvas.height);
        }
        
        function ctxdef() {
            var c = document.getElementById("myCanvas");
            var ctx = c.getContext("2d");
            var img = document.getElementById("canvas-default");
            ctx.drawImage(img, 10, 10, canvas.width, canvas.height);
        }
        function ctxathletic() {
            var c = document.getElementById("myCanvas");
            var ctx = c.getContext("2d");
            var img = document.getElementById("canvas-athletic");
            ctx.drawImage(img, 10, 10, canvas.width, canvas.height);
        }
        function ctxhightop() {
            var c = document.getElementById("myCanvas");
            var ctx = c.getContext("2d");
            var img = document.getElementById("canvas-hightop");
            ctx.drawImage(img, 10, 10, canvas.width, canvas.height);
        }
        function ctxown() {
            var c = document.getElementById("myCanvas");
            var ctx = c.getContext("2d");
            var img = document.getElementById("canvas-own");
            ctx.drawImage(img, 10, 10, canvas.width, canvas.height);
        }

        ctx.lineWidth = 3;
        ctx.lineJoin = 'round';
        ctx.lineCap = 'round';
        ctx.strokeStyle = '#00CC99';
        
        canvas.addEventListener('mousedown', function(e) {
            ctx.beginPath();
            ctx.moveTo(mouse.x, mouse.y);
        
            canvas.addEventListener('mousemove', onPaint, false);
        }, false);
        
        canvas.addEventListener('mouseup', function() {
            canvas.removeEventListener('mousemove', onPaint, false);
        }, false);
        
        var onPaint = function() {
            ctx.lineTo(mouse.x, mouse.y);
            ctx.stroke();
        };
        document.getElementById('clear').addEventListener('click', function() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
        }, false);

        var dataURL = canvas.toDataURL();
        function post(){
            var img_canvas = new Image();
	        img_canvas.src = canvas.toDataURL("image/png");
            $.ajax({
                type: "POST",
                url: "/handlePost",
                data: { 
                    "_token": "{{ csrf_token() }}",
                    uploadCanvas: img_canvas.src,
                    judul_post: $('#judul_post').val(),
                    isi_post:$('#isi_post').val()
                },
                success:function(response){
                    if(response['success'] == "error"){
                        console.log("ERR");
                        $('#err-judul').text(response['err_judul']);
                        $('#err-isi').text(response['err_isi']);
                    }else{
                        console.log("HEMMM");
                        window.location.href = "/goForum";
                    }
                }
            });
        };
    </script>
</body>
</html>