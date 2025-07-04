<?php

namespace App\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSupplierRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $rules = [
            'name' => 'string|max:255',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'document_type' => 'string|max:50',
            'document_number' => [
                'string',
                'max:50',
                'unique:suppliers,document_number,' . $this->supplier?->id,
            ],
        ];

        if ($this->document_type === 'CPF') {
            $rules['document_number'][] = new ValidCpf();
        } elseif ($this->document_type === 'CNPJ') {
            $rules['document_number'][] = new ValidCnpj();
        }

        return $rules;
    }
}
