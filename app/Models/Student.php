<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Student
 * @package App\Models
 * @version January 13, 2020, 3:21 pm UTC
 *
 * @property \App\Models\ACMPaymentStatus aCMPaymentStatus
 * @property \App\Models\StudentType studentType
 * @property \App\Models\Country country
 * @property \App\Models\Staff staffs
 * @property \Illuminate\Database\Eloquent\Collection aCMActGroupGrade
 * @property \Illuminate\Database\Eloquent\Collection aCMActivityGroups
 * @property \Illuminate\Database\Eloquent\Collection aCMActivityStud
 * @property \Illuminate\Database\Eloquent\Collection aCMActStaff
 * @property \Illuminate\Database\Eloquent\Collection aCMActTimeSlotVenue
 * @property \Illuminate\Database\Eloquent\Collection ACMAttStudent
 * @property \Illuminate\Database\Eloquent\Collection aCMRepSetupStud
 * @property \Illuminate\Database\Eloquent\Collection aDAddress
 * @property \Illuminate\Database\Eloquent\Collection aDBranch
 * @property \Illuminate\Database\Eloquent\Collection aDCompAddress
 * @property \Illuminate\Database\Eloquent\Collection aDDonor
 * @property \Illuminate\Database\Eloquent\Collection aDSearchCF
 * @property \Illuminate\Database\Eloquent\Collection aDSearchCompCF
 * @property \Illuminate\Database\Eloquent\Collection aDWork
 * @property \Illuminate\Database\Eloquent\Collection aGRAgreementLog
 * @property \Illuminate\Database\Eloquent\Collection aRAcad5ColData
 * @property \Illuminate\Database\Eloquent\Collection aRAcad6Grade
 * @property \Illuminate\Database\Eloquent\Collection aRAcad6GradeSub
 * @property \Illuminate\Database\Eloquent\Collection aRAcad8ColAttitude
 * @property \Illuminate\Database\Eloquent\Collection ARAcad8ColCommsList
 * @property \Illuminate\Database\Eloquent\Collection aRAcad8ColRepSetup
 * @property \Illuminate\Database\Eloquent\Collection aRAcad8ColSkill
 * @property \Illuminate\Database\Eloquent\Collection aRAcadComm
 * @property \Illuminate\Database\Eloquent\Collection aRAcadCommSub
 * @property \Illuminate\Database\Eloquent\Collection aRAcadSkills
 * @property \Illuminate\Database\Eloquent\Collection aRActComm
 * @property \Illuminate\Database\Eloquent\Collection aRAssCBColRS
 * @property \Illuminate\Database\Eloquent\Collection aRAssColPortfolio
 * @property \Illuminate\Database\Eloquent\Collection aRAssColRepSetup
 * @property \Illuminate\Database\Eloquent\Collection aRAssColStaff
 * @property \Illuminate\Database\Eloquent\Collection aRAssColTempl
 * @property \Illuminate\Database\Eloquent\Collection aRAssColTemplData
 * @property \Illuminate\Database\Eloquent\Collection aRAssColYM
 * @property \Illuminate\Database\Eloquent\Collection aRAssFunctionGrade
 * @property \Illuminate\Database\Eloquent\Collection ARBoardingComm
 * @property \Illuminate\Database\Eloquent\Collection aRColMark
 * @property \Illuminate\Database\Eloquent\Collection aRCommSetupCriteriaDet
 * @property \Illuminate\Database\Eloquent\Collection aRCommSetupLink
 * @property \Illuminate\Database\Eloquent\Collection aRCommSetupStaffAccess
 * @property \Illuminate\Database\Eloquent\Collection ARCommStudent
 * @property \Illuminate\Database\Eloquent\Collection ARCommStudentSub
 * @property \Illuminate\Database\Eloquent\Collection ARHouseComm
 * @property \Illuminate\Database\Eloquent\Collection aRLearnProfLevelDesc
 * @property \Illuminate\Database\Eloquent\Collection ARPortfolioStudent
 * @property \Illuminate\Database\Eloquent\Collection aRPromoRuleSubSubj
 * @property \Illuminate\Database\Eloquent\Collection aRRepCardSetupTermGrade
 * @property \Illuminate\Database\Eloquent\Collection aRRepSetupOption
 * @property \Illuminate\Database\Eloquent\Collection aRStaffGrades
 * @property \Illuminate\Database\Eloquent\Collection aRSubjAttitude
 * @property \Illuminate\Database\Eloquent\Collection aRSubjLearnProf
 * @property \Illuminate\Database\Eloquent\Collection aTDNotifyStaff
 * @property \Illuminate\Database\Eloquent\Collection Attendance
 * @property \Illuminate\Database\Eloquent\Collection bankStaff
 * @property \Illuminate\Database\Eloquent\Collection bDGApproval
 * @property \Illuminate\Database\Eloquent\Collection bDGCostCentrePeriods
 * @property \Illuminate\Database\Eloquent\Collection bDGCostCentres
 * @property \App\Models\BHExeatStudentCode bHExeatStudentCode
 * @property \App\Models\BHExeatStudentComm bHExeatStudentComm
 * @property \Illuminate\Database\Eloquent\Collection bHHouseHead
 * @property \Illuminate\Database\Eloquent\Collection bHMLogSub
 * @property \Illuminate\Database\Eloquent\Collection bHMTypes
 * @property \Illuminate\Database\Eloquent\Collection bHRepSetupStud
 * @property \Illuminate\Database\Eloquent\Collection cALEventTypeAccess
 * @property \Illuminate\Database\Eloquent\Collection cALEventTypeRel
 * @property \Illuminate\Database\Eloquent\Collection cALEventTypes
 * @property \Illuminate\Database\Eloquent\Collection cALPlannerGrade
 * @property \Illuminate\Database\Eloquent\Collection CASActivity
 * @property \Illuminate\Database\Eloquent\Collection cASActivityCat
 * @property \Illuminate\Database\Eloquent\Collection cASActivityOutcome
 * @property \Illuminate\Database\Eloquent\Collection cASAcYearHours
 * @property \Illuminate\Database\Eloquent\Collection cASLogHours
 * @property \Illuminate\Database\Eloquent\Collection cASLogOutcome
 * @property \Illuminate\Database\Eloquent\Collection cFCustFieldStudYear
 * @property \Illuminate\Database\Eloquent\Collection cFSection
 * @property \Illuminate\Database\Eloquent\Collection cMARSubjParts
 * @property \Illuminate\Database\Eloquent\Collection cMMap
 * @property \Illuminate\Database\Eloquent\Collection cMMapStaff
 * @property \Illuminate\Database\Eloquent\Collection cMMapStudYear
 * @property \Illuminate\Database\Eloquent\Collection cMMapWorkArea
 * @property \Illuminate\Database\Eloquent\Collection cMStandardSkill
 * @property \Illuminate\Database\Eloquent\Collection cMUnitAssCol
 * @property \Illuminate\Database\Eloquent\Collection cMUnitParts
 * @property \Illuminate\Database\Eloquent\Collection cMUnitPartsActAssCol
 * @property \Illuminate\Database\Eloquent\Collection cMUnitPartsActTask
 * @property \Illuminate\Database\Eloquent\Collection CMUnitPartsActTaskStud
 * @property \Illuminate\Database\Eloquent\Collection CMUnitPartsActTaskStudFile
 * @property \Illuminate\Database\Eloquent\Collection cMUnitPartStandard
 * @property \Illuminate\Database\Eloquent\Collection cMUnitPartStandardSkill
 * @property \Illuminate\Database\Eloquent\Collection cOMSpecAttach
 * @property \Illuminate\Database\Eloquent\Collection contactPersonCommList
 * @property \Illuminate\Database\Eloquent\Collection contactTypes
 * @property \Illuminate\Database\Eloquent\Collection costCentres
 * @property \Illuminate\Database\Eloquent\Collection cUPCustomerPayBatchLine
 * @property \Illuminate\Database\Eloquent\Collection cUPCustomerPaymentLine
 * @property \Illuminate\Database\Eloquent\Collection eTAreaTemplate
 * @property \Illuminate\Database\Eloquent\Collection fin1PaymentSub
 * @property \Illuminate\Database\Eloquent\Collection fin1WLPayment
 * @property \Illuminate\Database\Eloquent\Collection fin3BatchInvoiceAct
 * @property \Illuminate\Database\Eloquent\Collection fin3BatchReceiptPayment
 * @property \Illuminate\Database\Eloquent\Collection fin3DebitOrderPayments
 * @property \Illuminate\Database\Eloquent\Collection fin3FacilityBooking
 * @property \App\Models\Fin3FacilityBookingStudent fin3FacilityBookingStudent
 * @property \Illuminate\Database\Eloquent\Collection fin3FamilyFSDisc
 * @property \Illuminate\Database\Eloquent\Collection fin3FeeScheduleAssist
 * @property \Illuminate\Database\Eloquent\Collection fin3FeeScheduleCategory
 * @property \Illuminate\Database\Eloquent\Collection fin3FeeScheduleItem
 * @property \Illuminate\Database\Eloquent\Collection fin3PaymentDisb
 * @property \Illuminate\Database\Eloquent\Collection fin3PaymentLine
 * @property \Illuminate\Database\Eloquent\Collection Fin3StudentDebitOrder
 * @property \App\Models\Fin3StudentDisc fin3StudentDisc
 * @property \App\Models\Fin3StudentFeeSchedule fin3StudentFeeSchedule
 * @property \Illuminate\Database\Eloquent\Collection fin3StudentFSDisc
 * @property \Illuminate\Database\Eloquent\Collection Fin3StudentSetup
 * @property \Illuminate\Database\Eloquent\Collection functionMat
 * @property \Illuminate\Database\Eloquent\Collection gLCampusAccCode
 * @property \Illuminate\Database\Eloquent\Collection gLCampusStaff
 * @property \Illuminate\Database\Eloquent\Collection gVTCensusFieldData
 * @property \Illuminate\Database\Eloquent\Collection gVTCensusLvlField
 * @property \Illuminate\Database\Eloquent\Collection gVTCensusScopeSection
 * @property \Illuminate\Database\Eloquent\Collection helperItemLog
 * @property \Illuminate\Database\Eloquent\Collection hSHouseGroupStudYear
 * @property \Illuminate\Database\Eloquent\Collection hTGHouseGrades
 * @property \Illuminate\Database\Eloquent\Collection hTGHouseStaff
 * @property \Illuminate\Database\Eloquent\Collection hTGHouseStaffList
 * @property \Illuminate\Database\Eloquent\Collection HTGHouseStudent
 * @property \Illuminate\Database\Eloquent\Collection hTGHouseTimeSlotVenue
 * @property \Illuminate\Database\Eloquent\Collection inquiryGrades
 * @property \Illuminate\Database\Eloquent\Collection lIBDBISBNAuthor
 * @property \Illuminate\Database\Eloquent\Collection lIBItemAuthor
 * @property \Illuminate\Database\Eloquent\Collection lIBItemSubj
 * @property \Illuminate\Database\Eloquent\Collection lIBLoanDet
 * @property \Illuminate\Database\Eloquent\Collection lIBLoanTempDet
 * @property \Illuminate\Database\Eloquent\Collection lIBRecommended
 * @property \Illuminate\Database\Eloquent\Collection LMSScheme
 * @property \Illuminate\Database\Eloquent\Collection lOCLocaleLabel
 * @property \Illuminate\Database\Eloquent\Collection LSLog
 * @property \Illuminate\Database\Eloquent\Collection lSLogRequirements
 * @property \Illuminate\Database\Eloquent\Collection mLSMealTypeOptions
 * @property \App\Models\MLSStudMealChoise mLSStudMealChoise
 * @property \App\Models\MLSStudMealType mLSStudMealType
 * @property \Illuminate\Database\Eloquent\Collection mLSWeekMealChoise
 * @property \Illuminate\Database\Eloquent\Collection MSAsset
 * @property \Illuminate\Database\Eloquent\Collection mSWOReasonNotify
 * @property \Illuminate\Database\Eloquent\Collection nATCountryEGroups
 * @property \Illuminate\Database\Eloquent\Collection nBDiscGrades
 * @property \Illuminate\Database\Eloquent\Collection nBMsgStaff
 * @property \Illuminate\Database\Eloquent\Collection payGroupInfo
 * @property \Illuminate\Database\Eloquent\Collection pAYRIncidentHoursLog
 * @property \Illuminate\Database\Eloquent\Collection pAYRIncidentLog
 * @property \Illuminate\Database\Eloquent\Collection pAYRSalaryGradeLevel
 * @property \Illuminate\Database\Eloquent\Collection pAYRSalaryPosition
 * @property \Illuminate\Database\Eloquent\Collection pAYRTaxType
 * @property \Illuminate\Database\Eloquent\Collection payScheduleCustFields
 * @property \Illuminate\Database\Eloquent\Collection paySchedules
 * @property \Illuminate\Database\Eloquent\Collection paySchedulesRule
 * @property \Illuminate\Database\Eloquent\Collection paySchedulesSub
 * @property \Illuminate\Database\Eloquent\Collection paySchedulesTaxType
 * @property \Illuminate\Database\Eloquent\Collection personDirectoryShare
 * @property \Illuminate\Database\Eloquent\Collection pPCalendarGrade
 * @property \Illuminate\Database\Eloquent\Collection pRDStockAdjustment
 * @property \Illuminate\Database\Eloquent\Collection pRRequisitions
 * @property \Illuminate\Database\Eloquent\Collection pRSPersonContact
 * @property \Illuminate\Database\Eloquent\Collection pRSPersonFamily
 * @property \Illuminate\Database\Eloquent\Collection pRSPersonIdentity
 * @property \Illuminate\Database\Eloquent\Collection pRSPersonLanguage
 * @property \Illuminate\Database\Eloquent\Collection pRSPersonNationality
 * @property \Illuminate\Database\Eloquent\Collection rMDPaymentCommitment
 * @property \Illuminate\Database\Eloquent\Collection rMDPaymentCommitmentChannel
 * @property \Illuminate\Database\Eloquent\Collection roleHasPermissions
 * @property \Illuminate\Database\Eloquent\Collection rPWFieldsList
 * @property \Illuminate\Database\Eloquent\Collection sBABenchmark
 * @property \Illuminate\Database\Eloquent\Collection sQQuestListForms
 * @property \Illuminate\Database\Eloquent\Collection sQQuestListFormStaff
 * @property \Illuminate\Database\Eloquent\Collection sQQuestListStaff
 * @property \Illuminate\Database\Eloquent\Collection staffHealth
 * @property \Illuminate\Database\Eloquent\Collection staffLeaveGroupTypes
 * @property \Illuminate\Database\Eloquent\Collection staffPref
 * @property \Illuminate\Database\Eloquent\Collection staffWorkScheduleNotifyStaff
 * @property \Illuminate\Database\Eloquent\Collection StudAttach
 * @property \App\Models\StudCustField studCustField
 * @property \App\Models\StudDaysAttend studDaysAttend
 * @property \App\Models\StudPref studPref
 * @property \Illuminate\Database\Eloquent\Collection StudTerm
 * @property \Illuminate\Database\Eloquent\Collection subjCoreList
 * @property \Illuminate\Database\Eloquent\Collection subjectExtCodes
 * @property \Illuminate\Database\Eloquent\Collection subjects
 * @property \Illuminate\Database\Eloquent\Collection subjectsRequisites
 * @property \Illuminate\Database\Eloquent\Collection sUPAddress
 * @property \Illuminate\Database\Eloquent\Collection supplierPayBatchLine
 * @property \Illuminate\Database\Eloquent\Collection supplierPaymentLine
 * @property \Illuminate\Database\Eloquent\Collection tDLTask
 * @property \Illuminate\Database\Eloquent\Collection tRBusStudent
 * @property \Illuminate\Database\Eloquent\Collection tRRCourseStudEvent
 * @property \Illuminate\Database\Eloquent\Collection tRStudentStop
 * @property \Illuminate\Database\Eloquent\Collection tRTStudSubj
 * @property \Illuminate\Database\Eloquent\Collection tRTStudTemplate
 * @property \Illuminate\Database\Eloquent\Collection tRTStudYearCol
 * @property \Illuminate\Database\Eloquent\Collection tRTStudYearCustField
 * @property \Illuminate\Database\Eloquent\Collection tRTTemplAcYear
 * @property \Illuminate\Database\Eloquent\Collection tRTTemplAcYearSubj
 * @property \Illuminate\Database\Eloquent\Collection tRTTemplate
 * @property \Illuminate\Database\Eloquent\Collection tRTTemplCol
 * @property \Illuminate\Database\Eloquent\Collection tTClassSubj
 * @property \Illuminate\Database\Eloquent\Collection tTDayPeriods
 * @property \Illuminate\Database\Eloquent\Collection tTOptSubjGroupSel
 * @property \Illuminate\Database\Eloquent\Collection tTPeriodAttendStud
 * @property \Illuminate\Database\Eloquent\Collection tTPeriods
 * @property \Illuminate\Database\Eloquent\Collection TTStudentOpt
 * @property \Illuminate\Database\Eloquent\Collection TTStudSubjAudit
 * @property \Illuminate\Database\Eloquent\Collection tTSubjectColor
 * @property \Illuminate\Database\Eloquent\Collection tTTeacherAcYear
 * @property \Illuminate\Database\Eloquent\Collection tTTeachers
 * @property \Illuminate\Database\Eloquent\Collection vBBookingDatePeriods
 * @property \Illuminate\Database\Eloquent\Collection vBBookingRes
 * @property \Illuminate\Database\Eloquent\Collection vBVenuePurpose
 * @property \Illuminate\Database\Eloquent\Collection waitListStatusSubHist
 * @property \Illuminate\Database\Eloquent\Collection waitListStatusSubLog
 * @property \Illuminate\Database\Eloquent\Collection warehouseStorage
 * @property \Illuminate\Database\Eloquent\Collection wLWeightMatrixItems
 * @property \Illuminate\Database\Eloquent\Collection wLWeightMatrixStud
 * @property \Illuminate\Database\Eloquent\Collection wLWeightMatrixStudItem
 * @property string FirstName
 * @property string LastName
 * @property string MiddleName
 * @property string OtherNames
 * @property boolean Gender
 * @property string|\Carbon\Carbon BirthDate
 * @property string PassNo
 * @property string BirthPlace
 * @property string Photo
 * @property smallInteger StatusID
 * @property string|\Carbon\Carbon StatusDate
 * @property integer ParentID
 * @property integer RelationID
 * @property integer LivingWithID
 * @property string Address
 * @property integer NationalityID
 * @property integer ReligionID
 * @property integer StudType
 * @property string LangChoice
 * @property boolean LearnStyleVis
 * @property boolean LearnStyleAud
 * @property boolean LearnStyleKin
 * @property string Keyword
 * @property boolean Reentrant
 * @property boolean Repeating
 * @property string Age
 * @property string Password
 * @property integer Disabled
 * @property string Email
 * @property string|\Carbon\Carbon PWExpire
 * @property string Cell
 * @property string AdmNo
 * @property integer WaitListID
 * @property string CASRefl
 * @property integer NatID2
 * @property string Country
 * @property string FT1
 * @property string FT2
 * @property integer StaffID
 * @property smallInteger DebitOrder
 * @property string Gender2
 * @property string|\Carbon\Carbon CreatedOn
 * @property string CreatedBy
 * @property string|\Carbon\Carbon UpdatedOn
 * @property string UpdatedBy
 * @property smallInteger RepCardsNo
 * @property smallInteger SiblingOrder
 * @property string UserName
 * @property smallInteger IncCensus
 * @property string LMSBGColor
 * @property string MealCharge
 * @property smallInteger IsPOS
 * @property string PID
 * @property integer Imported
 * @property string|\Carbon\Carbon ImportedOn
 * @property integer OAID
 * @property string ExtSystem
 * @property smallInteger PassReset
 * @property string AboutMe
 * @property string|\Carbon\Carbon SyncDate
 * @property string SyncStatus
 * @property smallInteger PaymentStatus
 */
class Student extends Model
{
    use SoftDeletes;

    public $table = 'Students';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'FirstName',
        'LastName',
        'MiddleName',
        'OtherNames',
        'Gender',
        'BirthDate',
        'PassNo',
        'BirthPlace',
        'Photo',
        'StatusID',
        'StatusDate',
        'ParentID',
        'RelationID',
        'LivingWithID',
        'Address',
        'NationalityID',
        'ReligionID',
        'StudType',
        'LangChoice',
        'LearnStyleVis',
        'LearnStyleAud',
        'LearnStyleKin',
        'Keyword',
        'Reentrant',
        'Repeating',
        'Age',
        'Password',
        'Disabled',
        'Email',
        'PWExpire',
        'Cell',
        'AdmNo',
        'WaitListID',
        'CASRefl',
        'NatID2',
        'Country',
        'FT1',
        'FT2',
        'StaffID',
        'DebitOrder',
        'Gender2',
        'CreatedOn',
        'CreatedBy',
        'UpdatedOn',
        'UpdatedBy',
        'RepCardsNo',
        'SiblingOrder',
        'UserName',
        'IncCensus',
        'LMSBGColor',
        'MealCharge',
        'IsPOS',
        'PID',
        'Imported',
        'ImportedOn',
        'OAID',
        'ExtSystem',
        'PassReset',
        'AboutMe',
        'SyncDate',
        'SyncStatus',
        'PaymentStatus'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'StudentID' => 'integer',
        'FirstName' => 'string',
        'LastName' => 'string',
        'MiddleName' => 'string',
        'OtherNames' => 'string',
        'Gender' => 'boolean',
        'PassNo' => 'string',
        'BirthPlace' => 'string',
        'Photo' => 'string',
        'ParentID' => 'integer',
        'RelationID' => 'integer',
        'LivingWithID' => 'integer',
        'Address' => 'string',
        'NationalityID' => 'integer',
        'ReligionID' => 'integer',
        'StudType' => 'integer',
        'LangChoice' => 'string',
        'LearnStyleVis' => 'boolean',
        'LearnStyleAud' => 'boolean',
        'LearnStyleKin' => 'boolean',
        'Keyword' => 'string',
        'Reentrant' => 'boolean',
        'Repeating' => 'boolean',
        'Age' => 'string',
        'Password' => 'string',
        'Disabled' => 'integer',
        'Email' => 'string',
        'Cell' => 'string',
        'AdmNo' => 'string',
        'WaitListID' => 'integer',
        'CASRefl' => 'string',
        'NatID2' => 'integer',
        'Country' => 'string',
        'FT1' => 'string',
        'FT2' => 'string',
        'StaffID' => 'integer',
        'Gender2' => 'string',
        'CreatedBy' => 'string',
        'UpdatedBy' => 'string',
        'UserName' => 'string',
        'LMSBGColor' => 'string',
        'MealCharge' => 'string',
        'PID' => 'string',
        'Imported' => 'integer',
        'OAID' => 'integer',
        'ExtSystem' => 'string',
        'AboutMe' => 'string',
        'SyncStatus' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function aCMPaymentStatus()
    {
        return $this->belongsTo(\App\Models\ACMPaymentStatus::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function studentType()
    {
        return $this->belongsTo(\App\Models\StudentType::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function country()
    {
        return $this->belongsTo(\App\Models\Country::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function staff()
    {
        return $this->belongsTo(\App\Models\Staff::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function aCMAttStudents()
    {
        return $this->hasMany(\App\Models\ACMAttStudent::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function aRAcad8ColCommsLists()
    {
        return $this->hasMany(\App\Models\ARAcad8ColCommsList::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function aRBoardingComms()
    {
        return $this->hasMany(\App\Models\ARBoardingComm::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function aRCommStudents()
    {
        return $this->hasMany(\App\Models\ARCommStudent::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function aRCommStudentSubs()
    {
        return $this->hasMany(\App\Models\ARCommStudentSub::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function aRHouseComms()
    {
        return $this->hasMany(\App\Models\ARHouseComm::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function aRPortfolioStudents()
    {
        return $this->hasMany(\App\Models\ARPortfolioStudent::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function attendances()
    {
        return $this->hasMany(\App\Models\Attendance::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     **/
    public function bHExeatStudentCode()
    {
        return $this->hasOne(\App\Models\BHExeatStudentCode::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     **/
    public function bHExeatStudentComm()
    {
        return $this->hasOne(\App\Models\BHExeatStudentComm::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function cASActivities()
    {
        return $this->hasMany(\App\Models\CASActivity::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function cMUnitPartsActTaskStuds()
    {
        return $this->hasMany(\App\Models\CMUnitPartsActTaskStud::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function cMUnitPartsActTaskStudFiles()
    {
        return $this->hasMany(\App\Models\CMUnitPartsActTaskStudFile::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     **/
    public function fin3FacilityBookingStudent()
    {
        return $this->hasOne(\App\Models\Fin3FacilityBookingStudent::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function fin3StudentDebitOrders()
    {
        return $this->hasMany(\App\Models\Fin3StudentDebitOrder::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     **/
    public function fin3StudentDisc()
    {
        return $this->hasOne(\App\Models\Fin3StudentDisc::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     **/
    public function fin3StudentFeeSchedule()
    {
        return $this->hasOne(\App\Models\Fin3StudentFeeSchedule::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function fin3StudentSetups()
    {
        return $this->hasMany(\App\Models\Fin3StudentSetup::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function hTGHouseStudents()
    {
        return $this->hasMany(\App\Models\HTGHouseStudent::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function lMSSchemes()
    {
        return $this->hasMany(\App\Models\LMSScheme::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function lSLogs()
    {
        return $this->hasMany(\App\Models\LSLog::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     **/
    public function mLSStudMealChoise()
    {
        return $this->hasOne(\App\Models\MLSStudMealChoise::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     **/
    public function mLSStudMealType()
    {
        return $this->hasOne(\App\Models\MLSStudMealType::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function mSAssets()
    {
        return $this->hasMany(\App\Models\MSAsset::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function studAttaches()
    {
        return $this->hasMany(\App\Models\StudAttach::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     **/
    public function studCustField()
    {
        return $this->hasOne(\App\Models\StudCustField::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     **/
    public function studDaysAttend()
    {
        return $this->hasOne(\App\Models\StudDaysAttend::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     **/
    public function studPref()
    {
        return $this->hasOne(\App\Models\StudPref::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function studTerms()
    {
        return $this->hasMany(\App\Models\StudTerm::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function tRBusRoutes()
    {
        return $this->belongsToMany(\App\Models\TRBusRoute::class, 'TRBusStudent');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function tTStudentOpts()
    {
        return $this->hasMany(\App\Models\TTStudentOpt::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function tTStudSubjAudits()
    {
        return $this->hasMany(\App\Models\TTStudSubjAudit::class);
    }
}
