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


    td {
        padding: 6px;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    h2,
    h3 {
        font-family: 'Arial Narrow', Arial, sans-serif;
    }

    #stageInsp {
        width: 60%;
    }
</style>

<div id="border">
    <div class="container-fluid">
        <div id="header"></div>
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
                                <table id="table-detail" class="table table-striped">
                                    <tbody>
                                        <tr>
                                            <td>Owner:</td>
                                            <td>$stageinspection->stand->allocations->application->applicant->name</td>
                                        </tr>

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
                                            <td>DESCRIPTION</td>
                                            <td>APPROVED/NOT APPROVED</td>
                                            <td>CONTRACTOR</td>
                                            <td>INSPECTION</td>
                                            <td>WITNESS</td>
                                            <td>REMARKS</td>
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