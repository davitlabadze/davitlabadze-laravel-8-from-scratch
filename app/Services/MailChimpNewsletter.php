<?php

namespace App\Services;

use \MailchimpMarketing\ApiClient;

class MailchimpNewsletter implements Newsletter
{

    public function __construct(ApiClient $client)
    {
        //
    }

    public function subscribe(string $email, string $list=null)
    {

        $list ??=config('services.mailchimp.lists.subscribers');

        return $this->client->lists->addListmember($list, [
            'email_address' => $email,
            'status' => 'subscribed'
        ]);
    }


}