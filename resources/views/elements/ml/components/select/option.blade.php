@aware(['mt' => 'mt-1', 'id', 'name'])
@props(['index', 'selected'])

<option {{$attributes->class([$mt])->merge(['data-somedata' => $id])}} value="{{$index}}"{{$selected}}>
    {{$slot}}
</option>
