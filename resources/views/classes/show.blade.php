@extends('master')
@section('content')
    <ol class="breadcrumb  ">

        <li class="breadcrumb-item"><a href="{{route('classes')}}">Classes</a></li>

    </ol>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-info-circle">
                            <strong>{{'Year '.$year.' Term '.$term.', Class '.$class->Class}}</strong>
                            <small>Table</small>
                        </i>
                        <div class="pull-right">
                            <a href="{{route('back', [$term, $year, $class->AcYear])}}" class="btn btn-success btn-sm pull-right"><i class="fa fa-angle-double-left"> Back </i> </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="accordion" id="accordionExample">
                            @forelse($studentClasses as $key=>$st)
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#{{$st->ClStID}}" aria-expanded="true" aria-controls="collapseOne">
                                                Comments for {{$st->student->LastName.' '.$st->student->FirstName}}
                                            </button>
                                            @if ($comments != null) @if ($comments->where('StudentID', $st->student->StudentID)->first() != null)
                                                <button class="btn btn-lg text-success pull-right" title="Comment already added"><i class="fa fa-check-circle"></i></button>
                                            @else
                                                <button class="btn btn-lg text-danger pull-right" title="Comment yet to be added"><i class="fa fa-times-circle"></i></button>
                                            @endif
                                            @endif
                                        </h2>
                                    </div>

                                    <div id="{{$st->ClStID}}" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <table class="table table-sm  table-bordered table-hover">
                                                <thead>
                                                <tr>
                                                    <th>Subject</th>
                                                    <th>Mark</th>
                                                    <th>Comment</th>
                                                    <th>Teacher</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @forelse($exams as $department)
                                                    @if ($department['StudentID'] == $st->student->StudentID)
                                                        <tr>
                                                            <td>{{$department['course']}}</td>
                                                            <td>{{round($department['mark'])}}</td>
                                                            <td>{{$department['remark']}}</td>
                                                            <td>{{$department['teacher']}}</td>
                                                        </tr>
                                                    @endif
                                                @empty

                                                @endforelse

                                                </tbody>
                                            </table>
                                            <hr/>
                                            <form >
                                                <label>Overall Comment</label>
                                                <input id="{{$st->student->StudentID}}" data-id="{{$key}}"   data-year="{{$st->TermYear}}"  data-term="{{$st->Term}}"   data-studentid="{{$st->student->StudentID}}" data-grade="{{$st->AcYear}}" data-token="{{csrf_token()}}" data-url="{{route('addOverallComment')}}" name="Comment" rows="3" class="form-control text-left oComment" value="@if ($comments != null) @if ($comments->where('StudentID', $st->student->StudentID)->first() != null){{$comments->where('StudentID', $st->student->StudentID)->first()->Comment}}@endif @endif">
                                                <br/>
                                                <button type="submit" class="btn btn-success btn-block"><i class="fa fa-save"> Save </i></button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @empty
                            @endforelse
                        </div>
                        <ul class="pagination">
                            {{$studentClasses->links()}}
                        </ul>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </div>
@endsection
