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

    p {
        line-height: 8mm;
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
                            <h2><strong>Cession Form</strong></h2>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="table-detail" class="table table-striped">
                                    <tbody>
                                        <tr>
                                            <td>Cedent's Full Name</td>
                                            <td>{{$cession->owner->firstname.' '.$cession->owner->surname}}</td>
                                        </tr>
                                        <tr>
                                            <td>National Registration No.</td>
                                            <td>{{$cession->owner->nationalid}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Phone</td>
                                            <td>{{$cession->owner->mobile}}</td>
                                        </tr>
                                        <tr>
                                            <td>Address</td>
                                            <td>{{$cession->owner->address}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <br>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td>Cessionary's Full Name</td>
                                            <td>{{$cession->beneficiary->firstname.' '.$cession->beneficiary->surname}}</td>
                                        </tr>
                                        <tr>
                                            <td>National Registration No.</td>
                                            <td>{{$cession->beneficiary->nationalid}}</td>
                                        </tr>
                                        <tr>
                                            <td>Phone</td>
                                            <td>{{$cession->beneficiary->mobile}}</td>
                                        </tr>
                                        <tr>
                                            <td>Address</td>
                                            <td>{{$cession->beneficiary->address}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <br>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td>Stand No.</td>
                                            <td>{{$cession->stand->stand_no}}</td>
                                        </tr>
                                        <tr>
                                            <td>Stand Address</td>
                                            <td>{{$cession->stand->address}}</td>
                                        </tr>

                                        <tr>
                                            <td>Reason</td>
                                            <td>{{$cession->reason}}</td>
                                        </tr>
                                        <tr>
                                            <td>Witness</td>
                                            <td>{{$cession->witness}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <br>
                        <p>I, <strong>{{$cession->owner->firstname.' '.$cession->owner->surname}}</strong>, do hereby cede, assign and transfer to National Reg. No: <strong>{{$cession->beneficiary->nationalid}}</strong>
                            All my rights and title to and interest in lease number/stand number <strong>{{$cession->stand->stand_no}}</strong> at <strong>{{$cession->stand->address}}</strong> in Chipinge Rural District from ------- day of ---------- (month) ---------- (year)
                            <br>
                            Cedent's Signature: <strong>.........................................</strong>
                        </p>
                        <br>
                        <p>
                            I, <strong>{{$cession->beneficiary->firstname.' '.$cession->beneficiary->surname}}</strong>, National Reg.
                            No: <strong>{{$cession->beneficiary->nationalid}}</strong> Phone <strong>{{$cession->beneficiary->mobile}}</strong> Address <strong>{{$cession->stand->address}}</strong> do hereby accept transfer of the Agreement of lease number/stand
                            number <strong>{{$cession->stand->stand_no}}</strong> at <strong>{{$cession->stand->address}}</strong> in Chipinge Rural District from -------- day of ----------
                            (month) ---------- (year)
                            <br>
                            Cessionary's Signature: <strong>.........................................</strong>
                        </p>
                        <!-- /.box-body -->
                    </div>
                </div>
                <!-- /.box -->
            </div>
        </div>
    </div>
</div>