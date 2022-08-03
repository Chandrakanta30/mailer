@extends('layouts.master')
@section('main-content')
    <div class="content-wrapper" style="min-height: 1302.12px;">
        @if (Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif

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
                                            <tr>
                                                <td>{{ $request->id }}.</td>
                                                <td>{{ $request->subject }}</td>
                                                @if ($request->status == 0)
                                                    <td>
                                                        <a href="{{ route('mailrequest.accept', $request->id) }}"
                                                            class="btn btn-success btn-sm">Accept</a>
                                                        <button type="button" class="btn btn-danger btn-sm"
                                                            data-toggle="modal" data-target="#modal-{{ $request->id }}">
                                                            Reject
                                                        </button>
                                                        <a href="{{ route('adminchecker.edit', $request->id) }}"
                                                            class="btn btn-primary btn-sm">View</a>

                                                    </td>
                                                    <!-- Button trigger modal -->

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="modal-{{ $request->id }}" tabindex="-1"
                                                        role="dialog" aria-labelledby="exampleModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">
                                                                        {{ $request->subject }}</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <form
                                                                    action="{{ route('mailrequest.reject', $request->id) }}"
                                                                    method="GET">
                                                                    @csrf
                                                                    <div class="modal-body">
                                                                        <div class="form-group">
                                                                            <label for="message-text"
                                                                                class="col-form-label">Suggesetion:</label>
                                                                            <textarea class="form-control" id="message-text" name="suggestion"></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">Close</button>
                                                                        <button type="submit"
                                                                            class="btn btn-primary">Reject</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @elseif ($request->status == 1)
                                                    <td>
                                                        Accepted
                                                    </td>
                                                @elseif ($request->status == 2)
                                                    <td>
                                                        Rejected
                                                    </td>
                                                @endif
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-header">
                                <div class="card-tools">
                                    {{ $admincheckers->links() }}
                                </div>
                            </div>

                        </div>


                    </div>

                </div>



            </div>
        </section>

    </div>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
@endsection
