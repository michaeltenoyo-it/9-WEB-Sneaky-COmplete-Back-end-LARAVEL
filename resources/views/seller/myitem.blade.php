<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="LogoSneaky.png">
    <title>My Item</title>
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
            $('select').formSelect();
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
                <h3>My Item</h3>
            </div>
        </div>
        <div class="row">
            <div class="col s8 offset-s2">
                <div class="row">
                    <div class="input-field col s4">
                        <i class="material-icons prefix" style="color:#8c8c8c">search</i>
                        <input id="cari" type="text" class="validate">
                        <label for="cari" style="color:#8c8c8c">Search</label>
                    </div>
                    <div class="input-field col s4 offset-s1">
                        <select>
                            <option value="" disabled selected>Sort By</option>
                            <option value="1">Nama</option>
                            <option value="2">Harga</option>
                            <option value="3">Kategori</option>
                        </select>
                    </div>
                    <div class="input-field col s1 offset-s1">
                        <form action="/addItem">
                            <button class="waves-effect waves-light btn grey lighten-2" style="color: #02075d;font-family: 'Roboto Condensed', sans-serif;font-weight: bold;">&nbsp&nbsp&nbsp&nbsp+&nbspAdd&nbsp&nbsp&nbsp&nbsp</button>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12">
                        <table>
                            <thead style="background-color: #cfcfcf;opacity: 0.7;">
                              <tr>
                                  <th>Image</th>
                                  <th>Nama Sneaker</th>
                                  <th>Brand</th>
                                  <th>Kategori</th>
                                  <th>Harga</th>
                                  <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach($sneaker as $s)
                                    <tr>
                                        <td class="tengah"><img src="{{asset('assets/images/sneakers/'.$s->id_sneaker.'-side.jpeg')}}" alt="" width="100px" height="100px"> </td>
                                        <td class="tengah">{{$s->nama_sneaker}}</td>
                                        <td class="tengah">{{$s->brand_sneaker}}</td>
                                        <td class="tengah">
                                            @foreach($kategori as $k)
                                                @if($k->id_kategori == $s->id_kategori)
                                                    {{$k->nama_kategori}}
                                                @endif
                                            @endforeach
                                        </td>
                                        <td class="tengah">{{ 'IDR '.number_format($s->harga_sneaker, 2, ",",".") }}</td>
                                        <td class="tengah">
                                            <form action="/editItem">
                                                <input type="hidden" name="id_sneaker" value="{{$s->id_sneaker}}">
                                                <button class="waves-effect waves-light btn grey lighten-2" style="color: #02075d;font-family: 'Roboto Condensed', sans-serif;font-weight: bold;"><i class="material-icons">edit</i></button>
                                            </form>
                                            <form action="/deleteItem">
                                                <input type="hidden" name="id_sneaker" value="{{$s->id_sneaker}}">
                                                <button class="waves-effect waves-light btn grey lighten-2" style="color: #02075d;font-family: 'Roboto Condensed', sans-serif;font-weight: bold;"><i class="material-icons">delete</i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                          </table>
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