<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompanyController extends Controller
{
    //




        public function store(Request $request){
            
              $this->validate($request, [
                    'comment' => 'required',            
                ]);
                 
              $comment = new Comment();
                 $comment->email = $request->input('email');
                 $comment->comment = $request->input('comment');
                 $comment->save();
              


            return redirect()->route('kotaar')->with('success','Thank you for sharing your time with us');

    }
}
