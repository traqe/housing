<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reinstatement;
use App\Stand;

class ReinstatementController extends Controller
{
    public function createReinstatement()
    {
        $reinstatement = new Reinstatement();
        $reinstatement->reinstatement_date = request('reinstatement_date');
        $reinstatement->repossession_id = request('repossession_id');
        $reinstatement->captured_by = request('captured_by');
        $reinstatement->reason = request('reason');
        $reinstatement->reinstatement_date = request('reinstatement_date');
        $reinstatement->save();

        $reins = new ReinstatementController();
        // update in create function.
        $reins->update();

        return redirect()->back();
    }
    public function update()
    {
        $stand = Stand::find(request('stand_id'));
        $stand->status = 'ALLOCATED';
        // to show that a certain stand has been reinstated.
        $stand->repossessed = 0;
        $stand->save();

        $allocation = $stand->allocations->where('current_status', 'OLD')->last(); //->application;//->applicant;
        $allocation->current_status = 'CURRENT';
        $allocation->save();
    }
}
