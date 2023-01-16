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
            {{--<div class="card">--}}
                {{--<div class="card-body">--}}
                    {{--<div class="pull-right">--}}

                        {{--<a href="/terms" id="btn_show_data" class="btn btn-sm btn-primary" title="Show Data">--}}
                            {{--<i class="fa fa-table"></i> Show Data--}}
                        {{--</a>--}}


                        {{--<a href="/terms/create" id="btn_add_new_data" class="btn btn-sm btn-success" title="Add Data">--}}
                            {{--<i class="fa fa-plus-circle"></i> Add Data--}}
                        {{--</a>--}}



                        {{--<a href="javascript:void(0)" id="btn_export_data" data-url-parameter="" title="Export Data" class="btn btn-sm btn-primary btn-export-data">--}}
                            {{--<i class="fa fa-upload"></i> Export Data--}}
                        {{--</a>--}}

                        {{--<a href="http://localhost:8000/admin/suppliers/import-data" id="btn_import_data" data-url-parameter="" title="Import Data" class="btn btn-sm btn-primary btn-import-data">--}}
                            {{--<i class="fa fa-download"></i> Import Data--}}
                        {{--</a>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            <div class="card">
                <div class="card-body">
                    <div class="pull-right">

                        <a href="{{route('terms')}}" id="btn_show_data" class="btn btn-sm btn-primary" title="Show Data">
                                <i class="fa fa-table"></i> Show Data
                            </a>


                            <a href="{{route('termCreate')}}" id="btn_add_new_data" class="btn btn-sm btn-success" title="Add Data">
                                <i class="fa fa-plus-circle"></i> Add Data
                            </a>

                        </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    @include('toast::messages')
                    <div class="card card-accent-primary">
                        <div class="card-header">
                            <i class="fa fa-align-justify"></i>
                            <strong>Terms</strong>
                            <small>Table</small>
                        </div>
                        <div class="card-body">
                            {{--<input class="form-control" id="myInput" type="text" placeholder="Search..">--}}
                            {{--<br>--}}
                            <table class="table table-sm  table-bordered table-hover " id="example">
                                <thead>
                                <tr>
                                    <th>Year</th>
                                    <th>Term</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($terms as $subject)
                                    <tr onclick="getSubjectID('{{$subject->TermID}}', '{{route('getSubject',$subject->TermID)}}')">
                                        <td>{{$subject->TermYear}}</td>
                                        <td>{{$subject->Term}}</td>
                                        <td>{{$subject->StartDate}}</td>
                                        <td>{{$subject->EndDate}}</td>
                                        <td>
                                            @if ($subject->Closed == 0) {{'Active'}} @else {{'Inactive'}}@endif
                                            {{--{{$subject->status}}--}}
                                            <div class="pull-right box-tools">
                                                {{--<a class="text-warning"--}}
                                                   {{--href="/terms/{{$subject->id}}"--}}
                                                   {{--title="View Details"><i class="fa fa-eye"></i>--}}
                                                {{--</a>--}}
                                                <a  class="text-primary"
                                                    href="{{route('editTerm',$subject->TermID )}}"
                                                    title="Edit Details"><i class="fa fa-pencil-square-o"></i>
                                                </a>
                                                {{--<a data-toggle="modal"  onclick="getDepartment('{{$grade->id}}')"  class="btn-sm btn btn-danger"--}}
                                                   {{--href="#deleteD"--}}
                                                   {{--title="Delete"><i class="fa fa-trash-o"></i>--}}
                                                {{--</a>--}}

                                            </div>

                                        </td>
                                        {{--<td>{{$subject->Lvl}}</td>--}}
                                        {{--<td>--}}
                                            {{--{{$subject->Seq}}--}}
                                        {{--</td>--}}
                                    </tr>

                                @empty

                                @endforelse

                                </tbody>
                            </table>
                            {{--<ul class="pagination">--}}

                                {{--{{ $terms->links() }}--}}

                            {{--</ul>--}}
                        </div>
                    </div>
                </div>
                {{--<div class="col-md-6">--}}

                    {{--<div class="card card-accent-primary">--}}
                        {{--<div class="card-header">--}}
                            {{--<i class="fa fa-align-justify"></i>--}}
                            {{--<strong>Subject</strong>--}}
                            {{--<small>Table</small>--}}
                        {{--</div>--}}
                        {{--<div class="card-body">--}}
                            {{--<form method="post" action="{{route('UpdateSubject')}}">--}}
                                {{--<input class="hidden" type="hidden" name="SubjID" id="SubjID">--}}
                                {{--<input class="hidden" name="SubjID" id="SubjID" value="{{$subjectid}}" hidden>--}}
                                {{--<input class="hidden" name="Color" value="FFFFFF" hidden>--}}
                                {{--<input class="hidden" name="RepCard" value="0" hidden>--}}
                                {{--<input class="hidden" name="NoExam" value="0" hidden>--}}
                                {{--<input class="hidden" name="NoComms" value="0" hidden>--}}
                                {{--<input class="hidden" name="IsHeader" value="1" hidden>--}}
                                {{--<input class="hidden" name="ARMenu" value="0" hidden>--}}
                                {{--<input class="hidden" name="AnRep" value="0" hidden>--}}
                                {{--<input class="hidden" name="IsUI" value="0" hidden>--}}
                                {{--<input class="hidden" name="AnRep" value="0" hidden>--}}
                                {{--<input class="hidden" name="IsUI" value="0" hidden>--}}
                                {{--{{csrf_field()}}--}}
                                {{--{{method_field('PUT')}}--}}
                                {{--<div class="form-group">--}}
                                    {{--<label for="gender">Subject Code</label>--}}
                                    {{--<input type="text"  name="SubjCode" id="SubjCode" class="form-control" required>--}}
                                {{--</div>--}}
                                {{--<div class="form-group">--}}
                                    {{--<label for="gender">Subject</label>--}}
                                    {{--<input type="text"  name="Subject" id="Subject" class="form-control" required>--}}
                                {{--</div>--}}
                                {{--<div class="form-group">--}}
                                    {{--<label for="gender">Level</label>--}}
                                    {{--<input type="text"  name="Lvl" id="Lvl" class="form-control" required>--}}
                                {{--</div>--}}
                                {{--<div class="form-group">--}}
                                    {{--<label for="gender">Sequence</label>--}}
                                    {{--<input type="text"  name="Seq" id="Seq" class="form-control" required>--}}
                                {{--</div>--}}
                                {{--<button type="submit" class="btn btn-primary pull-right"><i class="fa fa-check-circle"></i> Save</button>--}}
                            {{--</form>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            </div>



        </div>

    </div>

    <div class="row">
        <div class="modal fade" id="deleteD" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Delete Data</h4>
                    </div>
                    <form  class="form-horizontal" action="/grades/{{0}}" method="post">
                        <div class="modal-body">
                            {{csrf_field()}}
                            {{method_field('DELETE')}}
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
