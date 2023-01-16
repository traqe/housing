@extends('master')

@section('content')
    <div class="container-fluid">
        @if (count($errors) > 0)
        <div class="alert alert-danger">
          <strong>Whoops!</strong> There were some problems with your input.<br><br>
          <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif
  
          @if(session('success'))
          <div class="alert alert-success">
            {{ session('success') }}
          </div> 
          @endif
        <div class="row">
            <div class="col-md-12">

                <!-- Default box -->
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
                <div class="card box-primary">
                    <div class="card-header">
                        <i class="fa fa-file"></i>
                        <strong>Create Burial</strong>
                        <small>Form</small>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{route('createBurial')}}" enctype="multipart/form-data">
                            <input class="hidden" type="hidden" name="created_by" value="{{Auth::user()->id}}">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="gender">Deceased Name</label>
                                <input type="text" name="d_name" class="form-control" required>
                            </div>    
                            <div class="form-group">
                                <label for="gender">Deceased Surname</label>
                                <input type="text" name="d_surname" class="form-control" required>
                            </div> 
                            <div class="form-group">
                                <label for="gender">Gender</label>
                                <select name="d_gender" id="d_gender" class="form-control input-group-lg reg_name" required>
                                    <option selected disabled value="">Select Gender</option>
                                    @forelse($gender as $gender)
                                        <option value="{{$gender->gender}}">{{$gender->gender}}</option>
                                    @empty
                                    @endforelse
                                </select>

                            </div>

                            <div class="form-group">
                                <label for="gender">Deceased Date Of Birth</label>
                                <input type="date" name="d_dob" class="form-control" required>
                            </div> 
                            <div class="form-group">
                                <label for="gender">Deceased Date Of Death</label>
                                <input type="date" name="d_dod" class="form-control" required>
                            </div> 
                            <div class="form-group">
                                <label for="gender">Interminant Date</label>
                                <input type="date" name="d_internment_date" class="form-control" required>
                            </div>                   
                            <div class="form-group">
                                <label for="gender">Funeral Policy</label>
                                <input type="text" name="d_fpolicy" class="form-control" required>
                            </div>
                            <div class="form-group">
                    
                            <label for="gender">Burial Order</label>
                            <input type="file" class="form-control" name="burial_order" />

                            </div>  
                            <div class="form-group">
                                <label for="gender">Relative Name</label>
                                <input type="text" name="r_name" class="form-control" required>
                            </div> 
                            <div class="form-group">
                                <label for="gender">Relative Contact</label>
                                <input type="text" name="r_contact" class="form-control" required>
                            </div> 
                            {{--<div class="form-group">--}}
                                {{--<label for="gender">Grave Owner ID</label>--}}
                                {{--<input type="text"  name="owner_id"  class="form-control" required>--}}
                            {{--</div>--}}

                                <label for="gender">Grave</label>
                                <select name="grave_id" id="grave_id" class="form-control input-group-lg reg_name" required>
                                    <option selected disabled>Owner</option>
                                    @forelse($grave as $grave)
                                        @if ($grave->g_status == 'Allocated')
                                        <option value="{{$grave->id}}">{{$grave->g_no . ' '. $grave->g_site . ' ' . $grave->owner->name }}</option>
                                        @endif
                                    @empty
                                    @endforelse
                                </select>
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