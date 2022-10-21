<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        {{-- <x-jet-banner /> --}}

        <div class="min-h-screen bg-gray-100">
            {{-- <livewire:navigation-menu /> --}}
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <div class="laravel-directives">
                <div class="without-verbatine">
                    No verbatine @{{ test }}
                </div>
                @verbatim
                    <div class="with-verbatine">
                        Inside verbatine directive
                    </div>
                @endverbatim

                @unless (!Auth::check())
                    <div>
                        You are signed in.
                    </div>
                @endunless

                @isset($records)
                    <div>
                        $records is defined and is not null...
                    </div>
                @endisset

                @empty($records)
                    <div>
                        $records is "empty"...
                    </div>
                @endempty

                @auth
                    <div>// The user is authenticated...</div>
                @endauth

                @guest
                    <div>// The user is not authenticated...</div>
                @endguest

                {{-- @auth('admin')
                    <div>// The user is authenticated... Using authentication guard</div>
                @endauth --}}

                @env('staging')
                    // The application is running in "staging"...
                @endenv

                @env(['staging', 'production'])
                    // The application is running in "staging" or "production"...
                @endenv

                @hasSection('navigation')
                    <div class="pull-right">
                        @yield('navigation')
                    </div>

                    <div class="clearfix"></div>
                @endif

                @sectionMissing('default-navigation')
                    <div class="pull-right">
                        {{-- @include('navigation') --}}
                        @includeIf('view.name', ['status' => 'complete'])
                        <div>do something if some section is missing</div>
                    </div>
                @endif

                @forelse (['user1', 'user2'] as $user)
                    <li>{{ $user }}</li>
                @empty
                    <p>No users</p>
                @endforelse

                {{-- @foreach ($users as $user)
                    @foreach ($user->posts as $post)
                        @if ($loop->parent->first)
                            This is the first iteration of the parent loop.
                        @endif
                    @endforeach
                @endforeach --}}

                @php
                    $isActive = false;
                    $hasError = true;
                    $user = new stdClass();
                    $user->active = true;

                    $product = new stdClass();
                    $product->versions = [
                        '0.1',
                        '0.2',
                        '0.3',
                        '0.4',
                        '0.5',
                    ]
                @endphp

                <span @class([
                    'p-4',
                    'font-bold' => $isActive,
                    'text-gray-500' => ! $isActive,
                    'bg-red' => $hasError
                ])>class directive</span>

                <span class="p-4 text-gray-500 bg-red">class directive</span>

                <div>
                    <input type="checkbox"
                        name="active"
                        value="active"
                        @checked(old('active', $user->active)) />
                </div>

                <div>
                    <select name="version">
                        @foreach ($product->versions as $version)
                            <option value="{{ $version }}" @selected(old('version') == $version)>
                                {{ $version }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- @includeWhen($boolean, 'view.name', ['status' => 'complete'])
                @includeUnless($boolean, 'view.name', ['status' => 'complete'])
                @includeFirst(['custom.admin', 'admin'], ['status' => 'complete']) --}}
                {{-- do not inherit variables from parent view--}}
                {{-- @each('view.name', $jobs, 'job', 'view.empty') --}}
            </div>

            @php
                $message = "This message is passed to component via attribute from APP";
                $camelCase = "camel case variable";
                $value = true;
            @endphp
            {{-- To display a component, you may use a Blade component tag within one of your Blade templates. --}}
            {{-- <x-alert alert-type="danger" data-controller="profile-apended" type="error" :message="$message" :$camelCase :$value class="mt-4"/> --}}
            <x-alert alert-type="danger" data-controller="profile-apended" type="error" :message="$message" :$camelCase :$value class="mt-4">
                <x-slot:heading class="font-bold">
                    Heading
                </x-slot>

                <x-slot:title>
                    {{ $component->formatAlert('Server Error') }}
                </x-slot>
                <strong>Whoops!</strong> Something went wrong!
            </x-alert>

            {{-- Anonymous components --}}
            @php
                $selectedIndex = 3;
            @endphp
            <x-ml-html-elements::select id="select" name="select">
                @for ($i=1; $i<10; $i++)
                    @php $selected = $selectedIndex === $i ? 'selected' : '' @endphp
                    <x-ml-html-elements::select.option :index="$i" :selected="$selected">
                        {{'Option ' . $i}}
                    </x-ml-html-elements::select.option>
                @endfor
            </x-select>

            <!-- Page Content -->
            {{-- <main>
                {{ $slot }}
            </main> --}}
        </div>

        {{-- @stack('modals') --}}

        @livewireScripts
        <script>
            var app = {{Js::from(['a', 'b'])}};
            console.log('using Laravel facade to encode php array and decode back using JSON.parse', app);
        </script>
    </body>
</html>
