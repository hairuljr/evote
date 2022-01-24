<x-ladmin-layout>
  <x-slot name="title">Create Study</x-slot>
    
  <form action="{{ route('administrator.data.study.store') }}" method="post">
    @csrf 
    
    @include('vendor.ladmin.study._partials._form', ['study' => (new App\Models\Study)])

    <div class="text-right">
      <button type="submit" class="btn btn-primary">
        Submit Study
      </button>
    </div>
  </form>

</x-ladmin-layout>