<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Impend;
use App\Models\Pensioner;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use App\Models\Police;
use App\Models\User;
use App\Models\Payment;
use DB;
use App\Mail\Paymentmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;



class PagesController extends Controller
{

    public function user_redirect(){

        $user = Auth::user();

        if($user->department_id == 1){

            return redirect()->route('admin.index');


        }elseif ($user->department_id == 2) {
            
             return redirect()->route('admin.index');

        }elseif($user->department_id == 3) {
            
            return redirect()->route('vendor.index');

        }elseif($user->department_id == 5) {
            
            return redirect()->route('customer.index');

        }else{

            return redirect()->route('dashboard');
        }

    }
    public function admin_board()
    {
        //return "This is fr admin";
        return view('user.adminboard');
    }

    public function user_board()
    {
       
        $user = Auth::user();

        return view('frontend.dashboard', compact('user'));
    }

    public function vendor_board()
    {
        //return "welcome";
        return view('user.dashboard');
    }

    public function index()
    {

        $students = Student::orderBy('id', 'desc')->get();

        $polices = Police::orderBy('id', 'desc')->get();

        $impends = Impend::orderBy('id', 'desc')->get();

        $pensioners = Pensioner::orderBy('id', 'desc')->get();

        $users = User::orderBy('id', 'desc')->get();

        $payments = Payment::orderBy('id', 'desc')->get();

        return Response::json([

            'status' => 200,
            'students' => $students,
            'polices' => $polices,
            'impends' => $impends,
            'pensioners' => $pensioners,
            'users' => $users,
            'payments' => $payments

        ]);


    }

    public function student()
    {

        $students = Student::orderBy('id', 'desc')->paginate(20);

        return Response::json([

            'status' => 200,
            'students' => $students

        ]);


    }

    public function police()
    {

        $polices = Police::orderBy('id', 'desc')->paginate(20);

        return Response::json([

            'status' => 200,
            'polices' => $polices

        ]);


    }


    public function impend()
    {

        $impends = Impend::orderBy('id', 'desc')->paginate(20);

        return Response::json([

            'status' => 200,
            'impends' => $impends

        ]);


    }



    public function attest()
    {

        $pensioners = Pensioner::orderBy('id', 'desc')->paginate(20);

        return Response::json([

            'status' => 200,
            'pensioners' => $pensioners

        ]);


    }

    public function searchstu(Request $request)
    {



        //     $students = \DB::table('students')->where('name','LIKE','%'.$request->search.'%')->orWhere('delivery_coverage','LIKE','%'.$request->search.'%')->orWhere('brand','LIKE','%'.$request->search.'%')->orWhere('price','LIKE','%'.$request->search.'%')->get();
    }

    public function maily()
    {


        //return "hello";

        $email = 'soludareowolabi@gmail.com';

        Mail::to($email)->send(new Paymentmail($email));
    }

    public function terms()
    {

        return "term and conditions";
    }
}
