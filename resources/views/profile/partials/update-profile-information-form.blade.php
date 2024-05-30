<section>


    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>
        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>


        @if(Auth::user()->roleType === 'Platinum')
        <!-- Inside the form -->


    <div>
        <x-input-label for="P_identity_card" :value="__('Identity Card')" />
        <x-text-input id="P_identity_card" name="P_identity_card" type="text" class="mt-1 block w-full" :value="old('P_identity_card', $user->P_identity_card ?? '')" required autofocus autocomplete="P_identity_card" />
        <x-input-error class="mt-2" :messages="$errors->get('P_identity_card')" />
    </div>

    <div>
    <x-input-label for="P_registration_type" :value="__('Registration Type')" />
    <select id="P_registration_type" name="P_registration_type" class="mt-1 block w-full" required>
        <option value="premier" {{ old('P_registration_type', $user->P_registration_type ?? '') == 'premier' ? 'selected' : '' }}>Premier</option>
        <option value="new" {{ old('P_registration_type', $user->P_registration_type ?? '') == 'new' ? 'selected' : '' }}>New</option>
        <option value="upgrade" {{ old('P_registration_type', $user->P_registration_type ?? '') == 'upgrade' ? 'selected' : '' }}>Upgrade (Premier)</option>
        <option value="downgrade" {{ old('P_registration_type', $user->P_registration_type ?? '') == 'downgrade' ? 'selected' : '' }}>Downgrade (Elite)</option>
        <option value="ala_carte" {{ old('P_registration_type', $user->P_registration_type ?? '') == 'ala_carte' ? 'selected' : '' }}>Ala Carte</option>
    </select>
    <x-input-error class="mt-2" :messages="$errors->get('P_registration_type')" />
</div>

    <div>
    <x-input-label for="P_title" :value="__('Title')" />
    <select id="P_title" name="P_title" class="mt-1 block w-full" required>
        <option value="Mr" {{ old('P_title', $user->P_title ?? '') == 'Mr' ? 'selected' : '' }}>Mr</option>
        <option value="Miss" {{ old('P_title', $user->P_title ?? '') == 'Miss' ? 'selected' : '' }}>Miss</option>
        <option value="Mrs" {{ old('P_title', $user->P_title ?? '') == 'Mrs' ? 'selected' : '' }}>Mrs</option>
        <option value="Ms" {{ old('P_title', $user->P_title ?? '') == 'Ms' ? 'selected' : '' }}>Ms</option>
        <option value="Dr" {{ old('P_title', $user->P_title ?? '') == 'Dr' ? 'selected' : '' }}>Dr</option>
        <option value="Prof" {{ old('P_title', $user->P_title ?? '') == 'Prof' ? 'selected' : '' }}>Prof</option>
    </select>
    <x-input-error class="mt-2" :messages="$errors->get('P_title')" />
</div>

    <div>
        <x-input-label for="P_religion" :value="__('Religion')" />
        <x-text-input id="P_religion" name="P_religion" type="text" class="mt-1 block w-full" :value="old('P_religion', $user->P_religion ?? '')" required autofocus autocomplete="P_religion" />
        <x-input-error class="mt-2" :messages="$errors->get('P_religion')" />
    </div>

    <div>
        <x-input-label for="P_race" :value="__('Race')" />
        <x-text-input id="P_race" name="P_race" type="text" class="mt-1 block w-full" :value="old('P_race', $user->P_race ?? '')" required autofocus autocomplete="P_race" />
        <x-input-error class="mt-2" :messages="$errors->get('P_race')" />
    </div>

    <div>
        <x-input-label for="P_citizenship" :value="__('Citizenship')" />
        <x-text-input id="P_citizenship" name="P_citizenship" type="text" class="mt-1 block w-full" :value="old('P_citizenship', $user->P_citizenship ?? '')" required autofocus autocomplete="P_citizenship" />
        <x-input-error class="mt-2" :messages="$errors->get('P_citizenship')" />
    </div>

    <div>
        <x-input-label for="P_edu_level" :value="__('Education Level')" />
        <x-text-input id="P_edu_level" name="P_edu_level" type="text" class="mt-1 block w-full" :value="old('P_edu_level', $user->P_edu_level ?? '')" required autofocus autocomplete="P_edu_level" />
        <x-input-error class="mt-2" :messages="$errors->get('P_edu_level')" />
    </div>

    <div>
        <x-input-label for="P_edu_field" :value="__('Field of Study')" />
        <x-text-input id="P_edu_field" name="P_edu_field" type="text" class="mt-1 block w-full" :value="old('P_edu_field', $user->P_edu_field ?? '')" required autofocus autocomplete="P_edu_field" />
        <x-input-error class="mt-2" :messages="$errors->get('P_edu_field')" />
    </div>

    <div>
        <x-input-label for="P_edu_institute" :value="__('Educational Institute')" />
        <x-text-input id="P_edu_institute" name="P_edu_institute" type="text" class="mt-1 block w-full" :value="old('P_edu_institute', $user->P_edu_institute ?? '')" required autofocus autocomplete="P_edu_institute" />
        <x-input-error class="mt-2" :messages="$errors->get('P_edu_institute')" />
    </div>

    <div>
        <x-input-label for="P_occupation" :value="__('Occupation')" />
        <x-text-input id="P_occupation" name="P_occupation" type="text" class="mt-1 block w-full" :value="old('P_occupation', $user->P_occupation ?? '')" required autofocus autocomplete="P_occupation" />
        <x-input-error class="mt-2" :messages="$errors->get('P_occupation')" />
    </div>

    <div>
        <x-input-label for="P_sponsorship" :value="__('Sponsorship')" />
        <x-text-input id="P_sponsorship" name="P_sponsorship" type="text" class="mt-1 block w-full" :value="old('P_sponsorship', $user->P_sponsorship ?? '')" required autofocus autocomplete="P_sponsorship" />
        <x-input-error class="mt-2" :messages="$errors->get('P_sponsorship')" />
    </div>

    <div>
        <x-input-label for="P_address" :value="__('Address')" />
        <x-text-input id="P_address" name="P_address" type="text" class="mt-1 block w-full" :value="old('P_address', $user->P_address ?? '')" required autofocus autocomplete="P_address" />
        <x-input-error class="mt-2" :messages="$errors->get('P_address')" />
    </div>

    <div>
        <x-input-label for="P_phone" :value="__('Phone')" />
        <x-text-input id="P_phone" name="P_phone" type="text" class="mt-1 block w-full" :value="old('P_phone', $user->P_phone ?? '')" required autofocus autocomplete="P_phone" />
        <x-input-error class="mt-2" :messages="$errors->get('P_phone')" />
    </div>

    <div>
        <x-input-label for="P_fb_name" :value="__('Facebook Name')" />
        <x-text-input id="P_fb_name" name="P_fb_name" type="text" class="mt-1 block w-full" :value="old('P_fb_name', $user->P_fb_name ?? '')" required autofocus autocomplete="P_fb_name" />
        <x-input-error class="mt-2" :messages="$errors->get('P_fb_name')" />
    </div>

    <div>
    <x-input-label for="P_program" :value="__('Program')" />
    <select id="P_program" name="P_program" class="mt-1 block w-full" required>
        <option value="platinum_professorship" {{ old('P_program', $user->P_program ?? '') == 'platinum_professorship' ? 'selected' : '' }}>Platinum Professorship</option>
        <option value="platinum_premier" {{ old('P_program', $user->P_program ?? '') == 'platinum_premier' ? 'selected' : '' }}>Platinum Premier</option>
        <option value="premier" {{ old('P_program', $user->P_program ?? '') == 'premier' ? 'selected' : '' }}>Premier</option>
        <option value="elite" {{ old('P_program', $user->P_program ?? '') == 'elite' ? 'selected' : '' }}>Elite</option>
    </select>
    <x-input-error class="mt-2" :messages="$errors->get('P_program')" />
</div>

    <div>
        <x-input-label for="P_batch" :value="__('Batch')" />
        <x-text-input id="P_batch" name="P_batch" type="number" class="mt-1 block w-full" :value="old('P_batch', $user->P_batch ?? '')" required autofocus autocomplete="P_batch" />
        <x-input-error class="mt-2" :messages="$errors->get('P_batch')" />
    </div>

 
        @elseif(Auth::user()->roleType === 'Staff')

        <!-- Inside the form -->
        <div>
            <x-input-label for="profile_photo_path" :value="__('Profile Photo')" />
             <input id="profile_photo_path" type="file" name="profile_photo_path" class="mt-1 block w-full">
        </div>

            <div>
                <x-input-label for="S_position" :value="__('Position')" />
                <x-text-input id="S_position" name="S_position" type="text" class="mt-1 block w-full" :value="old('S_position', $user->staff->S_position ?? '')" required autofocus autocomplete="S_position" />
                <x-input-error class="mt-2" :messages="$errors->get('S_position')" />
            </div>
            <div>
                <x-input-label for="S_department" :value="__('Department')" />
                <x-text-input id="S_department" name="S_department" type="text" class="mt-1 block w-full" :value="old('S_department', $user->staff->S_department ?? '')" required autofocus autocomplete="S_department" />
                <x-input-error class="mt-2" :messages="$errors->get('S_department')" />
            </div>

            <div>
                <x-input-label for="S_phone" :value="__('Phone Number')" />
                <x-text-input id="S_phone" name="S_phone" type="text" class="mt-1 block w-full" :value="old('S_phone', $user->staff->S_phone ?? '')" required autofocus autocomplete="S_phone" />
                <x-input-error class="mt-2" :messages="$errors->get('S_phone')" />
            </div>

            <div>
                <x-input-label for="S_address" :value="__('Address')" />
                <x-text-input id="S_skills" name="S_address" type="text" class="mt-1 block w-full" :value="old('S_address', $user->staff->S_address?? '')" required autofocus autocomplete="S_address" />
                <x-input-error class="mt-2" :messages="$errors->get('S_address')" />
            </div>

            <div>
                <x-input-label for="S_skills" :value="__('Skills And Expertise')" />
                <x-text-input id="S_skills" name="S_skills" type="text" class="mt-1 block w-full" :value="old('S_skills', $user->staff->S_skills ?? '')" required autofocus autocomplete="S_skills" />
                <x-input-error class="mt-2" :messages="$errors->get('S_skills')" />
            </div>

            <div>
                <x-input-label for="S_workExperience" :value="__('Work Experiences')" />
                <x-text-input id="S_workExperience" name="S_workExperience" type="text" class="mt-1 block w-full" :value="old('S_workExperience', $user->staff->S_workExperience ?? '')" required autofocus autocomplete="S_workExperience" />
                <x-input-error class="mt-2" :messages="$errors->get('S_workExperience')" />
            </div>

            
        @elseif(Auth::user()->roleType === 'Mentor')
            <div>
                <x-input-label for="M_phoneNum" :value="__('Phone Number')" />
                <x-text-input id="M_phoneNum" name="M_phoneNum" type="text" class="mt-1 block w-full" :value="old('M_phoneNum', $user->mentor->M_phoneNum ?? '')" required autofocus autocomplete="M_phoneNum" />
                <x-input-error class="mt-2" :messages="$errors->get('M_phoneNum')" />
            </div>

            <div>
                <x-input-label for="M_position" :value="__('Position')" />
                <x-text-input id="M_position" name="M_position" type="text" class="mt-1 block w-full" :value="old('M_position', $user->mentor->M_position ?? '')" required autofocus autocomplete="M_position" />
                <x-input-error class="mt-2" :messages="$errors->get('M_position')" />
            </div>

            <div>
                <x-input-label for="M_title" :value="__('Title')" />
                <x-text-input id="M_title" name="M_title" type="text" class="mt-1 block w-full" :value="old('M_title', $user->mentor->M_title ?? '')" required autofocus autocomplete="M_title" />
                <x-input-error class="mt-2" :messages="$errors->get('M_title')" />
            </div>

            <div>
                <x-input-label for="M_eduField" :value="__('Educational nformation')" />
                <x-text-input id="M_eduField" name="M_eduField" type="text" class="mt-1 block w-full" :value="old('M_eduField', $user->mentor->M_eduField?? '')" required autofocus autocomplete="M_eduField" />
                <x-input-error class="mt-2" :messages="$errors->get('M_eduField')" />
            </div>

            <div>
                <x-input-label for="M_employementHistory" :value="__('Employment History')" />
                <x-text-input id="M_employementHistory" name="M_employementHistory" type="text" class="mt-1 block w-full" :value="old('M_employementHistory', $user->mentor->M_employementHistory?? '')" required autofocus autocomplete="M_employementHistory" />
                <x-input-error class="mt-2" :messages="$errors->get('M_employementHistory')" />
            </div>

            
        @endif

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

        </div>
    </form>
</section>
