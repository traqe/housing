@extends('master')

@section('content')
<div class="container">
    <div class="col-md-12">
        <div class="card card-accent-primary">
            <div class="card-header">
                <i class="fa fa-edit"></i>
                <strong>Edit Beneficiary</strong>
                <small>for $Applicant name</small>
            </div>
            <div class="card-body">

                @if (session('editSuccess'))
                <div class="alert alert-success">
                    {{ session('editSuccess') }}
                </div>
                @endif

                {{--@include('layouts.partials.alerts')--}}
                <!--edit beneficiary-->
                <form method="POST" action="/housing/editBeneficiary/{{$beneficiary->id}}">
                    {{csrf_field()}}
                    {{method_field('PUT')}}

                    <!--beneficiary id passed to our form-->
                    <div class="form-group">
                        <input type="hidden" name="id" class="form-control" value="{{ $beneficiary->id }}">
                    </div>

                    <div class="form-group">
                        <label for="name">Full Name</label>
                        <input type="text" name="name" class="form-control" value="{{ $beneficiary->name }}">
                    </div>

                    <div class="form-group">
                        <label for="relation">Relation</label>
                        <input type="text" name="relation" class="form-control" required value="{{ $beneficiary->relation }}">
                    </div>

                    <div class="form-group">
                        <label for="age">Age</label>
                        <input type="number" name="age" class="form-control" required value="{{ $beneficiary->age }}">
                    </div>

                    <div class="form-group">
                        <label for="sex">Sex</label>
                        <input type="text" name="sex" class="form-control" required value="{{ $beneficiary->sex }}">
                    </div>

                    <div class="form-group">
                        <label for="occupation">Occupation</label>
                        <input type="text" name="occupation" class="form-control" required value="{{ $beneficiary->occupation }}">
                    </div>

                    <div class="form-group">
                        <div class="form-group">
                            <label for="income">Income</label>
                            <input type="text" name="income" class="form-control" required value="{{ $beneficiary->income }}">
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