{{-- resources/views/layouts/partials/student-filters.blade.php --}}

<div class="bg-white p-6 rounded-xl shadow-md border border-gray-100/70">
    
    {{-- Type of Employment Filter --}}
    <div class="mb-6 border-b border-gray-100 pb-4">
        <h4 class="font-semibold text-gray-800 mb-3">Type of Employment</h4>
        <div class="space-y-2">
            <label class="flex items-center justify-between text-sm text-gray-700 cursor-pointer">
                <span class="flex items-center"><input type="checkbox" name="employment_type[]" value="full-time" checked class="form-checkbox text-gig-purple rounded-sm mr-2 focus:ring-gig-purple"> Full Time Jobs</span>
                <span class="text-xs text-gray-500">159</span>
            </label>
            <label class="flex items-center justify-between text-sm text-gray-700 cursor-pointer">
                <span class="flex items-center"><input type="checkbox" name="employment_type[]" value="part-time" checked class="form-checkbox text-gig-purple rounded-sm mr-2 focus:ring-gig-purple"> Part Time Jobs</span>
                <span class="text-xs text-gray-500">38</span>
            </label>
            <label class="flex items-center justify-between text-sm text-gray-700 cursor-pointer">
                <span class="flex items-center"><input type="checkbox" name="employment_type[]" value="remote" checked class="form-checkbox text-gig-purple rounded-sm mr-2 focus:ring-gig-purple"> Remote Jobs</span>
                <span class="text-xs text-gray-500">50</span>
            </label>
            <label class="flex items-center justify-between text-sm text-gray-700 cursor-pointer">
                <span class="flex items-center"><input type="checkbox" name="employment_type[]" value="internship" checked class="form-checkbox text-gig-purple rounded-sm mr-2 focus:ring-gig-purple"> Internship Jobs</span>
                <span class="text-xs text-gray-500">76</span>
            </label>
            <label class="flex items-center justify-between text-sm text-gray-700 cursor-pointer">
                <span class="flex items-center"><input type="checkbox" name="employment_type[]" value="training" checked class="form-checkbox text-gig-purple rounded-sm mr-2 focus:ring-gig-purple"> Training Jobs</span>
                <span class="text-xs text-gray-500">15</span>
            </label>
        </div>
    </div>

    {{-- Payment Type Filter --}}
    <div class="mb-6 border-b border-gray-100 pb-4">
        <h4 class="font-semibold text-gray-800 mb-3">Payment Type</h4>
        <div class="space-y-2">
            <label class="flex items-center justify-between text-sm text-gray-700 cursor-pointer">
                <span class="flex items-center"><input type="checkbox" name="payment_hourly" value="true" checked class="form-checkbox text-gig-purple rounded-sm mr-2 focus:ring-gig-purple"> Hourly</span>
                <span class="text-xs text-gray-500">38</span>
            </label>
            <label class="flex items-center justify-between text-sm text-gray-700 cursor-pointer">
                <span class="flex items-center"><input type="checkbox" name="payment_monthly" value="true" checked class="form-checkbox text-gig-purple rounded-sm mr-2 focus:ring-gig-purple"> Fixed Monthly</span>
                <span class="text-xs text-gray-500">50</span>
            </label>
        </div>
    </div>

    {{-- Salary Range Filter --}}
    <div class="mb-6 border-b border-gray-100 pb-4">
        <h4 class="font-semibold text-gray-800 mb-3">Salary Range</h4>
        <div class="flex space-x-2">
            <input type="number" name="salary_min" value="10000" class="w-1/2 border border-gray-300 rounded-lg px-2 py-1 text-sm">
            <input type="number" name="salary_max" value="500000" class="w-1/2 border border-gray-300 rounded-lg px-2 py-1 text-sm">
        </div>
    </div>
    
    {{-- Apply/Reset Buttons --}}
    <div class="flex justify-between space-x-3">
        <button class="bg-gig-purple text-white py-2 px-4 rounded-lg text-sm font-medium w-1/2 hover:bg-gig-purple-dark transition">Apply</button>
        <button class="bg-gray-200 text-gray-700 py-2 px-4 rounded-lg text-sm font-medium w-1/2 hover:bg-gray-300 transition">Reset</button>
    </div>

</div>