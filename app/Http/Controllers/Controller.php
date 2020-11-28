<?php

namespace App\Http\Controllers;
//MODELS
use App\Models\model_chat;
use App\Models\model_dsneaker;
use App\Models\model_dtrans;
use App\Models\model_htrans;
use App\Models\model_kategori;
use App\Models\model_kota;
use App\Models\model_post;
use App\Models\model_provinsi;
use App\Models\model_retur;
use App\Models\model_review_post;
use App\Models\model_review_sneaker;
use App\Models\model_sneaker;
use App\Models\model_user;
use App\Models\model_wishlist;
use App\Models\model_address;
//MAIL
use App\Mail\VerificationMail;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

//ADDON LIBRARY
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    
    public function goHome(Request $req)
    { 
        $data['user_logon'] = null;
        if(Session::exists('user_logon')){
            $data['user_logon'] = Session::get('user_logon');
        }
        $data["latest"] = model_sneaker::orderBy('id_sneaker','desc')->take(5)->get();
        return view('home',$data);
    }

    public function goLogin(Request $req){
        return view('login');
    }

    public function handlerLogin(Request $req){
        $req->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $username = $_POST['username'];
        $password = $_POST['password'];

        if ($username == "admin" && $password == "admin") {
            return redirect('masterUser');
        } else {
            $data['user_logon'] = model_user::where('username',$username)->first();
            if(empty($data['user_logon'])){
                return redirect('goLogin')->with('msg', 'Username not found!')
                    ->withInput();
            }else{
                if (Hash::check($password, $data['user_logon']->password)) {
                    if($data['user_logon']->status_verifikasi == 0){
                        return redirect('sendVerificationMail/'.$data["user_logon"]->email);
                    }else{
                        Session::put('user_logon', $data['user_logon']);
                        return redirect('/');
                    }
                }else{
                    return redirect('goLogin')->with('msg', 'Invalid password!')
                    ->withInput();
                }
            }
        }
    }

    public function handleAddAdress(Request $req){
        $req->validate([
            'provinsi' => 'required',
            'kota' => 'required',
            'alamat' => 'required',
            'kodepos' => 'required'
        ]);

        $provinsi = $_POST['provinsi'];
        $kota = $_POST['kota'];
        $alamat = $_POST['alamat'];
        $kodepos = $_POST['kodepos'];
        $data['user_logon'] = null;
        if(Session::exists('user_logon')){
            $data['user_logon'] = Session::get('user_logon');
        }

        $data = [
            'id_addr' => null,
            'id_user' => $data['user_logon']->id_user,
            'id_kota' => $kota,
            'nama_alamat' => $alamat,
            'kode_pos' => $kodepos
        ];
        model_address::create($data);
        return redirect('/goAdress');
    }

    public function goChat(Request $req){
        $data['user_logon'] = null;
        $data['allUser'] = model_user::get();
        $id_tujuan = null;
        if(Session::exists('user_logon')){
            $data['user_logon'] = Session::get('user_logon');
        }
        if(isset($_POST['id_tujuan'])){
            $id_tujuan = $_POST['id_tujuan'];
        }

        if($data['user_logon'] == null){
            return redirect('/goLogin');
        }else{
            $data['currChat'] = null;
            if($id_tujuan != null){
                $data['currChat'] = model_chat::where('id_user',$data['user_logon']->id_user)->orWhere('id_tujuan',$data['user_logon']->id_user)->get();
                if(count($data['currChat']) == 0){
                    $param = [
                        'id_chat' => null,
                        'id_user' => $data['user_logon']->id_user,
                        'id_tujuan' => $id_tujuan,
                        'isi_chat' => 'init',
                        'tgl_chat' => date("Y/m/d")
                    ];
                    model_chat::create($param);
                }
                $data['currChat'] = model_chat::whereRaw('(id_user = ? AND id_tujuan = ?) OR (id_user = ? AND id_tujuan = ?)',[$data['user_logon']->id_user,$id_tujuan,$id_tujuan,$data['user_logon']->id_user])->get();
            }
            $data['allChat'] = model_chat::selectRaw('case when id_user = ? then id_tujuan when id_tujuan = ? then id_user end as id_tujuan',[$data['user_logon']->id_user,$data['user_logon']->id_user])->where('id_user',$data['user_logon']->id_user)->orWhere('id_tujuan',$data['user_logon']->id_user)->distinct()->get();
            
            return view('chat',$data);
        }
    }

    public function sendChat(Request $req){
        $req->validate([
            'msg' => ['required']
        ]);
        $data['user_logon'] = null;
        if(Session::exists('user_logon')){
            $data['user_logon'] = Session::get('user_logon');
        }
        $msg = $_POST['msg'];
        $id_tujuan = $_POST['id_tujuan'];

        $param = [
            'id_chat' => null,
            'id_user' => $data['user_logon']->id_user,
            'id_tujuan' => $id_tujuan,
            'isi_chat' => $msg,
            'tgl_chat' => date("Y/m/d")
        ];
        model_chat::create($param);
    }

    public function goAdress(Request $req){
        $data['user_logon'] = null;
        $data["provinsi"] = model_provinsi::get();
        $data["kota"] = model_kota::get();
        $data["address"] = null;
        if(Session::exists('user_logon')){
            $data['user_logon'] = Session::get('user_logon');
        }
        $data["address"] = model_address::where('id_user',$data["user_logon"]->id_user)->get();

        return view('addressbook',$data);
    }

    public function goMyorder(Request $req){
        $data['user_logon'] = null;
        if(Session::exists('user_logon')){
            $data['user_logon'] = Session::get('user_logon');
        }

        $data['user'] = model_user::get();
        $data['htrans'] = model_htrans::where('id_user',$data['user_logon']->id_user)->orderBy('updated_at','desc')->get();
        $data['provinsi'] = model_provinsi::get();
        $data['kota'] = model_kota::get();
        $data['address'] = model_address::get();
        

        return view('myorder',$data);
    }

    public function detailOrderCustomer(Request $req){
        $data['user_logon'] = null;
        if(Session::exists('user_logon')){
            $data['user_logon'] = Session::get('user_logon');
        }

        $id_trans = $_GET['id_trans'];
        $data['htrans'] = model_htrans::where('id_transaksi',$id_trans)->first();
        $data['dtrans'] = model_dtrans::where('id_transaksi',$id_trans)->get();
        $data['provinsi'] = model_provinsi::get();
        $data['kota'] = model_kota::get();
        $data['address'] = model_address::get();
        $data['user'] = model_user::get();
        $data['sneaker'] = model_sneaker::get();
        $data['dsneaker'] = model_dsneaker::get();
        

        return view('detailTransaksi',$data);
    }

    public function logout(Request $req){
        Session::forget('user_logon');
        return redirect('/');
    }

    public function dpost(Request $req){
        $data['user_logon'] = null;
        if(Session::exists('user_logon')){
            $data['user_logon'] = Session::get('user_logon');
        }
        $id_post = $_POST['id_post'];

        $data['user'] = model_user::get();
        $data['post'] = model_post::where('id_post',$id_post)->first();
        $data['rpost'] = model_review_post::where('id_post',$id_post)->get();

        return view('dpost',$data);
    }

    public function handleRpost(Request $req){
        $req->validate([
            'comment' => ['required']
        ]);

        $data['user_logon'] = null;
        if(Session::exists('user_logon')){
            $data['user_logon'] = Session::get('user_logon');
        }
        $comment = $_POST['comment'];
        $thumbs = $_POST['thumbs'];
        $id_post = $_POST['id_post'];
        $post = model_post::where('id_post',$id_post)->first();
        if($thumbs == "up"){
            $thumbs = 1;
            $tht = intval($post->total_up) + 1;
            model_post::where('id_post',$id_post)->update(['total_up'=>$tht]);
        }else{
            $thumbs = 0;
            $tht = intval($post->total_down) + 1;
            model_post::where('id_post',$id_post)->update(['total_down'=>$tht]);
        }
        

        $param = [
            'id_rpost' => null,
            'id_user' => $data["user_logon"]->id_user,
            'id_post' => $id_post,
            'komentar_post' => $comment,
            'thumbs' => $thumbs,
            'status_claim' => 0,
            'rpost_up' => 0,
            'rpost_down' => 0
        ];
        model_review_post::create($param);
        $data['user'] = model_user::get();
        $data['post'] = model_post::where('id_post',$id_post)->first();
        $data['rpost'] = model_review_post::where('id_post',$id_post)->get();

        return view('dpost',$data);
    }

    public function goWishlist(Request $req){
        $data['user_logon'] = null;
        if(Session::exists('user_logon')){
            $data['user_logon'] = Session::get('user_logon');
        }
        $data["wishlist"] = model_wishlist::where('id_user',$data["user_logon"]->id_user)->select('id_dsneaker')->distinct()->get();
        $data["sneaker"] = model_sneaker::get();

        return view('wishlist',$data);
    }

    public function handlePost(Request $req){
        $judul_post = $_POST['judul_post'];
        $isi_post = $_POST['isi_post'];
        $result = "success";
        $err_judul = "";
        $err_isi = "";
        $data['user_logon'] = null;
        if(Session::exists('user_logon')){
            $data['user_logon'] = Session::get('user_logon');
        }
        $id = $data["user_logon"]->id_user;

        if($judul_post==""){
            $result = "error";
            $err_judul = "Judul harus terisi";
        }
        if($isi_post == ""){
            $result = "error";
            $err_isi = "Caption harus terisi";
        }

        if($result == "success"){
            $data = $_POST['uploadCanvas'];
            
            $param = [
                'id_post' => null,
                'id_user' => $id,
                'total_up' => 0,
                'total_down' => 0,
                'tgl_post' => date("Y/m/d"),
                'judul_post' => $judul_post,
                'caption_post' => $isi_post,
                'id_approver' => 0
            ];
            model_post::create($param);

            $curr_post = model_post::orderBy('id_post','desc')->first();
            if (preg_match('/data:image\/(gif|jpeg|png);base64,(.*)/i', $data, $matches)) {
                $imageType = $matches[1];
                $imageData = base64_decode($matches[2]);
                $image = imagecreatefromstring($imageData);
                $filename = $curr_post->id_post . '.jpeg';
                if (imagepng($image, public_path().'/assets/images/post/' . $filename)) {
                    return response()->json([
                        'success'=>$result,
                        'err_judul'=>$err_judul,
                        'err_isi'=>$err_isi
                    ]);
                }
            }
        }

        return response()->json([
            'success'=>$result,
            'err_judul'=>$err_judul,
            'err_isi'=>$err_isi
        ]);
    }

    public function goForum(Request $req){
        $data['user_logon'] = null;
        if(Session::exists('user_logon')){
            $data['user_logon'] = Session::get('user_logon');
        }
        $data['user'] = model_user::get();
        $data['post'] = model_post::orderBy('id_post','desc')->get();
        return view('post',$data);
    }

    public function goEditacc(Request $req)
    { 
        $data['user_logon'] = null;
        if(Session::exists('user_logon')){
            $data['user_logon'] = Session::get('user_logon');
        }

        return view('editacc',$data);
    }
    public function goAccdash(Request $req)
    { 
        $data['user_logon'] = null;
        if(Session::exists('user_logon')){
            $data['user_logon'] = Session::get('user_logon');
        }

        return view('accdash',$data);
    }

    public function handleEditInfo(Request $req){
        
        $req->validate([
            'nama' => ['required'],
            'email' => ['required','email']
        ]);
        $nama = $_POST['nama'];
        $email = $_POST['email'];

        $user_logon = Session::get('user_logon');
        model_user::where('id_user',$user_logon->id_user)->update([
            'nama' => $nama,
            'email' => $email
        ]);
        $user_logon = model_user::where('id_user',$user_logon->id_user)->first();
        Session::put('user_logon', $user_logon);
        return redirect('goEditacc')->with('msg', 'Account saved!')
                    ->withInput();
    }

    public function handleEditPassword(Request $req){
        $req->validate([
            'curr_password' => ['required'],
            'new_password' => ['required','min:8'],
            'confirm_password' => ['required','same:new_password']
        ]);
        $curr_password = $_POST['curr_password'];
        $new_password = $_POST['new_password'];
        $confirm_password = $_POST['confirm_password'];
        $user_logon = Session::get('user_logon');
        if(Hash::check($curr_password, $user_logon->password)){
            model_user::where('id_user',$user_logon->id_user)->update([
                'password' => Hash::make($new_password)
            ]);
            $user_logon = model_user::where('id_user',$user_logon->id_user)->first();
            Session::put('user_logon', $user_logon);
            return redirect('goEditacc')->with('msg_pass', 'Password changed!')
                    ->withInput();
        }else{
            return redirect('goEditacc')->with('msg_pass_error', 'Wrong password!')
                    ->withInput();
        }
    }

    public function q_shop(Request $req){
        $data['user_logon'] = null;
        if(Session::exists('user_logon')){
            $data['user_logon'] = Session::get('user_logon');
        }
        $query = "";
        $filter = "";

        if(isset($_GET["q"])){
            $query = $_GET["q"];
        }
        if(isset($_GET["filter"])){
            $query = $_GET["filter"];
        }

        $data["sneaker"] = model_sneaker::where('nama_sneaker','LIKE','%'.$query.'%')->get();
        $data["size"] = model_dsneaker::select('ukuran_sneaker')->distinct()->get();
        $data["brand"] = model_sneaker::select('brand_sneaker')->distinct()->take(6)->get();
        return view("shop",$data);
    }

    public function goAbout(Request $req){
        $data['user_logon'] = null;
        if(Session::exists('user_logon')){
            $data['user_logon'] = Session::get('user_logon');
        }
        return view("about",$data);
    }

    public function goContact(Request $req){
        $data['user_logon'] = null;
        if(Session::exists('user_logon')){
            $data['user_logon'] = Session::get('user_logon');
        }
        return view("contact",$data);
    }

    public function goRegister(Request $req){
        $data["provinsi"] = model_provinsi::get();
        $data["kota"] = model_kota::get();
        return view("signup",$data);
    }

    public function handleRegister(Request $req){
        $req->validate([
            'username' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'jenis_user' => 'required',
            'provinsi' => 'required',
            'kota' => 'required',
            'alamat' => 'required'
        ], [

        ]);

        $username = $_POST["username"];
        $password = $_POST["password"];
        $name = $_POST["first_name"]." ".$_POST["last_name"];
        $email = $_POST["email"];
        $jenis_user = $_POST["jenis_user"];
        $kota = $_POST["kota"];
        $alamat = $_POST["alamat"];

        if(empty(model_user::where("username", $username)->first())){
            if(empty(model_user::where("email",$email)->first())){
                $data = [
                    'id_user' => null,
                    'username' => $username,
                    'nama' => $name,
                    'email' => $email,
                    'password' => Hash::make($password),
                    'id_kota' => $kota,
                    'status_verifikasi' => 0,
                    'jenis_user' => $jenis_user,
                    'status_ban' => 0,
                    'alamat_user' => $alamat
                ];

                model_user::create($data);
                return redirect('sendVerificationMail/'.$email);
            }else{
                //error email
            }
        }else{
            //error username
        }
    }

    public function sendVerificationMail($email)
    {
        $user = model_user::where('email', $email)->first();
        Mail::to($user['email'])->send(new VerificationMail($user));
        $data["email"] = $email;
        return view('ver_email',$data);
    }

    public function verifyMail($email)
    {
        model_user::where('email', $email)
                    ->update(['status_verifikasi' => 1]);

        return redirect('/goLogin');
    }
}
