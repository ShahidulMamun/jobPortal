<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
         return [
        'full_name' => ['required', 'string', 'max:255'],
        'user_name' => (['nullable', 'string', 'max:255',Rule::unique('users', 'user_name')->ignore($this->user()->id)]),
        'email' => (['required', 'string', 'email', 'max:255',Rule::unique('users', 'email')->ignore($this->user()->id)]),
        'designation' => ['nullable', 'string', 'max:255'],
        'phone' => (['nullable', 'string', 'max:20',Rule::unique('users', 'phone')->ignore($this->user()->id)]),
        'photo' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        'experience_level' => ['nullable', 'string', 'max:100'],
        'skills' => ['nullable', 'string'],
        'country_id' => ['nullable', 'exists:countries,id'],
        'state_id' => ['nullable', 'exists:states,id'],
        'district_id' => ['nullable', 'exists:districts,id'],
        'city_id' => ['nullable', 'exists:cities,id'],
        'resume' => ['nullable', 'mimes:pdf,doc,docx', 'max:5120'],
        'bio' => ['nullable', 'string'],
        'timezone' => ['nullable', 'timezone'],
        'status' => ['nullable', 'in:pending,active,inactive,suspended,banned'],
        'password' => ['required', 'confirmed', \Illuminate\Validation\Rules\Password::defaults()],
    ];
    }
}
