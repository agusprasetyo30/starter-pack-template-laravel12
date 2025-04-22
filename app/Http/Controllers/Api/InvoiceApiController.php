<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Invoice\StoreRequest;
use Illuminate\Support\Facades\Response;

class InvoiceApiController extends Controller
{
    public function store(StoreRequest $request) {
        $dummyCustomerCode = "GKP6020D";
        $responses = [];

        // \Log::info("dummy request->input('invoice') => ", $request->input('invoices', []));
        // \Log::info("dummy request->validated() => ", $request->validated());

        // Ini nanti logika untuk mengecek customer_code yang terdapat pada tabel 'customers'

        foreach ($request->input('invoices', []) as $invoice) {
            $customerCode = $invoice['customer_code'];

            // Digunakan untuk mengecek customer_code yang terdapat pada database
            // $customerExist = Customer::where('customer_code', $customerCode)->exists();

            if ($dummyCustomerCode === $customerCode) {
                // logic untuk menyimpan ke database

                $responses[] = [
                    "invoice_no" => $invoice["invoice_no"],
                    "status"     => "success",
                    "message"    => "Invoice uploaded successfully"
                ];
            } else {
                
                $responses[] = [
                    "invoice_no" => $invoice["invoice_no"],
                    "status"     => "failed",
                    "message"    => "customer_code not found"
                ];
            }

        }

        return Response::created(['invoices' => $responses], "Successfully added/updated invoices", true);
    }
}
