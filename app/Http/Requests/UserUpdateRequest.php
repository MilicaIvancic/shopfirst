<?php
/**
 * Created by PhpStorm.
 * User: Milica
 * Date: 3/15/2019
 * Time: 6:28 PM
 */

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
{
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
            'name' => 'Regex:/^[A-Z][\D]+$/i|max:100',
            'surname' => 'Regex:/^[A-Z][\D]+$/i|max:100',
            'email' => 'email',
            'password' => 'Regex:/^(.){6,}$/',
            'active' => 'Regex:/^[0-1]$/',
            'adress' => 'Regex:/^[A-Z][a-zA-Z0-9\/\s]{10,}$/',
            'mobile' => 'Regex:/^[0-9]{9,15}$/'

        ];
    }

}