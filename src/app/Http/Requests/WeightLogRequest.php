<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WeightLogRequest extends FormRequest
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
            'date' => 'required',
            'weight' => [
        'required',
        function ($attribute, $value, $fail) {
            // 数値かどうかチェック
            if (!is_numeric($value)) {
                $fail('数字で入力してください');
                return; // それ以上のチェックはスキップ
            }

            // 数字の桁数チェック（小数点除く）
            $digitsOnly = str_replace('.', '', $value);
            if (strlen($digitsOnly) > 4) {
                $fail('4桁までの数字で入力してください');
            }

            // 小数点以下が1桁以内か
            if (!preg_match('/^\d+(\.\d{1})?$/', $value)) {
                $fail('小数点は1桁で入力してください');
            }
        },
    ],
    
            'calories' => 'required|numeric',
            'exercise_time' => 'required',
            'exercise_content' => 'required|max:120',
        ];
    }

    public function messages()
{
    return [
        'date.required' => '日付を入力してください',
        'weight.required' => '体重を入力してください',
        'calories.required' => '摂取カロリーを入力してください',
        'calories.numeric' => '数字で入力してください',
        'exercise_time.required' => '運動時間を入力してください',
        'exercise_content.required' => '運動内容を入力してください',
        'exercise_content.max:120' => '120文字以内で入力してください',
        // 以下はカスタムバリデーション関数の中で返してるので messages() では書かない：
        // - 数字で入力してください
        // - 4桁までの数字で入力してください
        // - 小数点は1桁で入力してください
    ];
}
}
