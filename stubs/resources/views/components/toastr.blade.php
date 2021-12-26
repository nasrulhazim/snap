@if (session()->has('message'))
    <div class="fixed bottom-4 md:bottom-8 left-0 right-0 mx-auto px-4 md:px-0 md:left-auto md:right-8 w-full md:w-2/6 z-10"
        x-data="{ showToastr: true }" x-init="setTimeout(() => showToastr = false, 2000)">

        <div class="bg-blue-50 border border-blue-500 shadow-md rounded-lg py-2.5 px-4 flex items-center"
            x-show="showToastr">
            <div class="bg-blue-100 h-8 w-8 rounded-full inline-flex items-center justify-center mr-3">
                <x-icon name="o-exclamation" class="text-blue-500"></x-icon>
            </div>
            <span>{{ session('message') }}</span>
            <x-icon x-on:click="showToastr = false" name="x"
                class="text-gray-500 p-1 w-6 h-6 ml-auto hover:text-gray-700 cursor-pointer"></x-icon>
        </div>
    </div>
@endif
