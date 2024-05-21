<?php

namespace App\Http\Requests\TheLoai;

use Illuminate\Foundation\Http\FormRequest;

class ThemTheLoaiRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'ten_the_loai' => 'required|unique:the_loai',
            'trang_thai' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'ten_the_loai.required' => 'Bạn chưa nhập vào Tên thể loại.',
            'ten_the_loai.unique' => 'Thể loại này đã tồn tại, vui lòng điện tên khác!',
            
            'trang_thai.required' => 'Bạn chưa nhập vào Trạng thái.'
        ];
    }


    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'status' => 401,           
            //Trả về mã lỗi 401
            // 'message' => 'Validation error',
            'data' => $validator->errors()
        ]));        
        //Dùng để trả lại lỗi khi status = 401 và message là validation error

    }
}