<x-ml-app-layout>
    <div class="relative flex items-top flex-col justify-center min-h-screen dark:bg-gray-900 sm:items-center sm:pt-0">
        <div class="font-semibold text-2xl text-blue-200">{{ __('Welcome to contest!') }}</div>
        <form action="/contest" method="post">
            @csrf
            <input type="text" name="email">
            <button>Enter Now</button>
        </form>
    </div>
</x-ml-app-layout>
