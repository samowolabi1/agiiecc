<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Company;
use App\Models\User;
use Auth;

class AdvertController extends Controller
{
    //


    public function user_ads(){


        return view('adverts.user_ads');
        
    }


    public function new_ad(){

        $categories = Category::all();


        return view('adverts.newadd', compact('categories'));

    }

    public function store(Request $request){



        
    }
}
