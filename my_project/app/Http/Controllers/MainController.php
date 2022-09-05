<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactModel;

class MainController extends Controller
{
    public function home()
    {
        return view('welcome');
    }
    public function search_request(Request $request)
    {
        $valid = $request->validate([
            'search' => 'required|min:3']);


    }
    public function search()
    {
        return view('search');
    }
    public function download()
    {

        return view('download');
    }


}
