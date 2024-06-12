<x-platinum-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Update Research & Publication') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('researchPublications.update', ['ED_ID' => $expertDomain->ED_ID, 'id' => $research->id]) }}">
                        @csrf
                        @method('POST')
                        <div class="mb-4">
                            <label for="R_title" class="block text-sm font-medium text-gray-700">{{ __('Research Title') }}</label>
                            <input type="text" name="R_title" id="R_title" value="{{ old('R_title', $research->R_title) }}" class="border rounded py-2 px-4 w-full">
                        </div>
                        <div class="mb-4">
                            <label for="PB_Type" class="block text-sm font-medium text-gray-700">{{ __('Publication Type') }}</label>
                            <input type="text" name="PB_Type" id="PB_Type" value="{{ old('PB_Type', $publication->PB_Type) }}" class="border rounded py-2 px-4 w-full">
                        </div>
                        <div class="mb-4">
                            <label for="PB_Title" class="block text-sm font-medium text-gray-700">{{ __('Publication Title') }}</label>
                            <input type="text" name="PB_Title" id="PB_Title" value="{{ old('PB_Title', $publication->PB_Title) }}" class="border rounded py-2 px-4 w-full">
                        </div>
                        <div class="mb-4">
                            <label for="PB_Author" class="block text-sm font-medium text-gray-700">{{ __('Publication Author') }}</label>
                            <input type="text" name="PB_Author" id="PB_Author" value="{{ old('PB_Author', $publication->PB_Author) }}" class="border rounded py-2 px-4 w-full">
                        </div>
                        <div class="mb-4">
                            <label for="PB_Uni" class="block text-sm font-medium text-gray-700">{{ __('Publication University') }}</label>
                            <input type="text" name="PB_Uni" id="PB_Uni" value="{{ old('PB_Uni', $publication->PB_Uni) }}" class="border rounded py-2 px-4 w-full">
                        </div>
                        <div class="mb-4">
                            <label for="PB_Page" class="block text-sm font-medium text-gray-700">{{ __('Publication Page') }}</label>
                            <input type="number" name="PB_Page" id="PB_Page" value="{{ old('PB_Page', $publication->PB_Page) }}" class="border rounded py-2 px-4 w-full">
                        </div>
                        <div class="mb-4">
                            <label for="PB_Detail" class="block text-sm font-medium text-gray-700">{{ __('Publication Detail') }}</label>
                            <textarea name="PB_Detail" id="PB_Detail" class="border rounded py-2 px-4 w-full">{{ old('PB_Detail', $publication->PB_Detail) }}</textarea>
                        </div>
                        <div class="mb-4">
                            <label for="PB_Date" class="block text-sm font-medium text-gray-700">{{ __('Publication Date') }}</label>
                            <input type="date" name="PB_Date" id="PB_Date" value="{{ old('PB_Date', $publication->PB_Date) }}" class="border rounded py-2 px-4 w-full">
                        </div>
                        <div class="flex justify-end">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">{{ __('Update') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-platinum-layout>
