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

    #checklist {
        width: 90%;
        font-family: 'Arial Narrow', Arial, sans-serif;
        border-collapse: collapse;
        padding-left: 1.5cm;
    }

    #checklist td {
        border: 1px solid black;
    }

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

    li {
        line-height: 0.6cm;
        font-family: 'Arial Narrow', Arial, sans-serif;
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
            <p><strong>BUILDING APPRAISAL CHECKLIST</strong></p>
        </center>
        <br>
        <p>
            STAND NO.......................HOUSE HOLDER...........................
            <br>
            PLAN REF:.......................DATE...................
        </p>

        <p>
        <ol style="list-style: decimal;">
            <p>1. GENERAL</p>
            <br>
            <ol style="list-style: lower-alpha;">
                <li>PLINTH AREA...........................(ALL NEW BUILDINGS)</li>
                <li>ESTIMATED COST ($).............................(ESTIMATED COST)</li>
                <li>PLINTH AREA OF OUR BUILDING.......................................</li>
            </ol>
            <br>
            <p>2. CHECKLIST</p>
        </ol>
        </p>
        <center>
            <table id="checklist">
                <tr>
                    <td>#</td>
                    <td>ITEM</td>
                    <td>APPROVED</td>
                    <td>NOT APPROVED</td>
                    <td>NOTES</td>

                </tr>
                <tr>
                    <td>1</td>
                    <td>BUILDING PLANS PAID FULLY</td>
                    <td></td>
                    <td></td>
                    <td></td>

                </tr>
                <tr>
                    <td></td>
                    <td>FLOOR PLAN</td>
                    <td></td>
                    <td></td>
                    <td></td>

                </tr>
                <tr>
                    <td>2</td>
                    <td>DIMENSION</td>
                    <td></td>
                    <td></td>
                    <td></td>

                </tr>
                <tr>
                    <td>3</td>
                    <td>MINIMUM ROOM SIZES</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>NATURAL LIGHT</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>VENTILATION</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>6</td>
                    <td>OTHER</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td>CROSS SECTION</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>7</td>
                    <td>FOUNDATION</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>8</td>
                    <td>FLOOR SLAB</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>9</td>
                    <td>WALLS</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>10</td>
                    <td>WINDOWS</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>11</td>
                    <td>ROOF</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>12</td>
                    <td>OTHER</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td>ELEVATION</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>13</td>
                    <td>DIMENSION</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>14</td>
                    <td>EXTERNAL FINISH</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>15</td>
                    <td>OTHER</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td>SANITATION</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>16</td>
                    <td>SEPTIC TANK</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>17</td>
                    <td>TOILETS</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>18</td>
                    <td>SOAK AWAY</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>19</td>
                    <td>OTHER</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td>SITE PLAN</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>20</td>
                    <td>BUILDING LINES</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>21</td>
                    <td>LOCATION OF SEWERS</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>22</td>
                    <td>LOCATION OF P.T.C/ ZESA</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>23</td>
                    <td>DIMENSION</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>24</td>
                    <td>SCALE</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>25</td>
                    <td>PLINTH AREA (MAXIMUM)</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>26</td>
                    <td>PLINTH AREA OUT OF BUILDING</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td>FOR BUSINESS USE (if required)</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>27</td>
                    <td>HEALTH INSPECTOR</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>28</td>
                    <td>LIQUOR LICENSING INSPECTOR</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>29</td>
                    <td>FACTORIES INSPECTOR</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </table>
        </center>
    </div>
</div>