<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MovieRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'release_date' => ['nullable', 'date'],
            'poster_url' => ['nullable', 'url'],
            'director' => ['nullable', 'string', 'max:255'],
            'runtime_minutes' => ['nullable', 'integer'],
            'actors' => ['nullable', 'string'],
        ];
    }
}
