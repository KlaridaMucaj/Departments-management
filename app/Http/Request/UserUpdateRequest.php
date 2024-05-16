<?php
namespace App\Http\Request;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [

            'departament_id' => ['required'],
            'name' => ['required', 'min:3'],     
            'email' => Rule::unique('users')->ignore($this->route()->user->id),
            'role' => ['required'],
            'password' => 'confirmed|min:6',
            // 'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ];
    }


}