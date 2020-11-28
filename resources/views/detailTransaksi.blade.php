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
            $('.modal').modal();
            $('.tabs').tabs();

            @if($htrans->status_pengiriman != "BAYAR" && $htrans->status_pengiriman != "DIKEMAS")
                $.ajax({
                    url : "http://api.shipping.esoftplay.com/waybill/{{$htrans->resi}}/jne",
                    method : "get",
                    success : function(data){
                        console.log(data);
                        data.result.manifest.forEach(element => {
                            $('#lacak').append("<div style='color:gray;margin:10px;font-size:100%;'><i class='material-icons'>mail</i>"+element.manifest_date+"|"+element.manifest_description+"</div>");
                        });
                    }
                });
            @endif
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
                <h3>Detail Orders</h3>
            </div>
        </div>
        <div class="row">
            <div class="col s6 offset-s3" style="border: 2px solid #cfcfcf;">
                <div class="row">
                    <div class="col s12" style="margin-top: 10px;">
                        <span class="tulisan" style="font-size: 22px;">No Transaksi &nbsp&nbsp&nbsp&nbsp&nbsp: </span> <span style="font-size: 18px;"> TR{{$htrans->tgl_beli}}#{{$htrans->id_transaksi}} </span>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12">
                        <span class="tulisan" style="font-size: 22px;"> Nama Pembeli &nbsp&nbsp&nbsp: </span> <span style="font-size: 18px;"> 
                        @foreach($user as $u)
                            @if($u->id_user == $htrans->id_user)
                                {{$u->nama}}
                            @endif
                        @endforeach
                        </span>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12">
                        <span class="tulisan" style="font-size: 22px;">Alamat Kirim &nbsp&nbsp&nbsp&nbsp&nbsp: </span> <span style="font-size: 18px;">
                            @foreach($address as $a)
                                @if($a->id_addr == $htrans->id_addr)
                                    @foreach($kota as $k)
                                        @if($k->id_kota == $a->id_kota)
                                            @foreach($provinsi as $p)
                                                @if($k->id_provinsi == $p->id_provinsi)
                                                    <p>{{$a->nama_alamat}}, {{$k->nama_kota}}, {{$p->nama_provinsi}} {{$a->kode_pos}}, Indonesia</p>
                                                @endif
                                            @endforeach
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach
                        </span> <br>
                        <hr>
                    </div>
                    <div class="col s12">
                        <table>
                        <thead>
                            <tr>
                                <th data-field="id">Product</th>
                                <th data-field="name">Price</th>
                                <th data-field="price">QTY</th>
                                <th data-field="price">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($dtrans as $c)
                                <tr>
                                    <td>
                                        <div class="col s2">
                                            @foreach($dsneaker as $ds)
                                                @if($ds->id_dsneaker == $c->id_dsneaker)
                                                    @foreach($sneaker as $s)
                                                        @if($s->id_sneaker == $ds->id_sneaker)
                                                            <img src="{{asset('assets/images/sneakers/'.$s->id_sneaker.'-side.jpeg')}}" width="100%" height="60px" alt="data Foto">
                                                        @endif
                                                    @endforeach
                                                @endif
                                            @endforeach
                                        </div>
                                        <div class="col s8">
                                            <div class="row">
                                                <div class="col s12">
                                                    @foreach($dsneaker as $ds)
                                                        @if($ds->id_dsneaker == $c->id_dsneaker)
                                                            @foreach($sneaker as $s)
                                                                @if($s->id_sneaker == $ds->id_sneaker)
                                                                    {{$s->nama_sneaker}}
                                                                @endif
                                                            @endforeach
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col s6 tebal">
                                                    @foreach($dsneaker as $ds)
                                                        @if($ds->id_dsneaker == $c->id_dsneaker)
                                                            Size : {{$ds->ukuran_sneaker}}
                                                        @endif
                                                    @endforeach
                                                </div>
                                                <div class="col s6 tebal">
                                                    @foreach($dsneaker as $ds)
                                                        @if($ds->id_dsneaker == $c->id_dsneaker)
                                                            @if($ds->warna_sneaker == "White")
                                                                <div style="color:{{$ds->warna_sneaker}};text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;">{{$ds->warna_sneaker}}</div>
                                                            @else
                                                                <div style="color:{{$ds->warna_sneaker}};text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;">{{$ds->warna_sneaker}}</div>
                                                            @endif
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="tengah">
                                        @foreach($dsneaker as $ds)
                                            @if($ds->id_dsneaker == $c->id_dsneaker)
                                                @foreach($sneaker as $s)
                                                    @if($s->id_sneaker == $ds->id_sneaker)
                                                        {{ 'IDR '.number_format($s->harga_sneaker, 2, ",",".") }}
                                                    @endif
                                                @endforeach
                                            @endif
                                        @endforeach
                                    </td>
                                    <td class="angka tengah">
                                        {{$c->jumlah}}
                                    </td>
                                    <td class="tengah">
                                        {{ 'IDR '.number_format($c->subtotal, 2, ",",".") }}
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="tengah">{{ 'IDR '.number_format($htrans->total, 2, ",",".") }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 tengah">
                        <span class="tulisan" style="font-size: 24px;">
                            Detail Pengiriman
                        </span>
                    </div>
                </div>
                @if($htrans->status_pengiriman == "BAYAR")
                    <form action="/konfirmasiBayar" method="POST" enctype="multipart/form-data">
                    @csrf
                        <input type="hidden" name="id_trans" value="{{$htrans->id_transaksi}}">
                        <div class="row">
                            <div class="col s12 tengah">
                                <a class="waves-effect waves-light btn pink darken-1 modal-trigger" href="#konfirmasi-kirim">Konfirmasi Pembayaran</a>
                                <div id="konfirmasi-kirim" class="modal" style="height: 900px;">
                                    <div class="modal-content">
                                        <h4>Konfirmasi Pembayaran</h4>
                                    </div>
                                    <div class="modal-footer">
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <input name="referensi" placeholder="Masukan nomor referensi yang tertera pada bukti transfer BCA | contoh: Stefano Calvin" id="first_name" type="text" class="validate">
                                                <label for="first_name">Nomor Referensi</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="file-field input-field col s12">
                                                <div class="btn">
                                                    <span>Bukti Transfer</span>
                                                    <input name="img-bukti" type="file" id="bukti-resi">
                                                </div>
                                                <div class="file-path-wrapper">
                                                    <input class="file-path validate" type="text">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col s12">
                                                <img src="{{asset('assets/images/SwiperFoto/contoh-bukti.jpeg')}}" alt="" width="100%">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col s2 offset-s10">
                                                <button class="waves-effect waves-red btn red lighten-1" style="right:0;bottom:0;">Save</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>   
                            </div>
                        </div>
                    </form>
                    <div class="row">
                        <div class="col s12 tulisan tengah" style="font-size:150%; font-weight: bold; color:red;">
                            Menunggu konfirmasi pembayaran
                        </div>
                        <div class="col s12 tulisan tengah" style="font-size:150%; font-weight: bold; color:orange;">
                            No. Rekening BCA : 507 8101 299
                        </div>
                        <div class="col s12 tulisan tengah" style="font-size:150%; font-weight: bold; color:orange;">
                            Jumlah yang harus dibayarkan : {{ 'IDR '.number_format($htrans->total, 2, ",",".") }}
                        </div>
                    </div>
                @elseif($htrans->status_pengiriman == "DIKEMAS")
                    <div class="row">
                        <div class="col s12 tulisan tengah" style="font-size:150%; font-weight: bold; color:red;">
                            Menunggu konfirmasi pengiriman barang oleh penjual
                        </div>
                    </div>
                @else
                    <div class="row">
                        <div class="col s12">
                            <div class="row">
                                <div class="col s12" id="lacak"><!--DISINI BUAT TRACKING JNT-->

                                </div>
                            </div>
                        </div>
                    </div>
                    @if($htrans->status_pengiriman == "DONE")
                        <div class="row">
                            <div class="col s12 tulisan tengah" style="font-size:150%; font-weight: bold; color:green;">
                                Pesanan sudah dikonfirmasi
                            </div>
                        </div>
                    @else
                        <div class="row">
                            <div class="col s12 tulisan tengah" style="font-size:150%; font-weight: bold; color:red;">
                                Menunggu konfirmasi penerimaan barang oleh penerima
                            </div>
                        </div>
                        <form action="/konfirmasiPenerimaan" method="POST" enctype="multipart/form-data">
                        @csrf
                            <input type="hidden" name="id_trans" value="{{$htrans->id_transaksi}}">
                            <div class="row">
                                <div class="col s12 tengah">
                                    <a class="waves-effect waves-light btn pink darken-1 modal-trigger" href="#konfirmasi-kirim">Pesanan Diterima</a>
                                    <div id="konfirmasi-kirim" class="modal" style="height: 500px;">
                                        <div class="modal-content">
                                            <h4>Konfirmasi Penerimaan Barang</h4>
                                        </div>
                                        <?php $ctr = 0;?>
                                        @foreach($dtrans as $d)
                                            @foreach($dsneaker as $ds)
                                                @if($d->id_dsneaker == $ds->id_dsneaker)
                                                    @foreach($sneaker as $s)
                                                        @if($ds->id_sneaker == $s->id_sneaker)
                                                        <h5>{{$s->nama_sneaker}}</h5>
                                                        <input type="hidden" name="id_sneaker-{{$ctr}}" value="{{$s->id_sneaker}}">
                                                        <div class="file-field input-field col s12">
                                                            <div class="btn">
                                                                <span>Foto Penerimaan Barang</span>
                                                                <input name="img-terima-{{$ctr}}" type="file" id="terima">
                                                            </div>
                                                            <div class="file-path-wrapper">
                                                                <input class="file-path validate" type="text">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="input-field col s1" >
                                                                Rate : <input name="rate-{{$ctr}}" id="icon_prefix" type="number" class="validate" style="text-align: center;" min="0" max="5">
                                                            </div>
                                                            <div class="col s2">
                                                                <img src="{{asset('assets/images/sneakers/'.$s->id_sneaker.'-side.jpeg')}}" width="50%" height="100px">
                                                            </div>
                                                            <div class="col s9">
                                                                <textarea placeholder="Komentar Review..." id="komentar" class="materialize-textarea bottom" style="height: 100%;" name="komentar-{{$ctr}}"></textarea>
                                                                <div style="color:red;"><span id="err-isi"></span></div>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            @endforeach
                                            <?php $ctr++?>
                                        @endforeach
                                        
                                        <input type="hidden" name="ctr" value="{{$ctr}}">
                                        <div class="modal-footer">
                                            <div class="row">
                                                <div class="col s2 offset-s10">
                                                    <button class="waves-effect waves-red btn red lighten-1" style="right:0;bottom:0;">Konfirmasi</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>   
                                </div>
                            </div>
                        </form>
                        <form action="/ajukanPengembalian" method="POST" enctype="multipart/form-data">
                        @csrf
                            <input type="hidden" name="id_trans" value="{{$htrans->id_transaksi}}">
                            <div class="row">
                                <div class="col s12 tengah">
                                    <a class="waves-effect waves-light btn pink darken-1 modal-trigger" href="#kembali">Ajukan Pengembalian</a>
                                    <div id="kembali" class="modal" style="height: 500px;">
                                        <div class="modal-content">
                                            <h4>Pengajuan Pengembalian Barang</h4>
                                        </div>
                                        <div class="modal-footer">
                                            <div class="row">
                                                <div class="col s2 offset-s10">
                                                    <button class="waves-effect waves-red btn red lighten-1" style="right:0;bottom:0;">Ajukan</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>   
                                </div>
                            </div>
                        </form>
                    @endif
                @endif
                    
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