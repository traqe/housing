<?php

namespace App\DataTables;

use App\Models\Student;
use Form;
use Yajra\Datatables\Services\DataTable;

class StudentDataTable extends DataTable
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', 'students.datatables_actions')
            ->make(true);
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $students = Student::query();

        return $this->applyScopes($students);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\Datatables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->addAction(['width' => '120px'])
            ->ajax('')
            ->parameters([
                'dom' => 'Bfrtip',
                'scrollX' => false,
                'buttons' => [
                    'print',
                    'reset',
                    'reload',
                    [
                         'extend'  => 'collection',
                         'text'    => '<i class="fa fa-download"></i> Export',
                         'buttons' => [
                             'csv',
                             'excel',
                             'pdf',
                         ],
                    ],
                    'colvis'
                ]
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    private function getColumns()
    {
        return [
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
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'students';
    }
}
