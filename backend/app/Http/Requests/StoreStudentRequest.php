<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'fatherName' => 'nullable|string|max:255',
            'fatherProfession' => 'nullable|string|max:255',
            'fatherCompanyName' => 'nullable|string|max:255',
            'fatherPhoneNumber' => 'nullable|string|max:15',
            'motherName' => 'nullable|string|max:255',
            'motherProfession' => 'nullable|string|max:255',
            'motherCompanyName' => 'nullable|string|max:255',
            'motherPhoneNumber' => 'nullable|string|max:15',
            'birthDate' => 'nullable|date',
            'bithPlace' => 'nullable|string|max:255',
            'docId' => 'required|string|max:20|unique:students,docId',
            'address' => 'nullable|string|max:255',
            'neighborhood' => 'nullable|string|max:255',
            'stratum' => 'nullable|integer',
            'city' => 'nullable|string|max:255',
            'eps' => 'nullable|string|max:255',
            'weight' => 'nullable|numeric',
            'height' => 'nullable|numeric',
            'blood' => 'nullable|string|max:3',
            'contactEmail' => 'nullable|email|max:255',
            'contactPhone' => 'nullable|string|max:15',
            'school' => 'nullable|string|max:255',
            'grade' => 'nullable|string|max:50',
            'schoolCity' => 'nullable|string|max:255',
            'schoolStartHour' => 'nullable|date_format:H:i',
            'schoolEndHour' => 'nullable|date_format:H:i',
            'uniformSize' => 'nullable|string|max:10',
            'position' => 'nullable|string|max:255',
            'type' => 'nullable|string|max:50',
            'categories' => 'nullable|array',
            'categories.*' => 'exists:categories,id',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ];
    }
}
