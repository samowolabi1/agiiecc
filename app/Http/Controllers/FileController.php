<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;
use App\Models\Form;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use App\Models\Citizen;
use App\Models\Documentation;
use App\Models\Emergency;
use App\Models\Impend;
use App\Models\Lost;
use App\Models\Pensioner;
use App\Models\Police;
use App\Models\Student;
use Auth;

class FileController extends Controller

{
    public function index(){

        $files = File::where('user_id',$userid)->get();

        return Response::json([
                'status' => 201,
                'files' => $files
            ]);
        
    }
    
 

    public function stustore(Request $request){

                 //return " from file";

        $rules = array(
            'child_form_id' => 'required',
        );

        $validator = Validator::make($request->all(), $rules);
       
 
        if ($validator->fails()) {

            return response([
                'error_msg' => $validator->errors()
            ], 400);
        
        }


        $filed_parent_form_id = 2;
        $filled_child_form_id = $request->child_form_id;


        if($filed_parent_form_id == "" AND $filled_child_form_id = ""){

                return response()->json([
                'messages'=> 'Provide Child form ID'

                    ],401);


                  if(!$request->hasFile('ng_passport') ||
                     !$request->hasFile('uk_visa') || 
                     !$request->hasFile('letter_of_admission') || 
                     !$request->hasFile('letter_of_acceptance') ||
                     !$request->hasFile('nysc_discharge_certs')){


                            return Response::json([
                                    'status' => 400,
                                    'error' => 'Wrong key name or Null value'
                                ]);
                    }

            }else{ 

                  

                // Specufy each document;
                if ($request->hasFile('ng_passport')) {
                       
                        //    Filename
                       $filetag = "Nigeria_Passport";

                         

                    if ($request->ng_passport->extension() == 'jpg' || 
                        $request->ng_passport->extension() == 'jpeg'|| 
                        $request->ng_passport->extension() == 'png' || 
                        $request->ng_passport->extension() == 'pdf' ||
                        $request->ng_passport->extension() == 'doc' ) {
                    
                        // File to insert
                       $file_upload = $request->file('ng_passport');   

                      


                    }else{
                        return Response::json([
                                    'status' => 400,
                                    'error' => 'This file type is not allowed'
                                ]);
                    }

                }elseif($request->hasFile('uk_visa')) {
                    // 
                    $filetag = "UK_Visa";

                    if ($request->uk_visa->extension() == 'jpg' || 
                        $request->uk_visa->extension() == 'jpeg'|| 
                        $request->uk_visa->extension() == 'png' || 
                        $request->uk_visa->extension() == 'pdf' ||
                        $request->uk_visa->extension() == 'doc' ) {
                    
                        // File to insert
                       $file_upload = $request->file('uk_visa');                       
                    }else{
                       
                        return Response::json([
                                    'status' => 400,
                                    'error' => 'This file type is not allowed'
                                ]);
                    }

                }elseif($request->hasFile('letter_of_admission')) {

                    $filetag = "letter_of_admission";

                    if ($request->letter_of_admission->extension() == 'jpg' || 
                        $request->letter_of_admission->extension() == 'jpeg' || 
                        $request->letter_of_admission->extension() == 'png' || 
                        $request->letter_of_admission->extension() == 'pdf' ||
                        $request->letter_of_admission->extension() == 'doc' ) {
                    
                        // File to insert
                       $file_upload = $request->file('letter_of_admission');                       
                    }else{
                        
                        return Response::json([
                                    'status' => 400,
                                    'error' => 'This file type is not allowed'
                                ]);
                    }

                }elseif($request->hasFile('letter_of_acceptance')) {

                    $filetag = "letter_of_acceptance";
                    if ($request->letter_of_acceptance->extension() == 'jpg' || 
                        $request->letter_of_acceptance->extension() == 'jpeg' || 
                        $request->letter_of_acceptance->extension() == 'png' || 
                        $request->letter_of_acceptance->extension() == 'pdf' ||
                        $request->letter_of_acceptance->extension() == 'doc' ) {
                    
                        // File to insert
                       $file_upload = $request->file('letter_of_acceptance');                       
                    }else{
                                return Response::json([
                                            'status' => 400,
                                            'error' => 'This file type is not allowed'
                                        ]);
                    }

                }elseif($request->hasFile('photocopies_certs')) {

                    $filetag = "Certificate_Photocopy";
                    if ($request->photocopies_certs->extension() == 'jpg' || 
                        $request->photocopies_certs->extension() == 'jpeg' || 
                        $request->photocopies_certs->extension() == 'png' || 
                        $request->photocopies_certs->extension() == 'pdf' ||
                        $request->photocopies_certs->extension() == 'doc' ) {
                    
                        // File to insert
                       $file_upload = $request->file('photocopies_certs');    

                                           
                    }else{
                       
                        return Response::json([
                                    'status' => 400,
                                    'error' => 'This file type is not allowed'
                                ]);
                    }

                }elseif($request->hasFile('nysc_discharge_certs')){

                    $filetag = "nysc_discharge_certificate";
                    if ($request->nysc_discharge_certs->extension() == 'jpg' || 
                        $request->nysc_discharge_certs->extension() == 'jpeg' || 
                        $request->nysc_discharge_certs->extension() == 'png' || 
                        $request->nysc_discharge_certs->extension() == 'pdf' ||
                        $request->nysc_discharge_certs->extension() == 'doc' ) {
                    
                        // File to insert
                       $file_upload = $request->file('nysc_discharge_certs');                       
                    }else{
                        
                        return Response::json([
                                    'status' => 400,
                                    'error' => 'This file type is not allowed'
                                ]);
                    }
                    
                }

                $child_form = Student::find($filled_child_form_id);
                $child_form_id = $child_form->id;
                $user_email = Auth::user()->email;
                $file_ids = $file_upload;

        // return $request->file('ng_passport')->getClientOriginalName(); 
                $file = $file_upload;

                if ($file->extension() == 'jpg' || $file->extension() == 'jpeg' || $file->extension() == 'png') {
                    
                    $filetype  = "Image";
                    

                }elseif($file->extension() == 'pdf' ){

                    $filetype = "Pdf";
                }else{

                    $filetype = "doc";
                }

                $fileName = $filetag.'-'.$child_form_id.'-'.$user_email.'-'.time().rand(1,99).'.'.$file->extension();
                
               
                $img = File::create([

                    'filename' => $fileName,
                    'tag' => $filetag,
                    'type' => $filetype,
                    'typeName' => $filetype,
                    'title' => Auth::user()->email,
                ]);

                $real_file_ids = (int)$img->id;

                // 
             //return $real_file_ids;
              
                $child_form->files()->attach($real_file_ids);


                $file->move(public_path('students'),$fileName);
                
                return response()->json([
                    'msg' => "Succesfully Uploaded"
                    
                ],201);

            }
    }

    public function postore(Request $request){

                 //return " from file";

        $rules = array(
            'child_form_id' => 'required',
        );

        $validator = Validator::make($request->all(), $rules);
       
 
        if ($validator->fails()) {

            return response([
                'error_msg' => $validator->errors()
            ], 400);
        
        }


        $filed_parent_form_id = 3;
        $filled_child_form_id = $request->child_form_id;


        if($filed_parent_form_id == "" AND $filled_child_form_id = ""){


                return response()->json([
                'messages'=> 'Provide parent form ID and child form ID'

                    ],401);

                if(!$request->hasFile('signature') ||
                     !$request->hasFile('passportPhotocopy') || 
                     !$request->hasFile('visaPhotocopy') || 
                     !$request->hasFile('passportPhotograph') ||
                     !$request->hasFile('dataFormCopy')){


                            return Response::json([
                                    'status' => 400,
                                    'error' => 'Wrong key name or Null value'
                                ]);
                    }


            }else{

                //Police Reg

                $child_form = Police::find($filled_child_form_id);
                $child_form_id = $child_form->id;
                $user_email = Auth::user()->email;
                $file_ids = $file_upload;



                // Specufy each document;
   

                if ($request->hasFile('signature')) {

                        //    Filename
                       $filetag = "Signature";
                     

                    if ($request->signature->extension() == 'jpg' || 
                        $request->signature->extension() == 'jpeg'|| 
                        $request->signature->extension() == 'png' || 
                        $request->signature->extension() == 'pdf' ||
                        $request->signature->extension() == 'doc' ) {
                    
                        // File to insert
                       $file_upload = $request->file('signature');   

                      


                    }else{

                        return Response::json([
                                    'status' => 400,
                                    'error' => 'This file type is not allowed'
                                ]);
                    }




                }elseif($request->hasFile('passportPhotocopy')) {

                    $filetag = "Passport_Photocopy";

                     if ($request->passportPhotocopy->extension() == 'jpg' || 
                        $request->passportPhotocopy->extension() == 'jpeg'|| 
                        $request->passportPhotocopy->extension() == 'png' || 
                        $request->passportPhotocopy->extension() == 'pdf' ||
                        $request->passportPhotocopy->extension() == 'doc' ) {
                    
                        // File to insert
                       $file_upload = $request->file('passportPhotocopy');   

                    }else{
                        
                        return Response::json([
                                    'status' => 400,
                                    'error' => 'This file type is not allowed'
                                ]);
                    }


                }elseif($request->hasFile('visaPhotocopy')) {

                    $filetag = "Visa_Photocopy";

                     if ($request->visaPhotocopy->extension() == 'jpg' || 
                        $request->visaPhotocopy->extension() == 'jpeg'|| 
                        $request->visaPhotocopy->extension() == 'png' || 
                        $request->visaPhotocopy->extension() == 'pdf' ||
                        $request->visaPhotocopy->extension() == 'doc' ) {
                    
                        // File to insert
                       $file_upload = $request->file('visaPhotocopy');   

                      


                    }else{
                        
                        return Response::json([
                                    'status' => 400,
                                    'error' => 'This file type is not allowed'
                                ]);
                    }


                }elseif($request->hasFile('passportPhotograph')) {

                    $filetag = "Passport_Photograph";

                     if ($request->passportPhotograph->extension() == 'jpg' || 
                        $request->passportPhotograph->extension() == 'jpeg'|| 
                        $request->passportPhotograph->extension() == 'png' || 
                        $request->passportPhotograph->extension() == 'pdf' ||
                        $request->passportPhotograph->extension() == 'doc' ) {
                    
                        // File to insert
                       $file_upload = $request->file('passportPhotograph');   

                    }else{
                        
                        return Response::json([
                                    'status' => 400,
                                    'error' => 'This file type is not allowed'
                                ]);
                    }


                }elseif($request->hasFile('dataFormCopy')) {

                    $filetag = "Data_FormCopy";
                     if ($request->dataFormCopy->extension() == 'jpg' || 
                        $request->dataFormCopy->extension() == 'jpeg'|| 
                        $request->dataFormCopy->extension() == 'png' || 
                        $request->dataFormCopy->extension() == 'pdf' ||
                        $request->dataFormCopy->extension() == 'doc' ) {
                    
                        // File to insert
                       $file_upload = $request->file('dataFormCopy');   

                      


                    }else{
                        
                        return Response::json([
                                    'status' => 400,
                                    'error' => 'This file type is not allowed'
                                ]);
                    }


                }

                $file = $file_upload;
                $fileName = $filetag.'-'.$child_form_id.$user_email.'-'.time().rand(1,99).'.'.$file->extension();

                if ($file->extension() == 'jpg' || $file->extension() == 'jpeg' || $file->extension() == 'png') {
                    
                    $filetype  = "Image";

                }elseif($file->extension() == 'pdf'){

                    $filetype = "Pdf";
                }

                

                $img = File::create([

                    'filename' => $fileName,
                    'tag' => $filetag,
                    'type' => $file->extension(),
                    'typeName' => $filetype,
                    'title' => Auth::user()->email,
                ]);

                $real_file_ids = $img->id;

               
                $child_form->files()->attach($real_file_ids);

                $file->move(public_path('police'),$fileName);

                
                return response()->json([
                    'msg' => 'Succesfully Uploaded'
                    
                ],201);



            }
    }

    public function impendstore(Request $request){

           //return " from file";

        $rules = array(
          
            'child_form_id' => 'required',
        );

        $validator = Validator::make($request->all(), $rules);
       
 
        if ($validator->fails()) {

            return response([
                'error_msg' => $validator->errors()
            ], 400);
        
        }


        $filed_parent_form_id = 4;
        $filled_child_form_id = $request->child_form_id;


        if($filed_parent_form_id == "" AND $filled_child_form_id = ""){


                return response()->json([
                'messages'=> 'Provide parent form ID and child form ID'

                    ],401);
 // proofOfDivorce: Blob;
 //    passportPhotocopy: Blob;
 //    notorizedDeclaration: Blob;
 //    proofOfMarriage: Blob;

                if(!$request->hasFile('proofOfDivorce') ||
                     !$request->hasFile('passportPhotocopy') || 
                     !$request->hasFile('notorizedDeclaration') || 
                     !$request->hasFile('passportPhotograph') ||
                     !$request->hasFile('proofOfMarriage')){


                            return Response::json([
                                    'status' => 400,
                                    'error' => 'Wrong key name or Null value'
                                ]);
                    }


            }else{


                // Non Impend Reg


                  // Specify each document;
   

                if ($request->hasFile('proofOfDivorce')) {

                    $filetag = "Proof_of_Divorce";

                     

                    if ($request->proofOfDivorce->extension() == 'jpg' || 
                        $request->proofOfDivorce->extension() == 'jpeg'|| 
                        $request->proofOfDivorce->extension() == 'png' || 
                        $request->proofOfDivorce->extension() == 'pdf' ||
                        $request->proofOfDivorce->extension() == 'doc' ) {
                    
                        // File to insert
                       $file_upload = $request->file('proofOfDivorce');   

                      


                    }else{

                        return Response::json([
                                    'status' => 400,
                                    'error' => 'This file type is not allowed'
                                ]);
                    }


                    // code...
                }elseif($request->hasFile('passportPhotocopy')) {

                    $filetag = "Passport_Photocopy";

                    if ($request->passportPhotocopy->extension() == 'jpg' || 
                        $request->passportPhotocopy->extension() == 'jpeg'|| 
                        $request->passportPhotocopy->extension() == 'png' || 
                        $request->passportPhotocopy->extension() == 'pdf' ||
                        $request->passportPhotocopy->extension() == 'doc' ) {
                    
                        // File to insert
                       $file_upload = $request->file('passportPhotocopy');   

                      


                    }else{

                        return Response::json([
                                    'status' => 400,
                                    'error' => 'This file type is not allowed'
                                ]);
                    }

                }elseif($request->hasFile('notorizedDeclaration')) {

                    $filetag = "Notorized_Declaration";

                    if ($request->notorizedDeclaration->extension() == 'jpg' || 
                        $request->notorizedDeclaration->extension() == 'jpeg'|| 
                        $request->notorizedDeclaration->extension() == 'png' || 
                        $request->notorizedDeclaration->extension() == 'pdf' ||
                        $request->notorizedDeclaration->extension() == 'doc' ) {
                    
                        // File to insert
                       $file_upload = $request->file('notorizedDeclaration');   

                      


                    }else{

                        return Response::json([
                                    'status' => 400,
                                    'error' => 'This file type is not allowed'
                                ]);
                    }


                }elseif($request->hasFile('proofOfMarriage')) {

                    $filetag = "Proof_of_Mariage";

                    if ($request->proofOfMarriage->extension() == 'jpg' || 
                        $request->proofOfMarriage->extension() == 'jpeg'|| 
                        $request->proofOfMarriage->extension() == 'png' || 
                        $request->proofOfMarriage->extension() == 'pdf' ||
                        $request->proofOfMarriage->extension() == 'doc' ) {
                    
                        // File to insert
                       $file_upload = $request->file('proofOfMarriage');   

                      


                    }else{

                        return Response::json([
                                    'status' => 400,
                                    'error' => 'This file type is not allowed'
                                ]);
                    }


                }



                $child_form = Impend::find($filled_child_form_id);
                $child_form_id = $child_form->id;
                $user_email = Auth::user()->email;
                $file_ids = $file_upload;

                 $file = $file_upload;
                 $fileName = $filetag.'-'.$child_form_id.$user_email.'-'.time().rand(1,99).'.'.$file->extension();

                if ($file->extension() == 'jpg' || $file->extension() == 'jpeg' || $file->extension() == 'png') {
                    
                    $filetype  = "Image";

                }elseif($file->extension() == 'pdf'){

                    $filetype = "Pdf";
                }



                $img = File::create([

                    'filename' => $fileName,
                    'tag' => $filetag,
                    'type' => $filetype,
                    'typeName' => $filetype,
                    'title' => Auth::user()->email,
                ]);

                $real_file_ids = (int)$img->id;

                // 
             //return $real_file_ids;
              
                $child_form->files()->attach($real_file_ids);


                $file->move(public_path('impends'),$fileName);
                
                return response()->json([
                    'msg' => "Succesfully Uploaded"
                    
                ],201);







            }


    }

    public function ateststore(Request $request){

          //return " from file";

        $rules = array(

            'child_form_id' => 'required',
        );

        $validator = Validator::make($request->all(), $rules);
       
 
        if ($validator->fails()) {

            return response([
                'error_msg' => $validator->errors()
            ], 400);
        
        }


        $filed_parent_form_id = 6;
        $filled_child_form_id = $request->child_form_id;


        if($filed_parent_form_id == "" AND $filled_child_form_id = ""){


                return response()->json([
                'messages'=> 'Provide parent form ID and child form ID'

                    ],401);


                if(!$request->hasFile('retirementCertificateCopy') ||
                     !$request->hasFile('passportPhotocopy') || 
                     !$request->hasFile('passportPhotograph') || 
                     !$request->hasFile('passportPhotograph') ||
                     !$request->hasFile('englandAddressProof')){


                            return Response::json([
                                    'status' => 400,
                                    'error' => 'Wrong key name or Null value'
                                ]);
                    }


            }else{



                //Pensioner

                // Specify each document;
   

                if ($request->hasFile('retirementCertificateCopy')) {

                    $filetag = "Retirement_certificate";

                    if ($request->retirementCertificateCopy->extension() == 'jpg' || 
                        $request->retirementCertificateCopy->extension() == 'jpeg'|| 
                        $request->retirementCertificateCopy->extension() == 'png' || 
                        $request->retirementCertificateCopy->extension() == 'pdf' ||
                        $request->retirementCertificateCopy->extension() == 'doc' ) {
                    
                        // File to insert
                       $file_upload = $request->file('retirementCertificateCopy');   

                      


                    }else{

                        return Response::json([
                                    'status' => 400,
                                    'error' => 'This file type is not allowed'
                                ]);
                    }
                    // code...
                }elseif($request->hasFile('passportPhotocopy')) {

                    $filetag = "Passport_Photocopy";

                    if ($request->passportPhotocopy->extension() == 'jpg' || 
                        $request->passportPhotocopy->extension() == 'jpeg'|| 
                        $request->passportPhotocopy->extension() == 'png' || 
                        $request->passportPhotocopy->extension() == 'pdf' ||
                        $request->passportPhotocopy->extension() == 'doc' ) {
                    
                        // File to insert
                       $file_upload = $request->file('passportPhotocopy');   

                      


                    }else{

                        return Response::json([
                                    'status' => 400,
                                    'error' => 'This file type is not allowed'
                                ]);
                    }


                }elseif($request->hasFile('passportPhotograph')) {

                    $filetag = "Passport_Photograph";

                    if ($request->passportPhotograph->extension() == 'jpg' || 
                        $request->passportPhotograph->extension() == 'jpeg'|| 
                        $request->passportPhotograph->extension() == 'png' || 
                        $request->passportPhotograph->extension() == 'pdf' ||
                        $request->passportPhotograph->extension() == 'doc' ) {
                    
                        // File to insert
                       $file_upload = $request->file('passportPhotograph');   

                      


                    }else{

                        return Response::json([
                                    'status' => 400,
                                    'error' => 'This file type is not allowed'
                                ]);
                    }



                }elseif($request->hasFile('englandAddressProof')) {

                    $filetag = "England_Address_Proof";

                    if ($request->englandAddressProof->extension() == 'jpg' || 
                        $request->englandAddressProof->extension() == 'jpeg'|| 
                        $request->englandAddressProof->extension() == 'png' || 
                        $request->englandAddressProof->extension() == 'pdf' ||
                        $request->englandAddressProof->extension() == 'doc' ) {
                    
                        // File to insert
                       $file_upload = $request->file('englandAddressProof');   

                      


                    }else{

                        return Response::json([
                                    'status' => 400,
                                    'error' => 'This file type is not allowed'
                                ]);
                    }

                }


                $child_form = Pensioner::find($filled_child_form_id);
                $child_form_id = $child_form->id;
                $user_email = Auth::user()->email;
                $file_ids = $file_upload;

                 $file = $file_upload;
                 $fileName = $filetag.'-'.$child_form_id.$user_email.'-'.time().rand(1,99).'.'.$file->extension();

                if ($file->extension() == 'jpg' || $file->extension() == 'jpeg' || $file->extension() == 'png') {
                    
                    $filetype  = "Image";

                }elseif($file->extension() == 'pdf'){

                    $filetype = "Pdf";
                }

                $img = File::create([

                    'filename' => $fileName,
                    'tag' => $filetag,
                    'type' => $filetype,
                    'typeName' => $filetype,
                    'title' => Auth::user()->email,
                ]);

                $real_file_ids = (int)$img->id;

                // 
             //return $real_file_ids;
              
                $child_form->files()->attach($real_file_ids);


                $file->move(public_path('impends'),$fileName);
                
                return response()->json([
                    'msg' => "Succesfully Uploaded"
                    
                ],201);



            }

    }


    public function show($id){

    $file = File::find($id);


    return Response::json([
                            'status' => 200,
                            'file' => $file
                                ]);

    }

    
}
