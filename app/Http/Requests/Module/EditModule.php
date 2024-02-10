<?php

namespace App\Http\Requests\Module;

use Illuminate\Foundation\Http\FormRequest;

class EditModule extends FormRequest
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
        $rules = [
            'name' => 'required|string|max:15',
            'type' => 'required',
        ];

        if (request("type") == 'image') {
            $rules['file'] = 'mimes:jpg,png';
        }

        if (request("type") == 'audio') {
            $rules['file'] = 'mimes:mp3';
        }

        if (request("type") == 'video') {
            $rules['file'] = 'mimes:mp4,mpeg';
        }

        return $rules;
    }
}
