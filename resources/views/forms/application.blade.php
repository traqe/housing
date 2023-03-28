<style>
    #border {
        border: 1px solid black;
        height: 270mm;
    }

    .container-fluid {
        padding: 3mm;
    }

    table {
        border-top: 1px solid;
        border-bottom: 1px solid;
        width: 80%;
        font-family: 'Arial Narrow', Arial, sans-serif;
    }


    th,
    td {
        padding: 6px;
        padding-right: 20px;
    }

    #table-detail tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    h2,
    h3 {
        font-family: 'Arial Narrow', Arial, sans-serif;
    }

    #company-details {
        float: right;
        width: 70%;
        padding-left: 10cm;
    }

    #company-image {
        width: 30%;
        float: left;
    }

    #header {
        height: 3.7cm;
    }

    #header-info {
        border: none;
        width: 8cm;
        table-layout: fixed;
    }
</style>

<div id="border">
    <div class="container-fluid">
        <!--header place-->
        <div id="header">
            <div class="d-flex">
                <div id="company-image">
                    <img src="storage/logo/{{ $company->logo }} " alt="logo" class="rounded-circle" height="100px">
                </div>
                <div id="company-details">
                    <table id="header-info">
                        <tr>
                            <td>{{ $company->name }}</td>
                        </tr>
                        <tr>
                            <td>{{ $company->address }}</td>
                        </tr>
                        <tr>
                            <td>{{ $company->email }}</td>
                        </tr>
                        <tr>
                            <td>{{ $company->contact }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <!--header close here-->

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