@extends('master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="pull-left">
                            <h4><i class="fa fa-user-secret"></i> {{$property->name.' '.$property->address}}
                            </h4>
                        </div>
                        <div class="pull-right">

                            <a href="{{route('councilproperties')}}" id="btn_show_data" class="btn btn-sm btn-primary"
                               title="Show Data">
                                <i class="fa fa-table"></i> Show Data
                            </a>
                            {{--<a href="{{route('createCemeteryOwner')}}" id="btn_add_new_data" class="btn btn-sm btn-success" title="Add Data">--}}
                            {{--<i class="fa fa-plus-circle"></i> Add Data--}}
                            {{--</a>--}}



                            {{--<a href="javascript:void(0)" id="btn_export_data" data-url-parameter="" title="Export Data" class="btn btn-sm btn-primary btn-export-data">--}}
                            {{--<i class="fa fa-upload"></i> Export Data--}}
                            {{--</a>--}}

                            {{--<a href="http://localhost:8000/admin/suppliers/import-data" id="btn_import_data" data-url-parameter="" title="Import Data" class="btn btn-sm btn-primary btn-import-data">--}}
                            {{--<i class="fa fa-download"></i> Import Data--}}
                            {{--</a>--}}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5">
                        <div class="card card-accent-primary">
                            <div class="card-header">
                                <i class="fa fa-street-view">
                                    <strong>Property</strong>
                                    <small>Details</small>
                                </i>
                                <div class="pull-right">
                                    <a href="{{ route('editCouncilProperties',$property->id) }}" class="edit"
                                       title="Edit Property Details">
                                        <i class="fa fa-pencil"> Edit</i>
                                    </a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="dataTable" class="table table-hover table-bordered">
                                        <tbody>
                                            <tr>
                                                <td>Property Name</td>
                                                <td>{{$property->name}}</td>
                                            </tr>
                                            <tr>
                                                <td>Property Address</td>
                                                <td>{{$property->property_address}}</td>
                                            </tr>

                                            <tr>
                                                <td>Property Use</td>
                                                <td>{{$property->property_use}}</td>
                                            </tr>
                                            <tr>
                                                <td>Validity Status</td>
                                                <td>{{$property->validity_status}}</td>
                                                </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <i class="fa fa-info-circle"></i>
                                <strong>Property User</strong>
                                <div class="pull-right">
                                    <a href="#" data-toggle="modal" data-target="#editPerson" data-backrop="false" class=""
                                       title="Edit Personal Details">
                                        <i class="fa fa-pencil"> Edit</i>
                                    </a>
                                </div>
                            </div>
                            
                           <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover"  >
                                        <thead>
                                        <tr>
                                        <th>Name</th>
                                        <th>Surname</th>
                                        <th>National Id</th>
                                        <th>Address</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @if ($person != null)
                                            <tr>
                                                <td> {{ $person->firstname }} </td>
                                                <td> {{ $person->surname}}</td>
                                                <td> {{ $person->nationalid }}</td>
                                                <td> {{ $person->address }}</td>
                                            </tr>    
                                            @else
                                                <tr>
                                                    <h4>No data</h4>
                                                </tr>
                                            
                                            @endif
                                                 
                                        </tbody>
                                    </table>     
                                </div>
                            </div>
                         
                        </div> 
                </div>
            </div>
        </div>
    </div>
   <!-- Start Edit Person Modal -->
   <div class="modal fade" id="editPerson" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
   aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title"><i class="fa fa-street-view"> Edit Person </i></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
              </button>
          </div>
          <form class="form-horizontal" action="{{route('updatePerson',$person->id)}}" method="post">
              <div class="modal-body">
                  {{csrf_field()}}
                  {{method_field('PUT')}}
                  <div class="row">
                      <div class="col-md-6">
                          <div class="form-group">
                              <label for="gender">Title</label>
                              <input type="text" name="title" value="{{$person->title}}" class="form-control"
                                     required>
                          </div>
                          <div class="form-group">
                              <label for="gender">Firstname</label>
                              <input type="text" name="firstname" value="{{$person->firstname}}"
                                     class="form-control" required>
                          </div>
                          <div class="form-group">
                              <label for="gender">Surname</label>
                              <input type="text" name="surname" value="{{$person->surname}}" class="form-control"
                                     required>
                          </div>

                          <div class="form-group">
                              <label for="gender">National ID</label>
                              <input type="text" name="nationalid" value="{{$person->nationalid}}"
                                     class="form-control" required>
                          </div>
                          <div class="form-group">
                              <label for="gender">Date of Birth</label>
                              <input type="date" name="dob" value="{{$person->dob}}" class="form-control"
                                     required>
                          </div>
                          <div class="form-group">
                              <label for="gender">Gender</label>
                              <select name="gender_id" id="gender_id" class="form-control input-group-lg reg_name"
                                      required>
                                  <option value="{{$person->gender_id}}"
                                          selected disabled>{{$person->gender->gender}}</option>
                                  @forelse($genders as $gender)
                                      <option value="{{$gender->id}}">{{$gender->gender}}</option>
                                  @empty
                                  @endforelse
                              </select>
                          </div>
                          <div class="form-group">
                              <label for="gender">Marital Status</label>
                              <select name="marital_id" id="marital_id"
                                      class="form-control input-group-lg reg_name" required>
                                  <option value="{{$person->marital_id}}"
                                          selected disabled>{{$person->marital->maritalstatus}}</option>
                                  @forelse($maritals as $gender)
                                      <option value="{{$gender->id}}">{{$gender->maritalstatus}}</option>
                                  @empty
                                  @endforelse
                              </select>
                          </div>
                          <div class="form-group">
                              <label for="gender">Email Address</label>
                              <input type="email" name="email" value="{{$person->email}}" class="form-control">
                          </div>
                          <div class="form-group">
                              <div class="form-group">
                                  <label for="gender">Mobile</label>
                                  <input type="text" name="mobile" value="{{$person->mobile}}"
                                         placeholder="263-772728637" class="form-control" required>
                              </div>
                          </div>
                      </div>
                      <div class="col-md-6">

                          <div class="form-group">
                              <div class="form-group">
                                  <label for="gender">Address</label>
                                  <input type="text" name="address" value="{{$person->address}}"
                                         class="form-control">
                              </div>
                          </div>
                          <div class="form-group">
                              <div class="form-group">
                                  <label for="gender">Birth Place</label>
                                  <input type="text" name="birthplace" value="{{$person->birthplace}}"
                                         class="form-control">
                              </div>
                          </div>
                          <div class="form-group">
                              <div class="form-group">
                                  <label for="gender">Religion</label>
                                  <input type="text" name="religion" value="{{$person->religion}}"
                                         class="form-control">
                              </div>
                          </div>
                          <div class="form-group">
                              <div class="form-group">
                                  <label for="gender">Nationality</label>
                                  <input type="text" name="nationality" value="{{$person->nationality}}"
                                         class="form-control">
                              </div>
                          </div>


                          <div class="form-group">
                              <div class="form-group">
                                  <label for="gender">Next of kin</label>
                                  <input type="text" name="fullname" value="{{$person->nok['fullname']}}"
                                         class="form-control">
                              </div>
                          </div>
                          <div class="form-group">
                              <div class="form-group">
                                  <label for="gender">Next of Kin Relationship</label>
                                  <input type="text" name="relationship" value="{{$person->nok['relationship']}}"
                                         class="form-control">
                              </div>
                          </div>
                          <div class="form-group">
                              <div class="form-group">
                                  <label for="gender">Next of Kin Phone</label>
                                  <input type="text" name="noktelephone" value="{{$person->nok['telephone']}}"
                                         class="form-control">
                              </div>
                          </div>
                          <div class="form-group">
                              <div class="form-group">
                                  <label for="gender">Next of Kin Email</label>
                                  <input type="text" name="nokemail" value="{{$person->nok['email']}}"
                                         class="form-control">
                              </div>
                          </div>
                          <div class="form-group">
                              <div class="form-group">
                                  <label for="gender">Next of Kin Address</label>
                                  <input type="text" name="nokaddress" value="{{$person->nok->address}}"
                                         class="form-control" required>
                              </div>
                          </div>
                      </div>

                  </div>

              </div>
              <div class="modal-footer">
                  <button type="submit" class="btn btn-primary"><span class="fa fa-check-circle-o"></span> Save
                  </button>
              </div>
          </form>
      </div>
      <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
   
   <!-- End Edit Person Modal --> 
@endsection
