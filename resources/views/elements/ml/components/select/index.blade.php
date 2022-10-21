@props(['mt' => 'mt-1', 'id', 'name'])

<select {{$attributes->class('!border-sky-400')->merge(['class' => $mt,])}} id="{{$id}}" name={{$name}}>
    {{$slot}}
</select>
