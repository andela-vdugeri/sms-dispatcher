<?php

namespace App\Http\Controllers;


use App\User;
use App\Pricing;
use App\UserPayment;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    
    /*
    * List all the users in the database
     */
    public function listUsers()
    {
    	$users = User::all();
    	
    	return view('admin.home', compact('users'));
    }


   public function confirmPayment($id, Request $request, UserRepository $userRepository)
   {
        if ($request->ajax()) {
            
            $confirmed = $userRepository->confirmUserpayment($id);

            if ($confirmed) {
                return response()->json(['message' => 'Payment Confirmed']);
            }

            return response()->json(['error' => 'Error confirming payment. Payment may have been confirmed already.']);
        }
   }

    public function showPricing()
    {
        $pricing = Pricing::all();
        $pricing = $pricing->first();
        return view('admin.pricing', compact('pricing'));
    }

    public function listUserPayments()
    {
    	$payments = UserPayment::all();

    	return view('admin.userpayments', compact('payments'));
    }

    public function adjustPrice($id, Request $request, Pricing $pricing)
    {
        if ($request->ajax()) {

            $pricing = Pricing::find($id);
            $pricing->unit_price = $request->get('pricing');
            $pricing->save();  

            return response()->json(['status' => '200', 'message' => 'Pricing updated. Refresh to see changes']);  
        }
        

        return $redirect()->back()->with('info', 'Error adjusting pricing. Please try again');
    }

}
