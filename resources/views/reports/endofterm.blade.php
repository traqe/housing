
<style>
    #watermark {
        position: fixed;
        top: 50% ;
        width: 100%;
        text-align: center;
        top: 35% ;
        opacity: .1;
        transform: rotate(0deg);
        transform-origin: 100% 100%;
        align-content: center ;
        z-index: -1000;
    }
    .wrapper {

        /** Top padding so that initially, the content is below the header **/
        padding-top: 100px;

        position:fixed;
        width:94%;
        top: 30px;
        height: 100px;
    }

    .footer {
        position: fixed;
    }

    /*.header { position: fixed; top: 10px; left: 0px; right: 0px; height: 50px; }*/

    .footer {
        bottom: 10;
    }
    .tableBordered {
        border-collapse: collapse;
        border: 1px solid black;
    }
    .table {
        border-collapse: collapse;
    }
    .table td {
        border: 1px solid black;

    }
    .table th {
        border: 1px solid black;

    }
    tr.noBorder td {
        border: 0;
    }
</style>




{{--<div  id="watermark">--}}
{{--<a href="">--}}
{{--<img src="{{asset('img/logo-symbol.png')}}" alt="logo">--}}
{{--</a>--}}
{{--</div>--}}

<!--<div class="wrapper">
    <div class="header">
        <img class="banner" src="http://placehold.it/200x100" />
    </div>
{{--+263 9 291247, +263-9-290596-8; +263-9-291598--}}
        </div>-->
{{--Zimbabwe School of Mines, Coghlan Ave Extension, Killarney, Bulawayo, Zimbabwe--}}

<div class="container">

    <br/>
    <div style="text-align:centre">
        {{--<img src="{{asset('img/header.png')}}" height="120" width="100%" alt="logo">--}}
    </div>
</div>

<div align="center">
    <table class="tableBordered"  style="width: 100%; font-size: 0.8em;" >
        <tr>
            <td colspan="4" width="30%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <img src="{{  asset('img/cbclogo.jpg') }}" height="80" width="80">
            </td>
            <td colspan="4" width="70%">
                <table>
                    <tr>
                        <td style="font-size: 26pt">
                            Christian Brothers College
                        </td>
                    </tr>
                </table>
                <h4 style=" font-size:12pt; font-weight:normal" >REPORT FOR @if ($term == 1) 1ST @elseif ($term == 2) 2ND @else 3RD @endif TERM {{$year}}: FORM {{$c}} </h4>
                <h4 style="font-weight:bold; font-size:14pt">{{$student->LastName.' '.$student->FirstName}}  </h4>
                {{--<h4 style="font-weight:normal; font-size: 12pt">Possible Attendance 28 Actual Attendance 26 </h4>--}}
            </td>
        </tr>
    </table>


</div>
<br/>


<div>

    <table class="table"  style="width: 100%; font-size: 0.8em;" border="0">
        <thead>
        <tr align="center" style="background-color: lightgray">
            <th width="15%">Subject</th>
            <th width="5%"  >Mark</th>
            <th width="5%"  >Avg</th>
            <th width="50%">Comment</th>
            <th width="15%">Teacher</th>
        </tr>
        </thead>
        @forelse($exams as $key => $app)
            <tr>
                <td >{{$app['course']}}<span style="font-size:9pt;"></span></td>
                <td  align="center">{{round($app['mark'])}}<span style="font-size:9pt;"></span></td>
                <td > <span style="font-size:9pt;"></span></td>
                <td > <span style="font-size:9pt;">{{$app['remark']}}</span></td>
                <td > <span style="font-size:9pt;">{{$app['teacher']}}</span></td>
            </tr>
        @empty
        @endforelse
    </table>
    <table class="table"  style="width: 100%; font-size: 0.8em;" border="0">
        <thead>
        <tr align="center" style="background-color: lightgray">
            <th width="25%">Club and Sports</th>
{{--             <th width="5%"  >Mark</th>--}}
{{--            <th width="5%"  >Avg</th>--}}
            <th width="50%">Comment</th>
            <th width="15%">Teacher</th>
        </tr>
        </thead>

        @forelse($studActivity as $d)
            <tr>
                <td width="25%">{{$d->activity->ActName}}<span style="font-size:9pt;"></span></td>
{{--                <td  ><span style="font-size:9pt;"></span></td>--}}
{{--                <td> <span style="font-size:9pt;"></span></td>--}}
                <td  width="50%" > <span style="font-size:9pt;">{{$d->activity->comments}}</span></td>
                <td width="15%"> <span style="font-size:9pt;">{{$d->activity->teachers->first()->staff->Title.' '.$d->activity->teachers->first()->staff->LastName.' '.$d->activity->teachers->first()->staff->FirstName}}</span></td>
            </tr>
        @empty
        @endforelse


    </table>
    <br/>

    <table   style="width: 100%; font-size: 0.8em;" >
        <tr>
            <td colspan="3" width="50%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                {{$comment}}
            </td>
            <td colspan="3" width="40%" align="right">
                <img src="{{  asset('img/signature.jpg') }}" height="80" width="160">
            </td>
        </tr>
    </table>




    <div class="footer">
        <table width="100%" class="tableBordered" style="vertical-align: bottom; font-family: serif; font-size: 10pt; color: #000000;">
            <tr>
                <td>
                    <table width="100%" style="vertical-align: bottom; font-family: serif; font-size: 10pt; color: #000000;">
                        <tr>
                            <td width="20%">Possible Attendance @if ($ARAttend != null){{$ARAttend->Attend1}} @endif</td>
                            <td width="20%">Actual Attendance of @if ($ARAttend != null){{$ARAttend->Attend2}}@endif</td>
                            <td width="60%" align="right">Next term begins on {{$openingDate}} </td>
                        </tr>

                    </table>
                </td>
            </tr>
        </table>

        <table width="100%"  style="vertical-align: bottom; font-family: serif; font-size: 10pt; color: #000000;">
            <tr>
                <td width="70%">{{\Carbon\Carbon::now()->format('l jS \\of F Y')}}</td>
                <td width="30%" align="right">HeadMaster : K Muhomba</td>
            </tr>
        </table>
        <br/> <br/> <br/>
    </div>

</div>



