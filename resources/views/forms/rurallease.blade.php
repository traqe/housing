<style>
    #border {
        border: 1px solid black;
        height: 270mm;
    }

    .container-fluid {
        padding: 3mm;
    }

    table {
        /*border-top: 1px solid;
        border-bottom: 1px solid;*/
        width: 70%;
        font-family: 'Arial Narrow', Arial, sans-serif;
        font-size: 11.5pt;
    }

    #company-details table {
        line-height: 11pt;
        border-spacing: 0px;
    }

    th,
    td {
        padding: 6px;
        padding-right: 20px;
        height: 14pt;
        padding-bottom: 1pt;
    }


    h2,
    h3 {
        font-family: 'Arial Narrow', Arial, sans-serif;
    }

    #company-details {
        float: right;
        width: 70%;
        padding-left: 10cm;
    }

    #company-image {
        width: 30%;
        float: left;
    }

    #header {
        height: 3.7cm;
    }

    #header-info {
        border: none;
        width: 8cm;
        table-layout: fixed;
    }

    #lease-header {
        text-decoration: underline;
    }

    li,
    p {
        line-height: 0.6cm;
        font-family: 'Arial Narrow', Arial, sans-serif;
        font-size: 12.5pt;
    }
</style>
<div id="border">
    <div class="container-fluid">
        <!--header place-->
        <div id="header">
            <div class="d-flex">
                <div id="company-image">
                    <img src="storage/logo/{{ $company->logo }} " alt="logo" class="rounded-circle" height="100px">
                </div>
                <div id="company-details">
                    <table id="header-info">
                        <tr>
                            <td>{{ $company->name }}</td>
                        </tr>
                        <tr>
                            <td>{{ $company->address }}</td>
                        </tr>
                        <tr>
                            <td>{{ $company->email }}</td>
                        </tr>
                        <tr>
                            <td>{{ $company->contact }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <!--header close here-->
        <center>
            <p id="lease-header">
                <strong>
                    COMMUNAL LAND LEASE
                </strong>
            </p>
        </center>
        <p>LEASE NUMBER: {{$rurallease->lease_no}}</p>
        <p>BUSINESS: {{$rurallease->stand_purpose}}</p>
        <p>COMMUNAL LAND: {{$rurallease->area}}</p>
        <p>ADDRESS: {{$rurallease->person->address}}</p>
        <p>CONTACT DETAILS: {{$rurallease->person->mobile}}_________NEXT OF KIN CONTACT: {{$rurallease->person->nok->telephone}}</p>
        <p>DISTRICT: TSHOLOTSHO RURAL DISTRICT <br> ZIMBABWE</p>
        <p>COMMUNAL LAND LEASE SITE <br>TRADING OR OTHER PURPOSES</p>
        <table>
            <tr>
                <td>Witnesses:</td>
            </tr>
            <tr>
                <td>1. ___________________________</td>
                <td>ID Number: ________________________</td>
                <td>Signature: _________________</td>
            </tr>
            <tr>
                <td>2. ___________________________</td>
                <td>ID Number: ________________________</td>
                <td>Signature: _________________</td>
            </tr>
            <tr>
                <td>Lessor (Chief Executive Officer)</td>
            </tr>
        </table>
        <p><strong>For Tsholotsho Rural District Council</strong> <br>
            I certify that the terms of this lease have fully been explained to me and acknowledge that I understand the provisions thereof. <br>
            Dated at this _________________ day of _________________/20______</p>
        <table>
            <tr>
                <td>Witness:</td>
            </tr>
            <tr>
                <td>1. ___________________________</td>
                <td>ID Number: ________________________</td>
                <td>Signature: _________________</td>
            </tr>
            <tr>
                <td>2. ___________________________</td>
                <td>ID Number: ________________________</td>
                <td>Signature: _________________</td>
            </tr>
            <tr>
                <td>Lessor (Chief Executive Officer)</td>
            </tr>
        </table>
    </div>
</div>