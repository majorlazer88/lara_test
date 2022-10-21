@aware(['mt' => 'mt-1', 'id', 'name'])
@props(['index', 'selected'])

<option {{$attributes->class([$mt, 'text-lime-600'])->merge(['data-somedata' => $id])}} value="{{$index}}"{{$selected}}>
    {{$slot}}
</option>
