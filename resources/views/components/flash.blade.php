@if (session()->has('success'))
    <div x-data="{ show: true }" x-show="show"  x-init="setTimeout(() => show = false, 4000)"
         class ="fixed bg-red-900 text-white py-2 px-4 rounded-xl bottom-3 m-0 h-10
         right-3 text-sm">
        <p>
            {{ session('success') }}
        </p>
    </div>
@endif
