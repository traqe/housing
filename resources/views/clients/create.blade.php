@extends('master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <!-- Default box -->
                <div class="card">
                    <div class="card-body">
                        <div class="pull-right">

                            <a href="{{route('clients')}}" id="btn_show_data" class="btn btn-sm btn-primary" title="Show Data">
                                <i class="fa fa-table"></i> Show Data
                            </a>

                            <a href="{{route('createClient')}}" id="btn_add_new_data" class="btn btn-sm btn-success" title="Add Data">
                                <i class="fa fa-plus-circle"></i> Add Data
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card box-primary">
                    <div class="card-header">
                        <i class="fa fa-file">
                        <strong>Create Client</strong>
                        <small>Form</small>
                        </i>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{route('createClient')}}">
                            <div class="row">
                                <div class="col-md-6">
                                        <input class="hidden" type="hidden" name="created_by" value="{{Auth::user()->id}}">
                                        <input class="hidden" type="hidden" name="activation_date" value="{{date('Y-m-d')}}">
                                        <input class="hidden" type="hidden" name="creation_date" value="{{date('Y-m-d')}}">
                                        <input class="hidden" type="hidden" name="status" value="1">
                                        {{csrf_field()}}
                                        <div class="form-group">
                                            <label for="gender">First Name</label>
                                            <input type="text"  name="first_name" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="gender">Last Name</label>
                                            <input type="text"  name="last_name" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="gender">Middle Name</label>
                                            <input type="text"  name="middle_name" class="form-control" >
                                        </div>
                                        <div class="form-group">
                                            <label for="gender">national ID </label>
                                            <input type="text"  name="nationalId" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="gender">Date of Birth</label>
                                            <input type="date"  name="date_of_birth" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="gender">Gender</label>
                                            <select name="genderId" id="gender_id" class="form-control input-group-lg reg_name" required>
                                                <option value="" selected>Select Gender</option>
                                                @forelse($gender as $c)
                                                    <option value="{{$c->id}}">{{$c->gender}}</option>
                                                @empty
                                                @endforelse
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="gender">Marital Status</label>
                                            <select name="marital_status_id" id="marital_status_id" class="form-control input-group-lg reg_name" required>
                                                <option value="" selected>Select Marital Status</option>
                                                @forelse($marital as $c)
                                                    <option value="{{$c->id}}">{{$c->marital_status}}</option>
                                                @empty
                                                @endforelse
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="gender">Mobile</label>
                                            <input type="text"  name="mobile_no" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="gender">Address</label>
                                            <input type="text"  name="address" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="gender">Telephone</label>
                                            <input type="text"  name="telephone1" class="form-control" >
                                        </div>

                                        <div class="form-group">
                                            <label for="gender">Email</label>
                                            <input type="email"  name="email" class="form-control" >
                                        </div>

                                        <div class="form-group">
                                            <label for="gender">City</label>
                                            <select name="city_id" id="city_id" class="form-control input-group-lg reg_name" required>
                                                <option value="" selected>Select City</option>
                                                @forelse($city as $c)
                                                    <option value="{{$c->id}}">{{$c->city}}</option>
                                                @empty
                                                @endforelse
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="gender">Country</label>
                                            <input type="text"  name="country" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="gender">Is employee?</label>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <label class="switch switch-icon switch-success">
                                                        <input type="checkbox" class="switch-input"  name="isemployee" >
                                                        <span class="switch-label" data-on="" data-off=""></span>
                                                        <span class="switch-handle"></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                    <div class="form-group">
                                        <label for="gender">Employment Type</label>
                                        <select name="employment_type_id" id="employment_type_id" class="form-control input-group-lg reg_name" required>
                                            <option value="" selected>Select Employment Type</option>
                                            @forelse($employmentType as $c)
                                                <option value="{{$c->id}}">{{$c->employment_Type}}</option>
                                            @empty
                                            @endforelse
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="gender">Employer</label>
                                        <input type="text"  name="employer_name" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="gender">Employer Address</label>
                                        <input type="text"  name="employer_address" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="gender">Employer Telephone</label>
                                        <input type="text"  name="employer_telephone" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="gender">Employer Contact Person</label>
                                        <input type="text"  name="contact_person" class="form-control" >
                                    </div>
                                    <div class="form-group">
                                        <label for="gender">Net Salary</label>
                                        <input type="text"  name="net_salary" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="gender">EC Number</label>
                                        <input type="text"  name="clientNo" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="gender">Office</label>
                                        <select name="office_id" id="office_id" class="form-control input-group-lg reg_name" required>
                                            <option value="" selected>Select Office</option>
                                            @forelse($office as $c)
                                                <option value="{{$c->id}}">{{$c->office_name}}</option>
                                            @empty
                                            @endforelse
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label for="gender">Client Status</label>
                                        <select name="statusId" id="statusId" class="form-control input-group-lg reg_name" required>
                                            <option value="" selected>Select Status</option>
                                            @forelse($clientStatus as $c)
                                                <option value="{{$c->id}}">{{$c->client_status}}</option>
                                            @empty
                                            @endforelse
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="gender">Client Type </label>
                                        <select name="typeId" id="typeId" class="form-control input-group-lg reg_name" required>
                                            <option value="" selected>Select Client Type</option>
                                            @forelse($clientType as $c)
                                                <option value="{{$c->id}}">{{$c->client_type}}</option>
                                            @empty
                                            @endforelse
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="gender">Category</label>
                                        <select name="category_Id" id="category_Id" class="form-control input-group-lg reg_name" required>
                                            <option value="" selected>Select Category</option>
                                            @forelse($category as $c)
                                                <option value="{{$c->id}}">{{$c->category_name}}</option>
                                            @empty
                                            @endforelse
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="gender">Bank Name</label>
                                        <input type="text"  name="bank_name" class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="gender">Bank Branch</label>
                                        <input type="text"  name="bank_branch" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="gender">Account Name</label>
                                        <input type="text"  name="account_name" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="gender">Account Number</label>
                                        <input type="text"  name="account_number" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="gender">Account Type</label>
                                        <input type="text"  name="account_type" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="gender">Guarantee Name</label>
                                        <input type="text"  name="g_name" class="form-control" >
                                    </div>
                                    <div class="form-group">
                                        <label for="gender">Guarantee Address</label>
                                        <input type="text"  name="g_address" class="form-control" >
                                    </div>
                                    <div class="form-group">
                                        <label for="gender">Guarantee Id Number</label>
                                        <input type="text"  name="g_id_number" class="form-control" >
                                    </div>
                                    <div class="form-group">
                                        <label for="gender">Guarantee EC Number</label>
                                        <input type="text"  name="g_ec_number" class="form-control" >
                                    </div>
                                    <div class="form-group">
                                        <label for="gender">Guarantee Phone</label>
                                        <input type="text"  name="g_phone" class="form-control" >
                                    </div>
                                    <div class="form-group">
                                        <label for="gender">Guarantee WorkPlace</label>
                                        <input type="text"  name="g_work_place" class="form-control" >
                                    </div>
                                    <div class="form-group">
                                        <label for="gender">Guarantee Bank</label>
                                        <input type="text"  name="g_bank" class="form-control" >
                                    </div>
                                    <div class="form-group">
                                        <label for="gender">Guarantee Account Name</label>
                                        <input type="text"  name="g_bank_account_name" class="form-control" >
                                    </div>
                                    <div class="form-group">
                                        <label for="gender">Guarantee Account Number</label>
                                        <input type="text"  name="g_account_number" class="form-control" >
                                    </div>

                                    <div class="form-group">
                                        <label for="gender">Next of Kin FullName</label>
                                        <input type="text"  name="nokfullname" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="gender">Next of Kin Address</label>
                                        <input type="text"  name="nokaddress" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="gender">Next of Kin Email</label>
                                        <input type="email"  name="nokemail" class="form-control" >
                                    </div>
                                    <div class="form-group">
                                        <label for="gender">Next of Kin Telephone</label>
                                        <input type="text"  name="noktelephone" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="gender">Next of Kin Employer</label>
                                        <input type="text"  name="nokemployer" class="form-control" >
                                    </div>

                                </div>
                            </div>
                            <input type="submit" onclick="return confirm('Are you sure you want to save?')" class="btn btn-success pull-left">
                        </form>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

            </div>
        </div>
    </div>
@endsection
