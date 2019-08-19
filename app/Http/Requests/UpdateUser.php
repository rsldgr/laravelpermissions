<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class UpdateUser extends FormRequest
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
        $userID = $this->user->id;
        return [
            'name' => [
                'required',
                'unique:users,name,'.$userID.',id',
                //Rule::unique('users', 'name')->ignore($this->user),
                'min:4'

            ],
            'permissions' => 'nullable|exists:permissions,id|array',
            'roles' => 'nullable|exists:roles,id|array',
            'email' => 'required|email|unique:users,email,'.$userID.',id',
            'password' => 'nullable|min:8',
            'is_admin' => 'boolean|digits_between:0,1',
            'is_banned' => 'boolean|digits_between:0,1',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'A Name is required',
            'name.unique' => 'A Name must be Unique Our Database',
            'name.min' => 'Name field must minimum 4 Character',
            'email.required'  => 'A Email is required',
            'email.unique'  => 'A Email is unique',
            'email.email'  => 'A Email must be an Email',
            'permissions.exists'  => 'Permissions must be Registered Permission',
            'permissions.array'  => 'Permissions must be an Array',
            
            'roles.exists'  => 'Roles must be Registered Permission',
            'roles.array'  => 'Roles must be an Array',
        ];
    }
}
