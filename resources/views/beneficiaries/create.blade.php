@extends('master')

@section('content')
<div class="container">
    <div class="col-md-12">
        <div class="card card-accent-primary">
            <div class="card-header">
                <i class="fa fa-plus"></i>
                <strong>Add Beneficiary</strong>
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
                <form method="POST" action="/housing/PERSONS/{{request('id')}}/addBeneficiary">
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
                        <label for="relation">Relation</label>
                        <input type="text" name="relation" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="age">Age</label>
                        <input type="number" name="age" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="sex">Sex</label>
                        <input type="text" name="sex" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="occupation">Occupation</label>
                        <input type="text" name="occupation" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <div class="form-group">
                            <label for="income">Income</label>
                            <input type="text" name="income" class="form-control" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-flat pull-right"><span class="fa  fa-check-circle"></span> Add Beneficiary</button>
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