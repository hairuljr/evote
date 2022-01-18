<x-ladmin-layout>
  <x-slot name="title">Edit Photo Creation</x-slot>
    
  <form action="{{ route('administrator.data.photocreation.update', $creation_id) }}" method="post" enctype="multipart/form-data">
    @csrf 
    @method('PUT')
    
    @include('vendor.ladmin.photo-creation._partials._form', ['photocreation' => $photocreation, 'creation_id' => $creation_id])

    <div class="text-right">
      <button type="submit" class="btn btn-primary">
        Update Photo Creation
      </button>
    </div>
  </form>

</x-ladmin-layout>