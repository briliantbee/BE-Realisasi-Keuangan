<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class NoteRequest extends FormRequest
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
            'title' => ['required', 'string'],
            'name' => ['required', 'string'],
            'institution' => ['required', 'string'],
            'date' => ['required', 'date'],
            'content' => ['nullable', 'string'],
            'instruction' => ['nullable', 'string'],

            'unit_id' => ['nullable', 'array'],
            'unit_id.*' => [
                'required_with:unit_id',
                Rule::exists('users', 'id')->where(function($query) {
                    $query->where('role', 'unit');
                })
            ], 

            'participant' => ['nullable', 'array'],
            'participant.*' => ['required_with:participant', 'string'],

            'note_follow_up' => ['nullable', 'array'],
            'note_follow_up.*.id' => ['nullable', 'exists:note_follow_ups,id'],
            'note_follow_up.*.title' => ['required_with:note_follow_up', 'string'],
            'note_follow_up.*.target_date' => ['required_with:note_follow_up', 'date'],
            'note_follow_up.*.status' => ['required_with:note_follow_up', 'in:progress,finish'],

            'material_preparation' => ['nullable', 'array'],
            'material_preparation.*' => ['required_with:material_preparation', 'string'],

            'file' => ['nullable', 'array'],
            'file.*.id' => ['nullable', 'exists:files,id'],
            'file.*.file' => ['required_without:file.*.id', 'file'],

            'document_notulensi' => ['nullable', 'array'],
            'document_notulensi.*.id' => ['nullable', 'exists:files,id'],
            'document_notulensi.*.file' => ['required_without:document_notulensi.*.id', 'file']
        ];
    }
}
