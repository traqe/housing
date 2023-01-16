<style>
    img {
        padding-top: 0.3cm;
    }

    h1 {
        padding-left: 7.5cm;
    }

    table,
    th,
    td {
        border: 1px solid;
        text-align: center;
    }

    #details {
        font-size: 15pt;
        line-height: 20pt;
    }

    #details-container {
        padding-bottom: 75%;
    }
</style>


<div style="display:flex;">
    <!-- need a way to use image from a serve -->
    <img src="storage/logo/{{ $company->logo }} " alt="logo" class="rounded-circle" height="120px">

    <div align="right" id="details-container">
        <h1>{{ $company->name }}</h1>
        <div id="details">
            <div>{{ $company->address }}</div>
            <div>{{ $company->email }}</div>
            <div>{{ $company->contact }}</div>
        </div>
    </div>
</div>


<!--<th width="15%">ADDRESS</th>
                <th width="15%">EMAIL</th>
                <th width="10%">CONTACT</th>
            
            <td> <span style="font-size:9pt;">{{$company->address}}</span></td>
            <td> <span style="font-size:9pt;">{{$company->email}}</span></td>
            <td> <span style="font-size:9pt;">{{$company->contact}}</span></td>-->

</div>