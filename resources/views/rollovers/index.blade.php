@extends('master')
@section('content')
    <ol class="breadcrumb  ">
        <li class="breadcrumb-item"><a href="{{route('terms')}}">Terms</a> </li>
        <li class="breadcrumb-item"><a href="{{route('subjects')}}">Subjects</a></li>
        <li class="breadcrumb-item"><a href="{{route('roles')}}">Roles</a></li>
        <li class="breadcrumb-item"><a href="{{route('grades')}}">Grades</a></li>
        <li class="breadcrumb-item"><a href="{{route('classes')}}">Classes</a></li>
        <li class="breadcrumb-item"><a href="{{route('rollovers')}}">RollOver</a></li>
    </ol>

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="pull-Left">
                        <h3>Current Year : {{$currentSession->TermYear}}, Current Term : {{$currentSession->Term}}</h3>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="pull-left">
                        <form class="form-horizontal" method="Post" action="{{route('rollover')}}">
                            {{csrf_field()}}
                            <div class="box-tools">
                                <div class="input-group input-group-sm" style="width: 600px;">
                                    <select name="Year" id="Year" class="form-control input-group-sm col-md-4" required>
                                        <option value="" selected disabled>Select Previous Year</option>
                                        @forelse($years as $m)
                                            <option value="{{$m->YearEnding}}">{{$m->YearEnding}}</option>
                                        @empty
                                        @endforelse
                                    </select>&nbsp;&nbsp;

                                    <select name="Term" id="Term" class="form-control input-group-sm col-md-4" required>
                                        <option value="" selected disabled>Select Previous Term</option>
                                        <option value="1" >1</option>
                                        <option value="2" >2</option>
                                        <option value="3" >3</option>

                                    </select>&nbsp;&nbsp;
                                    {{-- <select name="studForm" id="studForm" class="form-control input-group-sm col-md-4" required>
                                        <option value="" selected disabled>Select Grade</option>
                                        @forelse($grades as $m)
                                            <option value="{{$m->StudYear}}">{{$m->StudYear}}</option>
                                        @empty
                                        @endforelse
                                    </select>&nbsp; --}}
                                    {{--<input type="text" name="search" class="form-control pull-right" placeholder="Search" required>--}}

                                    <div class="input-group-btn">
                                        <button type="submit" title="search" class="btn btn-primary"><i class="fa fa-cogs"> Roll Over </i></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>


                    <div class="pull-right">

                        {{--<a href="/applications" id="btn_show_data" class="btn btn-sm btn-primary" title="Show Data">--}}
                        {{--<i class="fa fa-table"></i> Show Data--}}
                        {{--</a>--}}

                        {{--<a href="/applications"  id="btn_add_new_data" class="btn btn-sm btn-success" title="Add Data">--}}
                        {{--<i class="fa fa-plus-circle"></i> Add Applicant--}}
                        {{--</a>--}}

                    </div>
                </div>
            </div>



            <div class="row">
                <div class="col-md-6">
                    @include('toast::messages')
                    <div class="card card-accent-primary">
                        <div class="card-header">
                            <i class="fa fa-align-justify"></i>
                            <strong>Grades Available for RollOver </strong>

                        </div>
                        <div class="card-body">
                            <table class="table table-sm table-bordered table-hover" >
                                <thead>
                                <tr>
                                    {{--<th>Year</th>--}}
                                    {{--<th>Term</th>--}}
                                    <th>Grade</th>
                                    {{--<th>Class</th>--}}
                                    {{--<th>Teacher</th>--}}
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($grades as $department)
                                    @if ($currentSession->Term == 1)
                                        @if ($department->StudYear != 'U6')
                                            <tr>
                                                <td>{{$department->StudYear}}</td>
                                            </tr>
                                        @endif
                                    @else ($currentSession->Term != 1 )
                                        <tr>
                                            <td>{{$department->StudYear}}</td>
                                        </tr>
                                    @endif

                                @empty

                                @endforelse

                                </tbody>
                            </table>
                            {{--<ul class="pagination">--}}
                                {{--{{ $classes->links() }}--}}
                            {{--</ul>--}}
                        </div>
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="card card-accent-primary">
                        <div class="card-header">
                            <strong>
                             Rolled Over Grades
                            </strong>
                        </div>
                        <div class="card-body">
                            <table class="table table-sm table-bordered table-hover" id="stdClass">
                                <thead>
                                <tr>
                                    <th>StudentID</th>
                                    <th>Name</th>
                                    <th>Class</th>
                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <div class="row">
        <div class="modal fade" id="addStudent" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Add Student</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <form  class="form-horizontal" action="#" method="post">
                        <div class="modal-body">
                            {{csrf_field()}}

                            <input type="hidden" name="id" id="idDepartment" class="hiddenid">
                            <div class="form-group">
                                <div class="col-sm-12" id="classro">
                                    Are you sure you want to delete data?
                                </div>
                            </div><!--/form-group-->
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-danger"> <span class="glyphicon glyphicon-trash"></span> Yes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
