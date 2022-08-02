@extends('layouts.master')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/themes/default/style.min.css" />

@section('main-content')
    <div class="content-wrapper" style="min-height: 1345.31px;">
        @if (Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif
        {{-- Role add button --}}
        <div class="row">
            <div class="col-md-12 d-flex justify-content-end mt-4">
                <a href="{{ url('/add-role') }}" class="btn btn-primary">Add Role</a>
            </div>
        </div>
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Roles</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Roles</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            {{-- //make table for show --}}
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Roles</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">

                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Slug</th>
                                        <th>Guard</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($roles as $role)
                                        <tr>
                                            <td>{{ $role->id }}</td>
                                            <td>{{ $role->name }}</td>
                                            <td>{{ $role->slug }}</td>
                                            <td>{{ $role->guard_name }}</td>
                                            <td>
                                                <a href="{{ route('role.edit', $role->id) }}"
                                                    class="btn btn-primary">Edit</a>
                                                <form action="{{ route('role.destroy', $role->id) }}" method="POST"
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
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/jstree.min.js"></script>
    <script>
        $('#roles').select2({
            allowClear: true,
            placeholder: 'Select Role',
            theme: "classic"
        });
        $(function() {
            // 6 create an instance when the DOM is ready
            $('#jstree').jstree({
                "plugins": ["wholerow", "checkbox"]
            });
            // 7 bind to events triggered on the tree
            $('#jstree').on("changed.jstree", function(e, data) {
                console.log(data.selected);
            });
            // 8 interact with the tree - either way is OK
            $('button').on('click', function() {
                $('#jstree').jstree(true).select_node('child_node_1');
                $('#jstree').jstree('select_node', 'child_node_1');
                $.jstree.reference('#jstree').select_node('child_node_1');
            });
        });
        $('#roles').on('change', function() {
            var role_id = $(this).val();
            console.log(role_id);
            $.ajax({
                url: "{{ route('my-roles') }}",
                type: "GET",
                data: {
                    role_id: role_id,
                    _token: "{{ csrf_token() }}"
                },
                success: function(data) {
                    $("#jstree").jstree("destroy");
                    createJSTree(data);
                    // $('#jstree').jstree(true).settings.core.data = data;
                    // $('#jstree').jstree(true).refresh();
                }
            });
        });

        function createJSTree(jsondata) {

            let response_data = jsondata;
            let treeData = response_data.permissions_list;
            let assigned_permission = response_data.permissions;
            //console.log(assigned_permission);
            json_data_final = [];
            treeData.map(function(item) {
                let json_data = {
                    "id": item.id,
                    "text": item.name,
                    "state": {
                        "opened": true
                    }
                };
                if (assigned_permission.includes(item.id)) {
                    json_data.state.selected = true;
                }
                json_data_final.push(json_data);
            });
            json_data_final.map(function(item) {
                if (item) {
                    assigned_permission.map(function(item_assigned) {
                        if (item.id == item_assigned.id) {
                            item.state.selected = true;
                        }
                    });
                }
            });

            $('#jstree').jstree({
                'core': {
                    'data': json_data_final
                },
                "plugins": ["wholerow", "checkbox"]
            });


        }
        $('#permission_submit').on('click', function() {
            var role_id = $('#roles').val();
            var selected_permission = $('#jstree').jstree(true).get_selected();
            console.log(selected_permission);
            $.ajax({
                url: "{{ route('add-permission') }}",
                type: "POST",
                data: {
                    role_id: role_id,
                    selected_permission: selected_permission,
                    _token: "{{ csrf_token() }}"
                },
                success: function(data) {
                    console.log(data);
                }
            });
        });
    </script>
@endsection
