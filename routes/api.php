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
        ->whereIn('THSMSTBKMK', ['20152', '20161', '20162'])
        ->get();

    return  new App\Responses\Tbkmk($data);
});

Route::get('msmhs', function () {
    $data = DB::table('msmhs')
        ->whereIn('SMAWLMSMHS', ['20152', '20161'])
        ->orderBy('NIMHSMSMHS')
        ->get();

    return  new App\Responses\Msmhs($data);
});

Route::get('rtrnlm/{periode}', function () {
    $data = [];
    if (request('periode')) {
        $data = DB::table('rtrnlm')
            ->where('THSMSTRNLM', request('periode'))
            ->get();
    }

    return  new App\Responses\Rtrnlm($data);
});