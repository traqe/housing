@extends('master')

@section('content')
<div class="container">
    <div class="col-md-12">
        <div class="card card-accent-primary">
            <div class="card-header">
                <i class="fa fa-plus"></i>
                <strong>Add Spouse</strong>
                <small>for Applicant name</small>
            </div>
            <div class="card-body">

                <!--session to show beneficiary addition success-->
                @if (session('addSuccess'))
                <div class="alert alert-success">
                    {{ session('addSuccess') }}
                </div>
                @endif

                {{--@include('layouts.partials.alerts')--}}
                <form method="POST" action="/housing/PERSONS/{{request('id')}}/addSpouse">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="surname">Surname</label>
                        <input type="text" name="surname" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="nationalid">National ID</label>
                        <input type="text" name="nationalid" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <input type="text" name="gender" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="mobile">Mobile</label>
                        <input type="text" name="mobile" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" name="address" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="marriage_cert">Marriage Certificate</label>
                        <input type="text" name="marriage_cert" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="occupation">Occupation</label>
                        <input type="text" name="occupation" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="date_marriage">Date of Marriage</label>
                        <input type="date" name="date_marriage" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <label for="income">Income</label>
                            <input type="text" name="income" class="form-control" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-flat pull-right"><span class="fa  fa-check-circle"></span> Add Spouse</button>
                    {{--<a href="{{route("secondary")}}" type="button" class="btn btn-warning btn-flat pull-right" style="margin-right: 5px;">--}}
                    {{--<i class="fa fa-angle-double-right"></i> Next--}}
                    {{--<a/>--}}
                </form>
            </div>
            <!-- /.box-body -->
        </div>


    </div>
</div>
@endsection