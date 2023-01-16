@extends('master')
@section('content')


    <div class="container-fluid">
        <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="pull-right">

                            <a href="/grades" id="btn_show_data" class="btn btn-sm btn-primary" title="Show Data">
                                <i class="fa fa-table"></i> Show Data
                            </a>


                            <a href="/grades/create" id="btn_add_new_data" class="btn btn-sm btn-success" title="Add Data">
                                <i class="fa fa-plus-circle"></i> Add Data
                            </a>



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
                @forelse($grades as $grade)

                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body p-3 clearfix">
                            <i class="fa fa-university bg-info p-3 font-2xl mr-3 float-left"></i>
                            <div class="h5 text-info mb-0 mt-2">Class {{$grade->grade}}</div>
                            <div class="text-muted text-uppercase font-weight-bold font-xs"></div>
                        </div>
                        <div class="card-footer px-3 py-2">
                            <a class="font-weight-bold font-xs btn-block text-muted" href="/assessment/{{$grade->id}}">View More <i class="fa fa-angle-right float-right font-lg"></i></a>
                        </div>
                    </div>
                </div>

                @empty

                @endforelse

            </div>
            <div>
                {{ $grades->links() }}
            </div>




        </div>

    </div>

@endsection
