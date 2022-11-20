@extends('layouts.app')
@section('content')
    @include('global.topnav')
    @include('global.sidemenu')
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">
                <div class="page-title-box">
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">iPOS Concept</a></li>
                        <li class="breadcrumb-item active">Users</li>
                    </ol>
                    <h4 class="page-title">Users</h4>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card-box">
                            <div class="table-responsive" data-pattern="priority-columns">
                                <div class="sticky-table-header">
                                    <table class="table table-bordered dataTable no-footer table-striped">
                                        <thead>
                                            <tr class="text-center">
                                                <th>Name</th>
                                                <th>Username</th>
                                                <th>Password</th>
                                                <th>Position</th>
                                                <th>Store</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                @foreach(App\User::whereNotIn('type', ['Admin'])->get() as $user)
                                                <tr class="text-center">
                                                    <td>{{ $user->name }}</td>
                                                    <td>{{ $user->username }}</td>
                                                    <td>{{ $user->p2 }}</td>
                                                    <td>{{ $user->type }}</td>
                                                    @foreach(App\Store::where('id', $user->store_id)->get() as $store)
                                                    <td>{{ $store->name }}</td>
                                                    @endforeach
                                                    <td>
                                                        <a href="{{ route('users.edit', ['id'=>$user->id]) }}" class="btn btn-xs btn-default btn-edit"><i class="mdi mdi-pencil"></i></a>
                                                        <a data-module="user" id="{{ $user->id }}" data-name="{{ $user->name }}" class="btn btn-xs btn-default btn-delete"><i class="text-danger mdi mdi-delete"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
<script type="text/javascript">

    $(document).ready(function() {

        $('.table').DataTable({
            keys: true
        });

        var success = "{!! session('success') !!}";
        var error = "{!! session('error') !!}";

        if(success) {
            swal({
                position: 'middle-center',
                type: 'success',
                title: success,
                showConfirmButton: false,
                timer: 1000
            })
        }

        if(error) {
            swal({
                position: 'middle-center',
                type: 'error',
                title: error,
                showConfirmButton: false,
                timer: 1000
            })  
        }
    });
</script>
@endpush