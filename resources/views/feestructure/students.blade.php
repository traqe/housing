@extends('master')
@section('content')


    <div class="container-fluid">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="pull-right">

                        <a href="/students" id="btn_show_data" class="btn btn-sm btn-primary" title="Show Data">
                            <i class="fa fa-table"></i> Show Data
                        </a>


                        <a href="/students/create" id="btn_add_new_data" class="btn btn-sm btn-success" title="Add Data">
                            <i class="fa fa-plus-circle"></i> Add Data
                        </a>



                        <a href="javascript:void(0)" id="btn_export_data" data-url-parameter="" title="Export Data" class="btn btn-sm btn-primary btn-export-data">
                            <i class="fa fa-upload"></i> Export Data
                        </a>

                        <a href="http://localhost:8000/admin/suppliers/import-data" id="btn_import_data" data-url-parameter="" title="Import Data" class="btn btn-sm btn-primary btn-import-data">
                            <i class="fa fa-download"></i> Import Data
                        </a>
                    </div>
                </div>
            </div>


            <div class="card card-accent-primary">
                <div class="card-header">
                    <i class="fa fa-align-justify"></i>
                    <strong>Students</strong>
                    <small>Table</small>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Fullname</th>
                            <th>NationalId</th>
                            {{--<th>Gender</th>--}}
                            <th>Student Number</th>
                            <th>Balance</th>
                            <th>Class</th>
                            <th>Year</th>
                            <th>Term</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($students as $student)
                            <tr>
                                <td>{{$student->id}}</td>
                                <td>{{$student->person->firstname.' '.$student->person->surname}}</td>
                                <td>{{$student->person->nationalid}}</td>
                                {{--<td>{{$student->person->gender->gender}}</td>--}}
                                <td>{{$student->candidatenumber}}</td>
                                <td>@if ($student->studentbalance != null){{$student->studentbalance->balance}}@endif</td>
                                <td>{{$student->studentgrade->grade->grade}}</td>
                                <td>{{$student->studentgrade->year}}</td>

                                <td>
                                    {{$student->studentgrade->term}}
                                    <div class="pull-right box-tools">
                                        <button onclick="getStudent('{{$student->candidatenumber}}', '{{$student->person->firstname.' '.$student->person->surname}}')" data-toggle="modal" data-target="#payment" class="btn-sm btn btn-outline-success"
                                           title="Make Payment"><i class="fa fa-money"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                        @empty

                        @endforelse

                        </tbody>
                    </table>
                    <ul class="pagination">

                        {{--{{ $subjects->links() }}--}}
                        {{--<li class="page-item"><a class="page-link" href="#">Prev</a></li>--}}
                        {{--<li class="page-item active">--}}
                        {{--<a class="page-link" href="#">1</a>--}}
                        {{--</li>--}}
                        {{--<li class="page-item"><a class="page-link" href="#">2</a></li>--}}
                        {{--<li class="page-item"><a class="page-link" href="#">3</a></li>--}}
                        {{--<li class="page-item"><a class="page-link" href="#">4</a></li>--}}
                        {{--<li class="page-item"><a class="page-link" href="#">Next</a></li>--}}
                    </ul>
                </div>
            </div>

        </div>

    </div>


    <div class="row">
        <div class="modal fade" id="payment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Make Payment</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <form  class="form-horizontal" action="{{route('makePayment')}}" method="post">
                        <div class="modal-body">
                            {{csrf_field()}}
                            {{--{{method_field('DELETE')}}--}}
                            <input type="hidden" name="student_id" id="student_id" class="hiddenid">
                            <div class="form-group">
                                <label>Student Name</label>
                                <input type="text" name="student" id="student" class="form-group col-md-12" readonly>
                            </div>
                            <div class="form-group">
                                <label>Payment Method</label>
                                <select name="paymentmethod_id" id="paymentmethod_id" class="form-control input-group-lg reg_name" required>
                                    <option value="" selected>Select Payment Method</option>
                                    @forelse($paymentmethods as $method)
                                        <option value="{{$method->id}}">{{$method->method}}</option>
                                    @empty
                                    @endforelse
                                </select>

                            </div>
                            <div class="form-group">
                                <label>Payment For</label>
                                <select name="fee_id" id="fee_id" class="form-control input-group-lg reg_name" required>
                                    <option value="" selected>Select Fees being Paid</option>
                                    @forelse($fees as $fee)
                                        <option value="{{$fee->id}}">{{$fee->details}}</option>
                                    @empty
                                    @endforelse
                                </select>

                            </div>
                            <div class="form-group">
                                <label>Amount</label>
                                <input type="number" name="amount" id="amount" class="form-group col-md-12" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success"> <i class="fa fa-money"> Pay</i> </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
