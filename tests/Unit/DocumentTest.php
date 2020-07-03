<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Document;

class DocumentTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        
        $document = Post::find(1);
        $status = $document->status;
        $payload =$document->payload;
        $created_at=$document->created_at;
        $updated_at=$document->updated_at;
         
        $this->assertEquals($$status, $payload,$created_at, $updated_at);
    }
}
