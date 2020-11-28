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
            $("#side-img").hover(function(){
                $("#side-img").attr("style","border:3px solid #02075d;");
                $("#back-img").attr("style","border:none;");
                $("#up-img").attr("style","border:none;");
                $("#main-img").attr("src","{{asset('assets/images/sneakers/'.$sneaker->id_sneaker.'-side.jpeg')}}");

                }, function(){
            }); 
            $("#back-img").hover(function(){
                $("#side-img").attr("style","border:none;");
                $("#back-img").attr("style","border:3px solid #02075d;");
                $("#up-img").attr("style","border:none");
                $("#main-img").attr("src","{{asset('assets/images/sneakers/'.$sneaker->id_sneaker.'-back.jpeg')}}");

                }, function(){
            });
            $("#up-img").hover(function(){
                $("#side-img").attr("style","border:none;");
                $("#back-img").attr("style","border:none;");
                $("#up-img").attr("style","border:3px solid #02075d;");
                $("#main-img").attr("src","{{asset('assets/images/sneakers/'.$sneaker->id_sneaker.'-up.jpeg')}}");

                }, function(){
            }); 
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
        <div class="row">
            <div class="col s12" style="background-color: #e0e0e0;">
                <h3>{{$sneaker->nama_sneaker}}</h3>
            </div>
        </div>
        <div class="row">
            <div class="col s12 product-view">
                <div class="row">
                    <div class="col s5" style="">
                        <img id="main-img" src="{{asset('assets/images/sneakers/'.$sneaker->id_sneaker.'-side.jpeg')}}" alt="" width="100%" height="480px">
                        <div class="row">
                            <div class="col s2">
                                <img id="side-img" style="border:3px solid #02075d;" src="{{asset('assets/images/sneakers/'.$sneaker->id_sneaker.'-side.jpeg')}}" alt="" width="100%" height="100px">
                            </div>
                            <div class="col s2">
                                <img id="back-img" src="{{asset('assets/images/sneakers/'.$sneaker->id_sneaker.'-back.jpeg')}}" alt="" width="100%" height="100px">
                            </div>
                            <div class="col s2">
                                <img id="up-img" src="{{asset('assets/images/sneakers/'.$sneaker->id_sneaker.'-up.jpeg')}}" alt="" width="100%" height="100px">
                            </div>
                        </div>
                    </div>
                    <div class="col s6 offset-s1">
                        <div class="row">
                            <div class="col s6" style="margin-top: 5px;">
                                <span class="harga-produk">{{ 'IDR '.number_format($sneaker->harga_sneaker, 2, ",",".") }}</span>
                            </div>
                            <div class="col s6" style="margin-top: 10px;">
                                Avaibility : <span class="stok-produk">Available</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col 12">
                                <form action="/goChat" method="POST">
                                @csrf
                                    <div style="color:darkslategrey;">
                                        @foreach($allUser as $all)
                                            @if($all->id_user == $sneaker->id_user)
                                                By : {{$all->nama}}
                                            @endif
                                        @endforeach
                                    </div>
                                    <div>
                                        <input type="hidden" name="id_tujuan" value="{{$sneaker->id_user}}">
                                        <input type="submit" value="Chat Now" class="waves-effect waves-light btn grey lighten-2 proceed" style="margin-top: 20px;">
                                    </div>
                                </form>
                            </div>
                        </div>
                        <hr>
                        <form action="/handleCart" method="POST">
                            @csrf
                            <input type="hidden" name="id_sneaker" value="{{$sneaker->id_sneaker}}">
                            <div class="row">
                                <div class="col s12">
                                    <span class="size">
                                        SIZE: <span class="size-pilih" id="size-pilih"> * </span> <!-- ini ukuran dari kotak dibawah -->
                                    </span>
                                    <div style="color:red;">{{ $errors->first('size') }}</div>
                                    <input type="hidden" name="size" id="size">
                                </div>
                            </div>
                            <div class="row"> <!-- ini ukuran dari data base -->
                                <div class="col s6">
                                    @foreach($size as $s)
                                        <button type="button" onclick="selectSize('{{$s->ukuran_sneaker}}')" class="waves-effect waves-light btn-small grey lighten-2" style="color: black; font-weight: bold;">{{$s->ukuran_sneaker}}</button>
                                    @endforeach
                                </div>
                                <div class="col s6">
                                    <div class="input-field col s12">
                                        <select name="warna">
                                        <option value="" disabled selected>Choose your color</option>
                                        @foreach($warna as $w)
                                            <option value="{{$w->warna_sneaker}}">{{$w->warna_sneaker}}</option>
                                        @endforeach
                                        </select>
                                        <label>Color</label>
                                        
                                        <div style="color:red;">{{ $errors->first('warna') }}</div>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s4">
                                    <input name="qty" id="icon_prefix" type="number" class="validate " style="text-align: center;" min="0">
                                    <div style="color:red;">{{ $errors->first('qty') }}</div>
                                </div>
                                <div class="col s4">
                                    <button type="submit" class="waves-effect waves-light btn grey lighten-2 proceed" style="margin-top: 20px;">Add To Cart</button>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col s12" style="background-color:#cfcfcf;">
                                    <span class="tulisan" style="font-size:200%;"><i class="material-icons">directions_run</i>{{$kategori->nama_kategori}}</span>
                                </div>
                                <hr>
                                <div class="col s12" style="background-color:#02075d;color:white;">
                                    <span class="tulisan" >Brand : <div style="font-size:200%;">{{$sneaker->brand_sneaker}}</div></span><!-- image logo brand -->
                                </div>
                            </div>
                        </form>
                        <hr>
                        <div class="row">
                            <div class="col s6">
                                <a href=""><i class="fa fa-star"></i><span class="tulisan">Add To Wishlist</span></a>
                            </div>
                            <div class="col s6">
                                <span class="tulisan">Share this Product &nbsp</span><i class="fa fa-facebook"></i>&nbsp&nbsp<i class="fa fa-instagram"></i>&nbsp&nbsp<i class="fa fa-twitter"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col s8">
                    <ul class="tabs">
                        <li class="tab col s4"><a href="#test2" style="color:#02075d;font-weight: bold;">Size & Fit</a></li>
                        <li class="tab col s4"><a href="#review" style="color:#02075d;font-weight: bold;">Review</a></li>
                      </ul>
                </div>
                <!-- ini data database -->
                <div id="review" class="col s12">
                    @foreach($rsneaker as $rs)
                    <div class="row">
                        <div class="col s2">
                            @foreach($allUser as $u)
                                @if($u->id_user == $rs->id_user)
                                    {{$u->nama}}
                                @endif
                            @endforeach
                        </div>
                        <div class="col s2">
                            @if($rs->rate > -1)
                                @for ($i = 0; $i < $rs->rate; $i++)
                                    <i class="material-icons" style="color:orange;">star</i>
                                @endfor
                            @else
                                <i class="material-icons">star</i>No Rate
                            @endif
                        </div>
                        <div class="col s2">
                            {{$rs->created_at}}
                        </div>
                        <div class="col s6">
                            @if(strlen($rs->komentar_sneaker) > 0)
                                <p>{{$rs->komentar_sneaker}}</p>
                            @else
                                <p>Tidak ada komentar...</p>
                            @endif   
                        </div>
                    </div>
                    <hr>
                    @endforeach
                </div>
                <div id="test2" class="col s12">
                <div class="sizenfit">
                    <h3><b>MEN'S<br> <br> </b></h3>
                    <p><b>ADIDAS ORIGINALS</b></p>
                    <p>&nbsp;</p>
                    <div class="table-wrapper">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>
                                        <span>UK</span>
                                    </td>
                                    <td>
                                        <p>6</p>
                                    </td>
                                    <td>
                                        <p>6.5</p>
                                    </td>
                                    <td>
                                        <p>7</p>
                                    </td>
                                    <td>
                                        <p>7.5</p>
                                    </td>
                                    <td>
                                        <p>8</p>
                                    </td>
                                    <td>
                                        <p>8.5</p>
                                    </td>
                                    <td>
                                        <p>9</p>
                                    </td>
                                    <td>
                                        <p>9.5</p>
                                    </td>
                                    <td>
                                        <p>10</p>
                                    </td>
                                    <td>
                                        <p>10.5</p>
                                    </td>
                                    <td>
                                        <p>11</p>
                                    </td>
                                    <td>
                                        <p>11.5</p>
                                    </td>
                                    <td>
                                        <p>12</p>
                                    </td>
                                    <td>
                                        <p>12.5</p>
                                    </td>
                                    <td>
                                        <p>13</p>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td>
                                        <span>EUROPE</span>
                                    </td>
                                    <td>
                                        <p>39</p>
                                    </td>
                                    <td>
                                        <p>40</p>
                                    </td>
                                    <td>
                                        <p>40.5</p>
                                    </td>
                                    <td>
                                        <p>41</p>
                                    </td>
                                    <td>
                                        <p>42</p>
                                    </td>
                                    <td>
                                        <p>42.5</p>
                                    </td>
                                    <td>
                                        <p>43</p>
                                    </td>
                                    <td>
                                        <p>44</p>
                                    </td>
                                    <td>
                                        <p>44.5</p>
                                    </td>
                                    <td>
                                        <p>445</p>
                                    </td>
                                    <td>
                                        <p>46</p>
                                    </td>
                                    <td>
                                        <p>46.5</p>
                                    </td>
                                    <td>
                                        <p>47</p>
                                    </td>
                                    <td>
                                        <p>48</p>
                                    </td>
                                    <td>
                                        <p>48.5</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span>JAPAN</span>
                                    </td>
                                    <td>
                                        <p>24.5</p>
                                    </td>
                                    <td>
                                        <p>25</p>
                                    </td>
                                    <td>
                                        <p>25.5</p>
                                    </td>
                                    <td>
                                        <p>26</p>
                                    </td>
                                    <td>
                                        <p>26.5</p>
                                    </td>
                                    <td>
                                        <p>27</p>
                                    </td>
                                    <td>
                                        <p>27.5</p>
                                    </td>
                                    <td>
                                        <p>28</p>
                                    </td>
                                    <td>
                                        <p>28.5</p>
                                    </td>
                                    <td>
                                        <p>29</p>
                                    </td>
                                    <td>
                                        <p>29.5</p>
                                    </td>
                                    <td>
                                        <p>30</p>
                                    </td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <p>&nbsp;</p>
                    <p><b>NIKE</b></p>
                    <p>&nbsp;</p>
                    <div class="table-wrapper">
                        <table class="table">
                            <tbody>
                                
                                <tr>
                                    <td>
                                        <span>US</span>
                                    </td>
                                    <td>
                                        <p>6</p>
                                    </td>
                                    <td>
                                        <p>6.5</p>
                                    </td>
                                    <td>
                                        <p>7.5</p>
                                    </td>
                                    <td>
                                        <p>8</p>
                                    </td>
                                    <td>
                                        <p>8.5</p>
                                    </td>
                                    <td>
                                        <p>9</p>
                                    </td>
                                    <td>
                                        <p>9.5</p>
                                    </td>
                                    <td>
                                        <p>10</p>
                                    </td>
                                    <td>
                                        <p>10.5</p>
                                    </td>
                                    <td>
                                        <p>11</p>
                                    </td>
                                    <td>
                                        <p>11.5</p>
                                    </td>
                                    <td>
                                        <p>12</p>
                                    </td>
                                    <td>
                                        <p>12.5</p>
                                    </td>
                                    <td>
                                        <p>13</p>
                                    </td>
                                    <td>
                                        <p>13.5</p>
                                    </td>
                                    <td>
                                        <p>14</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span>EUROPE</span>
                                    </td>
                                    <td>
                                        <p>38.5</p>
                                    </td>
                                    <td>
                                        <p>39</p>
                                    </td>
                                    <td>
                                        <p>40.5</p>
                                    </td>
                                    <td>
                                        <p>41</p>
                                    </td>
                                    <td>
                                        <p>42</p>
                                    </td>
                                    <td>
                                        <p>42.5</p>
                                    </td>
                                    <td>
                                        <p>43</p>
                                    </td>
                                    <td>
                                        <p>44</p>
                                    </td>
                                    <td>
                                        <p>44.5</p>
                                    </td>
                                    <td>
                                        <p>45</p>
                                    </td>
                                    <td>
                                        <p>45.5</p>
                                    </td>
                                    <td>
                                        <p>46</p>
                                    </td>
                                    <td>
                                        <p>-</p>
                                    </td>
                                    <td>
                                        <p>47.5</p>
                                    </td>
                                    <td>
                                        <p>48</p>
                                    </td>
                                    <td>
                                        <p>48.5</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <p>&nbsp;</p>
                    <p><b>PUMA</b></p>
                    <p>&nbsp;</p>
                    <div class="table-wrapper">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>
                                        <span>UK</span>
                                    </td>
                                    <td>
                                        <p>6</p>
                                    </td>
                                    <td>
                                        <p>6.5</p>
                                    </td>
                                    <td>
                                        <p>7</p>
                                    </td>
                                    <td>
                                        <p>7.5</p>
                                    </td>
                                    <td>
                                        <p>8</p>
                                    </td>
                                    <td>
                                        <p>8.5</p>
                                    </td>
                                    <td>
                                        <p>9</p>
                                    </td>
                                    <td>
                                        <p>9.5</p>
                                    </td>
                                    <td>
                                        <p>10</p>
                                    </td>
                                    <td>
                                        <p>10.5</p>
                                    </td>
                                    <td>
                                        <p>11</p>
                                    </td>
                                    <td>
                                        <p>11.5</p>
                                    </td>
                                    <td>
                                        <p>12</p>
                                    </td>
                                    <td>
                                        <p>12.5</p>
                                    </td>
                                    <td>
                                        <p>13</p>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td>
                                        <span>EUROPE</span>
                                    </td>
                                    <td>
                                        <p>39</p>
                                    </td>
                                    <td>
                                        <p>40</p>
                                    </td>
                                    <td>
                                        <p>40.5</p>
                                    </td>
                                    <td>
                                        <p>41</p>
                                    </td>
                                    <td>
                                        <p>42</p>
                                    </td>
                                    <td>
                                        <p>42.5</p>
                                    </td>
                                    <td>
                                        <p>43</p>
                                    </td>
                                    <td>
                                        <p>44</p>
                                    </td>
                                    <td>
                                        <p>44.5</p>
                                    </td>
                                    <td>
                                        <p>45</p>
                                    </td>
                                    <td>
                                        <p>46</p>
                                    </td>
                                    <td>
                                        <p>46.5</p>
                                    </td>
                                    <td>
                                        <p>47</p>
                                    </td>
                                    <td>
                                        <p>48.5</p>
                                    </td>
                                    <td>
                                        <p>51</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span>JAPAN</span>
                                    </td>
                                    <td>
                                        <p>25</p>
                                    </td>
                                    <td>
                                        <p>25.5</p>
                                    </td>
                                    <td>
                                        <p>26</p>
                                    </td>
                                    <td>
                                        <p>26.5</p>
                                    </td>
                                    <td>
                                        <p>27</p>
                                    </td>
                                    <td>
                                        <p>27.5</p>
                                    </td>
                                    <td>
                                        <p>28</p>
                                    </td>
                                    <td>
                                        <p>28.5</p>
                                    </td>
                                    <td>
                                        <p>29</p>
                                    </td>
                                    <td>
                                        <p>29.5</p>
                                    </td>
                                    <td>
                                        <p>30</p>
                                    </td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>
                                        <p>&nbsp;</p>
                                    </td>
                                    <td>&nbsp;</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <p><b>VANS</b></p>
                    <p>&nbsp;</p>
                    <div class="table-wrapper">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>
                                    
                                        <span>US</span>
                                    </td>
                                    <td>
                                        <p>6.5</p>
                                    </td>
                                    <td>
                                        <p>7</p>
                                    </td>
                                    <td>
                                        <p>7.5</p>
                                    </td>
                                    <td>
                                        <p>8</p>
                                    </td>
                                    <td>
                                        <p>8.5</p>
                                    </td>
                                    <td>
                                        <p>9</p>
                                    </td>
                                    <td>
                                        <p>9.5</p>
                                    </td>
                                    <td>
                                        <p>10</p>
                                    </td>
                                    <td>
                                        <p>10.5</p>
                                    </td>
                                    <td>
                                        <p>11</p>
                                    </td>
                                    <td>
                                        <p>11.5</p>
                                    </td>
                                    <td>
                                        <p>12</p>
                                    </td>
                                    <td>
                                        <p>12.5</p>
                                    </td>
                                    <td>
                                        <p>13</p>
                                    </td>
                                    <td>
                                        <p>13.5</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span>EUROPE</span>
                                    </td>
                                    <td>
                                        <p>39</p>
                                    </td>
                                    <td>
                                        <p>40</p>
                                    </td>
                                    <td>
                                        <p>40.5</p>
                                    </td>
                                    <td>
                                        <p>41</p>
                                    </td>
                                    <td>
                                        <p>42</p>
                                    </td>
                                    <td>
                                        <p>42.5</p>
                                    </td>
                                    <td>
                                        <p>43</p>
                                    </td>
                                    <td>
                                        <p>44</p>
                                    </td>
                                    <td>
                                        <p>44.5</p>
                                    </td>
                                    <td>
                                        <p>445</p>
                                    </td>
                                    <td>
                                        <p>46</p>
                                    </td>
                                    <td>
                                        <p>46.5</p>
                                    </td>
                                    <td>
                                        <p>47</p>
                                    </td>
                                    <td>
                                        <p>48</p>
                                    </td>
                                    <td>
                                        <p>48.5</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span>JAPAN</span>
                                    </td>
                                    <td>
                                        <p>24.5</p>
                                    </td>
                                    <td>
                                        <p>25</p>
                                    </td>
                                    <td>
                                        <p>25.5</p>
                                    </td>
                                    <td>
                                        <p>26</p>
                                    </td>
                                    <td>
                                        <p>26.5</p>
                                    </td>
                                    <td>
                                        <p>27</p>
                                    </td>
                                    <td>
                                        <p>27.5</p>
                                    </td>
                                    <td>
                                        <p>28</p>
                                    </td>
                                    <td>
                                        <p>28.5</p>
                                    </td>
                                    <td>
                                        <p>29</p>
                                    </td>
                                    <td>
                                        <p>29.5</p>
                                    </td>
                                    <td>
                                        <p>30</p>
                                    </td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>


                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                    <h3><b>WOMEN'S<br> <br> </b></h3>
                    <p><b>ADIDAS ORIGINALS</b></p>
                    <p>&nbsp;</p>
                    <div class="table-wrapper">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>
                                        <span>UK</span>
                                    </td>
                                    <td>
                                        <p>3</p>
                                    </td>
                                    <td>
                                        <p>3.5</p>
                                    </td>
                                    <td>
                                        <p>4</p>
                                    </td>
                                    <td>
                                        <p>4.5</p>
                                    </td>
                                    <td>
                                        <p>5</p>
                                    </td>
                                    <td>
                                        <p>5.5</p>
                                    </td>
                                    <td>
                                        <p>6</p>
                                    </td>
                                    <td>
                                        <p>6.5</p>
                                    </td>
                                    <td>
                                        <p>7</p>
                                    </td>
                                    <td>
                                        <p>7.5</p>
                                    </td>
                                    <td>
                                        <p>8</p>
                                    </td>
                                    <td>
                                        <p>8.5</p>
                                    </td>
                                    <td>
                                        <p>9</p>
                                    </td>
                                    <td>
                                        <p>9.5</p>
                                    </td>
                                </tr>
                            
                                <tr>
                                    <td>
                                        <span>EUROPE</span>
                                    </td>
                                    <td>
                                        <p>35 1/3</p>
                                    </td>
                                    <td>
                                        <p>36</p>
                                    </td>
                                    <td>
                                        <p>36 2/3</p>
                                    </td>
                                    <td>
                                        <p>37 1/3</p>
                                    </td>
                                    <td>
                                        <p>38</p>
                                    </td>
                                    <td>
                                        <p>38 2/3</p>
                                    </td>
                                    <td>
                                        <p>39 1/3</p>
                                    </td>
                                    <td>
                                        <p>40</p>
                                    </td>
                                    <td>
                                        <p>40 2/3</p>
                                    </td>
                                    <td>
                                        <p>41 1/3</p>
                                    </td>
                                    <td>
                                        <p>42</p>
                                    </td>
                                    <td>
                                        <p>42 2/3</p>
                                    </td>
                                    <td>
                                        <p>43 1/3</p>
                                    </td>
                                    <td>
                                        <p>44</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span>JAPAN</span>
                                    </td>
                                    <td>
                                        <p>3</p>
                                    </td>
                                    <td>
                                        <p>3.5</p>
                                    </td>
                                    <td>
                                        <p>4</p>
                                    </td>
                                    <td>
                                        <p>4.5</p>
                                    </td>
                                    <td>
                                        <p>5</p>
                                    </td>
                                    <td>
                                        <p>5.5</p>
                                    </td>
                                    <td>
                                        <p>6</p>
                                    </td>
                                    <td>
                                        <p>6.5</p>
                                    </td>
                                    <td>
                                        <p>7</p>
                                    </td>
                                    <td>
                                        <p>7.5</p>
                                    </td>
                                    <td>
                                        <p>8</p>
                                    </td>
                                    <td>
                                        <p>8.5</p>
                                    </td>
                                    <td>
                                        <p>9</p>
                                    </td>
                                    <td>
                                        <p>9.5</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <p>&nbsp;</p>
                    <p><b>NIKE</b></p>
                    <p>&nbsp;</p>
                    <div class="table-wrapper">
                    <table class="table">
                        <tbody>
                            
                            <tr>
                                <td>
                                    <span>US</span>
                                </td>
                                <td>
                                    <p>5.5</p>
                                </td>
                                <td>
                                    <p>6</p>
                                </td>
                                <td>
                                    <p>6.5</p>
                                </td>
                                <td>
                                    <p>7</p>
                                </td>
                                <td>
                                    <p>7.5</p>
                                </td>
                                <td>
                                    <p>8</p>
                                </td>
                                <td>
                                    <p>8.5</p>
                                </td>
                                <td>
                                    <p>9</p>
                                </td>
                                <td>
                                    <p>9.5</p>
                                </td>
                                <td>
                                    <p>10</p>
                                </td>
                                <td>
                                    <p>10.5</p>
                                </td>
                                <td>
                                    <p>11</p>
                                </td>
                                <td>
                                    <p>11.5</p>
                                </td>
                                <td>
                                    <p>12</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>EUROPE</span>
                                </td>
                                <td>
                                    <p>36</p>
                                </td>
                                <td>
                                    <p>36.5</p>
                                </td>
                                <td>
                                    <p>37.5</p>
                                </td>
                                <td>
                                    <p>38</p>
                                </td>
                                <td>
                                    <p>38.5</p>
                                </td>
                                <td>
                                    <p>39</p>
                                </td>
                                <td>
                                    <p>40</p>
                                </td>
                                <td>
                                    <p>40.5</p>
                                </td>
                                <td>
                                    <p>41</p>
                                </td>
                                <td>
                                    <p>42</p>
                                </td>
                                <td>
                                    <p>42.5</p>
                                </td>
                                <td>
                                    <p>43</p>
                                </td>
                                <td>
                                    <p>44</p>
                                </td>
                                <td>
                                    <p>44.5</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    </div>
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                    <h3><b>KIDS &amp; TODDLERS<br> <br> </b></h3>
                    <p><b>ADIDAS ORIGINALS (KIDS)</b></p>
                    <p>&nbsp;</p>
                    <div class="table-wrapper">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>
                                        <span>UK</span>
                                    </td>
                                    <td>
                                        <p>1</p>
                                    </td>
                                    <td>
                                        <p>1.5</p>
                                    </td>
                                    <td>
                                        <p>2</p>
                                    </td>
                                    <td>
                                        <p>2.5</p>
                                    </td>
                                    <td>
                                        <p>3</p>
                                    </td>
                                    <td>
                                        <p>3.5</p>
                                    </td>
                                    <td>
                                        <p>4</p>
                                    </td>
                                    <td>
                                        <p>4.5</p>
                                    </td>
                                    <td>
                                        <p>5</p>
                                    </td>
                                    <td>
                                        <p>5.5</p>
                                    </td>
                                    <td>
                                        <p>6</p>
                                    </td>
                                    <td>
                                        <p>6.5</p>
                                    </td>
                                </tr>
                            
                                <tr>
                                    <td>
                                        <span>EUROPE</span>
                                    </td>
                                    <td>
                                        <p>33</p>
                                    </td>
                                    <td>
                                        <p>33.5</p>
                                    </td>
                                    <td>
                                        <p>34</p>
                                    </td>
                                    <td>
                                        <p>34.5</p>
                                    </td>
                                    <td>
                                        <p>35</p>
                                    </td>
                                    <td>
                                        <p>35.5</p>
                                    </td>
                                    <td>
                                        <p>36 2/3</p>
                                    </td>
                                    <td>
                                        <p>37 1/3</p>
                                    </td>
                                    <td>
                                        <p>38</p>
                                    </td>
                                    <td>
                                        <p>38 2/3</p>
                                    </td>
                                    <td>
                                        <p>39 1/3</p>
                                    </td>
                                    <td>
                                        <p>40</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <p>&nbsp;</p>
                    <p><b>ADIDAS ORIGINALS (TODDLERS)</b></p>
                    <p>&nbsp;</p>
                    <div class="table-wrapper">
                        <table class="table">

                            <tbody>
                                <tr>
                                    <td>
                                        <span>UK</span>
                                    </td>
                                    <td>
                                        <p>2.5</p>
                                    </td>
                                    <td>
                                        <p>3</p>
                                    </td>
                                    <td>
                                        <p>3.5</p>
                                    </td>
                                    <td>
                                        <p>4</p>
                                    </td>
                                    <td>
                                        <p>4.5</p>
                                    </td>
                                    <td>
                                        <p>5</p>
                                    </td>
                                    <td>
                                        <p>5.5</p>
                                    </td>
                                    <td>
                                        <p>6</p>
                                    </td>
                                    <td>
                                        <p>6.5</p>
                                    </td>
                                    <td>
                                        <p>7</p>
                                    </td>
                                    <td>
                                        <p>7.5</p>
                                    </td>
                                    <td>
                                        <p>8</p>
                                    </td>
                                    <td>
                                        <p>8.5</p>
                                    </td>
                                    <td>
                                        <p>9</p>
                                    </td>
                                    <td>
                                        <p>9.5</p>
                                    </td>
                                    <td>
                                        <p>10</p>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td>
                                        <span>CM</span>
                                    </td>
                                    <td>
                                        <p>10.2</p>
                                    </td>
                                    <td>
                                        <p>10.6</p>
                                    </td>
                                    <td>
                                        <p>11</p>
                                    </td>
                                    <td>
                                        <p>11.4</p>
                                    </td>
                                    <td>
                                        <p>11.8</p>
                                    </td>
                                    <td>
                                        <p>12.3</p>
                                    </td>
                                    <td>
                                        <p>12.7</p>
                                    </td>
                                    <td>
                                        <p>13.1</p>
                                    </td>
                                    <td>
                                        <p>13.5</p>
                                    </td>
                                    <td>
                                        <p>14</p>
                                    </td>
                                    <td>
                                        <p>14.4</p>
                                    </td>
                                    <td>
                                        <p>14.8</p>
                                    </td>
                                    <td>
                                        <p>15.2</p>
                                    </td>
                                    <td>
                                        <p>15.6</p>
                                    </td>
                                    <td>
                                        <p>16.1</p>
                                    </td>
                                    <td>
                                        <p>16.5</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <p>&nbsp;</p>
                    <p><b>NIKE (TODDLERS)</b></p>
                    <p>&nbsp;</p>
                    <div class="table-wrapper">
                        <table class="table">
                            <tbody>
                                
                                <tr>
                                    <td>
                                        <span>US</span>
                                    </td>
                                    <td>
                                        <p>3C</p>
                                    </td>
                                    <td>
                                        <p>3.5C</p>
                                    </td>
                                    <td>
                                        <p>4C</p>
                                    </td>
                                    <td>
                                        <p>4.5C</p>
                                    </td>
                                    <td>
                                        <p>5C</p>
                                    </td>
                                    <td>
                                        <p>5.5C</p>
                                    </td>
                                    <td>
                                        <p>6C</p>
                                    </td>
                                    <td>
                                        <p>6.5C</p>
                                    </td>
                                    <td>
                                        <p>7C</p>
                                    </td>
                                    <td>
                                        <p>7.5C</p>
                                    </td>
                                    <td>
                                        <p>8C</p>
                                    </td>
                                    <td>
                                        <p>8.5C</p>
                                    </td>
                                    <td>
                                        <p>9C</p>
                                    </td>
                                    <td>
                                        <p>9.5C</p>
                                    </td>
                                    <td>
                                        <p>10C</p>
                                    </td>
                                    <td>
                                        <p>10.5C</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span>CM</span>
                                    </td>
                                    <td>
                                        <p>10.2</p>
                                    </td>
                                    <td>
                                        <p>10.6</p>
                                    </td>
                                    <td>
                                        <p>11</p>
                                    </td>
                                    <td>
                                        <p>11.4</p>
                                    </td>
                                    <td>
                                        <p>11.8</p>
                                    </td>
                                    <td>
                                        <p>12.3</p>
                                    </td>
                                    <td>
                                        <p>12.7</p>
                                    </td>
                                    <td>
                                        <p>13.1</p>
                                    </td>
                                    <td>
                                        <p>13.5</p>
                                    </td>
                                    <td>
                                        <p>14</p>
                                    </td>
                                    <td>
                                        <p>14.4</p>
                                    </td>
                                    <td>
                                        <p>14.8</p>
                                    </td>
                                    <td>
                                        <p>15.2</p>
                                    </td>
                                    <td>
                                        <p>15.6</p>
                                    </td>
                                    <td>
                                        <p>16.1</p>
                                    </td>
                                    <td>
                                        <p>16.5</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <p>&nbsp;</p>
                    <p><b>PUMA (TODDLERS)</b></p>
                    <p>&nbsp;</p>
                    <div class="table-wrapper">
                        <table class="table">
                            <tbody>
                                
                                <tr>
                                    <td>
                                        <span>UK</span>
                                    </td>
                                    <td>
                                        <p>2</p>
                                    </td>
                                    <td>
                                        <p>3</p>
                                    </td>
                                    <td>
                                        <p>4</p>
                                    </td>
                                    <td>
                                        <p>4.5</p>
                                    </td>
                                    <td>
                                        <p>5</p>
                                    </td>
                                    <td>
                                        <p>6</p>
                                    </td>
                                    <td>
                                        <p>7</p>
                                    </td>
                                    <td>
                                        <p>8</p>
                                    </td>
                                    <td>
                                        <p>8.5</p>
                                    </td>
                                    <td>
                                        <p>9</p>
                                    </td>
                                    
                                </tr>
                                <tr>
                                    <td>
                                        <span>EUROPE</span>
                                    </td>
                                    <td>
                                        <p>18</p>
                                    </td>
                                    <td>
                                        <p>19</p>
                                    </td>
                                    <td>
                                        <p>20</p>
                                    </td>
                                    <td>
                                        <p>21</p>
                                    </td>
                                    <td>
                                        <p>22</p>
                                    </td>
                                    <td>
                                        <p>23</p>
                                    </td>
                                    <td>
                                        <p>24</p>
                                    </td>
                                    <td>
                                        <p>25</p>
                                    </td>
                                    <td>
                                        <p>26</p>
                                    </td>
                                    <td>
                                        <p>27</p>
                                    </td>
                                
                                </tr>
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
    <script>
        function selectSize(size){
            $('#size-pilih').text(size);
            $('#size').attr("value",size);
        }
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