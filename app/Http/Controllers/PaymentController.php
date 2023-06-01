<?php

namespace App\Http\Controllers;

use App\Models\Billing;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('page.payments');
        return redirect()->route('patient');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Create a Payment
        $payload = [
            'name' => $request->fname.' '.$request->lname,
            'invoice_id' => $request->invoice_id,
            'total' => $request->total,
            'phone' => $request->phone,
            'email' => $request->email,
            ''
        ];
    }

    public function invoice($type){
       if($type == 'eyJpdiI6ImY0'){
            if(auth()->user()->hasRole('patient')){
                Billing::create([
                    'user_id' => auth()->user()->id,
                    'charge_amount' => 750,
                    'remainder_count' => 0,
                    'status' => 0,
                    'desc' => 'Cash Payer'
                ]);
            }
       }else{
            if(auth()->user()->hasRole('patient')){
                Billing::create([
                    'user_id' => auth()->user()->id,
                    'charge_amount' => 500,
                    'remainder_count' => 0,
                    'balance' => 500,
                    'status' => 0,
                    'desc' => 'Insurance Payer'
                ]);
            }
       }

       return redirect()->route('patient');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
