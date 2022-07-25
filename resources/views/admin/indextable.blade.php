@extends('layouts.master')
@section('main-content')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    <div class="content-wrapper" style="min-height: 1345.31px;">
        <table id="example" class="display" style="width: 100%">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Office</th>
                    <th>Extn.</th>
                </tr>
            </thead>
        </table>
    </div>


    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
    <script>
        var data = [{
                "name": "Tiger Nixon",
                "position": "System Architect",
                "salary": "$3,120",
                "start_date": "2011/04/25",
                "office": "Edinburgh",
                "extn": "5421"
            },
            {
                "name": "Garrett Winters",
                "position": "Director",
                "salary": "$5,300",
                "start_date": "2011/07/25",
                "office": "Edinburgh",
                "extn": "8422"
            }
        ];
        $('#example').DataTable({
            data: data,
            columns: [{
                    data: 'name'
                },
                {
                    data: 'position'
                },
                {
                    data: 'salary'
                },
                {
                    data: 'office'
                }
            ]
        });
    </script>
@endsection
