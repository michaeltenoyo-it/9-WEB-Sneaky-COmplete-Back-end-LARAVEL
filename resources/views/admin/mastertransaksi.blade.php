<!DOCTYPE html>
<html lang="en">
<head>
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
            </div>
            <div class="col s8 offset-s1">
                <div class="row">
                    <div class="col s12">
                        <span class="tulisan" style="font-size:24px;">
                            Data Transaksi
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
                                    <option value="" disabled selected>Status Pemesanan</option>
                                    <option value="1">Option 1</option>
                                    <option value="2">Option 2</option>
                                    <option value="3">Option 3</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12">
                                <table>
                                    <thead>
                                        <tr>
                                            <th data-field="as">Id Transaksi</th>
                                            <th data-field="as">Nama Pembeli</th>
                                            <th data-field="id">Nama Seller</th>
                                            <th data-field="name">Status Pemesanan</th>
                                            <th>Tanggal Transaksi</th>
                                            <th>Total</th>
                                            <th data-field="price">ACTION</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($htrans as $h)
                                            <tr>
                                                <td class="tengah">TR{{$h->tgl_beli}}#{{$h->id_transaksi}}</td>
                                                @foreach($user as $u)
                                                    @if($u->id_user == $h->id_user)
                                                        <td class="tengah">{{$u->nama}}</td>
                                                    @elseif($u->id_user == $h->id_seller)
                                                        <td class="tengah">{{$u->nama}}</td>
                                                    @endif
                                                @endforeach
                                                @if($h->status_pengiriman == "SENDING")
                                                    <td class="tengah tulisan" style="color:red;">{{$h->status_pengiriman}}</td>
                                                @else
                                                    <td class="tengah tulisan" style="color:green;">{{$h->status_pengiriman}}</td>
                                                @endif
                                                <td class="tengah">{{$h->tgl_beli}}</td>
                                                <td class="tengah">{{ 'IDR '.number_format($h->total, 2, ",",".") }}</td>
                                                <td class="tengah">
                                                    <form action="/adminDtrans">
                                                        <button class="waves-effect waves-light btn grey lighten-2" style="color: #02075d;font-family: 'Roboto Condensed', sans-serif;font-weight: bold;">detail</button>
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