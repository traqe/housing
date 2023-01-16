@extends('master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="pull-right">

                            <a href="{{route('admin')}}" id="btn_show_data" class="btn btn-sm btn-primary"
                               title="Show Data">
                                <i class="fa fa-table"></i> Show Data
                            </a>


                            <a href="{{route('createUser')}}" id="btn_add_new_data" class="btn btn-sm btn-success"
                               title="Add Data">
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

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-file"></i>
                        <strong>Edit User</strong>
                        <small>Form</small>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{route('updateUser', $user->id)}}">
                            <input class="hidden" type="hidden" name="updated_by" value="{{Auth::user()->id}}">
                            {{csrf_field()}}
                            {{--<div class="form-group">--}}
                                {{--<label for="gender">Staff Name</label>--}}
                                {{--                               <input type="text"  name="username" value="{{$user->username}}" class="form-control" required>--}}
                                {{--<select name="staff_id" id="staff_id" class="form-control input-group-lg reg_name"--}}
                                        {{--required>--}}
                                    {{--@if ($user->staff != null)--}}
                                        {{--<option value="{{$user->staff->id}}"--}}
                                                {{--selected>{{$user->staff->person->last_name.' '.$user->staff->person->first_name}}</option>--}}
                                        {{--@forelse($staffs as $staff)--}}
                                            {{--<option value="{{$staff->id}}">{{$staff->person->last_name.' '.$staff->person->first_name}}</option>--}}
                                        {{--@empty--}}
                                        {{--@endforelse--}}
                                    {{--@endif--}}
                                {{--</select>--}}

                            {{--</div>--}}
                            {{--{{method_field('PUT')}}--}}
                            <div class="form-group">
                                <label for="gender">Display Name</label>
                                <input type="text"  name="name" value="{{$user->name}}" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="gender">E-Mail</label>
                                <input type="text" name="email" value="{{$user->email}}" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="gender">National ID</label>
                                <input type="text" name="nationalid" value="{{$user->nationalid}}" class="form-control"
                                       required>
                            </div>
                            <div class="form-group">
                                <label for="gender">Password</label>
                                <input type="password" name="password" value="xxxxx" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="gender">Confirm Password</label>
                                <input type="password" name="password_confirmation" value="xxxxxx" class="form-control"
                                       required>
                            </div>

                            <div class="form-group">
                                <label for="gender">Select Roles</label>
                                <div class="row">
                                    @forelse($roles as $role)
                                        <div class="col-sm-4">
                                            {{--<input  type="checkbox" name="role_id" value="{{$role->id}}"/>--}}
                                            <label class="switch switch-icon switch-success">
                                                <input type="checkbox" class="switch-input" name="role_ids[]"
                                                       value="{{$role->id}}" @if ($user->hasRole($role->role))checked @endif>
                                                <span class="switch-label" data-on="" data-off=""></span>
                                                <span class="switch-handle"></span>
                                            </label> {{$role->role}}
                                        </div>
                                    @empty
                                    @endforelse
                                </div>
                            </div><!--/form-group-->


                            <input type="submit" class="btn btn-success pull-right">
                        </form>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

            </div>
        </div>
    </div>
@endsection
