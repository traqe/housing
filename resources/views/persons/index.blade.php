@extends('master')
@section('content')


    <div class="container-fluid">
        <div class="col-md-12">
                <div class="card">
                    <div class="card-body">

                        <div class="pull-left">
                            <h3><i class="fa fa-file-pdf-o"> People</i></h3>
                        </div>
                        <div class="pull-right">
                            <a href="{{route('send')}}" id="btn_show_data" class="btn btn-sm btn-primary" title="Show Data">
                                <i class="fa fa-message-sms"></i> Send Offers
                            </a>
                            <a href="{{route('persons')}}" id="btn_show_data" class="btn btn-sm btn-primary" title="Show Data">
                                <i class="fa fa-table"></i> Show Data
                            </a>
                            <a href="{{route('createPerson')}}" id="btn_add_new_data" class="btn btn-sm btn-success" title="Add Data">
                                <i class="fa fa-plus-circle"></i> Add Data
                            </a>

                        </div>
                    </div>
                </div>
            <div class="box-group" id="accordion">
                <div class="card card-accent-primary">
                    <div class="card-header">
                        <div class="pull-left">
                            <i>
                                <strong>
                                    <a data-toggle="collapse" data-parent="#accordion" href="#searchperson" aria-expanded="false" class="collapsed">
                                        <h5><strong><i class="fa fa-search"> Search for People </i></strong></h5>
                                    </a>
                                </strong>
                            </i>
                        </div>
                        {{--<div class="pull-right">--}}
                        {{--<a href="{{route('applications')}}" id="btn_show_data" class="btn btn-sm btn-primary" title="Show Data">--}}
                        {{--<i class="fa fa-table"></i> Show Data--}}
                        {{--</a>--}}
                        {{--<a href="{{route('createApplication')}}" id="btn_add_new_data" class="btn btn-sm btn-success" title="Add Data">--}}
                        {{--<i class="fa fa-plus-circle"></i> Add Data--}}
                        {{--</a>--}}

                        {{--</div>--}}

                    </div>
                    <div id="searchperson" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                        <div class="card-body">
                            <form class="form-horizontal" method="get" action="{{route('findPeople')}}">
                                <div class="box-tools">
                                    <div class="input-group input-group-sm" style="width: 400px;">
                                        <select name="field" id="field" class="form-control input-group-lg reg_name" required>
                                            <option value="surname" selected >Surname</option>
                                            <option value="nationalid">National ID</option>
                                            <option value="firstname">FirstName</option>
{{--                                            <option value="surname">Surname</option>--}}
                                            <option value="email">Email</option>
                                            <option value="address">Home Address</option>
                                            <option value="mobile">Mobile</option>
                                            {{--<option value="appnum">Application Number</option>--}}
                                        </select>&nbsp;&nbsp;
                                        <input type="text" name="search" class="form-control pull-right" placeholder="Search" required>

                                        <div class="input-group-btn">
                                            <button type="submit" title="search" class="btn btn-default"><i class="fa fa-search"></i></button>
                                        </div>
                                    </div>
                                </div>



                            </form>
                        </div>
                    </div>
                </div>

            </div>



            {{--<div class="box-group" id="accordion">--}}
                {{--<div class="card card-accent-primary">--}}
                    {{--<div class="card-header">--}}
                        {{--<div class="pull-left">--}}
                            {{--<i>--}}
                                {{--<strong>--}}
                                    {{--<a data-toggle="collapse" data-parent="#accordion" href="#searchperson" aria-expanded="false" class="collapsed">--}}
                                        {{--<h5><strong><i class="fa fa-search"> Search Applications </i></strong></h5>--}}
                                    {{--</a>--}}
                                {{--</strong>--}}
                            {{--</i>--}}
                        {{--</div>--}}
                        {{--<div class="pull-right">--}}
                            {{--<a href="{{route('applications')}}" id="btn_show_data" class="btn btn-sm btn-primary" title="Show Data">--}}
                                {{--<i class="fa fa-table"></i> Show Data--}}
                            {{--</a>--}}
                            {{--<a href="{{route('createApplication')}}" id="btn_add_new_data" class="btn btn-sm btn-success" title="Add Data">--}}
                                {{--<i class="fa fa-plus-circle"></i> Add Data--}}
                            {{--</a>--}}

                        {{--</div>--}}

                    {{--</div>--}}
                    {{--<div id="searchperson" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">--}}
                        {{--<div class="card-body">--}}
                            {{--<form class="form-horizontal" method="get" action="{{route('findApplicants')}}">--}}
                                {{--<div class="box-tools">--}}
                                    {{--<div class="input-group input-group-dm" style="width: 150px;">--}}
                                        {{--<div class="form-group">--}}
                                            {{--<input type="text" name="search" class="form-control pull-right" placeholder="Search" required>--}}
                                        {{--</div>--}}
                                        {{--<div class="form-group">--}}
                                            {{--<input type="text" name="search" class="form-control pull-right" placeholder="Search" required>--}}
                                        {{--</div>--}}

                                        {{--<input type="text" name="search" class="form-control pull-right" placeholder="Search" required>--}}

                                        {{--<div class="input-group-btn">--}}
                                            {{--<button type="submit" title="search" class="btn btn-default"><i class="fa fa-search"></i></button>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}

                                {{--</div>--}}
                            {{--</form>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--<ul class="pagination">--}}
                {{--{{$courses->links()}}--}}
                {{--</ul>--}}
            {{--</div>--}}


                <div class="card card-accent-primary">
                    <div class="card-header">
                        <i class="fa fa-align-justify">
                            <strong>People</strong>
                            <small>Table</small>
                        </i>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="example">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>FullName</th>
                                    <th>National ID</th>
                                    <th>Gender</th>
                                    <th>Mobile</th>
                                    <th>Email</th>
                                    <th>Birthplace</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($people as $person)
                                    <tr>
                                        <td>{{$person->id}}</td>
                                        <td>{{$person->title}}</td>
                                        <td><a href="{{ route('viewPerson', $person->id)}}"> {{$person->surname.' '.$person->firstname}} </a> </td>
                                        <td>{{$person->nationalid}}</td>
                                        <td>{{$person->gender->gender}}</td>
                                        <td>{{$person->mobile}}</td>
                                        <td>{{$person->email}}</td>
                                        <td>{{$person->birthplace}}</td>
                                        <td>
                                            <div class="pull-right box-tools">
                                                <a href="{{route('viewPerson', $person->id)}}"
                                                   href="#"
                                                   title="View Details"><i class="fa fa-eye"></i>
                                                </a>
                                                {{--<a--}}
                                                    {{--href="#"--}}
                                                    {{--title="Edit Details"><i class="fa fa-pencil-square-o"></i>--}}
                                                {{--</a>--}}
                                            </div>
                                        </td>
                                    </tr>

                                @empty

                                @endforelse

                                </tbody>
                            </table>
                            <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="#">Prev</a></li>
                    <li class="page-item active">
                        <a class="page-link" href="#">1</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">4</a></li>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
{{--                                {{ $people->render() }}--}}
                            </ul>
                        </div>

                    </div>
                </div>

        </div>

    </div>

    {{--<div class="row">--}}
        {{--<div class="modal fade" id="deleteD" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">--}}
            {{--<div class="modal-dialog modal-md" role="document">--}}
                {{--<div class="modal-content">--}}
                    {{--<div class="modal-header">--}}

                        {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>--}}
                        {{--<h4 class="modal-title" id="myModalLabel">Delete Data</h4>--}}
                    {{--</div>--}}
                    {{--<form  class="form-horizontal" action="/grades/{{0}}" method="post">--}}
                        {{--<div class="modal-body">--}}
                            {{--{{csrf_field()}}--}}
                            {{--{{method_field('DELETE')}}--}}
                            {{--<input type="hidden" name="id" id="idDepartment" class="hiddenid">--}}
                            {{--<div class="form-group">--}}
                                {{--<div class="col-sm-12" id="classro">--}}
                                    {{--Are you sure you want to delete data?--}}
                                {{--</div>--}}
                            {{--</div><!--/form-group-->--}}
                        {{--</div>--}}
                        {{--<div class="modal-footer">--}}
                            {{--<button type="submit" class="btn btn-danger"> <span class="glyphicon glyphicon-trash"></span> Yes</button>--}}
                        {{--</div>--}}
                    {{--</form>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
@endsection
