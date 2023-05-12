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
        width: 100%;
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
        font-size: 11.5pt;
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
                    APPLICATION FOR LEASE FOR TRADING AND LIKE PURPOSES IN COMMUNAL LAND
                </strong>
            </p>
            <p>
                I hereby make application for (a) lease site (b) a cession of a leased site (c) an additional business one a leased <br>
                site (d) a deletion of a business from a leased site. (e) an alteration of business on a leased site (f) a change of <br>
                site (g) a sub-lease.
            </p>
            <p>(DELETE THE INAPPLIABLE)</p>
        </center>
        <table>
            <tr>
                <td>1. District: TSHOLOTSHO RURAL DISTRICT COUNCIL</td>
                <td>Communal Land: {{$rurallease->area}}</td>
            </tr>
            <tr>
                <td>Surname or company name: {{$rurallease->person->surname}}</td>
            </tr>
            <tr>
                <td>Other names: {{$rurallease->person->firstname}}</td>
            </tr>
            <tr>
                <td>Identity Card Number: {{$rurallease->person->nationalid}}</td>
                <td>District: TSHOLOTSHO RURAL DISTRICT/____________________</td>
            </tr>
            <tr>
                <td>Postal Address: {{$rurallease->person->postaladdress}}</td>
            </tr>
        </table>
        <p>(If a company, a seperate advice must be attached giving (a) the full names of each and every director (b) their birthplace and date of birth (c) their dates of entry into Zimbabwe, and places of entry (d) whether or not they hold Zimbabwean citizenship.)</p>
        <p>3. Managerial details: Surname ______________________ <br>
            Other names:_______________________ <br>
            Identity No._______________________ District_____________________</p>
        <p>4. What capital is available to you?___________________________ <br>
            Are you being financed in whole or in part by some other person? YES/NO <br>
            If yes state amount $________________ and Name of Financier_____________________</p>
        <p>5. Locality of site (name of business centre, kraal, school, dip etc): {{$rurallease->area}} <br>
            if NOT a business centre state distance in kilometres to neareast township or business centre_____________________ and give reasons for sitting outside a business centre. <br>
            ______________________________________________________________________________________________________________________________________________________________________________ <br>
            _______________________________________________________________________________________________________________________________________________________________________________</p>
        <p>6. Nature of proposed business: {{$rurallease->stand_purpose}}</p>
        <p>7. Have you any other leases in Communal Land? YES/NO if YES state_________________ <br>
            No._______________________ and advice Receipt Number and amount covering payment of current rental________________________________________________________</p>
        <p>I certify that the information given above is true and correct and that I have not withheld and information that may way affect my application. <br>
            DATE: ____________/_____________/_______________ SIGNATURE OF APPLICANT:______________________</p>
        <p style="text-decoration: underline;"><strong>SCHEDULE</strong> <br>
            The Chief Executive Officer <br>
            ______________________________</p>
        <p>10. Recommended area site of: _____________________ Square meters.</p>
        <p>11. The sites provisionary allocated has been approved by the Local Planning Authority. <br>
            recommend that an offer for lease be made.</p>
        <p>DATE: ___________/______________/____________ STATION: _________________ SIGNATURE: _______________</p>
        <p>TO BE COMPLETED IN ALL CASES OTHER THAN FOR NEW LEASES CERTIFIED THAT RENT FROM CURRENCT YEAR 20__________ IN THE SUM OF________________ <br>
            HAS BEEN PAID UNDER RECEIPT NO_______________ <br>
            DATED_____________________</p>
        <p>DATE: ________/__________/_____________ FOR RURAL DISTRICT COUNCIL:______________________</p>
        <p>In support of the above I attach. <br>
            1.Sketch maps in the duplicate of layout of the site showing all adjacent leased sites both vacant and leased, with numbers supplied for the letter. <br>
            2. Sketch maps showing location of site within the communal land.</p>
    </div>
</div>