<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    public $table = 'Subjects';
    public $timestamps = false;
    protected $primaryKey = 'SubjID';

    public $fillable = [
        'SubjID',
        'SubjCode',
        'Subject',
        'Seq',
        'Lvl',
        'G1',
        'PMin1',
        'PMax1',
        'G2',
        'PMin2',
        'PMax2',
        'G3',
        'PMin3',
        'PMax3',
        'G4',
        'PMin4',
        'PMax4',
        'G5',
        'PMin5',
        'PMax5',
        'G6',
        'PMin6',
        'PMax6',
        'G7',
        'PMin7',
        'PMax7',
        'G8',
        'PMin8',
        'PMax8',
        'G9',
        'PMin9',
        'PMax9',
        'G10',
        'PMin10',
        'PMax10',
        'G11',
        'PMin11',
        'PMax11',
        'G12',
        'PMin12',
        'PMax12',
        'DSC',
        'Department',
        'GradeDesc',
        'Graded',
        'Color',
        'RepCard',
        'NoExam',
        'NoComms',
        'ExtCode',
        'IsHeader',
        'ARMenu',
        'ImageFile',
        'ScheduleNo',
        'KeyStage',
        'AnRep',
        'Credits',
        'IsUI',
        'Stage',
        'StageName',
        'CurriculumID'
    ];
}
