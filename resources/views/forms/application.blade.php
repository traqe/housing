<style>
    #border {
        border: 1px solid black;
        height: 270mm;
    }

    .container-fluid {
        padding: 3mm;
    }

    #header {
        height: 3.7cm;
        background-color: rgb(247, 247, 247);
    }

    table {
        border-top: 1px solid;
        border-bottom: 1px solid;
        width: 80%;
        font-family: 'Courier New', Courier, monospace;
        font-weight: bold;
    }

    th,
    td {
        padding: 6px;
        padding-right: 20px;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    h2,
    h3 {
        font-family: 'Arial Narrow', Arial, sans-serif;
    }
</style>

<div id="border">
    <div class="container-fluid">
        <div id="header">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-2">
                        <img src="storage/logo/{{ $company->logo }} " alt="logo" class="rounded-circle" height="90px">
                    </div>
                    <div class="col-md-10">
                        <div align="right" id="details-container">
                            <h1>{{ $company->name }}</h1>
                            <div id="details">
                                <div>{{ $company->address }}</div>
                                <div>{{ $company->email }}</div>
                                <div>{{ $company->contact }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="card col-md-6">
                        <div class="card-header">
                            <i class="fa fa-info-circle"></i>
                            <h2><strong>Application Form</strong></h2>
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
                    <br>
                    <div class="card col-md-6">
                        <div class="card-header">
                            <i class="fa fa-info-circle"></i>
                            <h3><strong>Stand information</strong></h3>
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
                </div>
                <!-- /.box -->
            </div>
        </div>
    </div>
</div>