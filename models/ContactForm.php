<?php

namespace Robi\App\models;

use App\RobiMvc\Core\Model;

class ContactForm extends Model 
{
    public string $email = '';
    public string $subject = '';
    public string $message = '';

    public function rules(): array
    {
        return [
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
            'subject' => [self::RULE_REQUIRED],
            'message' => [self::RULE_REQUIRED]
        ];
    }

    public function labels(): array
    {
        return [
            'email' => 'E-mail',
            'subject' => 'Subject',
            'message' => 'Message'
        ];
    }

    public function send()
    {
        return 'submit data';
    }
}
