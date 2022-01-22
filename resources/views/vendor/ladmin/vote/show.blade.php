<x-ladmin-layout>
  <x-slot name="title">Daftar Voter Karya: <code>{{ Str::limit($creation->title, 22) }}</code></x-slot>
    
  <x-ladmin-card>
    <div class="table-responsive">
      <table class="table table-hover m-0">
        <thead>
          <tr>
            <th>No.</th>
            <th>NIM Voter</th>
            <th>Nama Voter</th>
            <th>No. HP</th>
            <th>Status</th>
            <th>Tanggal Vote</th>
          </tr>
        </thead>
        <tbody>
          
            @forelse ($voter as $item)
              <tr>
                <td>{{ $loop->iteration }}.</td>
                <td>{{ $item->user->nim ?? '-' }}</td>
                <td>{{ $item->user->name ?? '-' }}</td>
                <td>{{ $item->user->no_hp ?? '-' }}</td>
                <td>{{ $item->user->role->name ?? '-' }}</td>
                <td>{{ tanggal($item->created_at, 'DDD MMMM YYYY | H:mm') ?? '-' }} WIB</td>
              </tr>
            @empty
              <tr>
                <td>Belum ada voter.</td>
              </tr>
            @endforelse
        </tbody>
      </table>
    </div>
  </x-ladmin-card>

</x-ladmin-layout>