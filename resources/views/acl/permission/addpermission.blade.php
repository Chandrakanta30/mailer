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
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
