<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'titulo' => ['required','min:3','max:50'],
            'descricao_breve' => 'required|max:250',
            'descricao_1' => 'required|min:50',
            'descricao_2' => 'required|min:50',
            'slug' => 'required',
            'filename' => 'required',
            'img_card' => 'required',
        ];
    }
}
