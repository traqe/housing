@extends('master')
@section('content')


<div class="container-fluid">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="pull-right">

                        <a href="{{route('createStageInspection')}}" id="btn_add_new_data" class="btn btn-sm btn-success" title="Add Data">
                            <i class="fa fa-plus-circle"></i> Add Data
                        </a>

                    </div>
                </div>
            </div>
            
            <div class="card card-accent-primary">
                <div class="card-header">
                    <i class="fa fa-align-justify"></i>
                    <strong>Grave Stands</strong>
                    <small>Table</small>
                </div>

            <div class="card-body">
                @include('layouts.partials.alerts')
                <table class="table table-striped table-bordered table-hover"  id="example">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>STAGE</th>
                            <th>INSPECTOR</th>
                            <th>INSPECTION STATUS</th>
                            <th>RECEIPT NO</th>
                            <th>AMOUNT</th>
                            <th>INSPECTED STAND</th>
                            <th>DATE</th>
                            
                        </tr>
                        </thead>
                        <tbody>
                            @forelse($inspections as $insp)
                            <tr>
                                <td>{{$insp->id}}</td>
                                <td>{{$insp->stage }}
                                <td>{{$insp->inspector_name}}</td>
                                <td>{{$insp->ins_status}}</td>
                                <td>{{$insp->receipt_no}}</td>
                                <td>{{$insp->amount}}</td>
                                <td>{{$insp->stand_id}}</td>
                                <td>{{$insp->ins_date}}
                                    <div class="pull-right box-tools">
                                        <a class="text-warning"
                                           href="{{route('showStageInspection',$insp->id )}}"
                                           title="View Details"><i class="fa fa-eye"></i>
                                        </a>
                                        <a  class="text-primary"
                                            href="{{route('editStageInspection',$insp->id )}}"
                                            title="Edit Details"><i class="fa fa-pencil-square-o"></i>
                                        </a>
                                        {{--<a  class="text-danger"--}}
                                            {{--href="{{route('deleteGrave',$grave->grave_id )}}"--}}
                                            {{--title="Edit Details"><i class="fa fa-trash"></i>--}}
                                        {{--</a>--}}


                                    </div>
                                </td>
                                
                               
                            </tr>

                        @empty

                        @endforelse

                        </tbody>
                    </table>
                    <ul class="pagination">
                        <li class="page-item"><a class="page-link" href="#">Prev</a></li>
                        <li class="page-item active">
                            <a class="page-link" href="#">1</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">4</a></li>
                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                    </ul>
                </div>
            </div>

        </div>

    </div>

    <div class="row">
        <div class="modal fade" id="deleteC" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Delete Data</h4>
                    </div>
                    <form  class="form-horizontal" action="/graves/{{0}}" method="post">
                        <div class="modal-body">
                            {{csrf_field()}}
                            {{method_field('DELETE')}}
                            <input type="hidden" name="grave_id" id="grave_id" class="hiddenid">
                            <input type="hidden" name="grave" id="grave" class="hiddenid">
                            <div class="form-group">
                                <div class="col-sm-12" id="classro">
                                    Are you sure you want to delete data?
                                </div>
                            </div><!--/form-group-->
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-danger"> <span class="glyphicon glyphicon-trash"></span> Yes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>  
                
    <script>
        // Get the modal
        var modal = document.getElementById("myModal");
        
        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");
        
        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];
        
        // When the user clicks the button, open the modal 
        btn.onclick = function() {
          modal.style.display = "block";
        }
        
        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
          modal.style.display = "none";
        }
        
        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
          if (event.target == modal) {
            modal.style.display = "none";
          }
        }
        </script>
@endsection