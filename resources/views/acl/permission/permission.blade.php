@extends('layouts.master')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/themes/default/style.min.css" />

@section('main-content')
    <div class="content-wrapper" style="min-height: 1345.31px;">
        @if (Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif
        {{-- permission add button --}}
        <div class="row">
            <div class="col-md-12 d-flex justify-content-end mt-4">
                <a href="{{ url('/add-permission-info') }}" class="btn btn-primary">Add permission</a>
            </div>
        </div>
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>permissions</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">permissions</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            {{-- //make table for show --}}
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">permissions</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Slug</th>
                                        <th>Guard</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($permissions as $permission)
                                        <tr>
                                            <td>{{ $permission->id }}</td>
                                            <td>{{ $permission->name }}</td>
                                            <td>{{ $permission->slug }}</td>
                                            <td>{{ $permission->guard_name }}</td>
                                            <td>
                                                <a href="{{ route('permission.edit', $permission->id) }}"
                                                    class="btn btn-primary">Edit</a>
                                                <a href="{{ route('permission.destroy', $permission->id) }}"
                                                    class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

        </section>
    </div>
@endsection
