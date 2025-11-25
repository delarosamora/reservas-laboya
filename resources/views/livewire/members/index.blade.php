@section('title', __('Members'))
<div>
  <div class="row py-3">
    <div class="col text-end">
      <a href="{{ route('admin.members.create') }}" class="btn btn-primary"><i class="menu-icon tf-icons bx bx-plus-circle"></i> {{ __('Add new member') }}</a>
    </div>
  </div>
  <div class="row g-4">
    <div class="col">
      <div class="card">
  <div class="card-header d-flex justify-content-between align-items-center" >
      <h5 class="mb-0">{{ __('Members') }}</h5>
  </div>
  <div class="card-body">
      <div class="table-responsive">
        <table class="table mb-0">
          <thead>
            <tr>
              <th>{{ __('Actions') }}</th>
              <th>{{ __('Name') }}</th>
              <th>{{ __('Surname') }}</th>
              <th>{{ __('Number') }}</th>
              <th>{{ __('Email') }}</th>
              <th>{{ __('Phone') }}</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($this->members as $member)
              <tr>
                <td>
                  <div class="dropdown">
                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="icon-base bx bx-dots-vertical-rounded"></i></button>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="{{ route('admin.members.show', $member) }}"><i class="icon-base bx bx-show me-1"></i>{{ __('View') }}</a>
                      <a class="dropdown-item" href="{{ route('admin.members.edit', $member) }}"><i class="icon-base bx bx-edit-alt me-1"></i>{{ __('Edit') }}</a>
                    </div>
                  </div>
                </td>
                <td>{{ $member->name }}</td>
                <td>{{ $member->surname }}</td>
                <td>{{ $member->number }}</td>
                <td>{{ $member->email }}</td>
                <td>{{ $member->phone }}</td>

              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
  </div>
</div>
    </div>
  </div>
</div>

