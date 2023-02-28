@extends('master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="pull-right">

                        @if($application->application_stage_id == 3 OR $application->application_stage_id == 4)
                        <a href="{{ route('printOfferLetter', $application->id) }}" id="btn_show_data" class="btn btn-sm btn-warning" title="Show Data">
                            <i class="fa fa-file"></i> Print Offer Letter
                        </a>
                        @endif

                        <a href="{{ route('printApplication', $application->id) }}" id="btn_print_app" class="btn btn-sm btn-primary" title="Show Data">
                            <i class="fa fa-table"></i> Print Application
                        </a>

                        <a href="" id="btn_add_new_data" class="btn btn-sm btn-success" title="Add Data">
                            <i class="fa fa-plus-circle"></i> Add Data
                        </a>
                    </div>
                </div>
            </div>

            <div class="card col-md-6">
                <div class="card-header">
                    <i class="fa fa-info-circle"></i>
                    <strong>Application Form</strong>
                    <small>Table</small>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="table-detail" class="table table-striped">
                            <tbody>
                                <tr>
                                    <td>Name & ID No. of Applicant</td>
                                    <td>{{$application->applicant->surname}}, {{$application->applicant->firstname}} <br> {{$application->applicant->nationalid}}</td>
                                </tr>
                                <tr>
                                    <td>Name & ID No. of Spouse</td>
                                    @if($spouse != NULL)
                                    <td>{{$spouse->name}}, {{$spouse->surname}} <br> {{$spouse->nationalid}}</td>
                                    @else
                                    <td><i>(Not Applicable)</i></td>
                                    @endif
                                </tr>
                                <tr>
                                    <td>Address</td>
                                    <td>{{$application->applicant->address}}</td>
                                </tr>
                                <tr>
                                    <td>Date Of Birth</td>
                                    <td>{{$application->applicant->dob}}</td>
                                </tr>
                                <tr>
                                    <td>Monthly Income</td>
                                    <td>{{$application->applicant->monthly_income}}</td>
                                </tr>
                                <tr>
                                    <td>Postal Address</td>
                                    <td>{{$application->applicant->postaladdress}}</td>
                                </tr>
                                <tr>
                                    <td>Marital Status</td>
                                    <td>{{$application->applicant->marital->maritalstatus}}</td>
                                </tr>
                                <tr>
                                    <td>Marriage Certificate no.</td>
                                    @if($spouse != NULL)
                                    <td>{{$spouse->marriage_cert}}</td>
                                    @else
                                    <td><i>(Not Applicable)</i></td>
                                    @endif
                                </tr>
                                <tr>
                                    <td>Occupation</td>
                                    <td>{{$application->applicant->occupation}}</td>
                                </tr>
                                <tr>
                                    <td>Business Address</td>
                                    <td>{{$application->applicant->businessaddress}}</td>
                                </tr>
                                <tr>
                                    <td>Number of Dependants</td>
                                    <td>{{$application->no_of_dependants}}</td>
                                </tr>
                                <tr>
                                    <td>Years resident in Council Area</td>
                                    <td>{{$application->num_of_years_in_council}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <div class="card col-md-6">
                <div class="card-header">
                    <i class="fa fa-info-circle"></i>
                    <strong>Stand information</strong>
                    <small>Table</small>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="table-detail" class="table table-striped">
                            <tbody>
                                <tr>
                                    <td>Type of Stand</td>
                                    <td>{{$application->standType->type}}</td>
                                </tr>
                                <tr>
                                    <td>Nature of Intended Development</td>
                                    <td>{{$application->nature_of_dev}}</td>
                                </tr>
                                <tr>
                                    <td>Place of Intended Development</td>
                                    <td>{{$application->place_of_intent}}</td>
                                </tr>
                                <tr>
                                    <td>Details of other owned Stands</td>
                                    <td>{{$application->details_of_owned}}</td>
                                </tr>
                                <tr>
                                    <td>Amount of Capital Available</td>
                                    <td>{{$application->capital_amount}}</td>
                                </tr>
                                <tr>
                                    <td>Other Information</td>
                                    <td>{{$application->other_info}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
</div>
@endsection