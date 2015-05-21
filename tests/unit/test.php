<?php
class FirstTest extends PHPUnit_Framework_TestCase {

    private $test;

    public function setUp()
    {
        $this->test = 'test';
    }

    public function testIt()
    {
        $this->assertEquals($this->test, 'test');
    }
}