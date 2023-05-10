@extends('master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">

            <!-- Default box -->
            <div class="card">
                <div class="card-body">

                    <div class="pull-right">
                        <a href="{{route('showCompany')}}" id="btn_show_data" class="btn btn-sm btn-primary" title="Show Data">
                            <i class="fa fa-table"></i> Show Data
                        </a>
                        <a href="{{route('createCompany')}}" id="btn_add_new_data" class="C" title="Add Data">
                            <i class="fa fa-plus-circle"></i> Add Data
                        </a>
                    </div>
                    <!--error message for trying to add another company profile-->
                    <div class="pull-left" style="height:5px ">

                        <i class="fa fa-file"></i>
                        <strong>Organization Profile</strong>
                    </div>
                </div>
            </div>
            @if (session('alert'))
            <div class="alert alert-danger">
                {{ session('alert') }}
            </div>
            @endif
            <div class="card">
                <div class="card-body">
                    <div class="pull-left" style="height:5px ">

                        <i class="fa fa-file"></i>
                        <strong>Company Profile </strong>
                    </div>


                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Organization</th>
                            <th scope="col">Address</th>
                            <th scope="col">Contact</th>
                            <th scope="col">Email</th>


                        </tr>
                    </thead>
                    <tbody>
                        @foreach($companies as $company)
                        <tr>
                            <!-- id -->
                            <td>{{ $company->id }}</td>
                            <!-- name -->
                            <td>{{ $company->name }}</td>
                            <!-- address -->
                            <td>{{ $company->address }}</td>
                            <!-- contact -->
                            <td>{{ $company->contact }}</td>
                            <!-- email -->
                            <td>{{ $company->email }}</td>

                            <td>
                                <div class="pull-right box-tools d-flex">
                                    <form method="POST" action="{{ route('company') }}/{{ $company->id }}">
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}
                                        <button style="border:0;padding-right: 5px; opacity:1;" type="submit" onclick="return confirm('Are you sure you want to Delete Profile?')" class="text-danger" title="Delete Profile">
                                            <!--<a onclick="return confirm('Are you sure you want to Delete User?')" class="text-danger" href="#" title="Delete Account"><i class="fa fa-trash"></i>
                      </a>-->
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                    <a class="text-primary" href="{{route('editCompany')}}" title="Edit Details"><i class="fa fa-pencil-square-o"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection