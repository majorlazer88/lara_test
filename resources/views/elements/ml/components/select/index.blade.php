@props(['mt' => 'mt-1', 'id', 'name'])

<select {{$attributes->merge(['class' => $mt])}} id="{{$id}}" name={{$name}}>
    {{$slot}}
</select>
