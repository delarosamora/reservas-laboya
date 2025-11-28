@props(['id' => null, 'name' => null, 'class' => null])

<input class="form-control {{ $class }} @error($name) is-invalid @enderror" type="date" id="{{ $id }}" name="{{ $name }}" {{ $attributes }} />
@error($name)
  <div class="invalid-feedback d-block">
  {{ $message }}
  </div>
@enderror
