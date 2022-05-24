<?php

namespace App\Http\Requests\Library;

use Illuminate\Foundation\Http\FormRequest;


class StoreBookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:100'],
            'author_id' => ['required', 'integer', 'exists:authors,id'],
        ];
    }
}
