<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        if( isset($this->request->id) ){
            return [
                'name' => 'required',
                'email' => 'required',
                'password' => 'required',
                'role' => 'required'
            ];
        }
        else{
            return [
                'id' => 'required|exists:users,id',
                'name' => 'required',
                'email' => 'required',
                'role' => 'required|exists:roles,name'
            ];
        }
    }
}
