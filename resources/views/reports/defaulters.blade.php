
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
                {{--<img src="{{  asset('img/cbclogo.jpg') }}" height="80" width="80">--}}
            </td>
            <td colspan="4" width="70%">
                <table>
                    <tr>
                        <td style="font-size: 26pt">
                            YONDER RIFT
                        </td>
                    </tr>
                </table>
                <h4 style=" font-size:12pt; font-weight:normal" >DEFAULTERS REPORT </h4>
                {{--<h4 style="font-weight:bold; font-size:14pt">{{$student->LastName.' '.$student->FirstName}}  </h4>--}}
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
            <th width="5%">No</th>
            <th width="15%">FirstName</th>
            <th width="15%"  >LastName</th>
            <th width="10%"  >NationalID</th>
            <th width="10%">ClientID</th>
            <th width="15%">Product</th>
            <th width="15%">DueDate</th>
            <th width="15%">Balance</th>
        </tr>
        </thead>
        @forelse($loans as $key => $loan)
            @if ($loan->client != null)
            <tr>
                <td >{{$key+1}}<span style="font-size:9pt;"></span></td>
                <td  align="center">{{$loan->client->person->first_name}}<span style="font-size:9pt;"></span></td>
                <td > <span style="font-size:9pt;">{{$loan->client->person->last_name}}</span></td>
                <td > <span style="font-size:9pt;">{{$loan->client->person->nationalId}}</span></td>
                <td > <span style="font-size:9pt;">{{$loan->client->clientNo}}</span></td>
                <td > <span style="font-size:9pt;">{{$loan->product->product_name}}</span></td>
                <td > <span style="font-size:9pt;">{{$loan->product->duedate->dueDate}}</span></td>
                <td > <span style="font-size:9pt;">{{$loan->loan_balance}}</span></td>
            </tr>
            @endif
        @empty
        @endforelse
    </table>

    <hr>
    <table width="100%"  style="width: 100%; font-size: 0.8em;" border="0">
        <tr>
            <td width="70%">Total Value</td>
            <td width="30%" align="right">$ {{$loans->sum('loan_balance')}}</td>
        </tr>
    </table>
    <hr>
    <div class="footer">

        <table width="100%"  style="vertical-align: bottom; font-family: serif; font-size: 10pt; color: #000000;">
            <tr>
                <td width="70%">{{\Carbon\Carbon::now()->format('l jS \\of F Y')}}</td>
                <td width="30%" align="right">DIRECTOR : MR R PASI</td>
            </tr>
        </table>
        <br/> <br/> <br/>
    </div>

</div>



