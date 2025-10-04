<?php

namespace SSTechInterview\Extensions;

use SilverStripe\Core\Extension;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;

class SiteConfigExtension extends Extension
{
    private static $db = [
        'ResetPasswordThankYouMessage' => 'HTMLText',
    ];

    //Add a field to the Security section of the CMS
    public function updateCMSFields($fields)
    {
        $fields->addFieldToTab('Root.Security', 
            HTMLEditorField::create(
                'ResetPasswordThankYouMessage',
                'Reset password thank you message'
            )->setDescription('This message is shown to users after they have reset their password.')
        );
    }
    
}