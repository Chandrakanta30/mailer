@extends('layouts.master')
@section('main-content')
    <div class="content-wrapper" style="min-height: 1302.12px;">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Mail Requests</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Mail Requests</li>
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
                                <div class="card-tools">
                                    {{$admincheckers->links()}}
                                </div>
                            </div>

                            <div class="card-body p-0">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">#</th>
                                            <th>Mail subject</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($admincheckers as $request)
                                            
                                        @endforeach
                                        <tr>
                                            <td>{{$request->id}}.</td>
                                            <td>{{$request->subject}}</td>
                                            <td>
                                                <a href="{{ route('mailrequest.accept',$request->id)}}" class="btn btn-success btn-sm">Accept</a>
                                                <a href="{{ route('mailrequest.reject',$request->id)}}" class="btn btn-danger btn-sm">Reject</a>
                                                <a href="{{ route('adminchecker.edit',$request->id) }}" class="btn btn-primary btn-sm">View</a>

                                            </td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>

                        </div>


                    </div>

                </div>

                

            </div>
        </section>

    </div>
@endsection
