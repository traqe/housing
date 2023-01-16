@extends('master')
@section('content')


    <div class="container-fluid">
        <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="pull-right">

                            <a href="{{route('floats')}}" id="btn_show_data" class="btn btn-sm btn-primary" title="Show Data">
                                <i class="fa fa-table"></i> Show Data
                            </a>
                            
                        </div>
                    </div>
                </div>

                @include('layouts.partials.alerts')
                <div class="card card-accent-primary">

                    <div class="card-header">
                        <i class="fa fa-align-justify"></i>
                        <strong>Users</strong>
                        <small>Table</small>
                    </div>
                    <div class="card-body">
                            <table class=" table table-sm table-striped table-bordered table-hover" id="example">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>UserName</th>
                                    <th>Balance</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($users as $user)
                                    <tr>
                                        <td>{{$user->id}}</td>
                                        <td>{{$user->username}}</td>
                                        <td> {{$user->balance()}} </td>
                                        <td>
                                            <div class="pull-right box-tools">
                                                <a class="btn-sm btn btn-success"
                                                href="#addfloat" data-toggle="modal" onclick="getFloatBalance('{{$user->id}}', '{{$user->username}}','{{$user->balance()}}')"
                                                title="Add Float"><i class="fa fa-plus-circle"></i>
                                                </a>
                                                <a  class="btn-sm btn btn-info"
                                                href="#withdrawal" data-toggle="modal" onclick="getWithDrawalBalance('{{$user->id}}', '{{$user->username}}','{{$user->balance()}}')"
                                                title="Process Withdrawal"><i class="fa fa-minus-circle"></i>
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

    <div class="modal fade" id="addfloat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Add Float</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <form  class="form-horizontal" action="{{route("addFloat")}}" method="post">
                    <div class="modal-body">
                        {{csrf_field()}}
                        <input type="hidden" name="id" id="id" class="hiddenid">
                        <div class="form-group">
                            <label for="gender">Loan Officer</label>
                            <input type="text"  name="loanOfficer" id="loanOfficer" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="gender">Current Balance</label>
                            <input type="number"  name="balance" id="floatBalance" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="gender">Amount</label>
                            <input type="number"  name="amount" id="floatAmount" class="form-control"  onfocusout="calculateNewFlatBalance()" required>
                        </div>
                        <div class="form-group">
                            <label for="gender">New Balance</label>
                            <input type="number"  name="newBalance" id="flatNewBalance" class="form-control" readonly required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success"> <span class="fa fa-save"></span> Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="withdrawal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Process Withdrawal</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <form  class="form-horizontal" action="{{route("withdrawal")}}" method="post">
                    <div class="modal-body">
                        {{csrf_field()}}
                        <input type="hidden" name="id" id="idw" class="hiddenid">
                        <div class="form-group">
                            <label for="gender">Loan Officer</label>
                            <input type="text"  name="loanOfficer" id="loanOfficerw" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="gender">Current Balance</label>
                            <input type="number"  name="balance" id="floatBalancew" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="gender">Amount</label>
                            <input type="number"  name="amount" id="floatAmountw" class="form-control"  onfocusout="calculateNewWithdrawalBalance()" required>
                        </div>
                        <div class="form-group">
                            <label for="gender">New Balance</label>
                            <input type="number"  name="newBalance" id="flatNewBalancew" class="form-control" readonly required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success"> <span class="fa fa-save"></span> Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection
