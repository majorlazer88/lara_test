@props([
    'heading',
])

<div class="alert alert-{{ $type }}">
    {{ $message }}
    <br>
    {{ $camelCase }}
</div>

<select name="test" id="test" {{ $attributes }}>
    <option value="0">Not selected</option>
    <option {{ $isSelected($value) ? 'selected' : '' }} value="1">

        First option
    </option>
</select>

<div @class(['only_here', 'and_here' => true])>
    This what it not be applied to all emelemnts
</div>

<div {{ $attributes->merge(['id' => $type, 'class' => 'pt-1']) }}>
    Default/Merged Attributes
</div>

<div {{ $attributes->class(['p-4', 'bg-red' => true]) }}>
    Conditionally merge classes
</div>

<button {{ $attributes->class(['p-4'])->merge(['type' => 'button']) }}>
    {{ $slot }}
    <br>
    This way can be merged other attributes
</button>

{{-- Non class attribute merging --}}
<div {{ $attributes->merge(['data-controller' => $attributes->prepends('profile-controller')]) }}>
    <h1 {{ $heading->attributes->class(['text-lg']) }}>
        {{ $heading }}
    </h1>

    {{ $title }}
    <br>
    If you would like an attribute other than class to have its default value and injected values joined together
</div>
