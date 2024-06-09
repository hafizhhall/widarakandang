<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class DashboardJualController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transaction = Transaction::with([
            'user' => function($query){
                $query->select('id', 'name', 'city_name');
            }
        ])->get();
        return view('dashboard.transaction.index',[
            'transaction' => $transaction
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {

        $details = TransactionDetail::where('transaction_id', $transaction->id)->get();
        return view('dashboard.transaction.show', [
            'transaction' => $transaction,
            'details' => $details
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        return view('dashboard.transaction.edit',[
            'transaction' => $transaction
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaction $transaction)
    {

        $transaction = Transaction::findOrFail($transaction->id);
        $rules = [
            'resi' => 'required',
            'status_pesanan' => 'required'
        ];

        $validData = $request->validate($rules);
        DB::transaction(function () use ($transaction, $validData){
            $transaction->update($validData);
        });
        return redirect('/dashboard/transaction')->with('success', 'Berhasil simpan data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
