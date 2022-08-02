@extends('layouts.master')
@section('main-content')
    <div class="content-wrapper" style="min-height: 1345.31px;">
        {{-- textfield to input role name --}}
        <form action="{{ route('role.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Role Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Role Name">
            </div>
            <div class="form-group">
                <label for="name">Role Slug Name</label>
                <input type="text" class="form-control" id="name" name="slug" placeholder="Enter Role Slug Name">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
