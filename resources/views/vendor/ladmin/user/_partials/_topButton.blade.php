@can('administrator.account.admin.create')
  <a href="{{ route('administrator.account.admin.create', ['back' => request()->fullUrl()]) }}" class="btn btn-sm btn-primary">Create User</a>
  <a href="{{ route('administrator.account.admin.generate', ['back' => request()->fullUrl()]) }}" class="btn btn-sm btn-secondary">Generate Users</a>
@endcan