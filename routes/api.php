<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('tbkmk', function () {
    $data = DB::table('tbkmk')
        ->select('THSMSTBKMK', 'KDKMKTBKMK', 'NAKMKTBKMK', 'SKSMKTBKMK', 'SKSTMTBKMK', 'SKSPRTBKMK', 'SKSLPTBKMK','SEMESTBKMK', 'NODOSTBKMK')
        ->whereIn('THSMSTBKMK', ['20161', '20162'])
        ->get();

    return  new App\Responses\Tbkmk($data);
});