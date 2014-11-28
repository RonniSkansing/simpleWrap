<?php

namespace R\Test\Request;

class RequestTest extends \PHPUnit_Framework_Testcase {

    private $request;

    public function setup()
    {
        $this->request = new \R\Request(
            ['id' => '13', 'order' => 'asc'],
            ['username' => 'dino', 'password' => 'dinosaur'],
            ['header-X' => 'foo'],
            ['fileX' => 'fileY'],
            ['cookieName' => 'cookieValue'],
            'input'
        );
    }

    public function testgetter()
    {
        $this->assertSame('13', $this->request->get('id'));
    }

    public function testgetterReturnNullWhenKeyDoesNotExists()
    {
        $this->assertNull($this->request->get('foo'));
    }

    public function testPostGetter()
    {
        $this->assertSame('dinosaur', $this->request->post('password'));
    }

    public function testPostGetterReturnNullWhenKeyDoesNotExists()
    {
        $this->assertNull($this->request->post('foo'));
    }

    public function testServerGetter()
    {
        $this->assertSame('foo', $this->request->server('header-X'));
    }

    public function testServerGetterReturnNullWhenKeyDoesNotExists()
    {
        $this->assertNull($this->request->server('foo'));
    }

    public function testCookieGetter()
    {
        $this->assertSame('cookieValue', $this->request->cookie('cookieName'));
    }

    public function testCookieGetterReturnNullWhenKeyDoesNotExists()
    {
        $this->assertNull($this->request->cookie('foo'));
    }

    public function testInputGetter()
    {
        $this->assertSame('input', $this->request->input());
    }

    public function testInputGetterDefaultToNull()
    {
        $this->request = new \R\Request(
            ['id' => '13', 'order' => 'asc'],
            ['username' => 'dino', 'password' => 'dinosaur'],
            ['header-X' => 'foo'],
            ['fileX' => 'fileY'],
            ['cookieName' => 'cookieValue']
        );
        $this->assertNull($this->request->input());
    }
}
