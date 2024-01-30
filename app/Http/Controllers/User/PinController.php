<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Mail\BeneficiaryNotification;
use App\Mail\PinNotification;
use App\Models\Currency;
use App\Models\Tranfer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;

class PinController extends Controller
{
    public function pin()
    {
        $user = Auth::user();
        $currencies = Currency::all();
        return view('user.create_pin', compact('user','currencies'));
    }

    
    public function setPin(Request $request)
    {
        $request->validate([
            'pin' => 'required|min:4|max:6|confirmed',
        ]);

        $user = Auth::user();
        $user->update([
            'Tranfer_pin' => Hash::make($request->input('pin')),
        ]);

        Alert::success('Success', 'Transaction PIN set successfully.')->showConfirmButton('OK');

        return redirect()->back();
    }


    public function UpdatePassword()
    {
        $user = Auth::user();
        $currencies = Currency::all();
        return view('user.update_password', compact('user','currencies'));
    }

    public function accountDetail()
    {
        $user = Auth::user();
        $currencies = Currency::all();
        return view('user.account_detail', compact('user', 'currencies'));
    }

    
    public function getConversionRate(Request $request)
    {
        $selectedCurrency = $request->input('selectedCurrency');
        $conversionRate = Currency::where('app', $selectedCurrency)->value('currency');

        return response()->json(['conversionRate' => $conversionRate]);
    }

    public function insetPin(Request $request)
    {
        $user = Auth::user();
        $currencies = Currency::all();
        $transactionId = $request->query('transaction_id');
        return view('user.insert_pin', compact('user','transactionId','currencies'));
    }

    public function insertPin(Request $request)
    {
        $validatedData = $request->validate([
            'pin' => 'required',
            'transfer_id' => 'required',
        ]);
    
        $user = Auth::user();
        $balance = $user->balance;
        //dd($user);
        $hashedPin = $user->Tranfer_pin;
        $generateUniqueotp = $this->generateUniqueotp();
    
        $transfer = Tranfer::where('transaction_id', $validatedData['transfer_id'])
            ->where('user_id', $user->id)
            ->where('otp', '=', null)
            ->where('pin_confirmed', 0) // Add the condition here
            ->first();
            $amount = $transfer->amount;
            $amoucurrencynt = $transfer->currency;
            $main = $balance - $amount;

            $reciever_account_number = $transfer->reciever_account_number;
            $reuser= User::where('account_number',$reciever_account_number)->first();
            $rebalance =  $reuser->balance;
            $recurrency =  $reuser->currency;
            $Remain = $rebalance +$amount ;
    
        if (!empty($hashedPin) && Hash::check($validatedData['pin'], $hashedPin) && $transfer) {

            $reuser->update([
                'balance' => $Remain,
            ]);
            $user->update([
                'balance' => $main,
            ]);
            $transfer->update([
                'otp' => $generateUniqueotp,
                'status' => 'confirmed',
            ]);
            Mail::to($reuser->email)->send(new BeneficiaryNotification($reuser,$amount,$amoucurrencynt));

            Mail::to($user->email)->send(new PinNotification($user,$amount,$amoucurrencynt));
    
            Alert::success('Success', ' your transfer has been Successfully.')->showConfirmButton('OK');
            return redirect()->route('dashboard');
    
            // return redirect()->route('otp',['transaction_id' =>  $validatedData['transfer_id']]);
        } else {
            Alert::error('Error', 'Invalid PIN.')->showConfirmButton('OK');
    
            return redirect()->back();
        }
    }
    
    

    protected function generateUniqueotp()
    {
        $otp = rand(1000, 9999);
    
        while (Tranfer::where('otp', $otp)->exists()) {
            $otp = rand(1000, 9999);
        }
    
        return (string) $otp;
    }

    public function otp(Request $request)
    {
        $user = Auth::user();
        $currencies = Currency::all();
        $transactionId = $request->query('transaction_id');
        return view('user.otp', compact('user', 'currencies','transactionId'));
    }


    // public function processOTP(Request $request)
    // {
    //     //dd($request->all());die();
    //     $validatedData = $request->validate([
    //         'otp' => 'required|numeric',
    //         'transfer_id' => 'required',
    //     ]);
    
    //     $user = Auth::user();
    //     $balance = $user->balance;
    //     $transfer = Tranfer::where('transaction_id', $validatedData['transfer_id'])
    //         ->where('user_id', $user->id)
    //         ->where('otp', '!=', null)
    //         ->first();
    //     $amount = $transfer->amount;
    //     $reciever_account_number = $transfer->reciever_account_number;
    //     $reuser= User::where('account_number',$reciever_account_number)->first();
    //     $rebalance =  $reuser->balance;
    //     $Remain = $rebalance +$amount ;
    //     //dd($Remain);die();
    //     $reuser->update([
    //         'balance' => $Remain,
    //     ]);
    //     if ($transfer) {
    //         $storedOTP = $transfer->otp;
    
    //         if ($validatedData['otp'] == $storedOTP && $balance >= $amount) {
    //             $main = $balance - $amount;
    //             $user->update([
    //                 'balance' => $main,
    //             ]);
    //             $user->tranfers()->where('transaction_id', $request->transfer_id)->update([
    //                 'status' => 'approved',
    //             ]);


    //             Alert::success('Success', 'OTP validated successfully!.')->showConfirmButton('OK');
    //             return redirect()->route('singleTransfer');
    
    //         }else {
    //             Alert::error('Error', 'Insufficient balance.or Invalid OTP. Please try again')->showConfirmButton('OK');
    //         }
    //         return redirect()->back();
    //     }
    
    //     Alert::error('Error', 'Invalid OTP. Please try again.')->showConfirmButton('OK');
    
    //     return redirect()->back();
    // }



    // public function insertPind(Request $request)
    // {
    //     $validatedData = $request->validate([
    //         'pin' => 'required',
    //     ]);
    
    //     $user = Auth::user();
    //     $hashedPin = $user->Tranfer_pin;
    //     $balance = $user->balance;
    
    //     if (!empty($hashedPin) && Hash::check($validatedData['pin'], $hashedPin)) {
    //         $transfers = Tranfer::all();
    //         $totalAmount = $transfers->sum('amount');
    
    //         if ($balance >= $totalAmount) {
    //             $main = $balance - $totalAmount;
    
    //             // Update user's balance
    //             $user->update([
    //                 'balance' => $main,
    //             ]);
    
    //             Alert::success('Success', 'Transaction successful.')->showConfirmButton('OK');
    //         } else {
    //             Alert::error('Error', 'Insufficient balance.')->showConfirmButton('OK');
    //         }
    
    //         return redirect()->back();
    //     } else {
    //         Alert::error('Error', 'Invalid PIN. Please try again.')->showConfirmButton('OK');
    
    //         return redirect()->back();
    //     }
    // }
    

    
}
