@extends('layouts.master')
@section('main-content')
    <div class="content-wrapper" style="min-height: 1345.31px;">
        {{-- textfield to input role name --}}
        <form action="{{ route('permission.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Permissions Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Permissions Name">
            </div>
            <div class="form-group">
                <label for="slug">Display name</label>
                <input type="text" class="form-control" id="slug" name="display_name"
                    placeholder="Enter Permissions Slug">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
