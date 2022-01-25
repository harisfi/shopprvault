@extends('admin.master')

@push('title', 'User Detail')

@section('content')
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">User Detail</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0">
                    <li class="breadcrumb-item"><a href="{{ url('/admin/users') }}">Users</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Detail</li>
                </ol>
            </nav>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header d-flex align-items-center justify-content-between py-3">
                <h6 class="m-0 font-weight-bold text-primary">User Data</h6>
                <a href="{{ url('/admin/users') }}" class="btn btn-secondary btn-sm">
                    <i class="fas fa-arrow-left"></i>
                    Back
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <tbody>
                            <tr>
                                <th scope="row" width="20%">Picture</th>
                                <td>
                                    <img src="{{ $user->profile_pic }}" class="img-fluid shadow-lg" style="max-width: 100px">
                                </td>
                            </tr>
                            <tr>
                                <th scope="row" width="20%">Name</th>
                                <td>{{ $user->name }}</td>
                            </tr>
                            <tr>
                                <th scope="row" width="20%">Email</th>
                                <td>{{ $user->email }}</td>
                            </tr>
                            <tr>
                                <th scope="row" width="20%">Approved</th>
                                <td>
                                    <span class="badge badge-{{ $user->approved ? 'success' : 'danger' }}">
                                        {{ $user->approved ? 'Yes' : 'No' }}
                                    </span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection