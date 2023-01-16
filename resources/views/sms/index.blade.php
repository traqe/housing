@extends('master')
@section('content')

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="pull-left">
                        <form class="form-horizontal" method="get" action="{{route('findSmsClients')}}">
                            <div class="box-tools">
                                <div class="input-group input-group-sm" style="width: 600px;">
                                    <select name="productId" id="productId" class="form-control input-group-sm col-md-4" required>
                                        <option  selected disabled>Select Product</option>
                                        {{--<option value="All">All</option>--}}
                                        @forelse($products as $product)
                                            <option value="{{$product->id}}">{{$product->product_name}}</option>
                                        @empty
                                        @endforelse
                                    </select>&nbsp;&nbsp;

                                    <input name="minValue" id="minValue" class="form-control input-group-sm col-md-4"
                                           required placeholder="minimum value">&nbsp;&nbsp;

                                    <input name="maxValue" id="maxValue" class="form-control input-group-sm col-md-4"
                                           required placeholder="maximum value">&nbsp;&nbsp;

                                    <div class="input-group-btn">
                                        <button type="submit" title="search" class="btn btn-default"><i
                                                    class="fa fa-search"></i></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    @include('layouts.partials.alerts')
                    <div class="card card-accent-primary">
                        <div class="card-header">
                            <i class="fa fa-align-justify"></i>
                            <strong>Loans</strong>
                            <small>Table</small>
                        </div>
                        <div class="card-body">
                            <table class="table table-sm table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>EC Number</th>
                                    <th>Name</th>
                                    <th>Product</th>
                                    <th>Balance</th>
                                    <th>Phone</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($loans as $gender)
                                    <tr>
                                        <td>{{$gender->client->clientNo}}</td>
                                        <td>{{$gender->client->person->last_name.' '.$gender->client->person->first_name}}</td>
                                        <td>{{$gender->product->product_name}}</td>
                                        <td>{{$gender->loan_balance}}</td>
                                        <td>{{$gender->client->person->mobile_no}}</td>
                                    </tr>
                                @empty

                                @endforelse
                                </tbody>
                            </table>
                            <hr>
                            <div class="form-group">
                                <textarea class="form-control" rows="3" placeholder="Message....." id="message" name="message" required></textarea>
                            </div>

                            <div class="pull-right">
                                <a href="{{route('sendSms')}}" class="btn btn-sm btn-primary" onclick="return confirm('Are you sure you want to send?')"
                                        title="Add Student Set"><i class="fa fa-send"> Send Sms </i>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

@endsection
