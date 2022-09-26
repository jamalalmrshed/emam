<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OfferRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'=>'required|max:100 |unique:offers,name',
            'price'=>'required|numeric',
            'details'=>'required',
            'photo'=>'required',
        ];
    }

    public function messages()
    {
        return $massages = [
            'name.requied'=>'اسم العرض مطلوب',
            'name.max'=>'اسم العرض يحتوي على مئة حرف على الأكثر',
            'name.unique'=>'اسم العرض موجود',
            'price.numaric'=>'سعر العرض يجب ان يكون رقم ',
            'price.required'=>'سعر العرض مطلوب يجب ان يكون رقم',
            'details.required'=>'تفاصيل العرض مطلوبة',
            'photo.required'=>'صورة العرض مطلوبة',

        ];
    }
}
