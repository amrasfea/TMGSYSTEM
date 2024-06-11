<x-staff-layout>
<!-- Page header with title "Report" -->
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Report') }}
    </h2>
</x-slot>

<style>
    .form-label {
        font-weight: 600;
        margin-right: 0.5rem;
        color: #4a5568; /* text-gray-700 */
    }

    .form-select, .form-button {
        padding: 0.5rem 1rem;
        margin-right: 1rem;
        border: 1px solid #cbd5e0; /* border-gray-300 */
        border-radius: 0.375rem; /* rounded-md */
        background-color: #fff; /* bg-white */
        color: #4a5568; /* text-gray-700 */
        transition: border-color 0.3s ease;
    }

    .form-select:focus, .form-button:focus {
        border-color: #3182ce; /* border-blue-500 */
        outline: none;
    }

    .form-container {
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .form-button {
        background-color: #0062cc; /* bg-blue-500 */
        color: #fff; /* text-white */
        cursor: pointer;
    }

    .form-button:hover {
        background-color: #2b6cb0; /* bg-blue-700 */
    }
</style>

<!-- Main content section -->
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
             <!-- Display success message if present in session -->
                <div>
                    @if(session()->has('success'))
                        <div class="success-message">
                            {{ session('success') }}
                        </div>
                    @endif
                </div>

                <!-- Search Form -->
                <form method="GET" action="{{ route('users.report') }}" class="form-container mb-4">
                    <div class="flex items-center">
                        <label for="batch" class="form-label">Batch:</label>
                        <select id="batch" name="batch" class="form-select">
                            <option value="" disabled selected>Select Batch</option>
                            @for ($i = 1; $i <= 10; $i++)
                                <option value="{{ $i }}" {{ request('batch') == $i ? 'selected' : '' }}>{{ $i }}</option>
                            @endfor
                        </select>
                    </div>

                    <div class="flex items-center">
                        <label for="eduInstitute" class="form-label">Educational Institute:</label>
                        <select id="eduInstitute" name="university" class="form-select">
                            <option value="" disabled selected>Select your educational institute</option>
                              <!-- List of universities with selected option logic -->
                            <option value="University of Malaya" {{ request('university') == 'University of Malaya' ? 'selected' : '' }}>University of Malaya (UM)</option>
                            <option value="Universiti Kebangsaan Malaysia" {{ request('university') == 'Universiti Kebangsaan Malaysia' ? 'selected' : '' }}>Universiti Kebangsaan Malaysia (UKM)</option>
                            <option value="Universiti Sains Malaysia" {{ request('university') == 'Universiti Sains Malaysia' ? 'selected' : '' }}>Universiti Sains Malaysia (USM)</option>
                            <option value="Universiti Putra Malaysia" {{ request('university') == 'Universiti Putra Malaysia' ? 'selected' : '' }}>Universiti Putra Malaysia (UPM)</option>
                            <option value="Universiti Teknologi Malaysia" {{ request('university') == 'Universiti Teknologi Malaysia' ? 'selected' : '' }}>Universiti Teknologi Malaysia (UTM)</option>
                            <option value="Universiti Teknologi MARA" {{ request('university') == 'Universiti Teknologi MARA' ? 'selected' : '' }}>Universiti Teknologi MARA (UiTM)</option>
                            <option value="Universiti Utara Malaysia" {{ request('university') == 'Universiti Utara Malaysia' ? 'selected' : '' }}>Universiti Utara Malaysia (UUM)</option>
                            <option value="Universiti Malaysia Sabah" {{ request('university') == 'Universiti Malaysia Sabah' ? 'selected' : '' }}>Universiti Malaysia Sabah (UMS)</option>
                            <option value="Universiti Malaysia Pahang" {{ request('university') == 'Universiti Malaysia Pahang' ? 'selected' : '' }}>Universiti Malaysia Pahang (UMP)</option>
                            <option value="Universiti Pendidikan Sultan Idris" {{ request('university') == 'Universiti Pendidikan Sultan Idris' ? 'selected' : '' }}>Universiti Pendidikan Sultan Idris (UPSI)</option>
                            <option value="Universiti Islam Antarabangsa Malaysia" {{ request('university') == 'Universiti Islam Antarabangsa Malaysia' ? 'selected' : '' }}>Universiti Islam Antarabangsa Malaysia (UIAM)</option>
                            <option value="Universiti Sains Islam Malaysia" {{ request('university') == 'Universiti Sains Islam Malaysia' ? 'selected' : '' }}>Universiti Sains Islam Malaysia (USIM)</option>
                            <option value="Universiti Tun Hussein Onn Malaysia" {{ request('university') == 'Universiti Tun Hussein Onn Malaysia' ? 'selected' : '' }}>Universiti Tun Hussein Onn Malaysia (UTHM)</option>
                            <option value="Universiti Teknikal Malaysia Melaka" {{ request('university') == 'Universiti Teknikal Malaysia Melaka' ? 'selected' : '' }}>Universiti Teknikal Malaysia Melaka (UTEM)</option>
                            <option value="Universiti Sultan Zainal Abidin" {{ request('university') == 'Universiti Sultan Zainal Abidin' ? 'selected' : '' }}>Universiti Sultan Zainal Abidin (UniSZA)</option>
                            <option value="Universiti Malaysia Perlis" {{ request('university') == 'Universiti Malaysia Perlis' ? 'selected' : '' }}>Universiti Malaysia Perlis (UniMAP)</option>
                            <option value="Universiti Malaysia Kelantan" {{ request('university') == 'Universiti Malaysia Kelantan' ? 'selected' : '' }}>Universiti Malaysia Kelantan (UMK)</option>
                            <option value="Universiti Pertahanan Nasional Malaysia" {{ request('university') == 'Universiti Pertahanan Nasional Malaysia' ? 'selected' : '' }}>Universiti Pertahanan Nasional Malaysia (UPNM)</option>
                            <option value="Universiti Malaysia Sarawak" {{ request('university') == 'Universiti Malaysia Sarawak' ? 'selected' : '' }}>Universiti Malaysia Sarawak (UNIMAS)</option>
                            <option value="Other" {{ request('university') == 'Other' ? 'selected' : '' }}>Other</option>
                        </select>
                    </div>
                    <!-- Search button -->
                    <button type="submit" class="form-button">Search</button>
                </form>

                <!-- PDF Generation Form -->
                <form method="GET" action="{{ route('users.report.pdf') }}" class="flex items-center mb-4">
                    <input type="hidden" name="batch" value="{{ request('batch') }}">
                    <input type="hidden" name="university" value="{{ request('university') }}">
                    <button type="submit" class="form-button">Generate PDF</button>
                </form>

                <!-- Users table -->
                <table class="min-w-full bg-white rounded-lg overflow-hidden">
                    <thead class="bg-gray-800 text-white">
                        <tr>
                            <th class="py-2 px-4">{{ __('Name') }}</th>
                            <th class="py-2 px-4">{{ __('Email') }}</th>
                            <th class="py-2 px-4">{{ __('User Type') }}</th>
                            <th class="py-2 px-4">{{ __('Batch') }}</th>
                            <th class="py-2 px-4">{{ __('University') }}</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($users as $user)
                            <tr>
                                <td class="py-2 px-4">{{ $user->name }}</td>
                                <td class="py-2 px-4">{{ $user->email }}</td>
                                <td class="py-2 px-4">{{ $user->roleType }}</td>
                                <td class="py-2 px-4">{{ $user->P_batch }}</td> <!-- Assuming 'P_batch' is a field in your User model -->
                                <td class="py-2 px-4">{{ $user->P_edu_institute }}</td> <!-- Assuming 'P_edu_institute' is a field in your User model -->
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Pagination Links -->
                <div class="mt-4">
                    {{ $users->links() }}
                </div>

            </div>
        </div>
    </div>
</div>
</x-staff-layout>
