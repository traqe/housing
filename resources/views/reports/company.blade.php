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
</div>