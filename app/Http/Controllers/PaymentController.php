<?php

namespace App\Http\Controllers;

use App\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Mail\MailQueue;
use App\User;

class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function transferPayment(Request $request) 
    {
        $this->validate($request,[
            'receiver_name' => 'required',
            'receiver_email' => 'required',
            'amount' => 'required',
        ]);

        $balance = Auth::user()->account->account_balance;

        if($balance > $request->amount) {
            
            $payment = new Payment();

            $payment->user_id = Auth::user()->id;
    
            $payment->receiver_name = $request->receiver_name;
    
            $payment->email = $request->receiver_email;
    
            $payment->amount = $request->amount;
    
            $payment->status = 'pending';
    
            $payment->token = Str::random(60);
    
            if($payment->save()) {
    
                $account = Auth::user()->account;
    
                $account->account_balance = ((int)$account->account_balance - (int)$request->amount);
    
                $account->save();
    
                Mail::to($request->receiver_email)->queue(new MailQueue([
                    'subject' => 'You have received new payment transaction',
                    'template' => 'transaction',
                    'transaction_data' => $payment
                ]));
    
            }
            else {
                return redirect(route('dashboard'))->with('toast_error', 'Transaction Unsuccessfully!');
            }

            return redirect(route('dashboard'))->with('toast_success', 'Transaction Successfully!');
        }
        else {
            return redirect(route('dashboard'))->with('toast_error', 'Transaction failed. your account balance not sufficient !');
        } 
    }

    public function verifyPayment($id)
    {
        $user = Payment::where('token', $id)->first();

        if($user) {
            $exist_user = User::where('email', $user->email);
            if($exist_user) {
                $user->status = 'approved';
                $user->token = null;
                $user->save();

                $account = $exist_user->account();
                $account->account_balance = ((int)$account->account_balance - (int)$user->amount);
                $account->save();

                return redirect(route('login'));
            }
            else {
                return redirect(route('register'));
            }
        } else {
            return redirect(route('login'))->with('toast_error', 'Invalid Transaction Token!');
        }
    }

    public function transactions()
    {
        $transactions = Auth::user()->payments;
        // dd($transactions);
        return view('transactions', compact('transactions'));
    }
}
