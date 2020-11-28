<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Prototyping
Route::get('/p_addressbook', 'PrototypeCtr@tryAddressbook');
Route::get('/p_cart', 'PrototypeCtr@tryCart');
Route::get('/p_chat', 'PrototypeCtr@tryChat');
Route::get('/p_accdash', 'PrototypeCtr@tryAccdash');
Route::get('/p_detailshop', 'PrototypeCtr@tryDetailshop');
Route::get('/p_dhistory', 'PrototypeCtr@tryDhistory');
Route::get('/p_dpost', 'PrototypeCtr@tryDpost');
Route::get('/p_editacc', 'PrototypeCtr@tryEditAcc');
Route::get('/p_editpost', 'PrototypeCtr@');
Route::get('/p_forum', 'PrototypeCtr@tryForum');
Route::get('/p_home', 'PrototypeCtr@tryHome');
Route::get('/p_login', 'PrototypeCtr@tryLogin');
Route::get('/p_mypost', 'PrototypeCtr@tryMypost');
Route::get('/p_orderhistory', 'PrototypeCtr@tryMyorder');
Route::get('/p_payment', 'PrototypeCtr@tryPayment');
Route::get('/p_post', 'PrototypeCtr@tryPost');
Route::get('/p_retur', 'PrototypeCtr@tryRetur');
Route::get('/p_reviewcart', 'PrototypeCtr@tryReviewcart');
Route::get('/p_shippinginfo', 'PrototypeCtr@tryShippinginfo');
Route::get('/p_shippingmethod', 'PrototypeCtr@tryShippingmethod');
Route::get('/p_shop', 'PrototypeCtr@tryShop');
Route::get('/p_signup', 'PrototypeCtr@trySignup');
Route::get('/p_ver_signup', 'PrototypeCtr@tryVer_signup');
Route::get('/p_wishlist', 'PrototypeCtr@tryWishlist');

//PROJECT
//all
Route::get('/','Controller@goHome');
Route::get('/goLogin','Controller@goLogin');
Route::post('/handleLogin','Controller@handlerLogin');
Route::get('/goEditacc','Controller@goEditacc');
Route::get('/goAccdash','Controller@goAccdash');
Route::post('/handleEditInfo','Controller@handleEditInfo');
Route::post('/handleEditPassword','Controller@handleEditPassword');
Route::get('/q_shop','Controller@q_shop');
Route::get('/search','Controller@q_shop');
Route::get('/goRegister','Controller@goRegister');
Route::post('/handleRegister','Controller@handleRegister');
Route::get('/ver_alert','Controller@verificationAlert');
Route::get('/sendVerificationMail/{email}','Controller@sendVerificationMail');
Route::get('/verifyMail/{email}','Controller@verifyMail');
Route::get('/goAbout','Controller@goAbout');
Route::get('/goContact','Controller@goContact');
Route::get('/goAdress','Controller@goAdress');
Route::get('/goMyorder','Controller@goMyorder');
Route::get('/goWishlist','Controller@goWishlist');
Route::get('/logout','Controller@logout');
Route::post('/handleAddAdress','Controller@handleAddAdress');
Route::get('/goChat','Controller@goChat');
Route::post('/goChat','Controller@goChat');
Route::post('/sendChat','Controller@sendChat');
Route::get('/goForum','Controller@goForum');
Route::post('/dpost','Controller@dpost');
Route::post('/handleRpost','Controller@handleRpost');
Route::post('/handlePost','Controller@handlePost');
Route::get('/detailOrderCustomer','Controller@detailOrderCustomer');
//customer
Route::post('/handleBarang','CustCtr@handleBarang');
Route::get('/detailSneaker/{id_sneaker}','CustCtr@detailSneaker');
Route::post('/handleCart','CustCtr@handleCart');
Route::get('/clearCart','CustCtr@clearCart');
Route::get('/goCart','CustCtr@goCart');
Route::get('/goCheckout','CustCtr@goCheckout');
Route::get('/myCart/{msg}','CustCtr@myCart');
Route::get('/myPost','CustCtr@myPost');
Route::get('/editPost','CustCtr@editPost');
Route::post('/saveEpost','CustCtr@saveEpost');
Route::post('/konfirmasiBayar','CustCtr@konfirmasiBayar');
Route::post('/konfirmasiPenerimaan','CustCtr@konfirmasiPenerimaan');
//admin
Route::get('/masterUser','AdminCtr@masterUser');
Route::get('/masterBarang','AdminCtr@masterBarang');
Route::get('/masterForum','AdminCtr@masterForum');
Route::get('/masterTrans','AdminCtr@masterTrans');
Route::get('/editSlider','AdminCtr@editSlider');
Route::get('/masterRpost','AdminCtr@masterRpost');
Route::get('/masterRsneaker','AdminCtr@masterRsneaker');
//seller
Route::get('/myItem','SellerCtr@myItem');
Route::get('/addItem','SellerCtr@addItem');
Route::post('/handleNewItem','SellerCtr@handleNewItem');
Route::get('/editItem','SellerCtr@editItem');
Route::post('/handleEditItem','SellerCtr@handleEditItem');
Route::get('/deleteItem','SellerCtr@deleteItem');
Route::post('/addDsneaker','SellerCtr@addDsneaker');
Route::post('/deleteDsneaker','SellerCtr@deleteDsneaker');
Route::get('/myOrderAdmin','SellerCtr@myOrderAdmin');
Route::get('/detailOrderSeller','SellerCtr@detailOrderSeller');
Route::post('/sellerKonfirmasiPengiriman','SellerCtr@konfirmasiPengiriman');