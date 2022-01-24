<x-ladmin-layout>
  <x-slot name="title">Generate Users</x-slot>
    
  <form action="{{ route('administrator.account.admin.store.generate') }}" method="post">
    @csrf 
    
    <x-ladmin-form-group name="numbers" label="Jumlah ID *">
      <x-slot name="prepend">
        {!! ladmin()->icon('calculator') !!}
      </x-slot>
    
      <input type="text" placeholder="Jumlah ID yang akan digenerate, eg: 100" class="form-control" name="numbers" id="numbers" required value="{{ old('numbers') }}" maxlength="3">
    </x-ladmin-form-group>
    
    @if (isset($roles))
    <x-ladmin-form-group name="role_id" label="Role *">
      <x-slot name="prepend">
        {!! ladmin()->icon('desktop-computer') !!}
      </x-slot>
    
      <select name="role_id" id="role_id" class="form-control border-0" required>
        <option value="" disabled selected>- Pilih Role/Status -</option>
        @foreach ($roles as $role)
          <option value="{{ $role->id }}" {{ isset($user->role->id) && $user->role->id == $role->id ? 'selected' : '' }}>{{ $role->name }}</option>
        @endforeach
      </select>
    </x-ladmin-form-group>
    @endif
    
    

    <div class="text-right">
      <button id="btnGenerate" type="submit" class="btn btn-primary">
        Submit User
      </button>
    </div>
  </form>

  @push('script')
    <script>
      $(function() {
          $("input[name='numbers']").on('input', function(e) {
              $(this).val($(this).val().replace(/[^0-9]/g, ''));
          });
      });
  
      $(document).ready(function() {
        $('#btnGenerate').on('click', function(e) {
          
          let gif = "{{ asset('spin.gif') }}";
          Swal.fire({
              title: "Sedang diproses...",
              text: "Mohon tunggu sebentar",
              imageUrl: gif,
              showConfirmButton: false,
              allowOutsideClick: false
          });
        })
      })
    </script>
  @endpush
</x-ladmin-layout>
