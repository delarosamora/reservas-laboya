@props(['id' => null, 'name' => null, 'class' => null])

<input type="text" class="form-control {{ $class }} @error($name) is-invalid @enderror" id="{{ $id }}"  aria-describedby="{{ $id }}-label" {{ $attributes }}>
@error($name)
  <div class="invalid-feedback d-block">
  {{ $message }}
  </div>
@enderror
