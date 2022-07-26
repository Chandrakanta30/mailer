@extends('layouts.master')
@section('main-content')
    <style>
        .chip {
            display: inline-block;
            padding: 0 25px;
            height: 50px;
            font-size: 16px;
            line-height: 50px;
            border-radius: 25px;
            background-color: #f1f1f1;
        }
    </style>
    <div class="content-wrapper" style="min-height: 1345.31px;">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Employees</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Mail checker</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-12">

                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Send Mail</h3>
                            </div>


                            <form action="{{ route('adminchecker.store') }}" id="loginform" class="login-form"
                                method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Selected Smtp Server</label>
                                        <input type="text" class="form-control" name="smtp_server" id="smtp_server"
                                            value="{{ $smtp->name }}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Selected Department</label>
                                        <br>
                                        @foreach ($department_data as $data)
                                            <div class="chip">
                                                {{ $data['name'] }}
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Selected Tech</label>
                                        <br>
                                        @foreach ($tech_data as $data)
                                            <div class="chip">
                                                {{ $data['name'] }}
                                            </div>
                                        @endforeach
                                    </div>

                                    <div class="form-group">
                                        <label for="subject">Subject</label>
                                        <input type="text" name="subject" id="subject" class="form-control"
                                            value="{{ $info->subject }}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="subject">Message Body</label>
                                        <div>
                                            <textarea name="message" id="message" class="form-control" readonly>{{ $info->message }}</textarea>
                                        </div>

                                        </textarea>
                                    </div>
                                    {{-- <div class="form-group">
                                        <label for="exampleInputFile">Attachment</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" name="attachment[]" multiple="multiple"
                                                    class="custom-file-input" id="exampleInputFile">
                                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                            </div>
                                        </div>
                                    </div> --}}


                                    <div class="form-group">
                                        <label for="subject">Date and Time to send</label>
                                        <input type="datetime-local" name="datetime" id="datetime" class="form-control"
                                            value="{{ $info->date_time }}" readonly>
                                    </div>
                                </div>

                                <div class="card-footer d-flex">
                                    <form action="{{ route('adminchecker.accept', $info->id) }}" method="POST">
                                        @csrf
                                        @method('POST')
                                        <button type="submit" class="btn btn-success">Accept</button>
                                    </form>

                                    <form action="{{ route('adminchecker.reject', $info->id) }}" method="POST"
                                        class="mx-2">
                                        @csrf
                                        @method('POST')
                                        <button type="submit" class="btn btn-danger">Reject</button>
                                    </form>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </section>

    </div>
@endsection
