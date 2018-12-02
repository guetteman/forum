<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ThreadsTest extends TestCase
{
    use DatabaseMigrations;

    /**
     *
     * @return void
     */
    public function testAUserCanViewAllThreads()
    {
        $thread = factory('App\Thread')->create();

        $response = $this->get('/threads');
        $response->assertSee($thread->title);
        
        $response = $this->get('/threads/' . $thread->id);
        $response->assertSee($thread->title);
    } 

    /**
     *
     * @return void
     */
    public function testAUserCanReadASingleThread()
    {
        $thread = factory('App\Thread')->create();

        $response = $this->get('/threads/' . $thread->id);
        $response->assertSee($thread->title);
    } 
}
