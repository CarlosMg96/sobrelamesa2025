<?php
namespace App\Http\Requests;

use App\Traits\FailureResponse;
use Illuminate\Foundation\Http\FormRequest;

class ServiceProposalRequest extends FormRequest
{
    use FailureResponse;
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'nullable|string|max:255|unique:service_proposals,name',
            'person_whom_addressed' => 'nullable|string|max:255',
            'person_charge' => 'nullable|string|max:255',
            'clients_short_name' => 'nullable|string|max:255',
            'clients_full_name' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'hourly_fee' => 'nullable|boolean',
            'cap_fee' => 'nullable|boolean',
            'estimated_fee' => 'nullable|boolean',
            'fixed_fee' => 'nullable|boolean',
            'stage_fee' => 'nullable|boolean',
            'various_billing_schemes' => 'nullable|boolean',
            'busted_deal_discount' => 'nullable|boolean',
        ];
    }
}
