@extends('admin.master')

@push('title', 'Users')

@section('content')
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Users</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0">
                    <li class="breadcrumb-item active" aria-current="page">Users</li>
                </ol>
            </nav>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header d-flex align-items-center justify-content-between py-3">
                <h6 class="m-0 font-weight-bold text-primary">Users Data</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Approved</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <span class="badge badge-{{ $user->approved ? 'success' : 'danger' }}">
                                            {{ $user->approved ? 'Yes' : 'No' }}
                                        </span>
                                    </td>
                                    <td>
                                        <a href="{{ url('/admin/users/' . $user->id) }}" class="btn btn-sm btn-info">
                                            <i class="fas fa-eye"></i>
                                            Details
                                        </a>
                                        <button onclick="showApproveModal( {{ $user->id }}, '{{ $user->name  }}' )" class="btn btn-sm btn-warning" @if ($user->approved) disabled @endif>
                                            <i class="fas fa-check"></i>
                                            Approve
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="approveModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Are you sure you want to approve user with name <strong id="xName"></strong>?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a href="#" class="btn btn-primary approve">Approve</a>
                </div>
            </div>
        </div>
    </div>
    @if (session('redir_data'))
        <div class="position-fixed top-0 right-0 p-3" style="z-index: 5; right: 0; top: 0;">
            <div class="toast hide align-items-center text-white border-0 @if (session('redir_data')['error']) bg-danger @else bg-success @endif" role="alert" aria-live="assertive" aria-atomic="true" data-delay="3000">
                <div class="d-flex">
                    <div class="toast-body">
                        {{ session('redir_data')['message'] }}
                    </div>
                    <button type="button" class="mr-2 mb-1 close text-white" data-dismiss="toast" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    @endif
@endsection


@push('scripts')
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
        function showApproveModal(id, name){
            $('#xName').text(name);
            $('.approve').attr('href', `${window.location}/${id}/approve`)
            $('#approveModal').modal('show');
        }
    </script>
    @if (session('redir_data'))
        <script>
            $('.toast').toast('show')
        </script>
    @endif
@endpush