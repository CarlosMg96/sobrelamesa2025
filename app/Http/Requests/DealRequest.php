<?php

namespace App\Http\Requests;

use App\Traits\FailureResponse;
use Illuminate\Foundation\Http\FormRequest;

class DealRequest extends FormRequest
{
    use FailureResponse;
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
            //
            'id' => 'required',
            'name' => 'required',
            'client_id' => 'required',
            'practice_area_ids' => 'required',
            'branches' => 'required',
            'deal_size' => 'required',
            'send_publications' => 'required',
            'publication_social_media' => 'required',
            'confidential' => 'required',
            // 'authorized_publications' => 'required',
            'authorized_by' => 'required_if_accepted:send_publications',
            'summary' => 'required',
            'nomination_dofy' => 'required',
            // 'highlights' => 'required',
            // 'partner_id' => 'required',
            // 'team_members' => 'required',
            'is_cross_border' => 'required',
            // 'coverage_links' => 'required',
            // 'completion_date' => 'required',
        ];
    }
}
