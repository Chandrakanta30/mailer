@extends('layouts.master')
@section('main-content')
    <div class="content-wrapper" style="min-height: 1345.31px;">
        {{-- textfield to input role name --}}
        <form action="{{ route('role.update', $role->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Role Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Role Name"
                    value="{{ $role->name }}">
            </div>
            <div class="form-group">
                <label for="name">Role Slug Name</label>
                <input type="text" class="form-control" id="name" name="slug" placeholder="Enter Role Slug Name"
                    value="{{ $role->slug }}">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
