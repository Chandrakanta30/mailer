@extends('layouts.master')
@section('main-content')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    <div class="content-wrapper" style="min-height: 1345.31px;">
        <table id="example" class="display" style="width: 100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Subject</th>
                    <th>Sending Date</th>
                    <th>Action</th>
                    <th>View</th>
                </tr>

            </thead>
        </table>
    </div>


    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
    <script>
        $('#example').DataTable({
            ajax: {
                url: "{{ route('adminchecker.getInfos') }}",
                dataSrc: '',
            },
            columns: [{
                    data: 'smpt_id'
                },
                {
                    data: 'subject'
                },
                {
                    data: 'date_time'
                },
                {
                    data: 'action'
                },
                {
                    data: 'view'
                }
            ]
        });
    </script>
@endsection
