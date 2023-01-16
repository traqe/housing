<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parents extends Model
{
    protected $table = 'Parents';
    public $timestamps = false;
    public $primaryKey = 'ParentID';

    public $fillable = [
        'FatherLName',
        'MotherLName',
        'MPHome',
        'MPCell',
        'MEmployer',
        'MPWork',
        'MFax',
        'MEmail',
        'MNationID',
        'MLangID',
        'MNotes',
        'FPHome',
        'FPCell',
        'FEmployer',
        'FPWork',
        'FFax',
        'FEmail',
        'FNationID',
        'FLangID',
        'FNotes',
        'ValidDate',
        'SRCDate',
        'SRCSignedBy',
        'SRCCompany',
        'SRCPerson',
        'SRCPosition',
        'Addr1',
        'Addr2',
        'Addr3',
        'Residence1',
        'Residence2',
        'Salutation',
        'SameInvAddr',
        'InvAddr1',
        'InvAddr2',
        'InvAddr3',
        'InvPhone',
        'InvFax',
        'InvEmail',
        'FamilySituation',
        'ParentsRelationID',
        'HomeLang1',
        'HomeLang2',
        'HomeLang3',
        'StatusID',
        'FatherFName',
        'MotherFName',
        'WaitListID',
        'Residence3',
        'Residence4',
        'MotherPass',
        'MDisabled',
        'PWExpire',
        'MEmailComms',
        'FEmailComms',
        'MPhoto',
        'FPhoto',
        'MEmpAddr1',
        'MEmpAddr2',
        'FEmpAddr1',
        'FEmpAddr2',
        'ResGroup1',
        'ResGroup2',
        'ResGroup3',
        'MProfID',
        'FProfID',
        'FT1',
        'PPDefID',
        'FatherPass',
        'FDisabled',
        'Addr4',
        'InvAddr4',
        'InvCell',
        'InvResidence1',
        'InvResidence2',
        'InvResidence3',
        'InvResidence4',
        'FatherAddr1',
        'FatherAddr2',
        'FatherAddr3',
        'FatherAddr4',
        'FatherSalutation',
        'FatherResidence1',
        'FatherResidence2',
        'FatherResidence3',
        'FatherResidence4',
        'SameInvAddr2',
        'MotherInv',
        'FatherInv',
        'Addr5',
        'InvAddr5',
        'Residence5',
        'InvResidence5',
        'FatherAddr5',
        'FatherResidence5',
        'MotherID',
        'FatherID',
        'MTitle',
        'FTitle',
        'SameMailAddr1',
        'SameMailAddr2',
        'MRelTypeID',
        'FRelTypeID',
        'MSMSComms',
        'FSMSComms',
        'MSchoolYear',
        'FSchoolYear',
        'CreatedOn',
        'CreatedBy',
        'UpdatedOn',
        'UpdatedBy',
        'PPRegOff',
        'PPDueBalOff',
        'InvEmailTo',
        'StatementTo',
        'ODCharges',
        'MotherSalutation',
        'MLabelPrint',
        'FLabelPrint',
        'IncCensus',
        'MPastStudent',
        'FPastStudent',
        'MSchoolYearLeft',
        'FSchoolYearLeft',
        'ARNote',
        'IsPOS',
        'Imported',
        'ImportedOn',
        'OAID',
        'ARStatus',
        'PPActivityBalOff',
        'MExtSystem',
        'FExtSystem',
        'MLocaleID',
        'FLocaleID',
        'PayingVAT',
        'MAboutMe',
        'FAboutMe',
        'InvName',
        'InvRegNo',
        'InvRelTypeID'
    ];
}