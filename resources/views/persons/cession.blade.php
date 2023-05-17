@extends('master')

@section('content')
<div class="container">
    <div class="col-md-12">
        <div class="card card-accent-primary">
            <div class="card-header">
                <i class="fa fa-plus"></i>
                <strong>Add Cession</strong>
                <small>for {{$person->firstname}}</small>
            </div>
            <div class="card-body">

                <!--session to show beneficiary addition success-->
                @if (session('addSuccess'))
                <div class="alert alert-success">
                    {{ session('addSuccess') }}
                </div>
                @endif

                {{--@include('layouts.partials.alerts') --}}
                <form class="form-horizontal" action="{{route('addCession')}}" method="post">
                <div class="modal-body">
                    {{csrf_field()}}
                    <input type="hidden" value="{{$person->id}}" name="from_person">
                    <input type="hidden" value="{{Auth::user()->id}}" name="created_by">

                    {{--<div class="form-group">
                        <div class="col-sm-12">
                            <label for="gender">Cedor</label>
                            <input type="text" name="reason" value="{{$person->id}}" class="form-control input-group-lg reg_name" required>
                        </div>
                    </div> --}}
                    <div class="form-group">
                        <div class="col-sm-12">
                            <label for="gender">Stand</label>
                            <select name="stand_id" class="form-control input-group-lg reg_name" required>
                                <option value="" selected disabled>Stand</option>
                                @forelse($applications as $s)
                                @if ($s->allocations->count() > 0)
                                <!-- @if ($s->allocations->first()->status == 'APPROVED' && $s->allocations->first()->current_status = 'CURRENT') -->
                                <option value="{{$s->allocations->first()->stand->id}}">{{'Stand No:'.$s->allocations->first()->stand->stand_no.' , Stand Address :'.$s->allocations->first()->stand->address.' , Stand Size:'.$s->allocations->first()->stand->size}}</option>
                                <!-- @endif -->
                                @endif
                                @empty
                                @endforelse
                            </select>
                        </div>
                    </div>
                    <!--/form-group-->

                    <div class="form-group">
                        <div class="col-sm-12">
                            <label for="gender">Beneficiary</label>
                            <select name="to_person" class="form-control input-group-lg reg_name" required>
                                <option value="" selected disabled>Beneficiary</option>
                                @forelse($people as $p)
                                @if ($p->id != $person->id)
                                <option value="{{$p->id}}">{{$p->surname.' '.$p->firstname.' '.$p->nationalid}}</option>
                                @endif
                                @empty
                                @endforelse
                            </select>
                        </div>
                    </div>
                    <!--/form-group-->



                    <div class="form-group">
                        <div class="col-sm-12">
                            <label for="gender">Reason</label>
                            <input type="text" name="reason" class="form-control input-group-lg reg_name" required>
                        </div>
                    </div>
                    <!--/form-group-->

                    <div class="form-group">
                        <div class="col-sm-12">
                            <label for="gender">Cedent Witness</label>
                            <input type="text" name="cedent_witness" class="form-control input-group-lg reg_name" required>
                        </div>
                    </div>
                    <!--/form-group-->

                    <div class="form-group">
                        <div class="col-sm-12">
                            <label for="gender">Cessionary Witness</label>
                            <input type="text" name="cessionary_witness" class="form-control input-group-lg reg_name" required>
                        </div>
                    </div>
                    <!--/form-group-->

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><span class="fa fa-check-circle"></span> Save
                    </button>
                </div>
            </form>

</div>
</div>
</div>
                    </div>
@endsection