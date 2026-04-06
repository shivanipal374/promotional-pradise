@extends('admin.layout')
@section('content')
<div class="container mt-4">
   <h2 class="mb-4 fw-bold">Contact Submissions</h2>
   <div class="card shadow-sm border-0">
      <div class="card-body p-0">
         <table class="table table-hover align-middle mb-0 text-center">
            <thead class="table-dark">
               <tr>
                  <th>Id</th>
                  <th class="text-start">Name</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th class="text-start">Message</th>
                  <th>Date</th>
               </tr>
            </thead>
            <tbody>
               @forelse($contacts as $c)
               <tr>
                  <!-- Loop index -->
                  <td>{{ $loop->iteration }}</td>
                  <td class="text-start fw-semibold">
                     {{ $c->name }}
                  </td>
                  <td>{{ $c->email }}</td>
                  <td>{{ $c->phone }}</td>
                  <!-- Message short -->
                  <td class="text-start">
                     {{ \Illuminate\Support\Str::limit($c->message, 50) }}
                  </td>
                  <td>
                     {{ $c->created_at ? $c->created_at->format('d M Y') : '-' }}
                  </td>
               </tr>
               @empty
               <tr>
                  <td colspan="6" class="py-4 text-muted">
                     No contact submissions found
                  </td>
               </tr>
               @endforelse
            </tbody>
         </table>
      </div>
   </div>
</div>
@endsection