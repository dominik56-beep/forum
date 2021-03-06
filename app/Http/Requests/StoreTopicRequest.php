<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTopicRequest extends FormRequest
{
    protected $stopOnFirstFailure = true;
    protected $redirectRoute = 'topic.create';

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
            'name' => 'required|string',
            'text' => 'required|string',
            'files' => 'nullable|array|max:5|min:1',
            'files.*' => 'file|mimes:png,jpg,jpeg',
        ];
    }
}
