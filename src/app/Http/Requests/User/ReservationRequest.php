<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ReservationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'restaurant_id' => 'required|exists:restaurants,id',
            'reservation_date' => 'required|date|after:today',
            'time' => 'required|date_format:H:i|after:16:59|before:23:01',
            'number_of_people' => 'required|integer|min:1',
        ];
    }

    public function messages()
    {
        return [
            'reservation_date.after' => '予約日は今日以降の日付を選択してください。',
            'time.after' => '予約時間は営業開始時間以降でなければなりません。',
            'time.before' => '予約時間は営業終了時間より前でなければなりません。',
            'number_of_people.min' => '人数は1人以上でなければなりません。',
        ];
    }
}
