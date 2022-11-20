@extends('layouts.app')
@section('content')
    @include('global.topnav')
    @include('global.sidemenu')
	<div id="wrapper">
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">
                <div class="page-title-box">
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">iPOS Concept</a></li>
                        <li class="breadcrumb-item">Users</li>
                        <li class="breadcrumb-item active">{{ $user->name }}</li>
                    </ol>
                    <h4 class="page-title">{{ $user->name }}</h4>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card-box">
                            <form action="{{ route('users.update', ['id'=>$user->id]) }}" method="post">
                                @csrf
                                <div class="form-row">
                                    <h5 class="col-12">User Information</h5>
                                    <div class="form-group col-md-6 col-xs-12">
                                        <label>Name</label>
                                        <input type="text" class="form-control" name="name" value="{{ $user->name }}" />
                                    </div>
                                    <div class="form-group col-md-6 col-xs-12">
                                        <label>Store</label>
                                        {{ Form::select('store_id', $store, $user->store_id, ['class' => 'form-control select2']) }}
                                    </div>
                                    @foreach(App\Profile::where('user_id', $user->id)->get() as $profile)
                                    <div class="form-group col-md-12 col-xs-12">
                                        <label>Address</label>
                                        <input type="text" class="form-control" name="address" value="{{ $profile->address }}" />
                                    </div>
                                    <div class="form-group col-md-6 col-xs-12">
                                        <label>Phone Number</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">+63</span>
                                            </div>
                                            <input type="text" class="form-control" name="owner_phone" value="{{ $profile->phone }}"/>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6 col-xs-12">
                                        <label>Email</label>
                                        <input type="text" class="form-control" name="email" value="{{ $user->email }}" />
                                    </div>
                                    @endforeach
                                    <div class="form-group col-md-12 col-xs-12">
                                        <label>Branch Status</label>
                                        @php
                                            $status = array(
                                                '1' => 'Active',
                                                '0' => 'Inactive',
                                            )
                                        @endphp
                                        {{ Form::select('status', $status, $user->status, ['class' => 'form-control']) }}
                                    </div>
                                    <h5 class="col-12">Account Information</h5>
                                    <div class="form-group col-md-6 col-xs-12">
                                        <label>Username</label>
                                        <input type="text" class="form-control" name="username" value="{{ $user->username }}" readonly/>
                                    </div>
                                    <div class="form-group col-md-6 col-xs-12">
                                        <label>Change Password</label>
                                        <input type="password" class="form-control" name="password" />
                                    </div>
                                    <div class="form-group col-md-12 col-xs-12">
                                        <div class="clearfix text-right mt-3">
                                            <button type="submit" class="btn btn-success">
                                                Update User
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection