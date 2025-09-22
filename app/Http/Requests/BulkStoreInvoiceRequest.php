<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class BulkStoreInvoiceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        // validation for array of object
        return [
            '*.customerId' => ['required', 'integer'],
            '*.amount' => ['required', 'numeric'],
            '*.status' => ['required', Rule::in('B', 'P', 'V', 'b', 'p', 'v')],
            '*.billDate' => ['required', 'date_format:Y-m-d H:i:s'],
            '*.paidDate' => ['date_format:Y-m-d H:i:s', 'nullable']
        ];
    }

    protected function prepareForValidation()
    {
        $data = [];

        foreach ($this->toArray() as $object) {
            $object['customer_id'] = $object['customerId'] ?? null;
            $object['bill_date'] = $object['billDate'] ?? null;
            $object['paid_date'] = $object['paidDate'] ?? null;

            $data[] = $object;
        }

        $this->merge($data);
    }
}
