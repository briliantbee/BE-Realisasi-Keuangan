<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class MonevRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'program_activity_id' => ['required', 'exists:program_activities,id'],
            'date' => ['required', 'date'],
            'target' => ['required', 'integer'],
            'realization' => ['required', 'integer'],
            'unit_id' => [
                'required', 
                Rule::exists('params', 'id')->where(function($query) {
                    $query->where('category', 'unit');
                })
            ],
            'narasi' => ['required', 'string'],
            'constraint' => ['required', 'string'],
            'solution' => ['required', 'string'],
        ];
    }
}
