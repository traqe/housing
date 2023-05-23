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
        font-size: 11pt;
    }

    #company-details table {
        line-height: 9pt;
        border-spacing: 0px;
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
    h3,
    h4 {
        font-family: 'Arial Narrow', Arial, sans-serif;
    }

    p {
        line-height: 7mm;
        font-size: 11pt;
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
                            <h4><strong>APPLICATION FOR CESSION</strong></h4>
                        </div>
                        <div class="card-body">
                            <p><strong>1. TO BE COMPLETED BY CEDENT</strong></p>
                            <p><i>I, the undersigned <strong>{{$cession->owner->firstname.' '.$cession->owner->surname}}</strong>. ID Number: <strong>{{$cession->owner->nationalid}}</strong> <br>
                                    Contact Details: <strong>{{$cession->owner->mobile}}</strong>, do hereby apply to cede, assign and transfer to <strong>{{$cession->beneficiary->firstname.' '.$cession->beneficiary->surname}}</strong> ID Number: <strong>{{$cession->beneficiary->nationalid}}</strong> agreement of Lease Number: _____________________ in respect of a ____________________ as from the ___________ day of _______________/______________ <br>
                                    for a consideration of _______________ being in respect of the value of land; and ________________ in respect of development and improvements. Signed at TSHOLOTSHO RURAL DISTRICT COUNCIL this__________ day of ______________/20______
                                </i></p>
                            <p>As Witness <i>(for Cedent)</i>: {{$cession->cedent_witness}} (i) {{$cession->witness}} ID Number:______________________ Signature________________</p>
                            <p>Cedent: <br> (ii) <strong>{{$cession->owner->firstname.' '.$cession->owner->surname}}</strong> ID Number: <strong>{{$cession->owner->nationalid}}</strong> Signature________________ </p>
                            <br>
                            <p><strong>2.TO BE COMPLETED BY CESSIONARY</strong></p>
                            <p>
                                <i>I <strong>{{$cession->beneficiary->firstname.' '.$cession->beneficiary->surname}}</strong> ID Number: <strong>{{$cession->beneficiary->nationalid}}</strong> Address: <strong>{{$cession->beneficiary->address}}</strong> <br>
                                    Contact details: {{$cession->beneficiary->mobile}} Do hereby apply to accept transfer of agreement for lease number: ________________ at {{$cession->stand->stand_no}} Tsholotsho ______________________
                                    As from the _________________ day of _______________/20_______________
                                </i>
                            </p>
                            <p>As Witness <i>(for Cessionary)</i>: {{$cession->cessionary_witness}} <br> (i) <strong>{{$cession->witness}}</strong> ID Number: ____________________ Signature ________________ <br> Cessionary <br> (ii) <strong>{{$cession->beneficiary->firstname.' '.$cession->beneficiary->surname}}</strong> ID Number: <strong>{{$cession->beneficiary->nationalid}}</strong> Signature ________________ </p>
                            <p><strong>3. CESSION APPROVED BY CHIEF EXECUTIVE OFFICER</strong>__________________________ <br> ID Number:__________________ Signature ________________</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.box -->
        </div>
    </div>
</div>