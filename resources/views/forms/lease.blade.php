<style>
    #border {
        border: 1px solid black;
        height: 270mm;
    }

    .container-fluid {
        padding: 3mm;
    }

    table {
        border-top: 1px solid;
        border-bottom: 1px solid;
        width: 80%;
        font-family: 'Arial Narrow', Arial, sans-serif;
    }


    th,
    td {
        padding: 6px;
        padding-right: 20px;
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
        font-size: 13pt;
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
                    LEASE APPLICATION FORM
                </strong>
            </p>
            <p>
                <strong>
                    APPLICATION TO ACQUIRE OR LEASE LAND (The form should be completed in full)
                </strong>
            </p>
        </center>
        <ol style="list-style: numeric;">
            <li>
                Full Names of Applicant (Mr./Ms./Mrs./Miss) : {{ $application->applicant->firstname . " " . $application->applicant->surname }}
            </li>

            <li>
                Marital Status : {{ $application->applicant->marital->maritalstatus }}
            </li>
            @if($application->applicant->marital->maritalstatus == "Married")
            <li>
                Spouse : {{ $application->applicant->spouse->name . " " . $application->applicant->spouse->surname }}
            </li>
            @endif
            <li>
                Date Of Birth Of Applicant : {{ $application->applicant->dob }}
            </li>
            <li>
                National ID Number of Applicant : {{ $application->applicant->nationalid }}
            </li>
            <li>
                Postal Address : {{ $application->applicant->postaladdress }}
            </li>
            <li>
                Physical Address : {{ $application->applicant->address }}
            </li>
            <li>
                Telephone/Cell Number : {{ $application->applicant->mobile }}
            </li>
            <li>
                Salary of applicant : {{ $application->applicant->monthly_income }}
            </li>
            <li>
                Address of employer : {{ $application->applicant->businessaddress }}
            </li>
            <li>
                Nationality : {{ $application->applicant->nationality }}
            </li>
            <li>
                Country of Residents: .............................
            </li>
            <li>
                Type of stand (If Stand Is Not Surveyed A Sketch Plan Must Be attached) : {{ $stand->type }}
            </li>
            <li>
                Stand number and Centre : {{ $stand->stand_no }}, {{ $stand->location }}
            </li>
            <li>
                <div>
                    Purpose Of Lease Application (Tick Where Applicable) <br>
                    <div><input type="checkbox" id="vehicle1" name="vehicle1" value="">
                        <label for="vehicle1"> Purchase</label><br>
                    </div>
                    <div>
                        <input type="checkbox" id="vehicle2" name="vehicle2" value="">
                        <label for="vehicle2"> Lease For Fixed</label><br>
                    </div>
                </div>
            </li>
            <li>
                If the stand is required for Business or Industrial Purpose Specify Type of Business.............................................
            </li>
            <li>
                What Value Of Building Is To Be Created : ............................................
            </li>
            <li>
                Give Particulars Of Any Other Land Owned Or Occupied In Zimbabwe:..............................................................
            </li>
            <li>
                Have You and Your Spouse Been Declared Insolvent:......................................
            </li>
            <li>
                State How You Are Going To Finance The Development/Purchase The Site:.................................................................
            </li>
        </ol>
        <br>
        <p>
            I declare that the information given by me in this application is true and correct in every respect to the best
            of my knowledge and believe. I understand that my false statement on this form may render me liable to
            disqualification.
        </p>
        <br>
        <p><strong>Signature: ................................................................</strong></p>
        <p><strong>Date: .....................................................................</strong></p>
        <br>
        <h5>Official Use Only</h5>
        <p>
            (a)The application is included on the list at number ……………………………
            for CEO ……………………………………………… Date …………………………………
            <br>
            (b)This application was processed at the Council meeting of ……………………………… where it was
            approved …………………………………… to allocate a stand as follows:
            <br>
            Type: {{ $stand->type }}
            <br>
            Stand: {{ $stand->stand_no }}
            <br>
            Purchase price: {{ $stand->price }}
            <br>
            Building price : …………………………………
            <br>
            Land use : {{ $application->nature_of_dev }}
            <br>
            Length : {{ $stand->size }} M<sup>2</sup>
            <br>
            Lease agreement No : {{ $lease->lease_no }}
            <br>
            For Chief Executive Officer …………………………………… date ………………………
            <br>
            <br>
            © This property was disposed of on …………………………… under Title deed No ……………<br>
            for chief Executive Officer ………………………………………… Date …………………………
        </p>
    </div>
</div>