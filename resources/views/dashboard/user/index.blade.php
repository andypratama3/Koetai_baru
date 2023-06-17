@extends('layouts.app')
@section('title', 'User')
@section('content')
<div class="row">
    <!-- Left side columns -->
    <div class="col-lg-12">
        <div class="row">
            <div class="card">
                <div class="card-body">
                  {{-- <h5 class="card-title float-end"><a href="{{ route('dashboard.tiket.create') }}" class="btn btn-primary"><i class="bi bi-plus"></i> Tambah</a></h5> --}}
                  <!-- Table with hoverable rows -->
                  <table class="table table-hover text-center" style="margin-top: 20px">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>

                        <th scope="col">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach ($users as $user)
                      <tr>
                        <th scope="row">{{ ++$no }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role == '1' ? 'Admin' : 'User'}}</td>
                        <td>
                            <a href="{{ route('dashboard.user.show', $user->id) }}" class="btn btn-primary">
                            Ganti Role
                            </a>
                            <a href="#" data-id="{{ $user->slug }}" class="btn btn-danger delete" title="Hapus">
                                <form action="{{ route('dashboard.user.destroy', $user->slug) }}" id="delete-{{ $user->slug }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('delete')
                                </form>
                            <i class="bi bi-trash">
                        </td>
                      </tr>
                    @endforeach
                    </tbody>
                  </table>
                  <ul class="pagination">
                    <li class="page-item"> {{ $users->onEachSide(1)->links() }}</li>
                    </li>
                </ul>
              </div>
                </div>

        </div>
    </div>
</div>
@include('layouts.script')
<script>
    $(".delete").click(function (e) {
          slug = e.target.dataset.id;
          swal({
                  title: 'Anda yakin?',
                  text: 'Data yang sudah dihapus tidak dapat dikembalikan!',
                  icon: 'warning',
                  buttons: true,
                  dangerMode: true,
              })
              .then((willDelete) => {
                  if (willDelete) {
                      $(`#delete-${slug}`).submit();
                  } else {
                      // Do Nothing
                  }
              });
      });
  </script>
@endsection
