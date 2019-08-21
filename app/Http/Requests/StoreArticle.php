<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreArticle extends FormRequest
{
    public function rules()
    {
        return [
            'title' => ['required','min:3','max:255'],
            'content' => ['required','min:10']
        ];
    }
}
