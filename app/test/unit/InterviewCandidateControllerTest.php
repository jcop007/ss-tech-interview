<?php

namespace SSTechInterview\Test\Unit;

use SilverStripe\Dev\FunctionalTest;
use SilverStripe\Security\Security;
use SSTechInterview\Page\InterviewCandidatePage;

class InterviewCandidateControllerTest extends FunctionalTest
{

    protected $usesDatabase = true;

    protected function setUp(): void
    {
        parent::setUp();
        $page = InterviewCandidatePage::create();
        $page->URLSegment = 'apply';
        $page->write();
        $page->publishSingle();
    }

    public function testFormValidation()
    {
        // Fail with missing fields

        // Tell session this is the last page/form we visited
        $this->get('/apply/');
        $response = $this->post('/apply/CandidateSubmissionForm/', [
            'Name' => 'Test Candidate',
            'CoverLetter' => 'Hullo this cover letter is too short it should be 20 words.',
            'CV' => 'Fake',
        ]);
        $body = $response->getBody();

        $this->assertStringContainsString(
            'Your cover letter should be at least 20 words',
            $body,
            'Should validate CoverLetter field'
        );

        // Not fail on supplied fields

        // Tell session this is the last page/form we visited
        $this->get('/apply/');
        $response = $this->post('/apply/CandidateSubmissionForm/', [
            'Name' => 'Test Candidate',
            'CoverLetter' => 'I would like 1 job please',
            'CV' => 'Fake',
        ]);
        $body = $response->getBody();

        $this->assertStringNotContainsString(
            'Your cover letter should be at least 20 words',
            $body,
            'Should validate CoverLetter field'
        );
    }

}
