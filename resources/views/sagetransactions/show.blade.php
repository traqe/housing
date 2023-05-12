@extends('master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="pull-left">
                        <h4><i class="fa fa-user-secret"></i> {{$debtor->Name}} Details
                        </h4>
                    </div>
                    <div class="pull-right">

                       {{-- <a href="{{route('debtors')}}" id="btn_show_data" class="btn btn-sm btn-primary" title="Show Data">
                            <i class="fa fa-table"></i> Show Data
                        </a>

                        <a href="#" id="btn_show_data" class="btn btn-sm btn-warning" title="Show Data">
                            <i class="fa fa-file-pdf-o"></i> Application
                        </a> --}}

                        {{--<a href="{{route('createPerson')}}" id="btn_add_new_data" class="btn btn-sm btn-success" title="Add Data">--}}
                        {{--<i class="fa fa-plus-circle"></i> Add Data--}}
                        {{--</a>--}}



                        {{--<a href="javascript:void(0)" id="btn_export_data" data-url-parameter="" title="Export Data" class="btn btn-sm btn-primary btn-export-data">--}}
                        {{--<i class="fa fa-upload"></i> Export Data--}}
                        {{--</a>--}}

                        {{--<a href="http://localhost:8000/admin/suppliers/import-data" id="btn_import_data" data-url-parameter="" title="Import Data" class="btn btn-sm btn-primary btn-import-data">--}}
                        {{--<i class="fa fa-download"></i> Import Data--}}
                        {{--</a>--}}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5">
                    <div class="card card-accent-primary">
                        <div class="card-header">
                            <i class="fa fa-street-view">
                                <strong>Client</strong>
                                <small>Details</small>
                            </i>
                            {{--<div class="pull-right">
                                <a href="#" data-toggle="modal" data-target="#editPerson" data-backrop="false" class="" title="Edit Personal Details">
                                    <i class="fa fa-pencil"> Edit</i>
                                </a>
                            </div>--}}
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="table-detail" class="table table-hover table-bordered">
                                    <tbody>
                                        <tr>
                                            <td>Name</td>
                                            <td>{{$debtor->Name}}</td>
                                        </tr>
                                        <tr>
                                            <td>Account</td>
                                            <td>{{$debtor->Account}}</td>
                                        </tr>
                                        <tr>
                                            <td>National Id</td>
                                            <td>{{$debtor->Post1}}</td>
                                        </tr>
                                        <tr>
                                            <td>Balance</td>
                                            <td>{{$debtor->DCBalance}}</td>
                                        </tr>
                                        </tbody>
                                </table>

                            </div>

                        </div>
                        </div>
                            </div>
                        <div class="col-md-7">
                    @include('layouts.partials.alerts')
                    <div class="card card-accent-primary">
                        <div class="card-header">
                            <i>
                                <strong>
                                    <a data-toggle="collapse" data-parent="#accordion" href="#accordionApps" aria-expanded="false" class="collapsed">
                                        <strong>Associated</strong>
                                        <small>Transactions</small>
                                    </a>
                                </strong>
                            </i>
                        </div>
                        <div id="accordionApps" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                            <div class="card-body">
                                {{--<div class="pull-right">
                                    <button href="#addCession" data-toggle="modal" class="btn btn-sm btn-success" title="Add Cession">
                                        <i class="fa fa-plus"> Add Cession</i>
                                    </button>
                                </div>--}}
                                <br />
                                <br />
                                <div class="table-responsive">
                                    <table id="table-detail" class="table table-sm table-hover table-bordered">
                                        <thead>
                                            <tr>
                                                <th>id</th>
                                                <th>Date</th>
                                                <th>Debit</th>
                                                <th>Credit</th>
                                                <th>Reference </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($transactions as $trans)
                                            <tr>
                                                <td>{{$trans->id}}</td>
                                                <td>{{$trans->TxDate}}</td>
                                                <td>{{$trans->Debit}}</td>
                                                <td>{{$trans->Credit}}</td>
                                                <td>{{$trans->Reference}}</td>
                            </tr>
                            @empty
                            @endforelse
                            </tbody>
                            </table>
                                
                        </div>
                        </div>
@endsection