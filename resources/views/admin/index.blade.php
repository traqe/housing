@extends('master')
@section('content')


    <div class="container-fluid">
        <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="pull-right">

                            <a href="{{route('admin')}}" id="btn_show_data" class="btn btn-sm btn-primary" title="Show Data">
                                <i class="fa fa-table"></i> Show Data
                            </a>


                            <a href="{{route('createUser')}}" id="btn_add_new_data" class="btn btn-sm btn-success" title="Add Data">
                                <i class="fa fa-plus-circle"></i> Add Data
                            </a>

                            {{--<a href="javascript:void(0)" id="btn_export_data" data-url-parameter="" title="Export Data" class="btn btn-sm btn-primary btn-export-data">--}}
                                {{--<i class="fa fa-upload"></i> Export Data--}}
                            {{--</a>--}}

                            {{--<a href="http://localhost:8000/admin/suppliers/import-data" id="btn_import_data" data-url-parameter="" title="Import Data" class="btn btn-sm btn-primary btn-import-data">--}}
                                {{--<i class="fa fa-download"></i> Import Data--}}
                            {{--</a>--}}
                        </div>
                    </div>
                </div>


                <div class="card card-accent-primary">

                    <div class="card-header">
                        <i class="fa fa-align-justify"></i>
                        <strong>Users</strong>
                        <small>Table</small>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class=" table table-striped table-bordered table-hover" id="example">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    {{--<th>UserName</th>--}}
{{--                                    <th>Staff ID</th>--}}
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Password</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($users as $user)
                                    <tr>
                                        <td>{{$user->id}}</td>
                                        {{--<td>{{$user->staff->person->last_name.' '.$user->staff->person->first_name}}</td>--}}
{{--                                        <td>{{$user->staff}}</td>--}}
                                        <td>{{$user->email}}</td>
                                        <td>
                                            @if ($user->roles->count() > 0)
                                                @forelse($user->roles as $role)
                                                    {{$role->role}} ;
                                                @empty
                                                @endforelse
                                                {{--{{$user->roles->first()->RoleName}}--}}
                                            @endif
                                        </td>
                                        <td>
                                            xxxxxx
                                            <div class="pull-right box-tools">
                                                <a  onclick="return confirm('Are you sure you want to Delete User?')" class="text-danger"
                                                   href="{{route('deleteUser',$user->id)}}"
                                                   title="Delete Account"><i class="fa fa-trash"></i>
                                                </a>
                                                <a  class="text-primary"
                                                    href="{{route('editUser', $user->id)}}"
                                                    title="Edit Details"><i class="fa fa-pencil-square-o"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>

                                @empty

                                @endforelse

                                </tbody>
                            </table>
                            <ul class="pagination">
                                {{--{{ $users->links() }}--}}
                            </ul>
                        </div>

                    </div>
                </div>

        </div>

    </div>


@endsection
