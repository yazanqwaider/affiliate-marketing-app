<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\TransactionRequest;

class TransactionController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TransactionRequest $request)
    {
        $category_type = Category::find($request->category_id)->type;
        if($category_type == 'expenses' && ($request->amount > Auth::user()->balance)) {
            return redirect()->back()->with(['messageStatus' => 'danger', 'message' => 'You don\'t have enough money to do that !']);
        }
        
        $transaction = Auth::user()->transactions()->create($request->only('category_id', 'amount', 'note'));
        Auth::user()->increment('balance', $transaction->amount_with_sign);
        return redirect()->back()->with(['messageStatus' => 'success', 'message' => 'Added Successfully .']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(TransactionRequest $request, Transaction $transaction)
    {
        $category_type = Category::find($request->category_id)->type;
        if($category_type == 'expenses' && ($request->amount > Auth::user()->balance)) {
            return redirect()->back()->with(['messageStatus' => 'danger', 'message' => 'You don\'t have enough money to do that !']);
        }
        
        Auth::user()->decrement('balance', $transaction->amount_with_sign);
        $transaction->update($request->only('category_id', 'amount', 'note'));
        Auth::user()->increment('balance', $transaction->amount_with_sign);
        return redirect()->back()->with(['messageStatus' => 'success', 'message' => 'Updated Successfully .']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
