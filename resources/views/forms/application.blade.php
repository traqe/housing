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
        width: 90%;
        font-family: 'Arial Narrow', Arial, sans-serif;
    }

    #company-details table {
        line-height: 9pt;
    }

    .row th,
    .row td {
        padding: 6px;
        padding-right: 20px;
        font-size: 11.5pt;
    }

    #table-detail tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    h2,
    h3,
    p {
        font-family: 'Arial Narrow', Arial, sans-serif;
    }

    #company-details {
        float: right;
        width: 60%;
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

    p {
        font-size: 11.5pt;
    }

    li {
        line-height: 18pt;
        font-family: 'Arial Narrow', Arial, sans-serif;
        font-size: 11.5pt;
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
                            <br>
                            <center>
                                <h3>Application Form</h3>
                            </center>
                        </div>
                        <p>PART A - <strong>Personal Particulars</strong></p>
                        <br>
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
                                            <td>Ownership Partner</td>
                                            @if($partner != NULL)
                                            <td>{{$partner->firstname}}, {{$partner->surname}}</td>
                                            @else
                                            <td><i>(Not Applicable)</i></td>
                                            @endif
                                        </tr>
                                        <tr>
                                            <td>Postal Address</td>
                                            <td>{{$application->applicant->postaladdress}}</td>
                                        </tr>
                                        <tr>
                                            <td>Current Residential Address</td>
                                            <td>{{$application->applicant->address}}</td>
                                        </tr>
                                        <tr>
                                            <td>Date Of Birth of Applicant</td>
                                            <td>{{$application->applicant->dob}}</td>
                                        </tr>
                                        <tr>
                                            <td>Monthly Income of Applicant</td>
                                            <td>{{$application->applicant->monthly_income}}</td>
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
                                            <td>Occupation of Applicant</td>
                                            <td>{{$application->applicant->occupation}}</td>
                                        </tr>
                                        <tr>
                                            <td>Occupation of Spouse</td>
                                            @if($spouse != NULL)
                                            <td>{{$spouse->occupation}}</td>
                                            @else
                                            <td><i>(Not Applicable)</i></td>
                                            @endif
                                        </tr>
                                        <tr>
                                            <td>Business Address</td>
                                            <td>{{$application->applicant->businessaddress}}</td>
                                        </tr>
                                        <tr>
                                            <td>Phone Number</td>
                                            <td>{{$application->applicant->mobile}}</td>
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
                    <p><b>Next of Kin details</b></p>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="table-nok" class="table table-striped">
                                <tbody>
                                    <tr>
                                        <td>Name</td>
                                        <td>{{$application->applicant->nok->fullname}}</td>
                                    </tr>
                                    <tr>
                                        <td>Relationship</td>
                                        <td>{{$application->applicant->nok->relationship}}</td>
                                    </tr>
                                    <tr>
                                        <td>Contact Details</td>
                                        <td>{{$application->applicant->nok->telephone}}</td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td>{{$application->applicant->nok->email}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <br>
                    <p>PART B</p>
                    <div class="card col-md-6">
                        <div class="card-header">
                            <i class="fa fa-info-circle"></i>
                            <h3>Stand information</h3>
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
                    <br>
                    <p>PART C: Referee <strong>(to be completed by all applicants)</strong></p>
                    <ol style="list-style: numeric;">
                        <li>
                            Name of Referee: {{$application->applicant->nok->fullname}}
                        </li>
                        <li>
                            Address: {{$application->applicant->nok->address}}
                        </li>
                        <li>
                            Contact Telephone Number: {{$application->applicant->nok->telephone}}
                        </li>
                        <li>
                            Email: {{$application->applicant->nok->email}}
                        </li>
                        <li>
                            Relationship: {{$application->applicant->nok->relationship}}
                        </li>
                    </ol>
                    <br>
                    <p>PART D: Declaration <strong>(to be completed by all applicants)</strong></p>
                    <p>This application is required to be renewed annually in the month of ___________________ . Failure to do so will result in the removal of the applicant from the waiting list.</p>
                    <p>
                        Any false declaration made in this form will result in the applicant being disqualified from being placed on the waiting list.
                    </p>
                    <p>
                        I do so solemnly declare that the information contained in this form is a true reflection of the facts.
                    </p>
                    <p>
                        Signature of Applicant__________________________________
                    </p>
                    <p>Attachments: <br>

                    <ul style="list-style: square;">
                        <li>ID Cards for both</li>
                        <li>Proof of current place of occupation/ employment</li>
                        <li>Payslip/ bank statement</li>
                        <li>Letter from councillors</li>
                        <li>Lodgers' card/receipt</li>
                    </ul>
                    </p>
                    <br>
                    <p>PART F <strong>(for official use only)</strong></p>
                    <p>Application No. ______________________________________________ <br><br>
                        Priority No._________________________________________ <br><br>
                        For local Authority_________________________ Date ________________________</p>
                    <br>
                    <p>A duplicate copy of this form is returned to the applicant for their record supporting documents.</p>

                </div>
                <!-- /.box -->
            </div>
        </div>
    </div>
</div>