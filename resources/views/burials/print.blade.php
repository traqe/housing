
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



<div class="container">

    <br>
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
                            OLIMEM HOUSING
                        </td>
                    </tr>
                </table>

                {{--<h4 style="font-weight:bold; font-size:14pt">{{$student->LastName.' '.$student->FirstName}}  </h4>--}}
                {{--<h4 style="font-weight:normal; font-size: 12pt">Possible Attendance 28 Actual Attendance 26 </h4>--}}
            </td>
        </tr>
        <tr>
            <td colspan="8" style="text-align: center"> <h4 style=" font-size:12pt; font-weight:normal" >BURIAL DOCUMENT</h4></td>
        </tr>
    </table>


</div>
<br>


<div >   
    <fieldset>
        <legend> DECESEAD INFO</legend> 
        <row align="center" >
            <label for="gender" style="font-weight: bold">Name: </label>
            <label for="gender">{{ $burial->d_name }}</label>  
        </row>
        <br>
        <row align="center" >
            <label style="font-weight: bold" for="gender">Surname: </label>
            <label for="gender">{{ $burial->d_surname }}</label>  
        </row>
        <br>
        <row align="center" >
            <label style="font-weight: bold" for="gender">Gender: </label>
            <label for="gender">{{ $burial->d_gender }}</label>   
        </row>
        <br>
        <row align="center" >
            <label style="font-weight: bold" for="gender">Date Of Birth: </label>
            <label for="gender">{{ $burial->d_dob }}</label>   
        </row>
        <br>
        <row align="center" >
            <label style="font-weight: bold" for="gender">Date Of Death: </label>
            <label for="gender">{{ $burial->d_dod }}</label>   
        </row>
        <br>
        <row align="center" >
            <label style="font-weight: bold" for="gender">Internment Date: </label>
            <label for="gender">{{ $burial->d_internment_date }}</label>   
        </row>
        <br>
        <row align="center" >
            <label style="font-weight: bold" for="gender">Funeral Policy: </label>
            <label for="gender">{{ $burial->d_fpolicy }}</label>   
        </row>
    </fieldset>

    <fieldset>
        <legend>Grave Info</legend>
        <row align="center" >
            <label style="font-weight: bold" for="gender">Site: </label>
            <label for="gender">{{ $burial->grave->g_site }}</label>   
        </row>
        <br>
        <row align="center" >
            <label style="font-weight: bold" for="gender">Section: </label>
            <label for="gender">{{ $burial->grave->g_section }}</label>   
        </row>
        <br>
        <row align="center" >
            <label style="font-weight: bold" for="gender">Contact: </label>
            <label for="gender">{{ $burial->grave->g_no }}</label>   
        </row>
        <br>
        <row align="center" >
            <label style="font-weight: bold" for="gender">Address: </label>
            <label for="gender">{{ $burial->grave->g_lot }}</label>   
        </row>
        <br>
        <row align="center" >
            <label style="font-weight: bold" for="gender">Receipt No: </label>
            <label for="gender"></label>   
        </row>
        <br>
        <row align="center" >
            <label style="font-weight: bold" for="gender">Amount: </label>
            <label for="gender"></label>   
        </row>
        <br>
        
    </fieldset>

    <div class="footer">

        <table width="100%"  style="vertical-align: bottom; font-family: serif; font-size: 10pt; color: #000000;">
            <tr>
                <td width="70%">{{\Carbon\Carbon::now()->format('l jS \\of F Y')}}</td>
                <td width="30%" align="right">DIRECTOR : MR O MUGADZA</td>
            </tr>
        </table>
        
    </div>

</div>



