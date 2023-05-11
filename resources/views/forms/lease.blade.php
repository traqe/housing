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
        font-size: 11.5pt;
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

    #company-details table {
        line-height: 9pt;
        border-spacing: 0px;
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
        font-size: 12pt;
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
                    A LEASE WITH OPTION TO PURCHASE
                </strong>
            </p>
        </center>
        <p>
            LEASE NUMBER: {{$lease->lease_no}}<br>
            COUNCIL RESOLUTION NUMBER: __________________<br>
            TOWNSHIP: <br>
            CONTACT: <br>
            ADDRESS: <br>
        </p>
        <p>MEMORANDUM OF AGREEMENT, made and entered into by and between TSHOLOTSHO RURAL DISTRICT COUNCIL (hereinafter styled the Lessor), of the one part and......................................................................... ID............................... (Hereinafter styled the Lessee), of the other part.
            <br><br>
            Witnesseth#
            <br><br>
            That the parties hereto have made and entered into and concluded the following agreement that is to say:
            <br><br>1. THAT the term ‘local authority’ where so ever and when so ever used in this agreement shall mean the local authority within the area of which the land described in clause 2 hereof is situate, but shall exclude Local Committees.
            <br><br>2. THAT notwithstanding the date of signature hereof, the Lessor shall be deemed to have let to the Lessee who/which shall be deemed to have hired Stand No {{ $stand->stand_no }} situated in the township as more fully described in the hereunto annexed, for a period (25) twenty five years from the first day of...................................................... which for the purpose hereof shall be the date of commencement hereof.
            <br><br>3.THAT the rent payable by the Lessee to the Lessor shall be $.................................... per annum and the same shall be paid by the Lessee to the Lessor, or to such person at such place as the Lessor may direct in writing from time to time in advance, the first payments to be made on or before the first day of each year in the event of any extension being granted by the Lessor to the Lessee, the rental shall be paid in advance as aforesaid for such period of extension or the exercise by the Lessee of the option to purchase hereinafter mentioned.

            <br><br>4. THAT building exclusive of outbuilding to the value of not less than $...................... and having a plinth area of not less than square metres, shall be erected on the stand by the Lessee at his expense during the currency of this lease and such buildings shall in all respect comply with any building by-laws and regulations of the local authority, and with plans and specifications to be approved in writing by the local authority.
            <br><br>5. THAT the Lessee undertakes that he will commence the erection of the building in terms of the last preceding clause not later than (9) nine month after the commencement of this lease, and shall proceed, without undue delay to the completion of the same before the expiration of the lease. The Lessor may in his entire discretion grant such further period in which so to commence the said building and to complete them as he may deem fit, on being shown satisfaction that the Lessee has through causes beyond his control been prevented from commencing or completing the building within the period of this agreement.
            <br><br>6. THAT during the said Lease the Lessee undertakes and agrees to pay to the local authority, all such rates and taxes and other charges as would be payable if he/she were in fact and in law the registered owner of the stand and the local authority shall have the right to ask, demand, sue for and recover from the Lessee all such rates and taxes as though the lessee were in fact and in law the registered owner of the premises.
            <br><br>7.THAT in the event of the Lessee failing to commence or complete the building to be erected upon the stand, in terms of clause 4 and 5 hereof within the time specified and in the event of the Lessor granting an extension of the lease for such purpose, the local authority shall be entitled to claim from the Lessee, from time to time as and when rates and other charges become due and payable, a sum equal to the rate which would have been payable by the Lessee had such building been erected and completed as required by this lease and, in default of payment, shall have the right to sue for and recover such sum from the Lessee.
            <br><br>8. THAT during the said lease the Lessee shall keep all building, which may be erected on the stand in order, repair and condition, both internally and externally.
            <br><br>9. THAT the Lessee shall keep the whole of the stand in a clean, tidy, and sanitary condition and free from the rubbish, litter and vermin and will not do, or cause, suffer or permit to be done, anything in or upon the stand which is or may become nuisance.
            <br><br>10. THAT during the said lease, the stand and the building/s to be erected thereon shall only be used for purposes specified in clause hereof, and the building shall be erected only within the building lines specified in clause hereof.
            <br><br>11. THAT, the Lessee shall not occupy, or cause or suffer or permit any person to occupy any stand hereby leased until the building shall have been completed to the satisfaction of the Lessor.
            <br><br>12. THAT the lessee shall not cede or assign this lease or sublet or part with the possession of the stands, or any part thereof, or alienate, mortgage, donate or otherwise dispose of the same, or cede or assign any right acquired by him hereunder without the previous consent in writing of the Lessor, or until title to the stand shall have been granted to him as hereinafter mentioned.
            <br><br>13. THAT the representative of the Lessor shall be entitled to enter on the stand at all reasonable times during the day time to inspect the state and condition thereof and of the building that have been or being erected thereon.
            <br><br>14. THAT if the Lessee shall fail to exercise the option to purchase, hereinafter mentioned, or if the Lessor shall retake possession of the stand by virtue of the provisions of clause 15 hereof, then at the expiration or soon determination of the said lease, the Lessee shall neither have the right to dismantle or remove either in whole or in part any building or other improvements constructed or affected on the stand, nor shall be be entitled to any compensation from the Lessor for such building or improvements or for other matter whatsoever.
            <br><br>15. THAT if the Lessee shall fail to pay the rent, or any part thereof on the date when it is due and payable as aforesaid, or if the Lessee shall commit any other breach of the conditions hereof, or the lessee shall fail to commence or complete the erection of the building as herein before provided, or if the Lessee shall become insolvent, or enter into liquidation or into any composition or deed of arrangement with the creditors, the Lessor shall be at liberty forthwith to declare this agreement terminate and take possession of the stand and to eject the Lessee there from, but without prejudice to any claim which the Lessor may have for unpaid rent, or for damages in lieu thereof, nor shall the Lessee be entitled to the refund of any rental paid by him in terms of the lease.
            <br><br>16. THAT the granting of any extension of the said lease in which to commence or complete the buildings herein provided for, or any other indulgence granted by the Lessor to the Lessee, shall not be constructed as a waiver of the Lessor’s right hereunder and the Lessor shall be entitled to enforce such rights at any time. If such buildings, to minimum value specified have not been erected and completed during the said lease and any extension is granted by the Lessor, the Lessee shall pay to the local authority sums equal to the rates which would have been payable, had such building been erected and completed in accordance with this agreement. Any extension granted by the Lessor for the commencement of any building in terms hereof shall not necessarily grant the Lessee an extension of time in which to complete such building.
            <br><br>17. THAT the Lessee shall as soon as practicable but not later than the date hereinbefore set forth for the commencement of the building notify the Lessor in writing of the date on which to commence such building and his failure so to do shall be deemed to be a breach of the conditions of this lease.
            <br><br>18. THAT notwithstanding the provisions of clause 20 hereof the Lessee may be permitted to purchase the property hereby let and receive title thereto before the completion of the building required in terms of cause 4 hereof, provided that the Lessee satisfies the Lessor.
            <br><br>a. that the Lessee has been granted a loan to be secured by a mortgage bond over the stand to enable such buildings to be erected; and
            <br><br>b. that a contract for the erection of such building within a reasonable period of time has been entered into and that adequate arrangements have been made for fulfilment of the contract and
            <br><br>c. that the purchase price and other sums referred to in clause 20 hereof have been paid or guaranteed to the satisfaction of the Lessor against the grant of title.
            <br><br>d. that “reasonable period of time” as referred to clause 18(b) shall not be more than days upon, such the provisions of clause 20 hereof shall mutatis mutandis apply.
            <br><br>19. THAT the parties hereto consent to the original jurisdiction of the Magistrate‘s Court for the Province of Matabeleland North in respect of all claims arising directly or indirectly out of this agreement.
            <br><br>20. <br><br>a. THAT in the event of the Lessee completing the building of any stand hereby leased and completing the same in terms of clause 5 hereof during the said lease, or of any extension thereof which may be granted by the Lessor of aforesaid, the Lessee shall have the option of purchasing the property hereby let at the price of S and in such case the following provisions shall apply. The said option shall be exercised by notice in writing of such intention given to the Lessor by the Lessee.
            <br><br>b. The date of sale shall be deemed to be the date on which such notice as foresaid shall be received by the Lessor, and with effect from such date the said lease shall be deemed to have terminated.
            <br><br>c. That upon receipt by the Lessee such notice as aforesaid and the payment hereinafter mentioned all such sums as shall have been paid by the Lessee on account of rent shall be deemed to be part payment of the said purchase price and allowance shall be made for the same accordingly, provided that any sums payable as rents during any extension which may be granted by the Lessor shall not be deemed to be part payment of the purchase price.
            <br><br>d. The balance of the said purchase price together with the cost of the survey of the stand amounting to S and the cost of registration of the title deed of the stand in terms of Stamp Duties Act shall be paid by the Lessee to the Lessor in cash on giving such a notice as foresaid.
            <br><br>e. That all rates, taxes and other charges in respect of the stand with effect from the said date of sale shall be borne and paid by the Lessee.
            <br><br>f. That title to the stand shall not be granted to the lessee until such time as the amounts hereinbefore referred to have been fully paid and, except in the circumstances referred to in clause 18 hereof the buildings referred to in clause 4 hereof have been erected and completed to the satisfaction of the local authority i terms of the provisions’ of this lease.
            <br><br>g. That the title to the stand shall be subjected to the following conditions;
            <br><br>The local authority in whose area the stand is situated shall at all times have the right and power free of charge, to erect or lay and work pipe lines, sewers, drains, poles and standards upon, over or under the stand with the further right and power to enter the stand at all reasonable times free of charge for the purpose of inspecting, repairing, maintaining, replacing or altering such works in connection therewith.
            <br><br>21. THAT the Lessee accepts domicillum citondi executandi {Physical address}at:
            <br><br>22. THAT in the event that the Lessee shall fail to carry out any of the terms, conditions or clause of this agreement the Lessor shall have the right to summarily cancel this agreement and eject the Lessee from the said stand, without prejudice to any right to claim damages for such breach of contract.
            <br><br>23. THAT in the event the Lessor cancels this agreement in terms of clause 22 then the Lessor shall have no right to eject the Lessee from the stand forthwith and the Lessee shall have the right to claim compensation for any improvements constructed thereon by him; furthermore if there are any improvements on the said stand if and when this agreement is cancelled by the Lessor then the Lessor shall have the additional option of requiring the Lessee to remove the improvements from the said stand at his own expense as soon as reasonably possible, or the Lessor may do so and recover the costs from the Lessee.
            <br><br>24. THAT no waiver of rights in terms of this agreement on one occasion by the Lessor shall amount to a waiver any other occasion.
            <br><br><br>
            Given under my hand at .................................................................................... this.............. day of........................................./............................
            <br><br>
            Witness:.................................................................... ID Number:........................................
            Signature: .....................................
            <br><br>
            Chief Executive Officer................................................... ID Number................................
            Signature:...................................
            <br><br>
            I hereby accept the conditions stated in the above mentioned agreement and several conditions on my part to be observed, I undertake to observe and perform.
            <br><br>Dated at.................................................................................................. this.................day of..................................../...............
            <br><br>
            Witness:............................................................................... ID Number:...........................................
            Signature: ...........................................
            <br><br>
            Lessee:.................................................................................... ID Number:..........................................
            Signature:............................................
            <br><br>
        </p>
    </div>
</div>