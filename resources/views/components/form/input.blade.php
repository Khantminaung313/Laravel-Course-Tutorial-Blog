@props(['name', 'type' => 'text', 'value' => ''])

<x-form.input-wrapper>
    <x-form.label :name="$name" />
    <input type="{{ $type }}" class="form-control" name="{{ $name }}" value="{{ old($name, $value) }}">
</x-form.input-wrapper>
<x-errorMes :name="$name" />
