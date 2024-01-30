<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ATMCard;
use App\Models\Loan;
use App\Models\Tranfer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class DashboradController extends Controller
{
    public function dashborad()
    {
        $user = Auth::user();
        return view('admin.home',compact('user'));
    }

    public function showUserCount()
    {
        $userCount = User::count();
        $atmCount = ATMCard::count();
        $loanCount = Loan::count();
        $tranferCount = Tranfer::count();
        $users = User::all();
       // dd($userCount);die();

        return view('admin.home', compact('userCount','atmCount','loanCount','tranferCount','users'));
    }

    public function updateStatus($id)
    {
        $user = User::find($id);

        if ($user) {
            // Toggle the status
            $user->status = $user->status === 'pending' ? 'confirmed' : 'pending';
            $user->save();

            $newStatus = $user->status === 'pending' ? 'Pending' : 'Confirmed';

            Alert::success('Success', "User status set to $newStatus.")->showConfirmButton('OK');

            return redirect()->back();
        } else {
            Alert::error('Error', 'User not found.')->showConfirmButton('OK');

            return redirect()->back();
        }
    }

    public function updateTransactionStatus($id)
    {
        $user = User::find($id);

        if ($user) {
            // Toggle the status
            $user->transaction_status = $user->transaction_status === 'active' ? 'suspended' : 'active';
            $user->save();

            $newStatus = $user->transaction_status === 'active' ? 'active' : 'suspended';

            Alert::success('Success', "User status set to $newStatus.")->showConfirmButton('OK');

            return redirect()->back();
        } else {
            Alert::error('Error', 'User not found.')->showConfirmButton('OK');

            return redirect()->back();
        }
    }

    public function deleteUser($id)
    {
        $user = User::find($id);
    
        if ($user) {
            $user->delete();
            return response()->json(['message' => 'User deleted successfully'], 200);
        } else {
            return response()->json(['error' => 'User not found'], 404);
        }
    }

    public function add(User $user)
    {
        return view('admin.add',compact('user'));
    }

    public function addMoney(User $user)
    {

       // dd('fj');

        $user->balance += request('amount');
        $user->save();

        Alert::success('Success', "User Add Money  Successfully.")->showConfirmButton('OK');

        return redirect()->route('admin');
    }

    public function remove(User $user)
    {
        return view('admin.remove',compact('user'));
    }

    public function removeMoney(User $user)
    {

       // dd('fj');

        $user->balance -= request('amount');
        $user->save();

        Alert::success('Success', "User Remove Money  Successfully.")->showConfirmButton('OK');

        return redirect()->route('admin');
    }

    public function edit(User $user)
    {
        return view('admin.edit_user', compact('user'));
    }

    public function update(Request $request, User $user)
{
    //dd($request->all());
  
    $request->validate([
        'name' => 'required',
        'username' => 'required',
        'email' => 'required|email',
        'phone' => 'required',
        'city' => 'required',
        'state' => 'required',
        'address' => 'required',
        'Nationality' => 'required',
        'next_kin_relation' => 'required',
        'next_kin_address' => 'required',
    ]);

    $user->update([
        'name' => $request->input('name'),
        'username' => $request->input('username'),
        'email' => $request->input('email'),
        'phone' => $request->input('phone'),
        'city' => $request->input('city'),
        'state' => $request->input('state'),
        'address' => $request->input('address'),
        'Nationality' => $request->input('Nationality'),
        'next_kin_relation' => $request->input('next_kin_relation'),
        'next_kin_address' => $request->input('next_kin_address'),
    ]);
    $user->save();

    Alert::success('Success', "User updated successfully.")->showConfirmButton('OK');

    return redirect()->route('admin');
}

// public function addMoney(User $user)
// {

//    // dd('fj');

//     $user->balance += request('amount');
//     $user->save();

//     Alert::success('Success', "User Add Money  Successfully.")->showConfirmButton('OK');

//     return redirect()->route('admin');
// }

}
