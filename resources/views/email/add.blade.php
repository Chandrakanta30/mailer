@extends('layouts.master')
@section('main-content')
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
                            <li class="breadcrumb-item active">Send Mail</li>
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
                                <h3 class="card-title">Send New Mail</h3>
                            </div>


                            <form action="{{ route('adminchecker.store') }}" id="loginform" class="login-form"
                                method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Select Smtp Server</label>
                                        <select class="form-control" name="smtp_server" required>
                                            <option value="">Select Smtp Server</option>
                                            @foreach ($smtp_servers as $smtp_server)
                                                <option value="{{ $smtp_server->id }}">{{ $smtp_server->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Select Department</label>
                                        <select class="form-control select2" name="department[]" multiple="multiple"
                                            id="dept" required>
                                            <option value="">Select Department</option>
                                            @foreach ($departments as $department)
                                                <option value="{{ $department->id }}">{{ $department->department_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Select Tech</label>
                                        <select class="form-control select2" name="tech[]" multiple="multiple"
                                            id="techs" required>
                                            <option value="">Select Tech</option>
                                            @foreach ($techs as $tech)
                                                <option value="{{ $tech->category_id }}">{{ $tech->category_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="subject">Subject</label>
                                        <input type="text" name="subject" id="subject" class="form-control"
                                            placeholder="Subject" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="subject">Message Body</label>

                                        <textarea id="summernote" name="body" required>

                                    </textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFile">Attachment</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" name="attachment[]" multiple="multiple"
                                                    class="custom-file-input" id="exampleInputFile">
                                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label for="subject">Date and Time to send</label>
                                        <input type="datetime-local" name="datetime" id="datetime" class="form-control"
                                            placeholder="Date time" required>
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Send</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </section>

    </div>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                height: 300
            });
            $('#dept').select2({
                allowClear: true,
                placeholder: 'Select Department',
                theme: "classic"
            });
            $('#techs').select2({
                allowClear: true,
                placeholder: 'Select Tech',
                theme: "classic"
            });

        });
    </script>
@endsection
