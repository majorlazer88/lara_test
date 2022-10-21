<x-ml-app-layout>
    {{ __('Main entrypoint') }}
    <x-slot:what-next>
        What next?!
    </x-slot>
    <hr/>
    <label>Select link
        <x-ml-html-elements::select id="selectLink" name="select-link">
            @foreach ($links as $link)
                @php $selected = $loop->first === $loop->index ? 'selected' : '' @endphp
                <x-ml-html-elements::select.option :index="$loop->index" :selected="$selected">
                    {{$link->domain . ' Id: ' . $loop->index . ' ' . 'Price: ' . $link->platform_price . ''}}
                </x-ml-html-elements::select.option>
            @endforeach
        </x-ml-html-elements::select>
    </label>
</x-ml-app-layout>
