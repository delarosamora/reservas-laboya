@section('title', __('Members'))
<div>
  <div class="row py-3">
    <div class="col text-end">
      <a href="" class="btn btn-primary"><i class="menu-icon tf-icons bx bx-plus-circle"></i> {{ __('Add new member') }}</a>
    </div>
  </div>
  <div class="row g-4">
    <div class="col">
      <div class="table-responsive">
        <table class="table mb-0">
          <thead>
            <tr>
              <th>{{ __('Name') }}</th>
              <th>{{ __('Surname') }}</th>
              <th>{{ __('Number') }}</th>
              <th>{{ __('Email') }}</th>
              <th>{{ __('Phone') }}</th>
              <th>{{ __('Actions') }}</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($this->members as $member)
              <tr>
                <td>{{ $member->name }}</td>
                <td>{{ $member->surname }}</td>
                <td>{{ $member->number }}</td>
                <td>{{ $member->email }}</td>
                <td>{{ $member->phone }}</td>
                <td>
                  <div class="dropdown">
                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="icon-base bx bx-dots-vertical-rounded"></i></button>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="javascript:void(0);"><i class="icon-base bx bx-edit-alt me-1"></i>Edit</a>
                      <a class="dropdown-item" href="javascript:void(0);"><i class="icon-base bx bx-trash me-1"></i>Delete</a>
                    </div>
                  </div>
                </td>

              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

