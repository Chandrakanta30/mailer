@extends('layouts.master')
@section('main-content')
    <div class="content-wrapper" style="min-height: 1302.12px;">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Employee Login List</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Employee Logins</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Employee Logins</h3>
                            </div>

                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">#</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th style="width: 40px">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($employees as $key=> $item)

                                        <tr>
                                            <td>{{$key+1}}.</td>
                                            <td> {{$item->name}}</td>
                                            <td>
                                                {{$item->user_emailaddress}}
                                            </td>
                                            <td>

                                                <a href="{{ route('employee.edit', $item->id) }}"
                                                    class="btn btn-primary">Edit</a>
                                                <form action="{{ route('employee.destroy', $item->id) }}" method="POST"
                                                    style="display: inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>


                                            </td>
                                        </tr>
                                            
                                        @endforeach
                                       
                                        
                                    </tbody>
                                </table>
                            </div>

                            <div class="card-footer clearfix">
                                <ul class="pagination pagination-sm m-0 float-right">
                                    {{ $employees->links() }}
                                </ul>
                            </div>
                        </div>

                      

                    </div>
                </div>


            </div>
        </section>

    </div>
@endsection
