<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="/housing"><i class="icon-speedometer"></i> Dashboard </a>
            </li>

            <li class="nav-title">
                Housing Modules
            </li>
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#"><i class="fa fa-gears"></i> Settings</a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin')}}"><i class="icon-star"></i> Administration</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('gender')}}"><i class="icon-star"></i> Genders </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('cemeterysections')}}"><i class="icon-star"></i> Cemetery Sections </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('inspectionstages')}}"><i class="icon-star"></i> Inspection Stages </a>
                    </li>
                    <li class="nav-item">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('propertytypes')}}"><i class="icon-star"></i> Property Types </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('propertycategories')}}"><i class="icon-star"></i> Property Categories </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('company')}}"><i class="icon-star"></i> Profile </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('costing-main-stage') }}"><i class="icon-star"></i> Costing Stages</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('marital')}}"><i class="icon-star"></i> Marital Status</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('roles')}}"><i class="icon-star"></i> Roles</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('standtypes')}}"><i class="icon-star"></i> Stand Types</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('applicationstages')}}"><i class="icon-star"></i> Application
                            Stages</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('developmentstages')}}"><i class="icon-star"></i> Development
                            Stages</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('standclasses')}}"><i class="icon-star"></i> Stand Classes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('batchtypes')}}"><i class="icon-star"></i> Batch
                            Types</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('standconfigs')}}"><i class="icon-star"></i> Stand
                            Configs</a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{route('batches')}}"><i class="fa fa-group"></i> Batches</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('developers')}}"><i class="fa fa-wrench"></i> Developers</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('stands')}}"><i class="fa fa-university"></i> Stands</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('persons')}}"><i class="fa fa-users"></i> Applicants</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('applications')}}"><i class="fa fa-folder-open"></i> Applications</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('waitinglist')}}"><i class="fa fa-bar-chart"></i> Waiting List</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('councilproperties')}}"><i class="fa fa-university"></i> Council Property</a>
            </li>
            {{--<li class="nav-item">--}}
            {{--<a class="nav-link" href="{{route('graves')}}"><i class="fa fa-university"></i> Cemetry</a>--}}
            {{--</li>--}}
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#"><i class="fa fa-folder-open"></i> Cemetry</a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('graves')}}"><i class="icon-star"></i> Grave Stands </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('cemeteryowners')}}"><i class="icon-star"></i> Grave Owners </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('burials')}}"><i class="icon-star"></i> Burials </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#"><i class="fa fa-folder-open"></i> Sage Transactions</a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('debtors')}}"><i class="icon-star"></i> Debtors List</a>
                    </li>
                </ul>
            </li>
            {{--<li class="nav-item">--}}

            {{--<a class="nav-link" href="{{route('applications')}}"><i class="fa fa-bar-chart"></i> Reports</a>--}}
            <li class="nav-item">
                <a class="nav-link" href="{{route('cessions')}}"><i class="fa fa-folder-open"></i> Cessions</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('lease')}}"><i class="fa fa-clipboard"></i> Leases</a>
            </li>
            {{--<li class="nav-item">--}}
            {{--<a class="nav-link" href="{{route('applications')}}"><i class="fa fa-bar-chart"></i> Reports</a>--}}
            {{--</li>--}}
            <li class="nav-item">
                <a class="nav-link" href="{{route('costing-project')}}"><i class="fa fa-briefcase"></i> Project Costing</a>
            </li>
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#"><i class="fa fa-bar-chart"></i> Reports</a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('getApplicants')}}" target="_blank"><i class="icon-star"></i> Applicants</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('getApplicationsReport')}}" target="_blank"><i class="icon-star"></i> Applications </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('getStandsReport')}}" target="_blank"><i class="icon-star"></i> All Stands</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('getAvailableStands')}}" target="_blank"><i class="icon-star"></i> Available Stands</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('getAllocatedStands')}}" target="_blank"><i class="icon-star"></i> Allocated Stands</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('getApprovedApplications')}}" target="_blank"><i class="icon-star"></i> Approved Apps</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('getDeclinedApplications')}}" target="_blank"><i class="icon-star"></i> Declined Apps</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('getPendingApplications')}}" target="_blank"><i class="icon-star"></i> Pending Apps</a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{route('getCompanyProfile')}}" target="_blank"><i class="icon-star"></i> Company Profile</a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{route('getByLaws')}}" target="_blank"><i class="icon-star"></i> By-Laws</a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{route('getChecklist')}}" target="_blank"><i class="icon-star"></i> Checklist</a>
                    </li>
                </ul>


            </li>
        </ul>

        {{--<li class="nav-item">--}}
        {{--<a class="nav-link" href="{{route('refunds')}}"><i class="fa fa-money"></i> Refunds</a>--}}
        {{--</li>--}}

        {{--<li class="nav-item">--}}
        {{--<a class="nav-link" href="{{route('loans')}}"><i class="fa fa-balance-scale"></i> Active Loans</a>--}}
        {{--</li>--}}

        {{--<li class="nav-item">--}}
        {{--<a class="nav-link" href="{{route('repayments')}}"><i class="fa fa-cc-mastercard"></i>--}}
        {{--Transactions</a>--}}
        {{--</li>--}}
        {{--<li class="nav-item">--}}
        {{--<a class="nav-link" href="{{route('sms')}}"><i class="fa fa-envelope"></i>--}}
        {{--Sms</a>--}}
        {{--</li>--}}
        {{--<li class="nav-item">--}}
        {{--<a class="nav-link" href="{{route('reports')}}"><i class="fa fa-cloud-download"></i>--}}
        {{--Reports</a>--}}
        {{--</li>--}}


        </ul>
    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>