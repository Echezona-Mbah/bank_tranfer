<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Mail\SuspendedNotification;
use App\Models\Currency;
use App\Models\Tranfer;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;
use App\Mail\TransactionNotification;
use Illuminate\Support\Facades\Mail;

class TranferController extends Controller
{
    public function tranfer()
    {
        $user = Auth::user();
        $currencies = Currency::all();
        return view('user.tranfer', compact('user','currencies'));
    }

    public function saveTransaction(Request $request)
    {
        //print_r($request->all());die();
        // Validate the request data
        $validatedData = $request->validate([
            'sender_account_number' => 'required',
            'reciever_account_number' => 'required',
            'reciever_name' => 'required',
            'reciever_bank' => 'required',
            'swift' => '',
            'iban' => '',
            'bic' => '',
            'currency' => 'required',
            'amount' => 'required',
            'fund_tranfer' => 'required',
            'message' => 'required',
        ]);
        $existingUser = User::where('account_number', $validatedData['reciever_account_number'])->first();
        // dd($existingUser);die();
        if($existingUser == NULL){
            Alert::error('Error', 'User not found.')->showConfirmButton('OK');
            return redirect()->back();
        }
        $id = $existingUser->id;
        $transaction_status =$existingUser->transaction_status;
        if($transaction_status == 'suspended'){
            Alert::error('Error', 'User is suspended.')->showConfirmButton('OK');
            return redirect()->back();
        }
        $user = Auth::user();

        if($user->transaction_status == 'suspended'){
            Mail::to($user->email)->send(new SuspendedNotification($user));
            Alert::error('Error', 'Your are suspended.')->showConfirmButton('OK');
            return redirect()->back();
        }
         // dd($existingUser->transaction_status);die();

        if ($existingUser) {
            $transaction_id = $this->generateUniqueAccountNumber();
    
            $user = Auth::user();
            $balance = $user->balance;
        
            if ($balance >= $validatedData['amount']) {
                $transaction = new Tranfer();
                $transaction->sender_account_number = $validatedData['sender_account_number'];
                $transaction->reciever_account_number = $validatedData['reciever_account_number'];
                $transaction->reciever_name = $validatedData['reciever_name'];
                $transaction->reciever_bank = $validatedData['reciever_bank'];
                $transaction->swift = $validatedData['swift'];
                $transaction->bic = $validatedData['bic'];
                $transaction->currency = $validatedData['currency'];
                $transaction->amount = $validatedData['amount'];
                $transaction->fund_tranfer = $validatedData['fund_tranfer'];
                $transaction->message = $validatedData['message'];
                $transaction->user_id = $user->id;
                $transaction->tra_id = $id;
                $transaction->transaction_id = $transaction_id;
                $transaction->save();

                Mail::to($user->email)->send(new TransactionNotification($transaction,$user));
   
                Alert::success('success', 'Your Transaction successfully Process Enter Pin.')->showConfirmButton('OK');
                return redirect()->route('insertpin', ['transaction_id' => $transaction_id]);
            } else {
                Alert::error('Error', 'Insufficient balance to process the transaction.')->showConfirmButton('OK');
                return redirect()->back();
            }
        }

        Alert::error('Error', 'Receiver account number is not existing.')->showConfirmButton('OK');
        return redirect()->back();

 
    }
    
    public function accountStatement()
    {
        $user = Auth::user();
        $currencies = Currency::all();
        return view('user.account_statement', compact('user','currencies'));
    }

    public function getStatement(Request $request)
    {
        $validatedData = $request->validate([
            'from_date' => 'required|date',
            'to_date' => 'required|date|after_or_equal:from_date',
        ]);
        $fromDate = Carbon::parse($validatedData['from_date']);
        $toDate = Carbon::parse($validatedData['to_date']);
        $user = Auth::user();
        $id = $user->id;
    
        $accountStatements = Tranfer::whereBetween('created_at', [$fromDate, $toDate])
                            ->where('user_id',$id)->get();
        $user = Auth::user();
        $currencies = Currency::all();
    
            //print_r($accountStatements);die();

        return view('user.show_statement', compact('accountStatements','user','currencies'));
    }

    protected function generateUniqueAccountNumber()
    {
        do {
            $timestamp = now()->format('YmdHis');
            $randomNumber = mt_rand(10, 99); // You can adjust the range based on your needs
            $accountNumber = $timestamp . $randomNumber;
        } while (Tranfer::where('transaction_id', $accountNumber)->exists());
    
        return $accountNumber;
    }

    public function singleTransfer()
    {
        $user = Auth::user();
        $id = Auth::user()->id;
        $transfers = Tranfer::where('user_id', $id)
                            ->orWhere('tra_id', $id)
                            ->paginate(8);
    
        $currencies = Currency::all();
        return view('user.single_transfer', compact('user', 'currencies', 'transfers'));
    }
public function viewDetailsOfSingleTransfer($transaction_id)
{
    $transaction = Tranfer::where('transaction_id', $transaction_id)->first();
    $user = Auth::user();
    $currencies = Currency::all();

    if (!$transaction) {
        abort(404, 'Transaction not found');
    }

    return view('user.transfer_detail', compact('transaction','user','currencies'));
}


    
}
