<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Traits\SparcoTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TicketController extends Controller
{
    use SparcoTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function callback($uuid)
    {
        try {
            $data = $this->verifyTransaction($uuid);
            // if($data->status == 'TXN_AUTH_SUCCESSFUL' || $data->status == 'TXN_SUCCESSFUL' || $data->status == 'TXN_PROCESSING'){
                $ticket = Ticket::create([
                    'fname' => $data->customerFirstName,
                    'lname' => $data->customerLastName,
                    // 'email' => $data->customerEmail,
                    'phone' => $data->customerMobileWallet,
                    'trans_amount' => $data->transactionAmount,
                    'fee_amount' => $data->feeAmount,
                    'trans_rate' => $data->feePercentage,
                    'actual_amount' => $data->amount,
                    'ref' => $data->merchantReference,
                    'msg' => $data->message,
                    'status' => $data->status
                ]);
            // }
            return redirect()->route('ticket-status',  $ticket->ticketcode);
        } catch (\Throwable $th) {
            return redirect()->back();
        }
    }
    public function index()
    {
        $tickets = Ticket::latest()->get();
        return view('page.tickets.index', compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function response_back($id)
    {
        $ticket = Ticket::where('ticketcode', $id)->first();
        return view('page.print-ticket', compact('ticket'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
