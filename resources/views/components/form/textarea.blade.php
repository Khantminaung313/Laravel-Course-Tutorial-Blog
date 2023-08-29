@props(['name', 'value' => ''])

<x-form.input-wrapper>
    <x-form.label :name="$name" />
    <textarea class="form-control editor" name="{{ $name }}" cols="30" rows="10" > {!! old($name, $value) !!}  </textarea>
</x-form.input-wrapper>
<x-errorMes :name="$name" />
