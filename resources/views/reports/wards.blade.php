<style>
    #watermark {
        position: fixed;
        top: 50%;
        width: 100%;
        text-align: center;
        top: 35%;
        opacity: .1;
        transform: rotate(0deg);
        transform-origin: 100% 100%;
        align-content: center;
        z-index: -1000;
    }

    .wrapper {

        /** Top padding so that initially, the content is below the header **/
        padding-top: 100px;

        position: fixed;
        width: 94%;
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




{{--<div id="watermark">--}}
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

    <br />
    <div style="text-align:centre">
        {{--<img src="{{asset('img/header.png')}}" height="120" width="100%" alt="logo">--}}
    </div>
</div>

<div align="center">
    <table class="tableBordered" style="width: 100%; font-size: 0.8em;">
        <tr>
            <td style="padding: 1mm;" colspan="4" width="30%">
                <div id="company-image">
                    <img src="storage/logo/{{ $company->logo }} " alt="logo" class="rounded-circle" height="100px">
                </div>
            </td>
            <td colspan="4" width="70%">
                <table>
                    <tr>
                        <td style="font-size: 26pt">
                            {{$company->name}}
                        </td>
                    </tr>
                </table>

                {{--<h4 style="font-weight:bold; font-size:14pt">{{$student->LastName.' '.$student->FirstName}} </h4>--}}
                {{--<h4 style="font-weight:normal; font-size: 12pt">Possible Attendance 28 Actual Attendance 26 </h4>--}}
            </td>
        </tr>
        <tr>
            <td colspan="8" style="text-align: center">
                <h4 style=" font-size:12pt; font-weight:normal">WARD STATS</h4>
            </td>
        </tr>
    </table>


</div>
<br />


<div>
    <table class="table" style="width: 100%; font-size: 0.8em;" border="0">
        <thead>
            <tr align="center" style="background-color: lightgray">
                <th width="15%">Ward</th>
                <th width="15%">Centre</th>
            </tr>
        </thead>
        @foreach($wards as $ward)
        <tr align="center">
            <td>{{$ward->name}}</td>
            <td>
                @foreach($bc as $centre)

                @if($centre->ward_id == $ward->id)
                {{$centre->name}} <br>
                @endif

                @endforeach
            </td>
        </tr>
        @endforeach
    </table>
    <br>
    <div class="footer">

        <table width="100%" style="vertical-align: bottom; font-family: serif; font-size: 10pt; color: #000000;">
            <tr>
                <td width="70%">{{\Carbon\Carbon::now()->format('l jS \\of F Y')}}</td>
                <td width="30%" align="right">Powered By OLIMEM</td>
            </tr>
        </table>
        <br /> <br /> <br />
    </div>

</div>