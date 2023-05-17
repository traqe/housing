@extends('master')
@section('content')
<div class="container-fluid">
    <div class="col-md-12">
        <!-- Default box -->
        <div class="card">
            <div class="card-body">

                <div class="pull-left">
                    <h3><i class="fa fa-briefcase"> Personal Information</i></h3>
                </div>
                <div class="pull-right">
                    <a href="{{ route('lease') }}" id="btn_show_data" class="btn btn-sm btn-primary" title="Show Data">
                        <i class="fa fa-table"></i> Show Data
                    </a>
                </div>
            </div>
        </div>

        <div class="card card-accent-primary">
            <div class="card-header">
                <i class="fa fa-align-justify"></i>
                <strong>Personal Info</strong>
                <small>Update</small>
            </div>
            <div class="card-body">
                @include('layouts.partials.alerts')

                <div class="card-body">


                <form class="form-horizontal" action="{{route('updatePerson',$person->id)}}" method="post">
                <div class="modal-body">
                    {{csrf_field()}}
                    {{method_field('PUT')}}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="gender">Title</label>
                                <input type="text" name="title" value="{{$person->title}}" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="gender">Firstname</label>
                                <input type="text" name="firstname" value="{{$person->firstname}}" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="gender">Surname</label>
                                <input type="text" name="surname" value="{{$person->surname}}" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="gender">National ID</label>
                                <input type="text" name="nationalid" value="{{$person->nationalid}}" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="gender">Date of Birth</label>
                                <input type="date" name="dob" value="{{$person->dob}}" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="gender">Gender</label>
                                <select name="gender_id" id="gender_id" class="form-control input-group-lg reg_name" required>
                                    <option value="{{$person->gender_id}}" selected disabled>{{$person->gender->gender}}</option>
                                    @forelse($genders as $gender)
                                    <option value="{{$gender->id}}">{{$gender->gender}}</option>
                                    @empty
                                    @endforelse
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="gender">Marital Status</label>
                                <select name="marital_id" id="marital_id" class="form-control input-group-lg reg_name" required>
                                    <option value="{{$person->marital_id}}" selected disabled>{{$person->marital->maritalstatus}}</option>
                                    @forelse($maritals as $gender)
                                    <option value="{{$gender->id}}">{{$gender->maritalstatus}}</option>
                                    @empty
                                    @endforelse
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="gender">Email Address</label>
                                <input type="text" name="email" value="{{$person->email}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="gender">Mobile</label>
                                    <input type="text" name="mobile" value="{{$person->mobile}}" placeholder="263-772728637" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">

                            <div class="form-group">
                                <div class="form-group">
                                    <label for="gender">Address</label>
                                    <input type="text" name="address" value="{{$person->address}}" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-group">
                                    <label for="gender">Postal Address</label>
                                    <input type="text" name="postaladdress" value="{{$person->postaladdress != null ? $person->postaladdress : ''}}" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="gender">Monthly Income</label>
                                    <input type="text" name="monthly_income" value="{{$person->monthly_income != null ? $person->monthly_income : ''}}" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="gender">Occupation</label>
                                    <input type="text" name="occupation" value="{{$person->occupation != null ? $person->occupation : ''}}" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-group">
                                    <label for="gender">Business Address</label>
                                    <input type="text" name="businessaddress" value="{{$person->businessaddress != null ? $person->businessaddress : ''}}" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-group">
                                    <label for="gender">Birth Place</label>
                                    <input type="text" name="birthplace" value="{{$person->birthplace}}" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="gender">Religion</label>
                                    <input type="text" name="religion" value="{{$person->religion}}" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="gender">Nationality</label>
                                    <input type="text" name="nationality" value="{{$person->nationality}}" class="form-control">
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="form-group">
                                    <label for="gender">Next of kin</label>
                                    <input type="text" name="fullname" value="{{$person->nok['fullname']}}" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="gender">Next of Kin Relationship</label>
                                    <input type="text" name="relationship" value="{{$person->nok['relationship']}}" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="gender">Next of Kin Phone</label>
                                    <input type="text" name="noktelephone" value="{{$person->nok['telephone']}}" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="gender">Next of Kin Email</label>
                                    <input type="text" name="nokemail" value="{{$person->nok['email']}}" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="gender">Next of Kin Address</label>
                                    <input type="text" name="nokaddress" value="{{$person->nok->address}}" class="form-control" required>
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
</div>
</div>
@endsection