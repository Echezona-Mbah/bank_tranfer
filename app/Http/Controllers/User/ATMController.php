<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\ATMCard;
use App\Models\Currency;
use App\Models\Loan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ATMController extends Controller
{
    public function atm()
    {
        $user = Auth::user();
        $currencies = Currency::all();
        return view('user.atm_card', compact('user','currencies'));
    }

    public function atmCard(Request $request)
    {
        $validatedData = $request->validate([
            'card_type' => 'required',
            'card_model' => 'required',
        ]);
        $user = Auth::user()->id;
        ATMCard::create([
            'card_type' => $request->card_type,
            'card_model' =>$request->card_model,
            'user_id'=>$user,
        ]);

        Alert::success('Success', 'Request Card  successfully Waith For The Bank To Process it.')->showConfirmButton('OK');
        return redirect()->back();
    }

    public function loan()
    {
        $user = Auth::user();
        $currencies = Currency::all();
        return view('user.loan', compact('user','currencies'));
    }

    public function loanCard(Request $request)
    {
        $validatedData = $request->validate([
            'loan_type' => 'required',
            'amount' => 'required',
            'message' => 'required',
        ]);
        $user = Auth::user()->id;
        Loan::create([
            'loan_type' => $request->loan_type,
            'amount' =>$request->amount,
            'message' =>$request->message,
            'user_id'=>$user,
        ]);

        Alert::success('Success', 'Request For Instant Loan Was successfully Waith For The Bank To Process it.')->showConfirmButton('OK');
        return redirect()->back();
    }
}
