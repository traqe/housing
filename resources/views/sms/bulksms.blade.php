@extends('master')
@section('content')

<div class="card col-md-12 box-primary">
    <div class="card-header">
        <i class="fa fa-file"></i>
        <strong>Create Stand</strong>
        <small>Form</small>
    </div>
    <div class="row">
<div class="card-body col-md-6">
    <form action="" method="post">

    {{ csrf_field() }}
    @if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error )
        <li> {{ $error }} </li>
            
        @endforeach
    </ul>
        
    @endif

    @if (session('success'))
    {{ session('success') }}
        
    @endif
    <div class="form-group">
    <label>Phone Numbers(seperate with a comma [,])</label>
    <input type='text' name='numbers' id='numbers'  class="form-control"/>
    </div>

    <div class="form-group">
    <label>Message</label>
    <textarea name='message' class="form-control"></textarea>
    </div>
    <button type="submit">Send</button>
</form>
</div>

<div class="card-body col-md-6 pull-right" >
<table class="table table-sm table-bordered table-hover" id="appNumbers">
    <thead>
    <tr>
        <th>
                <input class="table-check-input" type="checkbox" value="" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                  Select all
                </label>
        </th>
        <th>Name</th>
        <th>Surname</th>
        <th>Contact</th> 
    </tr>
    </thead>

    <tbody>
        @forelse ($applicants as $apps )
        <tr>
            <td>
                    <input class="table-check-input" type="checkbox" value="" id="CheckDefault">
            </td>
                  <td>{{ $apps->firstname }}</td>
                 <td>{{  $apps->surname }}</td>
            <td>{{  $apps->mobile }}</td>
            </tr>
        @empty
            
        @endforelse
        
    </tbody>
</table>
<input class="btn-success btn-sm" type="button" value="Get Selected" onclick="GetSelected()" />
</div>
    </div>
@endsection

