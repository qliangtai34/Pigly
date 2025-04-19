<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WeightRegisterRequest extends FormRequest
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
        'weight' => [
    'required',
    function ($attribute, $value, $fail) {
        // 小数点を除いた純粋な数字の桁数チェック
        $digitsOnly = str_replace('.', '', $value);
        if (strlen($digitsOnly) > 4) {
            $fail('4桁までの数字で入力してください');
        }

        // 小数点以下が1桁かどうかのチェック
        if (!preg_match('/^\d+(\.\d{1})?$/', $value)) {
            $fail('小数点以下は1桁までにしてください');
        }
    },
],

        'target_weight' => ['required',
    function ($attribute, $value, $fail) {
        // 小数点を除いた純粋な数字の桁数チェック
        $digitsOnly = str_replace('.', '', $value);
        if (strlen($digitsOnly) > 4) {
            $fail('4桁までの数字で入力してください');
        }

        // 小数点以下が1桁かどうかのチェック
        if (!preg_match('/^\d+(\.\d{1})?$/', $value)) {
            $fail('小数点以下は1桁までにしてください');
        }
    },],
    ];
}


    public function messages()
     {
         return [
             'weight.required' => '現在の体重を入力してください',
            
             'target_weight.required' => '目標の体重を入力してください',
             
         ];
     }
}
