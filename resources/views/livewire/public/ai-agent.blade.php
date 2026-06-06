<div>

  <ul>
  @foreach ($messages as $message)

  <li>{{ $message['role'] }}: {!! Str::markdown($message['content']) !!}</li>

  @endforeach
  </ul>
  <form wire:submit="sendMessage">

    <input type="text" wire:model="input">

    <button type="submit">Save</button>
</form>
</div>

