@extends('layouts.master')
@section('main-content')
    <div class="content-wrapper" style="min-height: 1345.31px;">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Add SMTP Details</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">SMTP Add</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-6">

                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Add SMTP Details</h3>
                            </div>


                            <form  action="{{ route('smtp.store') }}" id="loginform" class="login-form" method="POST">
                                @csrf  
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Name</label>
                                        <input type="text" name="mailer_name" class="form-control" id="exampleInputEmail1"
                                            placeholder="Enter mailer name">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Host</label>
                                        <input type="text" name="host" class="form-control" id="exampleInputPassword1"
                                            placeholder="host">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Port</label>
                                        <input type="number" name="port" class="form-control" id="exampleInputPassword1"
                                            placeholder="port">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Username</label>
                                        <input type="username" name="username" class="form-control" id="exampleInputPassword1"
                                            placeholder="username">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Password</label>
                                        <input type="password" name="password" class="form-control" id="exampleInputPassword1"
                                            placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Encryption</label>
                                        <input type="text" name="encryption" class="form-control" id="exampleInputPassword1"
                                            placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">From Mail address</label>
                                        <input type="text" name="from_mail" class="form-control" id="exampleInputPassword1"
                                            placeholder="Password">
                                    </div>
                                    
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </section>

    </div>
@endsection
