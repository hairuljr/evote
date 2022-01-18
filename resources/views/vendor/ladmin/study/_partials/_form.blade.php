<x-ladmin-form-group name="name" label="Study Name *">
  <x-slot name="prepend">
    {!! ladmin()->icon('desktop-computer') !!}
  </x-slot>

  <input type="text" placeholder="Study Name" class="form-control" name="name" id="name" value="{{ old('name', $study->name) }}" required>
</x-ladmin-form-group>