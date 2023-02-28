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
        width: 80%;
        font-family: 'Arial Narrow', Arial, sans-serif;
    }

    th,
    td {
        padding: 6px;
        padding-right: 20px;
    }

    #table-detail tr:nth-child(even) {
        background-color: #f2f2f2;
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

    p {
        font-family: 'Arial Narrow', Arial, sans-serif;
    }

    center {
        padding-left: 1cm;
        padding-right: 1cm;
    }

    #requisiteTbl {
        border-collapse: collapse;
        padding-left: 5cm;
        width: 13cm;
    }

    #requisiteTbl td {
        border: 1px solid black;
    }

    #signature-table {
        width: 20cm;
    }

    li {
        padding-bottom: 0.6cm;
        line-height: 0.6cm;
    }

    ol {
        line-height: 0.3cm;
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
    </div>
    <!--bylaw info-->

    <center>
        <p>
            <strong>
                (ACT 31/53)
                <br>
                CHIPINGE GENERAL BY- LAWS 1959/MODEL BUILDING BY-LAWS
                <br>
                SCHEDULE A
                <br>
                CHIPINGE RURAL DISTRICT COUNCIL
                <br>
                BUILDING PLAN APPLICATION – DISIGNATED AREA OF CHIPINGE
            </strong>
        </p>
    </center>


    <center>
        <p>
            <strong>PARTICULARS OF BUILDING TO BE ERECTED.</strong> NOTE: In accordance with
            Councils Laws this form must be completed – and lodged with Council for the erection of
            any building or the erection of other whole or any portion of a building removed or
            destroyed by fire or otherwise, or for any addition of alteration to any existing building.
            Full and accurate information must be recorded.
            The form must accompanied by:-
        </p>
        <ol style="list-style-type: lower-alpha; font-family: 'Arial Narrow', Arial, sans-serif;">
            <li>
                Triplicate plans, elevation and erection of the proposed work drawn to a scale
                not less than 1/100 feet: and
            </li>
            <li>
                Triplicate block plans to scale at least 1/500 showing the position of all
                proposed and existing Buildings.
            </li>
        </ol>
    </center>
    <p style="padding-left: 1.5 cm;"><strong>PLANS NO: ...................................</strong></p>
    <p>
    <ol style="list-style: decimal;">
        <li>Stand N0……………………Name of Street……………………………………...</li>
        <li>Building Owner, Name &amp; Address…………………………………………………………</li>
        <li>Architect Name &amp; Address…………………………………………………………
            …………………………………………</li>
        <li>Will Architect supervise work?……………………………………………………………………………</li>
        <li>Contract Price or estimated cost………………………………………………………………………………………</li>
        <li>Is it a new building, alteration or addition?………………………………………………………………</li>
        <li>Of what materials is the building to be constructed………………………………
            ……………</li>
        <li>(a) Foundation………………………………………………………(b) Damp course………………………………………<br>
            (c) Walls……………………………………………………(d) Floors………………………………………………………<br>
            (e) Roof…………………………………………………………</li>
        <li>Is any second-hand material to be used?………………………………………………………………………</li>
        <li>If so describe it…………………………………………</li>
        <li>For what purpose is the building to be used………………………………………………</li>
        <li>What out buildings are to be built?…………………………………………………………………………</li>
        <li>When are buildings operation to be to be commenced?………………………………………………………………</li>
        <li>Number of storeys?…………………………………………………………………</li>
        <li>Thickness of external walls of each storey…………………………………………</li>
        <li>Thickness of internal one/or cross wall…………………………………………</li>
        <li>Thickness of party walls, if any……………………………………………………</li>
        <li>Compositions and portions of mortar to be used……………………………...
            ………………………………</li>
        <li>Superficial area to be covered by building, including:
            <br>
            EXISTING BUILDING IF ANY <br>
            ………………………………………………………….
        </li>
        <li>Distance between stand boundaries and buildings………………………………
            ………………………………………………</li>
        <li>Material for floors in outhouse…………………………………………………..</li>
        <li>Distance between lowest floor timber and ground surface immediately below
            it…………………………………………</li>
        <li>Method of natural lighting of buildings………………………………………</li>
        <li>Method of natural ventilation of buildings……………………………………</li>
        <li>Are fireplaces to be constructed? If so describe construction…………………………………………………………</li>
    </ol>
    </p>
    <br>
    <p style="padding-left: 1.5 cm;">
        Signature:
        …………………………………………………
    </p>
</div>