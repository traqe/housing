@extends('master')
@section('content')
    <ol class="breadcrumb  ">
        {{--<li class="breadcrumb-item"><a href="{{route('assessments')}}"> Assessments </a> </li>--}}
        {{--<li class="breadcrumb-item">Assessment Results</li>--}}
        {{--<li class="breadcrumb-item"><a href="/sets/create">Create</a> </li>--}}
    </ol>

    <div class="container-fluid">
        <div class="col-md-12">
            {{--<div class="card">--}}
                {{--<div class="card-body">--}}
                    {{--<div class="pull-left">--}}
                        {{--<form class="form-horizontal" method="get" action="{{route('findSet')}}">--}}
                            {{--<div class="box-tools">--}}
                                {{--<div class="input-group input-group-sm" style="width: 600px;">--}}
                                    {{--<select name="Year" id="Year" class="form-control input-group-sm col-md-4" required>--}}
                                        {{--<option value="" selected >@if ($year != null){{$year}} @else Select Year @endif</option>--}}
                                        {{--@forelse($years as $m)--}}
                                            {{--<option value="{{$m->YearEnding}}">{{$m->YearEnding}}</option>--}}
                                        {{--@empty--}}
                                        {{--@endforelse--}}
                                    {{--</select>&nbsp;&nbsp;--}}

                                    {{--<select name="Term" id="Term" class="form-control input-group-sm col-md-4" required>--}}
                                        {{--<option value="" selected >@if ($year != null){{$term}} @else Select Term @endif</option>--}}
                                        {{--<option value="1" >1</option>--}}
                                        {{--<option value="2" >2</option>--}}
                                        {{--<option value="3" >3</option>--}}
                                        {{--@forelse($appStatus as $country)--}}
                                        {{--<option value="{{$country->StatusID}}">{{$country->StatusName}}</option>--}}
                                        {{--@empty--}}
                                        {{--@endforelse--}}
                                    {{--</select>&nbsp;&nbsp;--}}
                                    {{--<select name="studForm" id="studForm" class="form-control input-group-sm col-md-4" required>--}}
                                        {{--<option value="" selected >@if ($year != null){{$grade}} @else Select Grade @endif</option>--}}
                                        {{--<option value="F1" >F1</option>--}}
                                        {{--<option value="F2" >F2</option>--}}
                                        {{--<option value="F3" >F3</option>--}}
                                        {{--<option value="F4" >F4</option>--}}
                                        {{--<option value="L6" >L6</option>--}}
                                        {{--<option value="U6" >U6</option>--}}
                                        {{--@forelse($grades as $m)--}}
                                            {{--<option value="{{$m->StudYear}}">{{$m->StudYear}}</option>--}}
                                        {{--@empty--}}
                                        {{--@endforelse--}}
                                    {{--</select>&nbsp;--}}
                                    {{--<input type="text" name="search" class="form-control pull-right" placeholder="Search" required>--}}

                                    {{--<div class="input-group-btn">--}}
                                        {{--<button type="submit" title="search" class="btn btn-default"><i class="fa fa-search"></i></button>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</form>--}}
                    {{--</div>--}}


                    {{--<div class="pull-right">--}}

                        {{--<a href="/applications" id="btn_show_data" class="btn btn-sm btn-primary" title="Show Data">--}}
                        {{--<i class="fa fa-table"></i> Show Data--}}
                        {{--</a>--}}

                        {{--<a href="/applications"  id="btn_add_new_data" class="btn btn-sm btn-success" title="Add Data">--}}
                        {{--<i class="fa fa-plus-circle"></i> Add Applicant--}}
                        {{--</a>--}}

                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
                {{--<div class="card">--}}
                    {{--<div class="card-body">--}}
                        {{--<div class="pull-right">--}}

                            {{--<a href="/classes" id="btn_show_data" class="btn btn-sm btn-primary" title="Show Data">--}}
                                {{--<i class="fa fa-table"></i> Show Data--}}
                            {{--</a>--}}

                            {{--<a href="/classes/create" id="btn_add_new_data" class="btn btn-sm btn-success" title="Add Data">--}}
                                {{--<i class="fa fa-plus-circle"></i> Add Data--}}
                            {{--</a>--}}

                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}


            <div class="row">
                <div class="col-md-12">
                    <div class="card card-accent-primary">
                        <div class="card-header">
                            <i class="fa fa-align-justify"></i>

                            <strong>{{$activity->ActName}} Comments</strong>
                            <small>Table</small>
                        </div>
                        <div class="card-body">
                            <table class="table table-sm table-bordered table-hover" id="example">
                                <thead>
                                <tr>

                                    <th>Year</th>
                                    <th>Term</th>
                                    <th>Class</th>
                                    <th>Student Name</th>

                                    <th>Comment</th>

                                    {{--<th>Overall</th>--}}
                                    {{--<th>Actions</th>--}}
                                </tr>
                                </thead>
                                <tbody>

                                @forelse($activity->students as $sa)
                                    <tr>
                                        <td>{{$activity->TermYear}}</td>
                                        <td>{{$activity->Term}}</td>

                                        <td>{{$sa->student->getClass($sa->activity->TermYear,$sa->activity->Term)}}</td>
                                        <td>{{$sa->student->LastName.' '.$sa->student->FirstName}}</td>

                                        <td contenteditable>
                                            {{$sa->Comment1}}
                                            <div class="pull-right">
                                                {{--<button data-target="#commenuut" data-toggle="modal" class="text-success" title="Mid Term Report"><i class="fa fa-file-pdf-o"></i> </button>--}}
                                                {{--<button data-target="#commentuu" data-toggle="modal" class="text-info" title="End of Term Report"><i class="fa fa-file-pdf-o"></i> </button>--}}
                                                @if (Auth::user()->hasAnyRole(['Administrator','Activity - Admin']))
                                                <button data-target="#actcommentModal"  data-toggle="modal" onclick="getActIDComment('{{$sa->ASID}}', '{{$sa->Comment1}}')"   @if ($sa->Comment1 != null) class="text-success" @else class="text-warning"  @endif  title="Insert Comment"><i class="fa fa-comment"></i> </button>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>

                                @empty

                                @endforelse

                                </tbody>
                            </table>

                        </div>
                    </div>

                </div>


            </div>

        </div>

    </div>

    <div class="row">
        <div class="modal fade" id="actcommentModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-comment-o"></i> Add Comment</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <form  class="form-horizontal" action="{{route('addActComment')}}" method="post">
                        <div class="modal-body">
                            {{csrf_field()}}

                            <input type="hidden" name="ASID" id="ASID" class="hidden">

                            <div class="form-group">
                                <label for="gender">Select Comment </label>
                                <select name="dropComment" onchange="getActComment()" id="actcommentSelector" class="form-control input-group-lg reg_name" >
                                    <option value="" selected>Comments</option>
                                    @forelse($comments as $country)
                                        <option value="{{$country->CommID}}">{{$country->Comment}}</option>
                                    @empty
                                    @endforelse
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="comment">Comment:</label>
                                <textarea class="form-control" rows="5" id="comment" name="comment" ></textarea>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary"> <i class="fa fa-check"></i> Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
