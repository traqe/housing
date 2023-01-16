@extends('master')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">

            <!-- Default box -->
            <div class="card">
                <div class="card-body">
                    <div class="pull-left" style="height:5px ">

                        <i class="fa fa-file"></i>
                        <strong>Edit Company Profile </strong>
                    </div>


                </div>
            </div>
        </div>
        <div class="card" style="width: 100%">
            <div class="card-header">
                <i class="fa fa-info-circle"></i>
                <strong>Add Organization</strong>
                <small>Details</small>
            </div>

            <form method="post" action="{{route('createCompany')}}" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-md-6">

                            <div class="row">
                                <div class="form-group col-md-12">
                                    <input type="text" class="form-control" placeholder="Organization name" name='name'>
                                </div>

                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <input type="email" class="form-control" placeholder="Email" name='email'>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" name="contact" class="form-control form-control-sm" required="" placeholder="Contact">
                            </div>
                            <div class="form-group">
                                <textarea id="" cols="30" rows="4" name="address" class="form-control" placeholder="Address"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="" class="control-label">Input Organization Logo</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile" name="logo" accept="image/*" onchange="displayImgProfile(this,$(this))">
                                    <label class="btn btn-sm btn-primary" for="customFile">Choose file</label>
                                </div>
                            </div>
                            <div class="form-group d-flex justify-content-center rounded-circle">
                                <img src="" alt="" id="profile" class="img-fluid img-thumbnail rounded-circle" style="max-width: calc(20%)">
                            </div>
                        </div>

                    </div>
                    <div class="row justify-content-center">
                        <button class="btn btn-block btn-success col-sm-5 align-self-center"><b>Save</b></button>
                    </div>


            </form>
        </div>


    </div>

</div>

@endsection