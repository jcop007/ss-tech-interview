<?php

namespace SSTechInterview\Model;

use SilverStripe\Assets\File;
use SilverStripe\ORM\DataObject;

class InterviewCandidate extends DataObject
{
    private static $table_name = 'InterviewCandidate';

    private static $db = [
        'Name' => 'Varchar(255)',
        'CoverLetter' => 'Text',
        'Status' => "Enum('Pending, Approved, Declined', 'Pending')",
    ];

    private static $summary_fields = [
        'Name' => 'Candidate Name',
        'CoverLetter' => 'Cover Letter',
        'Status' => 'Status',
    ];

    private static $has_one = [
        'CV' => File::class,
    ];

    private static $owns = [
        'CV'
    ];

}
