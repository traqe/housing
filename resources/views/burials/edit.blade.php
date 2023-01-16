@extends('master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="pull-right">

                            <a href="{{route('burials')}}" id="btn_show_data" class="btn btn-sm btn-primary"
                               title="Show Data">
                                <i class="fa fa-table"></i> Show Data
                            </a>
                            <a href="{{route('createBurial')}}" id="btn_add_new_data" class="btn btn-sm btn-success"
                               title="Add Data">
                                <i class="fa fa-plus-circle"></i> Add Data
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-file"></i>
                        <strong> Edit Burial</strong>
                        <small>Form</small>
                    </div>
<div class="card-body">
    <form method="post" action="{{route('updateBurial',$burial->id )}}">
        <input class="hidden" type="hidden" name="updated_by" value="{{Auth::user()->id}}">
            {{csrf_field()}}
            {{method_field('PUT')}}
            
                            <div class="form-group">
                                <label for="gender">Deceased Name</label>
                                <input type="text" name="d_name" value="{{$burial->d_name}}" class="form-control" required>
                            </div>    
                            <div class="form-group">
                                <label for="gender">Deceased Surname</label>
                                <input type="text" name="d_surname" value="{{$burial->d_surname}}" class="form-control" required>
                            </div> 

                            <div class="form-group">
                                <label for="gender">Deceased Date Of Birth</label>
                                <input type="text" name="d_dob" value="{{$burial->d_dob}}" class="form-control" required>
                            </div> 
                            <div class="form-group">
                                <label for="gender">Deceased Date Of Death</label>
                                <input type="text" name="d_dod" value="{{$burial->d_dod}}" class="form-control" required>
                            </div> 
                            <div class="form-group">
                                <label for="gender">Interminant Date</label>
                                <input type="text" name="d_internment_date" value="{{$burial->d_internment_date}}" class="form-control" required>
                            </div>                  
                            <div class="form-group">
                                <label for="gender">Funeral Policy</label>
                                <input type="text" name="d_fpolicy" value="{{$burial->d_fpolicy}}" class="form-control" required>
                            </div> 
                            <div class="form-group">
                                <label for="gender">Relative Name</label>
                                <input type="text" name="r_name" value="{{$burial->r_name}}" class="form-control" required>
                            </div> 
                            <div class="form-group">
                                <label for="gender">Relative Contact</label>
                                <input type="text" name="r_contact" value="{{$burial->r_contact}}" class="form-control" required>
                            </div> 
                            {{--<div class="form-group">--}}
                                {{--<label for="gender">Grave Owner ID</label>--}}
                                {{--<input type="text"  name="owner_id"  class="form-control" required>--}}
                            {{--</div>--}}

                            <input type="submit" class="btn btn-success pull-right">
                            </form>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

            </div>
        </div>
    </div>
@endsection