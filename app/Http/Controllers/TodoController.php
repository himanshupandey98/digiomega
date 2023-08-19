<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Mail\MyEmail;
use App\Models\LeadForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class TodoController extends Controller
{
    private $email = 'contact@digiomega.in';


    public function leadFormSave(Request $request)
    {
        try {
            $leadForm=LeadForm::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'mobile' => $request->country_code.$request->mobile,
                'message' => $request->message
            ]);
            
            Mail::to($this->email)->send(new MyEmail($leadForm));
            return response()->json([
                'status' => 200,
                'message' => 'Your Request has been saved successfully! will get back to you soon'
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 501,
                'message' => 'Something went wrong !' . $th->getMessage(),
                'error' => $th->getMessage(),
                'trace' => $th->getTrace()
            ], 501);
        }
    }
}
