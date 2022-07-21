@extends('layouts.master')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
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
            <div class="my-5">
                <select class="form-control select2" name="role" id="roles">
                    <option value="">Select Role</option>
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach
                </select>
            </div>
            {{-- make a select 2 of roles --}}
            <select class="form-control select2" id="user" name="users[]" multiple="multiple">
                <option value="">Select Role</option>
                @foreach ($users as $user)
                    <option value="{{ $user->user_id }}">{{ $user->user_emailaddress }}</option>
                @endforeach
            </select>

            <button class="py-2 my-5 btn btn-primary" id="permission_submit">Submit</button>
        </section>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $('#user').select2({
            theme: "classic",
            placeholder: "Search for user",
            maximumSelectionSize: 3,
            allowClear: true,
        });
        $('#roles').select2({
            theme: "classic",
            placeholder: "Select role",
            maximumSelectionSize: 3,
            allowClear: true,
        });
        $('#roles').on('change', function() {
            var role_id = $(this).val();
            $.ajax({
                url: "{{ route('get_users_by_role') }}",
                type: "GET",
                data: {
                    role_id: role_id
                },
                success: function(data) {
                    var users = data.users;
                    var all_users = data.users2;
                    var str = '';
                    all_users.forEach(function(user) {
                        var flag = false;
                        users.forEach(function(user2) {
                            if (user.user_id == user2.user_id) {
                                flag = true;
                            }
                        });

                        if (flag) {
                            str += '<option value="' + user.user_id +
                                '" selected>' + user.user_emailaddress +
                                '</option>';
                        } else {
                            str += '<option value="' + user.user_id + '">' + user
                                .user_emailaddress + '</option>';
                        }
                    });
                    $('#user').html(str);

                }
            });
        });
        $('#permission_submit').on('click', function() {
            var role_id = $('#roles').val();
            var users = $('#user').val();
            $.ajax({
                url: "{{ route('assign_role_to_user') }}",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    role_id: role_id,
                    user_ids: users
                },
                success: function(data) {
                    console.log(data);
                }
            });
        });
    </script>
@endsection
