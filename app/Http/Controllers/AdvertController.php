<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Company;
use App\Models\User;
use App\Models\Color;
use App\Models\Size;
use App\Models\Type;
use App\Models\Sevicetype;
use App\Models\Ridetype;
use App\Models\Cartype;
use App\Models\Carbrand;
use App\Models\State;
use Auth;
use Illuminate\Support\Facades\Session;

class AdvertController extends Controller
{
    //


    public function user_ads(){

        $categories = Category::all();

        return view('adverts.user_ads', compact('categories'));
        
    }


    public function new_ad(){

        $categories = Category::all();


        return view('adverts.newadvert', compact('categories'));

    }

    public function store(Request $request){

        //return 
        $this->validate($request, [

                'category_id' => 'required',
                ]);

        $catId = $request->category_id;

        if ($catId == 1) {
                // code...

                $color = Color::all();
                $size = Size::all();
                $type = Type::all();

                $category = Category::find($request->category_id);

                Session::put('category_id', $request->input('category_id'));
                Session::put('category_name', $category->name);

                //$SessioncatId = Session::get('category_id');

            return view('product.newproduct1', compact('size','color','type'));


        }else if ($catId == 2) {
                
                $servicetypes = Sevicetype::all();

                $category = Category::find($request->category_id);

                Session::put('category_id', $request->input('category_id'));
                Session::put('category_name', $category->name);

            return view('service.newservice1', compact('servicetypes'));



        }else if ($catId == 3) {
                
                $ridetypes = Ridetype::all();
                $carbrands = Carbrand::all();
                $cartypes = Cartype::all();
                $states = State::all();
                $colors = Color::all();

                $category = Category::find($request->category_id);

                Session::put('category_id', $request->input('category_id'));
                Session::put('category_name', $category->name);

            return view('ride.newride1', compact('ridetypes','cartypes','carbrands','states','colors'));



        }

        return redirect()->back()->withErrors($validator)->withInput();

        
        
    }
}
