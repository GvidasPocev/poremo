<?php

namespace App\Actions\Message;

use App\Models\Contact;
use App\Models\Setting;
use Illuminate\Support\Facades\Mail;

class SendMessage
{
    public function send(array $input): Contact
    {
        $message = new Contact;
        $message->name = $input['name'] ?? '';
        $message->email = $input['email'] ?? '';
        $message->language = strtok(trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/'), '/');
        $message->message = $input['message'] ?? '';
        $message->save();

        Mail::send('email.mail', array(
            'name' => $input['name'],
            'email' => $input['email'],
            'language' => strtok(trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/'), '/'),
            'messages' => $input['message'],
        ), function($message) use ($input){
            $adminEmail = optional(Setting::where('key', 'admin_email')->first())->value;
            $message->from($input['email']);
            $message->to($adminEmail, 'Admin')->subject('Kontaktai');
        });

        return $message;
    }
}
