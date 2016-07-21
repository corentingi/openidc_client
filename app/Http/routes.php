<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', function () {
    $oidc = new OpenIDConnectClient(
        env('OPENID_PROVIDER'),
        env('OPENID_CLIENT_ID'),
        env('OPENID_CLIENT_SECRET'));

    $oidc->setRedirectURL('http://localhost:32769/login');
    // $oidc->addScope(['local', 'groups']);
    $oidc->authenticate();

    dd( $oidc->getAccessTokenPayload() );
});
