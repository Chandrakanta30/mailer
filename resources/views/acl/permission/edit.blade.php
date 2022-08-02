@extends('layouts.master')
@section('main-content')
    <div class="content-wrapper" style="min-height: 1345.31px;">
        {{-- textfield to input permission name --}}
        <form action="{{ route('permission.update', $permission->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">permission Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter permission Name"
                    value="{{ $permission->name }}">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
