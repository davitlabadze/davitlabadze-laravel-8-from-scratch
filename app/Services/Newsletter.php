<?php

namespace App\Services;

use MailchimpMarketing\ApiClient;

class Newsletter
{
    public function suibscribe(string $email, $list = null)
    {
        $list ??= config('services.mailchimp.list.subscribers');
        
        return $this->client()->lists->addListMember($list, [
            "email_address" => $email,
            "status" => "subscribed",
        ]);
    }
    protected function client()
    {
        return (new ApiClient())->setConfig([
            'apiKey' => config('services.mailchimp.key'),
            'server' => 'us5'
        ]);
    }
}