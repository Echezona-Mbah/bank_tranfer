<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ATMCard;
use App\Models\Currency;
use App\Models\Loan;
use App\Models\Tranfer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AllTransactionController extends Controller
{
    public function allTranfer()
    {
        $userCount = User::count();
        $atmCount = ATMCard::count();
        $loanCount = Loan::count();
        $tranferCount = Tranfer::count();
        $users = Tranfer::all();
        return view('admin.all_tranfer',compact('users'));
    }

    public function allLoan()
    {
        $userCount = User::count();
        $atmCount = ATMCard::count();
        $loanCount = Loan::count();
        $tranferCount = Tranfer::count();
        $users = Loan::all();
        return view('admin.all_loan',compact('users'));
    }

    public function allCard()
    {
        $userCount = User::count();
        $atmCount = ATMCard::count();
        $loanCount = Loan::count();
        $tranferCount = Tranfer::count();
        $users = ATMCard::all();
        return view('admin.card_request',compact('users'));
    }

        public function cardStatus(Request $request)
    {
        $id = $request->input('id');
        $transaction = ATMCard::find($id);

        if ($transaction) {
            // Update the status
            $transaction->status = 'confirmed';
            $transaction->save();

            return response()->json(['success' => true]);
        } else {
            return response()->json(['error' => 'Transaction not found'], 404);
        }
    }

    public function AllCurrency()
    {
        $userCount = User::count();
        $atmCount = ATMCard::count();
        $loanCount = Loan::count();
        $tranferCount = Tranfer::count();
        $users = Currency::all();
        return view('admin.all_currency',compact('users'));
    }

    public function edit($id)
    {
        $user = Currency::where('id', $id)->first();
        return view('admin.accurency_edit', compact('user'));
    }
    public function update(Request $request)
    {
        $request->validate([ 
            'currency' => 'required',
            'user_id' => 'required',
        ]);

        //dd($request->user_id);
    
        // Find the corresponding currency record
        $currency = Currency::where('id', $request->user_id)->first();
       
    
        if ($currency) {
            // Update the exchange_rate
            $currency->update([
                'currency' => $request->input('currency'),
            ]);
    
            Alert::success('Success', 'Currency and exchange rate updated successfully.')->showConfirmButton('OK');
        } else {
            Alert::error('Error', 'Currency not found.')->showConfirmButton('OK');
        }
    
        return redirect()->route('admin');
    }
    


}
