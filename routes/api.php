<?php

use App\Models\Address;
use App\Services\ExternalZipSearchService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/addresses/search/{query}', function($query, ExternalZipSearchService $extZipService) {
    $result = Address::search($query)->get();
    if (count($result) == 0) {
        $result = $extZipService->search($query);
    }

    return $result;
});
