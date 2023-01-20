@extends('master')

@section('content')
<div class="container">
    <div class="col-md-12">
        <div class="card card-accent-primary">
            <div class="card-header">
                <i class="fa fa-edit"></i>
                <strong>Edit Spouse</strong>
                <small>for $Applicant name</small>
            </div>
            <div class="card-body">

                @if (session('editSuccess'))
                <div class="alert alert-success">
                    {{ session('editSuccess') }}
                </div>
                @endif

                {{--@include('layouts.partials.alerts')--}}
                <!--edit spouse  -->
                <form method="POST" action="/housing/editSpouse/{{$spouse->id}}">
                    {{csrf_field()}}
                    {{method_field('PUT')}}

                    <!--spouse id passed to our form-->
                    <div class="form-group">
                        <input type="hidden" name="id" class="form-control" value="{{ $spouse->id }}">
                    </div>

                    <div class="form-group">
                        <input type="hidden" name="person_id" class="form-control" value="{{ $spouse->person_id }}">
                    </div>

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" value="{{ $spouse->name }}">
                    </div>

                    <div class="form-group">
                        <label for="surname">Surname</label>
                        <input type="text" name="surname" class="form-control" value="{{ $spouse->surname }}">
                    </div>

                    <div class="form-group">
                        <label for="relation">Title</label>
                        <input type="text" name="title" class="form-control" required value="{{ $spouse->title }}">
                    </div>

                    <div class="form-group">
                        <label for="age">National ID</label>
                        <input type="text" name="nationalid" class="form-control" required value="{{ $spouse->nationalid }}">
                    </div>

                    <div class="form-group">
                        <label for="sex">Gender</label>
                        <input type="text" name="gender_id" class="form-control" required value="{{ $spouse->gender->gender }}">
                    </div>

                    <div class="form-group">
                        <label for="occupation">Mobile</label>
                        <input type="text" name="mobile" class="form-control" required value="{{ $spouse->mobile }}">
                    </div>

                    <div class="form-group">
                        <label for="name">Address</label>
                        <input type="text" name="address" class="form-control" value="{{ $spouse->address }}">
                    </div>

                    <div class="form-group">
                        <label for="name">Marriage Certificate</label>
                        <input type="text" name="marriage_cert" class="form-control" value="{{ $spouse->marriage_cert }}">
                    </div>

                    <div class="form-group">
                        <label for="name">Occupation</label>
                        <input type="text" name="occupation" class="form-control" value="{{ $spouse->occupation }}">
                    </div>

                    <div class="form-group">
                        <label for="name">Date of Marriage</label>
                        <input type="date" name="date_marriage" class="form-control" value="{{ $spouse->date_marriage }}">
                    </div>

                    <div class="form-group">
                        <div class="form-group">
                            <label for="income">Income</label>
                            <input type="text" name="income" class="form-control" value="{{ $spouse->income }}">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-flat pull-right"><span class="fa  fa-check-circle"></span> Update</button>

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