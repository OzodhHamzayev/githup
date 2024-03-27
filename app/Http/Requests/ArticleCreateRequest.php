<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleCreateRequest extends FormRequest
{
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
            'title' => ['required','string','min:5', 'max:2000'],
            'content' => ['required','string','min:5', 'max:2000'],
            'sarlavha_haqida' => ['required','string','min:5', 'max:2000'],
            'image' => ['image','mimes:png,jpg'],
        ];
    }
}