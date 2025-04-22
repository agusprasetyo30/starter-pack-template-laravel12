<?php

namespace App\Http\Requests\Invoice;

use App\Http\Requests\BaseRequest;

class StoreRequest extends BaseRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'distributor_code' => ['required', 'string'],
            'invoices' => ['required', 'array', 'min:1'],
            'invoices.*.details' => ['required', 'array', 'min:1'],
        ] + $this->invoiceRulesLevel() + $this->detailInvoiceRulesLevel();
    }

    public function messages(): array {
        return [
            // Custom message for invoice
            'invoices.required' => 'Tax amount is required',
            'invoices.*.invoice_no.required' => 'Invoice no is required',
            'invoices.*.invoice_date.required' => 'Invoice date is required',
            'invoices.*.customer_code.required' => 'Customer code is required',
            'invoices.*.customer_name.required' => 'Customer name is required',
            'invoices.*.sales_segment_code.required' => 'Sales segment code is required',
            'invoices.*.sales_segment_name.required' => 'Sales segment name is required',
            'invoices.*.salesman_code.required' => 'Salesman code is required',
            'invoices.*.salesman_name.required' => 'Salesman name is required',
            'invoices.*.term_of_payment.required' => 'Term of payment is required',
            'invoices.*.total_gross_amount.required' => 'Total gross amount is required',
            'invoices.*.taxable_amount.required' => 'Taxable amount is required',
            'invoices.*.tax_percentage.required' => 'Tax percentage is required',
            'invoices.*.tax_amount.required' => 'Tax amount is required',
            
            // Custom invoice detail messages
            'invoices.*.details.*.product_sequence.required' => 'Product sequence is required',
            'invoices.*.details.*.product_sequence.numeric' => 'Product sequence must be numeric',
            'invoices.*.details.*.product_code.required' => 'Product code is required',
            'invoices.*.details.*.product_name.required' => 'Product name is required',
            'invoices.*.details.*.qty.required' => 'Product name is required',
            'invoices.*.details.*.qty.numeric' => 'Product sequence must be numeric',
            'invoices.*.details.*.uom_conversion_to_smallest.required' => 'UOM conversion is required',
            'invoices.*.details.*.uom_conversion_to_smallest.numeric' => 'UOM conversion must be numeric',
            'invoices.*.details.*.price.required' => 'UOM conversion is required',
            'invoices.*.details.*.price.numeric' => 'Price must be numeric',
            'invoices.*.details.*.line_gross_amount.required' => 'Line gross amount is required',
            'invoices.*.details.*.line_gross_amount.numeric' => 'Line gross amount must be numeric',
            'invoices.*.details.*.line_disc_amount.required' => 'Line discount amount is required',
            'invoices.*.details.*.line_disc_amount.numeric' => 'Line discount amount must be numeric',
            'invoices.*.details.*.line_net_amount.required' => 'Line net amount is required',
            'invoices.*.details.*.line_net_amount.numeric' => 'Line net amount must be numeric',
        ];
    }

    private function invoiceRulesLevel(): array {
        $invoiceRules = [
            'invoice_no' => ['required', 'string'],
            'invoice_date' => ['required', 'date'],
            'customer_code' => ['required', 'string'],
            'customer_name' => ['required', 'string'],
            'sales_segment_code' => ['required', 'string'],
            'sales_segment_name' => ['required', 'string'],
            'salesman_code' => ['required', 'string'],
            'salesman_name' => ['required', 'string'],
            'term_of_payment' => ['required', 'numeric'],
            'total_gross_amount' => ['required', 'numeric'],
            'taxable_amount' => ['required', 'numeric'],
            'tax_percentage' => ['required', 'numeric'],
            'tax_amount' => ['required', 'numeric'],
            'sales_order_no' => ['nullable', 'string'],
            'sales_order_date' => ['nullable','date'],
            'warehouse_code' => ['nullable','string'],
            'warehouse_name' => ['nullable','string'],
        ];

        // add parent array key to each rule
        $updatedRules = [];
        foreach ($invoiceRules as $key => $rule) {
            $updatedRules["invoices.*.$key"] = $rule;
        }
        
        return $updatedRules;
    }

    public function detailInvoiceRulesLevel(): array {
        $detailInvoiceRules = [
            'product_sequence' => ['required', 'numeric'],
            'product_code' => ['required', 'string'],
            'product_name' => ['required', 'string'],
            'qty' => ['required', 'numeric'],
            'uom_conversion_to_smallest' => ['required', 'numeric'],
            'price' => ['required', 'numeric'],
            'disc1_code' => ['nullable','string'],
            'disc1_percentage' => ['nullable','numeric'],
            'disc2_code' => ['nullable','string'],
            'disc2_percentage' => ['nullable','numeric'],
            'disc3_code' => ['nullable','string'],
            'disc3_percentage' => ['nullable','numeric'],
            'disc4_code' => ['nullable','string'],
            'disc4_percentage' => ['nullable','numeric'],
            'disc_value' => ['nullable','numeric'],
            'line_gross_amount' => ['required', 'numeric'],
            'line_disc_amount' => ['required', 'numeric'],
            'line_net_amount' => ['required', 'numeric']
        ];

        // add parent array key to each rule
        $updatedRules = [];
        foreach ($detailInvoiceRules as $key => $rule) {
            $updatedRules["invoices.*.details.*.$key"] = $rule;
        }
        
        return $updatedRules;
    }
}
