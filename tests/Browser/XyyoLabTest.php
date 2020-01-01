<?php

namespace Tests\Browser;

use App\User;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\XModels\Post;
use Tests\Browser\Pages\HomePage;

class XyyoLabTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testXyyoExample()
    {
        $this->browse(function (Browser $browser) {
            $browser
            //->loginAs(User::find(1))
            ->visit(new HomePage)
            ->assert();
        });

        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->clickLink('BLOG')
                    ->waitFor('.my-input')
                    ->assertVisible('.my-input');
        });

        $this->browse(function (Browser $browser) {
            $slug = Post::first()->slug;
            $browser->visit('/show/'.$slug)
                    ->waitFor('.big-pic')
                    ->assertVisible('.big-pic');
        });
    }
}
