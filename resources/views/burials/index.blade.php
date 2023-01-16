@extends('master')
@section('content')


<div class="container-fluid">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="pull-right">

                        <a href="{{route('burials')}}" id="btn_show_data" class="btn btn-sm btn-primary" title="Show Data">
                            <i class="fa fa-table"></i> Show Data
                        </a>


                        <a href="{{route('createBurial')}}" id="btn_add_new_data" class="btn btn-sm btn-success" title="Add Data">
                            <i class="fa fa-plus-circle"></i> Add Data
                        </a>

                    </div>
                </div>
            </div>
            <div class="card card-accent-primary">
                <div class="card-header">
                    <i class="fa fa-align-justify"></i>
                    <strong>Burials</strong>
                    <small>Table</small>
                </div>
                <div class="card-body">
                    @include('layouts.partials.alerts')
                    <table class="table table-striped table-bordered table-hover"  id="example">
                        <thead>
                        <tr>
                        <th>Burial Id</th>
                        <th>Name </th>
                        <th>Surname</th>
                        <th>DOB</th>
                        <th>DOD</th>
                        <th>Interminant Date</th>
                        <th>Funeral Policy</th>
                        <th>Relative Name</th>
                        <th>Relative Contact</th>
                        <th>Grave ID</th>
                        
</tr>
</thead>
<tbody>
    @forelse($burials as $burial)
    <tr>
        <td>{{$burial->id}}</td>
        <td>{{$burial->d_name}}</td>
        <td>{{$burial->d_surname}}</td>
        <td>{{$burial->d_dob}}</td>
        <td>{{$burial->d_dod}}</td>
        <td>{{$burial->d_internment_date}}</td>
        <td>{{$burial->d_fpolicy}}</td>
        <td>{{$burial->r_name}}</td>
        <td>{{$burial->r_contact}}</td>
        <td>{{$burial->grave_id}}
        
            <div class="pull-right box-tools">
                <a class="text-warning"
                   href="{{route('showBurial',$burial->id )}}"
                   title="View Details"><i class="fa fa-eye"></i>
                </a>
                <a  class="text-primary"
                    href="{{route('editBurial',$burial->id )}}"
                    title="Edit Details"><i class="fa fa-pencil-square-o"></i>
                </a>
                {{--<a  class="text-danger"--}}
                    {{--href="{{route('deleteBurial',$burial->b_id )}}"--}}
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
                    <form  class="form-horizontal" action="/burials/{{0}}" method="post">
                        <div class="modal-body">
                            {{csrf_field()}}
                            {{method_field('DELETE')}}
                            <input type="hidden" name="b_id" id="b_id" class="hiddenid">
                            <input type="hidden" name="burial" id="burial" class="hiddenid">
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
@endsection
    


                        
                        