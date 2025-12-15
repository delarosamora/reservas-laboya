<div class="list-group">
  @foreach ($this->members as $member)
  <a href="{{ route('admin.members.show', $member) }}" wire:navigate class="list-group-item list-group-item-action d-flex justify-content-between">
    <div class="li-wrapper d-flex justify-content-start align-items-center">
      <div class="avatar me-3">
        <span class="avatar-initial rounded-circle bg-label-primary">{{ $member->number }}</span>
      </div>
      <div class="list-content">
        <h6 class="mb-0">{{ $member->full_name }}</h6>
        <small class="text-body-secondary">{{ $member->phone }} {{ $member->email }}</small>
      </div>
    </div>
  </a>
  @endforeach
</div>
