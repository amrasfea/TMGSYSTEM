<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $user = $this->user();
        $roleType = $user->roleType;

        $commonRules = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($user->id)],
            'profile_photo_path' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'], // Profile photo validation
        ];

        $roleSpecificRules = $this->getRoleSpecificRules($roleType);

        return array_merge($commonRules, $roleSpecificRules);
    }

    protected function getRoleSpecificRules(string $roleType): array
    {
        switch ($roleType) {
            case 'Staff':
                return [
                    'S_position' => ['required', 'string', 'max:255'],
                    'S_department' => ['required', 'string', 'max:255'],
                ];

            case 'Mentor':
                return [
                    'M_phoneNum' => ['required', 'string', 'max:15'],
                ];

            case 'Platinum':
            default:
                return [
                    'P_registration_type' => ['nullable', 'string', 'max:255'],
                    'P_title' => ['nullable', 'string', 'max:255'],
                    'P_identity_card' => ['nullable', 'string', 'max:255'],
                    'P_gender' => ['nullable', 'string', 'max:255'],
                    'P_religion' => ['nullable', 'string', 'max:255'],
                    'P_race' => ['nullable', 'string', 'max:255'],
                    'P_citizenship' => ['nullable', 'string', 'max:255'],
                    'P_edu_level' => ['nullable', 'string', 'max:255'],
                    'P_edu_field' => ['nullable', 'string', 'max:255'],
                    'P_edu_institute' => ['nullable', 'string', 'max:255'],
                    'P_occupation' => ['nullable', 'string', 'max:255'],
                    'P_sponsorship' => ['nullable', 'string', 'max:255'],
                    'P_address' => ['nullable', 'string', 'max:255'],
                    'P_phone' => ['nullable', 'string', 'max:15'],
                    'P_fb_name' => ['nullable', 'string', 'max:255'],
                    'P_program' => ['nullable', 'string', 'max:255'],
                    'P_batch' => ['nullable', 'integer'],
                    'P_referral' => ['nullable', 'boolean'],
                    'P_referral_name' => ['nullable', 'string', 'max:255'],
                    'P_referral_batch' => ['nullable', 'string', 'max:255'],
                ];
        }
    }
}

