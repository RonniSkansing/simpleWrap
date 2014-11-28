<?php

namespace R\Test\Session;

class SessionTest extends \PHPUnit_Framework_Testcase {

    private $session;

    public function setup()
    {
        $this->session = new \R\Session;
    }

    public function testSetterAndGetter() {
        $this->session['foo'] = 'bar';
        $this->assertSame('bar', $this->session['foo']);
    }

    public function testExists() {
        $this->assertFalse( isset($this->session['foo']) );
        $this->session['foo'] = 'bar';
        $this->assertTrue( (isset($this->session['foo'])) );
    }

    public function testUnsetter() {
        $this->session['foo'] = 'bar';
        unset($this->session['foo']);
        $this->assertNull($this->session['foo']);
    }
}
