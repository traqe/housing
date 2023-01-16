@extends('master')
@section('content')


    <div class="container-fluid">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="pull-right">

                        <a href="{{route('loans')}}" id="btn_show_data" class="btn btn-sm btn-primary"
                           title="Show Data">
                            <i class="fa fa-table"></i> Show Data
                        </a>

{{--                        <a href="{{route('createClient')}}" id="btn_add_new_data" class="btn btn-sm btn-success"--}}
{{--                           title="Add Data">--}}
{{--                            <i class="fa fa-plus-circle"></i> Add Data--}}
{{--                        </a>--}}

                    </div>
                </div>
            </div>

{{--            <div class="box-group" id="accordion">--}}
{{--                <div class="card card-accent-primary">--}}
{{--                    <div class="card-header">--}}
{{--                        <div class="pull-left">--}}
{{--                            <i>--}}
{{--                                <strong>--}}
{{--                                    <a data-toggle="collapse" data-parent="#accordion" href="#searchperson" aria-expanded="false" class="collapsed">--}}
{{--                                        <h5><strong><i class="fa fa-search"> Search Clients </i></strong></h5>--}}
{{--                                    </a>--}}
{{--                                </strong>--}}
{{--                            </i>--}}
{{--                        </div>--}}

{{--                    </div>--}}
{{--                    <div id="searchperson" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">--}}
{{--                        <div class="card-body">--}}
{{--                            <form class="form-horizontal" method="get" action="{{route('findClients')}}">--}}
{{--                                <div class="box-tools">--}}
{{--                                    <div class="input-group input-group-sm" style="width: 400px;">--}}
{{--                                        <select name="field" id="field" class="form-control input-group-lg reg_name" required>--}}
{{--                                            <option value="last_name" selected >Surname</option>--}}
{{--                                            <option value="first_name">FirstName</option>--}}
{{--                                            --}}{{--<option value="surname">Surname</option>--}}
{{--                                            <option value="email">Email</option>--}}
{{--                                            <option value="address">Home Address</option>--}}
{{--                                            <option value="mobile_no">Mobile</option>--}}
{{--                                            <option value="nationalId">National ID</option>--}}
{{--                                            <option value="clientNo">Ec Number</option>--}}
{{--                                            --}}{{--<option value="choice1">Programme</option>--}}
{{--                                        </select>&nbsp;&nbsp;--}}
{{--                                        <input type="text" name="search" class="form-control pull-right" placeholder="Value" required>--}}

{{--                                        <div class="input-group-btn">--}}
{{--                                            <button type="submit" title="search" class="btn btn-default"><i class="fa fa-search"></i></button>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                            </form>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}


            <div class="card card-accent-primary">
                <div class="card-header">
                    <i class="fa fa-align-justify"></i>
                    <strong>Loans</strong>
                    <small>Table</small>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered table-hover ">
                        <thead>
                        <tr>
                            <th>FirstName</th>
                            <th>LastName</th>
                            <th>NationalID</th>
                            <th>ClientID</th>
                            <th>Product</th>
                            <th>DueDate</th>
                            <th>Balance</th>
                        </tr>
                        </thead>
                        <tbody>
                            @forelse($loans as $gender)
                                <tr>
                                    <td>{{$gender->client->person->first_name}}</td>
                                    <td>{{$gender->client->person->last_name}}</td>
                                    <td>{{$gender->client->person->nationalId}}</td>
                                    <td>{{$gender->client->clientNo}}</td>
                                    <td>{{$gender->product->product_name}}</td>
                                    <td>{{$gender->product->duedate->dueDate}}</td>
                                    <td>
                                        {{$gender->loan_balance}}
{{--                                        <div class="pull-right box-tools">--}}
{{--                                            <a class=" text-warning"--}}
{{--                                               href="{{route('showClient',$gender->id )}}"--}}
{{--                                               title="View Details"><i class="fa fa-eye"></i>--}}
{{--                                            </a>--}}
{{--                                        </div>--}}
                                    </td>
                                </tr>

                            @empty

                            @endforelse
                        </tbody>
                    </table>
                    <ul class="pagination">
                        {{ $loans->links() }}
                    </ul>
                </div>
            </div>

        </div>

    </div>

    <div class="row">
        <div class="modal fade" id="deleteC" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Delete Data</h4>
                    </div>
                    <form class="form-horizontal" action="/genders/{{0}}" method="post">
                        <div class="modal-body">
                            {{csrf_field()}}
                            {{method_field('DELETE')}}
                            <input type="hidden" name="id" id="id" class="hiddenid">
                            <input type="hidden" name="gender" id="gender" class="hiddenid">
                            <div class="form-group">
                                <div class="col-sm-12" id="classro">
                                    Are you sure you want to delete data?
                                </div>
                            </div><!--/form-group-->
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span>
                                Yes
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
