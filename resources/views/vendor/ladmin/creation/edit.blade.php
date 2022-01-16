<x-ladmin-layout>
  <x-slot name="title">Edit Creation</x-slot>
    
  <form action="{{ route('administrator.data.creation.update', $creation->id) }}" method="post" enctype="multipart/form-data">
    @csrf 
    @method('PUT')
    
    @include('vendor.ladmin.creation._partials._form', ['creation' => $creation])

    <div class="text-right">
      <button type="submit" class="btn btn-primary">
        Update Creation
      </button>
    </div>
  </form>

</x-ladmin-layout>