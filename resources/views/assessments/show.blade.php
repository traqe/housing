@extends('master')
@section('content')
    <ol class="breadcrumb  ">
        <li class="breadcrumb-item"><a href="{{route('assessments')}}"> Assessments </a> </li>
        <li class="breadcrumb-item">Assessment Results</li>
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
                    @include('toast::messages')
                    <div class="card card-accent-primary">
                        <div class="card-header">
                            <i class="fa fa-align-justify"></i>
                            <strong>{{$set->subject->Subject.' ('.$set->Section.')'}} Students</strong>
                            <small>Table</small>
                            <div class="pull-right">
                                <a href="{{url('searchAssessment?Year='.$set->yearterm->OGYear.'&Term='.$set->yearterm->OGTerm.'&studForm='.$set->yearterm->AcYear)}}" class="btn btn-primary btn-sm"><i class="fa fa-arrow-left"></i> back </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-sm table-bordered table-hover" id="example">
                                <thead>
                                <tr>
                                    <th>Grade</th>
                                    <th>Year</th>
                                    <th>Term</th>
                                    <th>Student Name</th>
                                    <th>Class</th>
                                    <th>MT</th>
                                    <th>Effort Symbol</th>
                                    <th>EOTM</th>
                                    {{--<th>Overall</th>--}}
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($students as $student)
                                    <tr>
                                        <td>{{$set->yearterm->AcYear}}</td>
                                        <td>{{$set->yearterm->OGYear}}</td>
                                        <td>{{$set->yearterm->OGTerm}}</td>
                                        <td>{{$student->student->LastName.' '.$student->student->FirstName}}</td>
                                        <td>{{$student->student->getClass($set->yearterm->OGYear, $set->yearterm->OGTerm)}} </td>
                                        <td class="mid_marks"  data-setname ="{{$set->OGSID}}" data-subject="{{$set->subject->Subject}}" data-studentid="{{$student->student->StudentID}}" data-sid="{{$ARSubject}}" data-token="{{csrf_token()}}" data-url="{{route('enterMidExams')}}"  data-year="{{$set->yearterm->OGYear}}" data-grade="{{$set->yearterm->AcYear}}" data-term="{{$set->yearterm->OGTerm}}" contenteditable>
                                            @if ($ARAcad1->where('StudID',$student->student->StudentID)->first() != null) {{round($ARAcad1->where('StudID',$student->student->StudentID)->first()->colData->where('ARAssColID', $ARAssColID)->first()->Mark)}} @endif
                                        </td>
                                        <td class="mid_grade" data-setname ="{{$set->OGSID}}" data-subject="{{$set->subject->Subject}}" data-studentid="{{$student->student->StudentID}}" data-sid="{{$ARSubject}}" data-token="{{csrf_token()}}" data-url="{{route('enterGrade')}}"  data-year="{{$set->yearterm->OGYear}}" data-grade="{{$set->yearterm->AcYear}}" data-term="{{$set->yearterm->OGTerm}}" contenteditable>
                                            @if ($ARAcad1->where('StudID',$student->student->StudentID)->first() != null) {{$ARAcad1->where('StudID',$student->student->StudentID)->first()->MidA}} @endif
                                        </td>
                                        <td class="exam_marks"  data-setname ="{{$set->OGSID}}" data-subject="{{$set->subject->Subject}}" data-studentid="{{$student->student->StudentID}}" data-sid="{{$ARSubject}}" data-token="{{csrf_token()}}" data-url="{{route('enterExams')}}"  data-year="{{$set->yearterm->OGYear}}" data-grade="{{$set->yearterm->AcYear}}" data-term="{{$set->yearterm->OGTerm}}"  contenteditable>
                                            @if ($ARAcad1->where('StudID',$student->student->StudentID)->first() != null)
                                                {{(round($ARAcad1->where('StudID',$student->student->StudentID)->first()->colData->where('ARAssColID', $ARAssColID2)->first()->Mark) == 0 ? '' : round($ARAcad1->where('StudID',$student->student->StudentID)->first()->colData->where('ARAssColID', $ARAssColID2)->first()->Mark))}}
                                            @endif
                                        </td>
                                        {{--<td >--}}
                                            {{--@if ($ARAcad1->where('StudID',$student->student->StudentID)->first() != null) {{$ARAcad1->where('StudID',$student->student->StudentID)->first()->Mark}} @endif--}}
                                        {{--</td>--}}
                                        <td>
                                            @if ($ARAcad1->where('StudID',$student->student->StudentID)->first() != null)
                                            {{$ARAcad1->where('StudID',$student->student->StudentID)->first()->Remarks}}
                                            @endif
                                            <div class="pull-right">
                                                <a href="{{route('printStudentReport',[$student->student->StudentID,$set->yearterm->OGTerm,$set->yearterm->OGYear ])}}" target="_blank" class="btn btn-success btn-sm" title="Mid Term Report"><i class="fa fa-file-pdf-o"></i> </a>
                                                <a href="{{route('printEndOfTermReport',[$student->student->StudentID,$set->yearterm->OGTerm,$set->yearterm->OGYear ])}}" target="_blank" class="text-info" title="End of Term Report"><i class="fa fa-file-pdf-o"></i> </a>
                                                @if ($ARAcad1->where('StudID',$student->student->StudentID)->first() != null)
                                                <button data-target="#commentModal"  data-toggle="modal" onclick="getSetIDComment('{{$ARAcad1->where('StudID',$student->student->StudentID)->first()->AcadID}}', '{{$ARAcad1->where('StudID',$student->student->StudentID)->first()->Remarks}}', '{{$student->student->LastName.' '.$student->student->FirstName}}', '{{$set->yearterm->OGYear}}', '{{$set->yearterm->OGTerm}}', '{{$set->subject->Subject}}', '{{$student->student->StudentID}}')"   @if ($ARAcad1->where('StudID',$student->student->StudentID)->first()->Remarks != null) class="text-success" @else class="text-warning"  @endif  title="Insert Comment"><i class="fa fa-comment"></i> </button>
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
        <div class="modal fade" id="commentModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-comment-o"></i> Add Comment</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <form  class="form-horizontal" action="{{route('addComment')}}" method="post">
                        <div class="modal-body">
                            {{csrf_field()}}

                            <input type="hidden" name="AcadID" id="AcadID" class="hidden">
                            <input type="hidden" name="year" id="year" class="hidden">
                            <input type="hidden" name="term" id="term" class="hidden">
                            <input type="hidden" name="subject" id="subject" class="hidden">
                            <input type="hidden" name="studentid" id="studentid" class="hidden">

{{--                            <div class="form-group">--}}
{{--                                <label for="gender">Marks</label>--}}
{{--                                <div id="mark">--}}

{{--                                </div>--}}
{{--                            </div>--}}

                            <div class="form-group">
                                <label for="gender">Select Comment </label>
                                <select name="dropComment" onchange="getComment()" id="commentSelector" class="form-control input-group-lg reg_name" >
                                    <option value="" selected>Comments</option>
                                    @forelse($comments as $country)
                                        <option value="{{$country->CommCode}}">{{$country->Comments}}</option>
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
