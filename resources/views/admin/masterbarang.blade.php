<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="LogoSneaky.png">
    <title>Master User</title>
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
            var hitung_ctr = 0;
            $('.turun').click(function(){
                if(hitung_ctr %2 == 0){
                    $('.turun').html("- Laporan");
                    $(".disini").append("<a href='' >Laporan Post</a> <hr> <a href='' >Laporan Barang</a> <hr> <a href='' >Laporan Transaksi</a> <hr>");
                    hitung_ctr++;
                }
                else if(hitung_ctr %2 == 1){
                    $('.turun').html("+ Laporan");
                    $(".disini").html("");
                    hitung_ctr++;
                }
            });
            $('select').formSelect();
        });
    </script>
</head>
<body>
    <div class="menu">
        <button onclick="location.href='{{ url('/editSlider') }}'">EDIT</button>
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
    <!-- isi master -->
    <div class="container" style="max-width: 1920px; width: 80%;">
        <div class="row">
            <div class="col s12" style="background-color: #e0e0e0;">
                <h3>Admin Page</h3>
            </div>
        </div>
        <div class="row">
            <div class="col s3">
                <a href="/logout" class="tulisan" style="color:red;">Logout</a>
                <hr>
                <a href="/masterForum" class="tulisan">Master Forum</a>
                <hr>
                <a href="/masterRpost" class="tulisan">Master Review Forum</a>
                <hr>
                <a href="/masterUser" class="tulisan">Master User</a>
                <hr>
                <a href="/masterBarang" class="tulisan">Master Barang</a>
                <hr>
                <a href="/masterRsneaker" class="tulisan">Master Review Sneaker</a>
                <hr>
                <a href="/masterTrans" class="tulisan">Data Transaksi</a>
                <hr>
                <span class="tulisan turun">+ Laporan</span>
                <hr>
                <div class="col s12 disini">
                </div>
            </div>
            <div class="col s8 offset-s1">
                <div class="row">
                    <div class="col s12">
                        <span class="tulisan" style="font-size:24px;">
                            Master Barang
                        </span>
                        <hr>
                        <div class="row">
                            <div class="input-field col s4">
                                <i class="material-icons prefix" style="color:#8c8c8c">search</i>
                                <input id="cari" type="text" class="validate">
                                <label for="cari" style="color:#8c8c8c">Search</label>
                            </div>
                            <div class="input-field col s2 offset-s6">
                                <select>
                                    <option value="" disabled selected>Sort By</option>
                                    <option value="1">Rating</option>
                                    <option value="2">Total Pembelian</option>
                                    <option value="3">Tanggal Pembuatan</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12">
                                @foreach($sneaker as $s)
                                    <div class="row"><!-- ini nambah (copy ini)-->
                                        <div class="col s12">
                                            <div class="col s4">
                                                <img src="{{asset('assets/images/sneakers/'.$s->id_sneaker.'-side.jpeg')}}" alt="" width="100%" height="300px">
                                            </div>
                                            <div class="col s8">
                                                <div class="row">
                                                    <div class="col s12">
                                                        <span class="tulisan" style="font-size: 24px;">
                                                            {{$s->nama_sneaker}}
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col s12">
                                                        <span class="tulisan" style="color:black; font-size: 18px;">
                                                            @foreach($user as $u)
                                                                @if($u->id_user == $s->id_user)
                                                                    {{$u->nama}}
                                                                @endif
                                                            @endforeach
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col s12">
                                                        <?php
                                                            $count_beli = 0;
                                                        ?>
                                                        @foreach($dsneaker as $ds)
                                                            @if($ds->id_sneaker == $s->id_sneaker)
                                                                @foreach($dtrans as $dt)
                                                                    @if($dt->id_sneaker == $ds->id_dsneaker)
                                                                        <?php 
                                                                            $count_beli += $dt->jumlah;
                                                                        ?>
                                                                    @endif
                                                                @endforeach
                                                            @endif
                                                        @endforeach
                                                        Total Pembelian : {{$count_beli}}
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col s12">
                                                        <i class="material-icons">star</i> 0.0
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr style="width:70%; height:3px;border-radius:50%;">
                                @endforeach
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