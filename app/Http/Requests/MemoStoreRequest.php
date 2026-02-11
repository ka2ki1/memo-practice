<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MemoStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Day4でPolicyに寄せるので今はOK
    }

    public function rules(): array
    {
        return [
            'body' => ['required', 'string', 'max:255'],
        ];
    }

    public function messages(): array
    {
        return [
            'body.required' => 'メモは必須です。',
            'body.max' => 'メモは255文字以内で入力してください。',
        ];
    }
}

