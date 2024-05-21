<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;          //Vì không tự trả lại message như Laravel thường
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;          //Vì không tự trả lại message như Laravel thường

class AuthRequest extends FormRequest
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
            'email' => 'required|email',
            'password' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'Bạn chưa nhập vào email.',
            'email.email' => 'Email chưa đúng định dạng. Ví dụ: abc@gmail.com',
            'password.required' => 'Bạn chưa nhập vào mật khẩu.'
        ];
    }


    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'status' => 401,           //Trả về mã lỗi 401
            // 'message' => 'Validation error',
            'data' => $validator->errors()
        ]));        //Dùng để trả lại lỗi khi status = 401 và message là validation error

    }
}
