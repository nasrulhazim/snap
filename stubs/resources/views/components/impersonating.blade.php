@impersonating
    <div class="bg-primary-100 py-2 text-black text-center">
        <div>
            <x-icon name="o-exclamation" class="mb-1 w-5 h-5 text-primary-500 hidden md:inline-block mr-1"></x-icon>
            <span>You're currently impersonating</span>
            <span class="font-medium">{{ Auth::user()->name }}</span>
            <a class="text-primary-500 font-semibold block md:inline-block" href="{{ route('impersonate.leave') }}">Leave Impersonation</a>
        </div>
    </div>
@endImpersonating
