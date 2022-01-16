<x-ladmin-form-group name="name" label="Full Name *">
  <x-slot name="prepend">
    {!! ladmin()->icon('user-circle') !!}
  </x-slot>

  <input type="text" placeholder="Full Name" class="form-control" name="name" id="name" required value="{{ old('name', $user->name) }}">
</x-ladmin-form-group>

<x-ladmin-form-group name="nim" label="NIM *">
  <x-slot name="prepend">
    {!! ladmin()->icon('tag') !!}
  </x-slot>

  <input type="nim" placeholder="10 digit NIM" class="form-control" name="nim" id="nim" required value="{{ old('nim', $user->nim) }}" maxlength="10">
</x-ladmin-form-group>


@if (isset($roles))
<x-ladmin-form-group name="role_id" label="Role *">
  <x-slot name="prepend">
    {!! ladmin()->icon('desktop-computer') !!}
  </x-slot>

  <select name="role_id" id="role_id" class="form-control border-0" required>
    <option value="" disabled selected>- Choose Role/Status -</option>
    @foreach ($roles as $role)
      <option value="{{ $role->id }}" {{ isset($user->role->id) && $user->role->id == $role->id ? 'selected' : '' }}>{{ $role->name }}</option>
    @endforeach
  </select>
</x-ladmin-form-group>
@endif

@push('script')
<script>
  $(function() {
      $("input[name='nim']").on('input', function(e) {
          $(this).val($(this).val().replace(/[^0-9]/g, ''));
      });
  });
</script>
@endpush