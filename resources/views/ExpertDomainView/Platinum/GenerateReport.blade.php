<x-platinum-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Report') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('platinum.reportResult') }}">
                        @csrf
                        <div class="mb-4">
                            <label for="report_type" class="block text-gray-700 text-sm font-bold mb-2">Enter Report Details:</label>
                            <input type="text" id="repot_type" name="report_type" placeholder="Enter report details">
                        </div>

                        <div class="mb-4">
                            <label for="report_date" class="block text-gray-700 text-sm font-bold mb-2">Select Date:</label>
                            <input type="date" name="report_date" id="report_date" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>

                        <div class="mb-4">
                            <label for="expertise" class="block text-gray-700 text-sm font-bold mb-2">Select Expertise:</label>
                            <select name="expertise" id="expertise" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                <option value="" disabled selected>Select Expertise</option>
                                <option value="Mathematical Sciences">Mathematical Sciences</option>
                                <option value="Physics and Astronomy">Physics and Astronomy</option>
                                <option value="Chemical Science">Chemical Science</option>
                                <option value="Earth Science">Earth Science</option>
                                <option value="Biological Science">Biological Science</option>
                                <option value="Other Natural & Phys. Science">Other Natural & Phys. Science</option>
                                <option value="Information Technology">Information Technology</option>
                                <option value="Computer Science">Computer Science</option>
                                <option value="Programming">Programming</option>
                                <option value="Algorithm">Algorithm</option>
                                <option value="Computer Graphic">Computer Graphic</option>
                                <option value="Artificial Intelligence">Artificial Intelligence</option>
                                <option value="Database Management">Database Management</option>
                                <option value="System Analysis & Design">System Analysis & Design</option>
                                <option value="Cyber Securities">Cyber Securities</option>
                                <option value="Information System">Information System</option>
                                <option value="Civil Engineering">Civil Engineering</option>
                                <option value="Automotive">Automotive</option>
                                <option value="Electric and Electronic">Electric and Electronic</option>
                                <option value="Architecture & Building">Architecture & Building</option>
                                <option value="Agriculture">Agriculture</option>
                                <option value="Health">Health</option>
                                <option value="Education">Education</option>
                                <option value="Management & Commerce">Management & Commerce</option>
                                <option value="Sales & Marketing">Sales & Marketing</option>
                                <option value="Society & Culture">Society & Culture</option>
                                <option value="Justice & Law Enforcement">Justice & Law Enforcement</option>
                                <option value="Sport & Recreation">Sport & Recreation</option>
                                <option value="Creative Art">Creative Art</option>
                            </select>
                        </div>

                        <div class="mb-4 text-right">
                            <button type="submit" style="background-color: #0062cc; color: white; font-weight: bold; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; ">
                                GENERATE
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-platinum-layout>
