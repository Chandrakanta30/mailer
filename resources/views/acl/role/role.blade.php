@extends('layouts.master')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/themes/default/style.min.css" />

@section('main-content')
    <div class="content-wrapper" style="min-height: 1345.31px;">
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
            {{-- //select2 --}}
            <select class="form-control select2" id="roles">
                <option value="">Select Role</option>
                @foreach ($roles as $role)
                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                @endforeach
            </select>
            <div id="jstree">
                <!-- in this example the tree is populated from inline HTML -->

            </div>
            <button class="py-2 my-5 btn btn-primary" id="permission_submit">Submit</button>
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
