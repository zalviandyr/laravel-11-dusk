<?php

namespace App\Http\Requests\Book;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['required'],
            'synopsis' => ['required'],
            'author_id' => ['required', 'exists:users,id'],
        ];
    }
}
