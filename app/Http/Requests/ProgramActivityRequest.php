<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProgramActivityRequest extends FormRequest
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
            'priority_program_id' => [
                'required',
                Rule::exists('params', 'id')->where(function($query) {
                    $query->where('category', 'priority_program');
                })
            ],
            'name' => ['required', 'string'],
            'target' => ['required', 'integer'],
            'unit_id' => [
                'required', 
                Rule::exists('params', 'id')->where(function($query) {
                    $query->where('category', 'unit');
                })
            ],
            'budget' => ['required', 'integer'],
            'narrative' => ['nullable', 'string'],
            'narrative_outcome' => ['nullable', 'string'],
            'executor_id' => ['required', 'array'],
            'executor_id.*' => [
                'required_with:executor_id',
                Rule::exists('params', 'id')->where(function($query) {
                    $query->where('category', 'execution_unit');
                })
            ],
        ];
    }
}
