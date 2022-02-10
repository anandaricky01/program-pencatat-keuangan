<?php

use App\Models\Total;
use App\Models\Pengeluaran;

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\PengeluaranController;

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

// ketika web dilaunch pertamakali
Route::get('/', function () {
    $pengeluaran = Pengeluaran::all();
    $total = Total::all();
    return view('main', [
        'pengeluaran' => $pengeluaran,
        'total' => $total,
        'no' => 0
    ]);
});

// Route Utama
Route::resource('/index', PengeluaranController::class);

// Route uji coba
Route::get('/uang', function () {
    echo format_uang(10000);
});

Route::get('/test/{pesan}', function(Request $request){
    return view('test',[
        'test' => $request->pesan
    ]);
});
