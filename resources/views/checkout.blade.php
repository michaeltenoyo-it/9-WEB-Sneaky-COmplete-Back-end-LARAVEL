<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="LogoSneaky.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Shop</title>
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
    .icon-brow{
        color: #cfcfcf;
    }
    .harga-produk{
        color: #02075d;
        font-weight: bold;
        font-family: 'Roboto Condensed', sans-serif;
        font-size: 23px;
    }
    .stok-produk{
        color: #1821a1;
        font-weight: bold;
        font-family: 'Roboto Condensed', sans-serif;
    }
    .input-field input:focus{
        color: #000 !important;
    }
    .input-field input:focus {
        border-bottom: 1px solid #cfcfcf !important;
        box-shadow: 0 1px 0 0 #cfcfcf !important;
    }
    .tabs .indicator{
        background-color: #cfcfc4;
    }
    .tabs .tab a:focus, .tabs .tab a:focus.active{
        background: transparent;
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
    <!-- isi detail shop -->
    <div class="container" style="max-width: 1920px; width: 80%;">
        <form action="">
            <div class="row">
                <div class="col s12">
                    <ul class="tabs">
                        <li class="tab col s4"><a href="#info" style="color:#02075d;font-weight: bold;">Shipping Information</a></li>
                        <li class="tab col s4"><a href="#payment" style="color:#02075d;font-weight: bold;">Payment Method</a></li>
                        <li class="tab col s4"><a href="#review" style="color:#02075d;font-weight: bold;">Order Review</a></li>
                      </ul>
                </div>
                <!-- ini data database -->
                <!--Information-->
                <div id="info" class="col s12">
                    <div class="row"></div>
                    <div class="row" style="color:#02075d">
                        <div class="input-field col s12">
                            <select id="address" name="address">
                            <option value="" disabled selected>Choose your option</option>
                            <option value="new">New</option>
                            @foreach($address as $a)
                                @foreach($kota as $k)
                                    @if($k->id_kota == $a->id_kota)
                                        @foreach($provinsi as $p)
                                            @if($k->id_provinsi == $p->id_provinsi)
                                                <option value="{{$a->id_addr}}">{{$a->nama_alamat}}, {{$k->nama_kota}}, {{$p->nama_provinsi}} {{$a->kode_pos}}, Indonesia</option>
                                            @endif
                                        @endforeach
                                    @endif
                                @endforeach
                            @endforeach
                            </select>
                            <label>Pilih Alamat</label>
                        </div>
                    <div class="row" id="noAddress">
                        <div class="col s12">
                            <h3>No Address Selected...</h3>
                        </div>
                        <div class="col 12 tulisan">
                            Pilih alamat pengiriman barang atau tulis alamat baru.
                        </div>
                    </div>
                    <!--NEW ADDRESS SHOWUP-->
                    <div class="row" id="newAlamat" hidden>
                        <div class="col s12" style="border:2px solid #cfcfc4">
                        <h3>Add New Address</h3>
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
                                <div class="input-field col s6">
                                <textarea name="alamat" id="alamat" class="materialize-textarea"></textarea>
                                <label for="alamat">Alamat</label>
                                <div style="color:red;">{{ $errors->first('alamat') }}</div>
                                </div>
                                <div class="input-field col s6">
                                <textarea name="kodepos" id="kodepos" class="materialize-textarea"></textarea>
                                <label for="alamat">Kode Pos</label>
                                <div style="color:red;">{{ $errors->first('alamat') }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--SELECTED SHOWUP-->
                    <input type="hidden" name="id_selected" id="id_selected" value="">
                    <div class="row" id="addrInfo" hidden>
                        <div class="col s12">
                            <div class="col s12">
                                <h3>Address selected</h3>
                            </div>
                            <div class="col 12 tulisan">
                                Lanjutkan transaksi...
                            </div>
                        </div>
                    </div>
                </div>
                

                <!--Payment-->
                <div id="payment" class="col s12">
                payment
                </div>
                <!--Review-->
                <div id="review" class="col s12">
                review
                </div>
            </div>
            <div class="row">
                <div class="col s12 tulisan">
                    This Shipping is sponsored by
                </div>
                <div class="col s12">
                    <img src="{{asset('assets/images/jne.png')}}" alt="" width="15%">
                </div>
            </div>
        </form>
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
    <script>
        function selectSize(size){
            $('#size-pilih').text(size);
            $('#size').attr("value",size);
        }
        $("#address").on('change', function() {
            $addVal = $("#address").val();
            console.log($addVal);
            if($addVal == "new"){
                $("#newAlamat").show();
                $("#addrInfo").hide();
                $("#noAddress").hide();
                $("#id_selected").attr("value",-1);
            }else{
                $("#noAddress").hide();
                $("#newAlamat").hide();
                $("#addrInfo").show();
                $("#id_selected").attr("value",$("#address").val());
            }
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