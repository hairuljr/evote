<x-ladmin-layout>
  <x-slot name="title">Edit Study</x-slot>
    
  <form action="{{ route('administrator.data.study.update', $study->id) }}" method="post">
    @csrf 
    @method('PUT')
    
    @include('vendor.ladmin.study._partials._form', ['study' => $study, 'study' => $study])

    <div class="text-right">
      <button type="submit" class="btn btn-primary">
        Update Study
      </button>
    </div>
  </form>

</x-ladmin-layout>