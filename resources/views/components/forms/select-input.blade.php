@props(['id' => null, 'name' => null, 'class' => null])

<select class="form-select {{ $class }} @error($name) is-invalid @enderror" id="{{ $id }}" {{ $attributes }} >
  {{ $slot }}
</select>
@error($name)
<div class="invalid-feedback d-block">
{{ $message }}
</div>
@enderror
