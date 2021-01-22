<?php

namespace App\Http\Controllers;

use App\Payment;
use App\User;
use Illuminate\Http\Request;

class PaymentVerificationController extends Controller
{
    public function verifyPayment($id)
    {
        $user = Payment::where('token', $id)->first();

        if($user) {

            $exist_user = User::where('email', $user->email)->first();

            if($exist_user) {
                
                $user->status = 'approved';
                $user->token = null;
                $user->save();

                $account = User::where('email', $user->email)->first()->account;

                if($account) {
                    $account->account_balance = ((int)$account->account_balance + (int)$user->amount);
                    $account->save();
                }
                
                return redirect(route('login'));
            }
            else {
                return redirect(route('register'));
            }
        } else {
            return redirect(route('login'))->with('toast_error', 'Invalid Transaction Token!');
        }
        
    }
}
