<?php

namespace App\Services;

use App\Models\Transaction;
use Illuminate\Database\QueryException;

class TransactionsService {
    public function create($data) {
        try {
            return Transaction::create($data);
        } catch (QueryException $queryException) {
            return false;
        }
    }

    public function update($transaction_id, $bank_transaction_id) {
        try {
            Transaction::where('id', $transaction_id)->update(['reference_code' => $bank_transaction_id]);

            return true;
        } catch (QueryException $queryException) {
            return false;
        }
    }

    public function updateStatus($reference_code, $status_id, $status_code, $status_text, $referenceID) {
        try {
            Transaction::where('reference_code', $reference_code)->update(
                ['status_id' => $status_id, 'status_code' => $status_code, 'status_text' => $status_text, 'referenceID' => $referenceID]
            );

            return true;
        } catch (QueryException $queryException) {
            return false;
        }
    }

    public function getPrice($reference_code) {
        return Transaction::query()->select('price')->where('reference_code', $reference_code)->first();
    }

    public function delete($transaction_id) {
        try {
            Transaction::findOrFail($transaction_id)->delete();

            return true;
        } catch (QueryException $queryException) {
            return false;
        }
    }
}
