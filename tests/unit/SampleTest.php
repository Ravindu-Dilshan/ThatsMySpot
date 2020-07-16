<?php
use PHPUnit\Framework\TestCase;

class SampleTest extends TestCase
{
    public function test_case1(){
        $this->assertTrue(true);
    }
    public function testcase2(){
        $this->assertEquals(1,1);
    }
    public function testcase3(){
        $this->assertEquals("Name","4");
    }
    public function testcase4(){
        $this->assertFalse(false);
    }
}