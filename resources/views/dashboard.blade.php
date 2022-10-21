<x-ml-app-layout>
    {{ __('Main entrypoint') }}
    <hr/>
    @php
        $selectedIndex = 3;
    @endphp
    <label>Select page
        <x-ml-html-elements::select id="selectPage" name="select">
            @for ($i=1; $i<10; $i++)
                @php $selected = $selectedIndex === $i ? 'selected' : '' @endphp
                <x-ml-html-elements::select.option :index="$i" :selected="$selected">
                    {{'Page ' . $i}}
                </x-ml-html-elements::select.option>
            @endfor
        </x-ml-html-elements::select>
    </label>
</x-ml-app-layout>
