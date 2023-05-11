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
        width: 75%;
        font-family: 'Arial Narrow', Arial, sans-serif;
    }

    #company-details table {
        line-height: 10pt;
        border-spacing: 0px;
    }

    td {
        padding: 6px;
    }

    #table-detail tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    #table-detail {
        font-size: 15px;
    }

    #table-stand tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    h2,
    h3 {
        font-family: 'Arial Narrow', Arial, sans-serif;
    }

    #stageInsp {
        width: 60%;
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
                            <h2><strong>Stage Inspection Form</strong></h2>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="table-stand" class="table table-striped">
                                    <tbody>
                                        <tr>
                                            <td>Centre</td>
                                            <td>{{$stand->location}}</td>
                                        </tr>
                                        <tr>
                                            <td>Number and Type</td>
                                            <td>{{$stand->stand_no}}, {{$stand->type}}</td>
                                        </tr>
                                        <tr>
                                            <td>Lease No.</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Contractor</td>
                                            <td>{{$stageinspection[0]->contractors}}</td>
                                        </tr>
                                        <tr>
                                            <td>Inspector</td>
                                            <td>{{$stageinspection[0]->inspector_name}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <br>
                                <br>
                                <div id="stageInsp">
                                    <table id="table-detail" class="table table-striped">
                                        <tr>
                                            <td><strong>DESCRIPTION</strong></td>
                                            <td><strong>APPROVED/NOT APPROVED</strong></td>
                                            <td><strong>CONTRACTOR</strong></td>
                                            <td><strong>INSPECTION</strong></td>
                                            <td><strong>WITNESS</strong></td>
                                            <td><strong>REMARKS</strong></td>
                                        </tr>
                                        <tr>
                                            <td>Setting Out</td>
                                            @foreach($stageinspection as $stage)
                                            @if($stage->stage == "SETTING OUT")
                                            <td>{{$stage->ins_status}}</td>
                                            <td>{{$stage->contractors}}</td>
                                            <td>{{$stage->inspector_name}}</td>
                                            <td>{{$stage->witness}}</td>
                                            <td>{{$stage->remarks}}</td>
                                            @endif
                                            @endforeach
                                        </tr>
                                        <tr>
                                            <td>Trenching, foundation and footing</td>
                                            @foreach($stageinspection as $stage)
                                            @if($stage->stage == "TRENCHING, FOUNDATION AND FOOTING")
                                            <td>{{$stage->ins_status}}</td>
                                            <td>{{$stage->contractors}}</td>
                                            <td>{{$stage->inspector_name}}</td>
                                            <td>{{$stage->witness}}</td>
                                            <td>{{$stage->remarks}}</td>
                                            @endif
                                            @endforeach
                                        </tr>
                                        <tr>
                                            <td>Slab</td>
                                            @foreach($stageinspection as $stage)
                                            @if($stage->stage == "SLAB")
                                            <td>{{$stage->ins_status}}</td>
                                            <td>{{$stage->contractors}}</td>
                                            <td>{{$stage->inspector_name}}</td>
                                            <td>{{$stage->witness}}</td>
                                            <td>{{$stage->remarks}}</td>
                                            @endif
                                            @endforeach
                                        </tr>
                                        <tr>
                                            <td>Brickwork</td>
                                            @foreach($stageinspection as $stage)
                                            @if($stage->stage == "BRICKWORK")
                                            <td>{{$stage->ins_status}}</td>
                                            <td>{{$stage->contractors}}</td>
                                            <td>{{$stage->inspector_name}}</td>
                                            <td>{{$stage->witness}}</td>
                                            <td>{{$stage->remarks}}</td>
                                            @endif
                                            @endforeach
                                        </tr>
                                        <tr>
                                            <td>Roofing</td>
                                            @foreach($stageinspection as $stage)
                                            @if($stage->stage == "ROOFING")
                                            <td>{{$stage->ins_status}}</td>
                                            <td>{{$stage->contractors}}</td>
                                            <td>{{$stage->inspector_name}}</td>
                                            <td>{{$stage->witness}}</td>
                                            <td>{{$stage->remarks}}</td>
                                            @endif
                                            @endforeach
                                        </tr>
                                        <tr>
                                            <td>Plumbing, flooring, plastering and finishes</td>
                                            @foreach($stageinspection as $stage)
                                            @if($stage->stage == "PLUMBING, FLOORING, PLASTERING AND FINISHES")
                                            <td>{{$stage->ins_status}}</td>
                                            <td>{{$stage->contractors}}</td>
                                            <td>{{$stage->inspector_name}}</td>
                                            <td>{{$stage->witness}}</td>
                                            <td>{{$stage->remarks}}</td>
                                            @endif
                                            @endforeach
                                        </tr>
                                        <tr>
                                            <td>Other (Specify if any)</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Other (Specify if any)</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
            <!-- /.box -->
        </div>
    </div>
</div>