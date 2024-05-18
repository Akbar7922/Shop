<?php

namespace App\Http\Controllers;

use Payment;
use Session;
use Shetabit\Multipay\Invoice;

class PaymentController extends Controller {
    public function pay($price) {
        // $this->tid = $my_transaction_id;
        $invoice = (new Invoice)->amount($price);
        // Purchase and pay the given invoice.
        // You should use return statement to redirect user to the bank page.
        return Payment::purchase($invoice, function ($driver, $transactionId) {
            // Store transactionId in database as we need it to verify payment in the future.
            // update transactions table where id is mytransaction_id
            // $transactionsService = new TransactionsService();
            Session::put('from', 'http://satrapcctv.ir/callback?');
            // $transactionsService->update($this->tid, $transactionId);
        })->pay()->render();
    }
}
