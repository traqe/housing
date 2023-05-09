<style>
    #border {
        border: 1px solid black;
        height: 270mm;
    }

    .container-fluid {
        padding: 3mm;
    }

    #company-details table {
        width: 80%;
        font-family: 'Arial Narrow', Arial, sans-serif;
    }

    table {
        width: 100%;
        font-family: 'Arial Narrow', Arial, sans-serif;
        font-size: 11pt;
    }

    th,
    td {
        padding: 6px;
        padding-right: 20px;
    }

    #letter-info tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    h2,
    h3 {
        font-family: 'Arial Narrow', Arial, sans-serif;
    }

    #company-details {
        float: right;
        width: 60%;
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

    p {
        font-family: 'Arial Narrow', Arial, sans-serif;
        font-size: 11pt;
        line-height: 16pt;
    }

    /*#requisiteTbl {
        border-collapse: collapse;
        padding-left: 5cm;
        width: 13cm;
    }*/

    /*#requisiteTbl td {
        border: 1px solid black;
    }*/

    /*#signature-table {
        width: 20cm;
    }*/
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
        <br>
        <br>
        <div id="letter-info">
            <table>
                <tr>
                    <td>Name: {{$application->applicant->surname}}, {{$application->applicant->firstname}}</td>
                    <td>ID Number: {{$application->applicant->nationalid}}</td>
                </tr>
                <tr>
                    <td>Address: {{$application->applicant->address}}</td>
                    <td>Contact Details: {{$application->applicant->mobile}}</td>
                </tr>
            </table>
            <br>
            <p><strong>RE: LETTER OF OFFER FOR A STAND BY TSHOLOTSHO RURAL DISTRICT COUNCIL</strong></p>
            <p>
                You are kindly advised that you have been offered stand number {{$allocation->stand->stand_no}}, {{$application->standType->type}} by Tsholotsho Rural District Council.
            </p>
            <p>
                The offer is on condition that you pay an initial deposit of $ ____________________ and monthly installments <br>
                of $___________________ towards clearing the amount of $________________ which is the principal cost of the stand. <br>
                The monthly installment shall be paid on or before the 30<sup>th</sup> of every month with the effect from ______/______/_______ <br>
                for the next ________________ months/years. If the conditions mentioned above are not fully met, Tsholotsho Rural District Council shall repossess the said stand.
            </p>
            <br>
            <table>
                <tr>
                    <th>WITNESS</th>
                    <th>CHIEF EXECUTIVE OFFICER</th>
                </tr>
                <tr>
                    <td>Name: ______________________________ </td>
                    <td>Name: ______________________________ </td>
                </tr>
                <tr>
                    <td>ID Number: __________________________ </td>
                    <td>ID Number: __________________________ </td>
                </tr>
                <tr>
                    <td>Signature: ___________________________ </td>
                    <td>Signature: ___________________________ </td>
                </tr>
            </table>
            <p>
                I, {{$application->applicant->surname}} {{$application->applicant->firstname}} With ID Number {{$application->applicant->nationalid}} Being the lessee/purchase of stand number {{$allocation->stand->stand_no}}, {{$application->standType->type}} <br>
                do hereby accept the condition in the letter of offer stated above. Signed __________________ at Tsholotsho Rural District Council this day _________________ of ____________________/_________________.
            </p>
            <table>
                <tr>
                    <th>WITNESS</th>
                    <th>LESSEE/PURCHASER</th>
                </tr>
                <tr>
                    <td>Name:______________________________</td>
                    <td>Name: {{$application->applicant->surname}} {{$application->applicant->firstname}} </td>
                </tr>
                <tr>
                    <td>ID Number: __________________________ </td>
                    <td>ID Number: {{$application->applicant->nationalid}} </td>
                </tr>
                <tr>
                    <td>Signature: ___________________ </td>
                    <td>Signature: ___________________ </td>
                </tr>
            </table>
        </div>
    </div>
</div>