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
    <x-input-label for="profile_photo" :value="__('Profile Photo')" />
    <input id="profile_photo" type="file" name="profile_photo" class="mt-1 block w-full">
</div>


    <div>
        <x-input-label for="P_identity_card" :value="__('Identity Card')" />
        <x-text-input id="P_identity_card" name="P_identity_card" type="text" class="mt-1 block w-full" :value="old('P_identity_card', $user->P_identity_card ?? '')" required autofocus autocomplete="P_identity_card" />
        <x-input-error class="mt-2" :messages="$errors->get('P_identity_card')" />
    </div>

    <div>
        <x-input-label for="P_registration_type" :value="__('Registration Type')" />
        <x-text-input id="P_registration_type" name="P_registration_type" type="text" class="mt-1 block w-full" :value="old('P_registration_type', $user->P_registration_type ?? '')" required autofocus autocomplete="P_registration_type" />
        <x-input-error class="mt-2" :messages="$errors->get('P_registration_type')" />
    </div>

    <div>
        <x-input-label for="P_title" :value="__('Title')" />
        <x-text-input id="P_title" name="P_title" type="text" class="mt-1 block w-full" :value="old('P_title', $user->P_title ?? '')" required autofocus autocomplete="P_title" />
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
        <x-text-input id="P_program" name="P_program" type="text" class="mt-1 block w-full" :value="old('P_program', $user->P_program ?? '')" required autofocus autocomplete="P_program" />
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
    <x-input-label for="profile_photo" :value="__('Profile Photo')" />
    <input id="profile_photo" type="file" name="profile_photo" class="mt-1 block w-full">
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
        @elseif(Auth::user()->roleType === 'Mentor')
            <div>
                <x-input-label for="M_phoneNum" :value="__('Phone Number')" />
                <x-text-input id="M_phoneNum" name="M_phoneNum" type="text" class="mt-1 block w-full" :value="old('M_phoneNum', $user->mentor->M_phoneNum ?? '')" required autofocus autocomplete="M_phoneNum" />
                <x-input-error class="mt-2" :messages="$errors->get('M_phoneNum')" />
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

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
