<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Storage;

class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->visit('/save-details')
        ->type('Abhi', 'name')
        ->type('Abhi.bhati16@gmail.com', 'email')
        ->attach(Storage::disk('s3')) 	
        ->press('Add');
    }
}
