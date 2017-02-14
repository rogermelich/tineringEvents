<?php

namespace Tests\Feature;

use Event;
use Illuminate\Auth\Events\Registered;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testRegisterUserSendWelcomeEmail()
    {
        Mail::fake();
        $user = new \App\User();
        $user->name = 'Pepepepito';
        $user->email = 'pepepepito@gmail.com';
        event(new Registered($user));
        Mail::assertSent(WelcomeEmailMarkdown::class,function($mail) use ($user)  {
            return $mail->user->name ===  $user->name;
        });
    }
    /**
     *
     */
    public function testRegisterUserSendWelcomeEmail2()
    {
        Event::fake();
        $this->get('/registerUser');
        Event::assertDispatched(Registered::class,function($event)  {
            return $event->user->name === 'Pepepepito';
        });
    }



//    public function testRegiserUserSendWelcomeEmail()
//    {
//        Event::fake();
//
//        $this->visit('/register')
//            ->type('Pepepito', 'name')
//            ->type('pepepito@gmail.com', 'email')
//            ->type('1234', 'password')
//            ->type('1234', 'password_confirmation')
//            ->press('Register')
//            ->seePage('/home')
//            ->seeInDatabase('users',
//                ['email' => 'pepepit@gmail.com',
//                'name' => 'Pepepito'
//            ]);
//
//        $user = '';
//
//        Event::assertDispatched(Registered::class, function ($event) use ($user) {
//            return $event->$user->name == 'Pepepito';
//        });
//
//    }
}
