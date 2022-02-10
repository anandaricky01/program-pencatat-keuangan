<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengeluaran;

class DashboardMainController extends Controller
{
   public function index(){
         $pengeluaran = Pengeluaran::all();
         
        return view('main',[
           'pengeluaran' => $pengeluaran,
           'no' => 0
        ]);
   }
}
