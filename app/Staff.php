<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    public $table = 'tblemployee';

    public $timestamps = false;

    //protected $primaryKey = 'StaffID';

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function person(){
        return $this->belongsTo(Person::class);
    }

    public $fillable = [
        'Title',
        'FirstName',
        'LastName',
        'Birth',
        'Sex',
        'Photo',
        'Email',
        'SignFile',
        'Age',
        'Position',
        'Depart',
        'StatusID',
        'ReportTo',
        'Cell',
        'Password',
        'Disabled',
        'Comments',
        'Code',
        'HouseID',
        'PWExpire',
        'PosForRep',
        'UserName',
        'NatID',
        'EmailSign',
        'SMSSign',
        'PhoneWork',
        'PhoneHome',
        'Marked',
        'LastReminderDate',
        'VenueID',
        'ParentID',
        'Salutation',
        'PersonEmail',
        'Addr1',
        'Addr2',
        'Addr3',
        'ResAddr1',
        'ResAddr2',
        'ResAddr3',
        'ID',
        'ResAddr4',
        'ResAddr5',
        'Addr4',
        'Addr5',
        'StaffUpdate',
        'CreatedOn',
        'CreatedBy',
        'UpdatedOn',
        'UpdatedBy',
        'LastNewLeave',
        'LastGenLeave',
        'AdmNo',
        'IncCensus',
        'LocaleID',
        'PID',
        'Color',
        'HidePass',
        'EmailLoginNotify',
        'Maritalstatus',
        'SalaryDistrib',
        'PassReset',
        'TaxFileNo',
        'PrefName',
        'MiddleName',
        'AboutMe',
        'EAAutoInvite'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'StaffID' => 'integer',
        'Title' => 'string',
        'FirstName' => 'string',
        'LastName' => 'string',
        'Birth' => 'datetime',
        'Sex' => 'boolean',
        'Photo' => 'string',
        'Email' => 'string',
        'SignFile' => 'string',
        'Age' => 'integer',
        'Position' => 'string',
        'Depart' => 'string',
        'StatusID' => 'integer',
        'ReportTo' => 'integer',
        'Cell' => 'string',
        'Password' => 'string',
        'Disabled' => 'boolean',
        'Comments' => 'string',
        'Code' => 'string',
        'HouseID' => 'integer',
        'PWExpire' => 'datetime',
        'PosForRep' => 'integer',
        'UserName' => 'string',
        'NatID' => 'integer',
        'EmailSign' => 'string',
        'SMSSign' => 'string',
        'PhoneWork' => 'string',
        'PhoneHome' => 'string',
        'Marked' => 'integer',
        'LastReminderDate' => 'datetime',
        'VenueID' => 'integer',
        'ParentID' => 'integer',
        'Salutation' => 'string',
        'PersonEmail' => 'string',
        'Addr1' => 'string',
        'Addr2' => 'string',
        'Addr3' => 'string',
        'ResAddr1' => 'string',
        'ResAddr2' => 'string',
        'ResAddr3' => 'string',
        'ID' => 'string',
        'ResAddr4' => 'string',
        'ResAddr5' => 'string',
        'Addr4' => 'string',
        'Addr5' => 'string',
        'StaffUpdate' => 'integer',
        'CreatedOn' => 'datetime',
        'CreatedBy' => 'string',
        'UpdatedOn' => 'datetime',
        'UpdatedBy' => 'string',
        'LastNewLeave' => 'datetime',
        'LastGenLeave' => 'datetime',
        'AdmNo' => 'string',
        'IncCensus' => 'integer',
        'LocaleID' => 'integer',
        'PID' => 'string',
        'Color' => 'string',
        'HidePass' => 'integer',
        'EmailLoginNotify' => 'integer',
        'Maritalstatus' => 'integer',
        'SalaryDistrib' => 'string',
        'PassReset' => 'integer',
        'TaxFileNo' => 'string',
        'PrefName' => 'string',
        'MiddleName' => 'string',
        'AboutMe' => 'string',
        'EAAutoInvite' => 'datetime'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
//        'Disabled' => 'required',
//        'Marked' => 'required',
//        'StaffUpdate' => 'required',
//        'IncCensus' => 'required',
//        'PID' => 'required',
//        'Color' => 'required',
//        'HidePass' => 'required',
//        'EmailLoginNotify' => 'required',
//        'SalaryDistrib' => 'required',
//        'PassReset' => 'required'
    ];

}
