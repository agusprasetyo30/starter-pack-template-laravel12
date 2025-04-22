<?php

namespace App\Http\Requests\Master\Customer;

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
			'distributor_code' 		=> ['required', 'string'],
			'customer_code' 		=> ['required', 'string'],
			'customer_name' 		=> ['required', 'string'],
			'billto_code' 			=> ['required'],
			'sales_segment_code' 	=> ['required'],
			'sales_segment_name' 	=> ['required'],
			'salesman_code' 		=> ['required'],
			'salesman_name' 		=> ['required'],
			'address' 				=> ['required'],
			'city' 					=> ['required'],
			'district' 				=> ['required'],
			'phone_number' 			=> ['required', 'digits_between:10,15'],
			'mobile_number' 		=> ['required', 'digits_between:10,15'],
			'citizen_id_no' 		=> ['required'],
			'citizen_id_name' 		=> ['required'],
			'citizen_id_address' 	=> ['required'],
			'term_of_payment' 		=> ['required', 'numeric'],
			'visit_frequency' 		=> ['required', 'numeric'],
			'visit_day' 			=> ['required'],
			'latitude' 				=> ['required', 'numeric', 'between:-90,90'],
			'longitude' 			=> ['required', 'numeric', 'between:-180,180'],
			'is_active' 			=> ['required', 'in:0,1'],
		];
	}
}
