<?php

namespace SSTechInterview\Admin;

use SilverStripe\Admin\ModelAdmin;
use SSTechInterview\Model\InterviewCandidate;

class InterviewCandidatesAdmin extends ModelAdmin
{
    private static $url_segment = 'interview-candidates';

    private static $menu_title = 'Interview Candidates';

    private static $menu_icon_class = 'font-icon-checklist';

    private static $managed_models = [
        'interview-candidate-pending' => [
            'dataClass' => InterviewCandidate::class,
            'title' => 'Pending Candidates',
        ],
        'interview-candidate-approved' => [
            'dataClass' => InterviewCandidate::class,
            'title' => 'Approved Candidates',
        ],
        'interview-candidate-declined' => [
            'dataClass' => InterviewCandidate::class,
            'title' => 'Declined Candidates',
        ],
    ];

    public function getList()
    {
        $list = parent::getList();
        $modelKey = $this->modelTab;

        switch ($modelKey) {
            case 'interview-candidate-pending':
                return $list->filter('Status', 'Pending');
            case 'interview-candidate-approved':
                return $list->filter('Status', 'Approved');
            case 'interview-candidate-declined':
                return $list->filter('Status', 'Declined');
            default:
                return $list;
        }
    }


}
