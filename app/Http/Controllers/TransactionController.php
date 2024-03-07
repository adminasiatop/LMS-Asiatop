<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Departemen;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function store(Request $request)
    {
        // create new transaction
        $transaction = Transaction::create([
            'user_id' => $request->user_id,
            'full_name' => $request->full_name,
            'position' => $request->position,
            'status' => true,
        ]);

        // Get current user
        $userId = Auth::id();
        $user = User::findOrFail($userId);

        // // Validate the data submitted by user
        // $validator = Validator::make($request->all(), [
        //     'name' => 'required|max:255',
        //     'nik' => 'required|email|max:225|'. Rule::unique('users')->ignore($user->id),
        // ]);

        // // if fails redirects back with errors
        // if ($validator->fails()) {
        //     return redirect()->back()
        //         ->withErrors($validator)
        //         ->withInput();
        // }

        // Fill user model
        $user->fill([
            'nik' => $request->niks
        ]);

        // Save user to database
        $user->save();


        
        // get cart by user
        $carts = Cart::where('user_id', Auth::id())->get();

        // looping carts
        foreach ($carts as $cart) {
            // create new transaction detail
            $transaction->details()->create([
                'transaction_id' => $transaction->id,
                'series_id' => $cart->series_id,
            ]);
        }

        // delete all cart by user
        Cart::where('user_id', Auth::id())->delete();

        // return to landing page
        return redirect(route('landing'))->with('success', 'Thank you for your confirmation!');
    }
}
