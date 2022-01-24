<x-ladmin-layout>
  <x-slot name="title">Create Creation</x-slot>
    
  <form action="{{ route('administrator.data.creation.store') }}" method="post" enctype="multipart/form-data">
    @csrf 
    
    @include('vendor.ladmin.creation._partials._form', ['creation' => (new App\Models\Creation), 'study' => $study])

    <div class="text-right">
      <button type="submit" class="btn btn-primary">
        Submit Creation
      </button>
    </div>
  </form>

</x-ladmin-layout>