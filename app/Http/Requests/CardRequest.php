<?php
/**
 * Created by PhpStorm.
 * User: Milica
 * Date: 3/13/2019
 * Time: 10:50 PM
 */

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class CardRequest extends FormRequest
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
            'size' => 'required',
            'sum' => 'required'
        ];
    }
}