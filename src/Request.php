<?php

namespace R;

class Request {

    const
        GET = 'get',
        POST = 'post',
        SERVER = 'server',
        FILES = 'files',
        COOKIE = 'cookie',
        INPUT = 'input';

    private
        $get,
        $post,
        $server,
        $files,
        $cookie,
        $input;

    /**
     * @param array $get
     * @param array $post
     * @param array $server
     * @param array $files
     * @param array $cookie
     * @param string|null $input
     */
    public function __construct(
        array $get,
        array $post,
        array $server,
        array $files,
        array $cookie,
        $input = null
    ) {
        $this->get = $get;
        $this->post = $post;
        $this->server = $server;
        $this->files = $files;
        $this->cookie = $cookie;
        $this->input = $input;
    }

    /**
     * Getter for $_GET
     *
     * @param string $offset
     * @return mixed
     */
    public function get($offset)
    {
        return $this->getGlobal(self::GET, $offset);
    }

    /**
     * Getter for $_POST
     *
     * @param string $offset
     * @return mixed
     */
    public function post($offset)
    {
        return $this->getGlobal(self::POST, $offset);
    }

    /**
     * Getter for $_SERVER
     *
     * @param string $offset
     * @return mixed
     */
    public function server($offset)
    {
        return $this->getGlobal(self::SERVER, $offset);
    }

    /**
     * Getter for $_COOKIE
     *
     * @param string $offset
     * @return mixed
     */
    public function cookie($offset)
    {
        return $this->getGlobal(self::COOKIE, $offset);
    }

    /**
     * Getter for $_FILES
     *
     * @param string $offset
     * @return mixed
     */
    public function files($offset)
    {
        return $this->getGlobal(self::FILES, $offset);
    }

    /**
     * Getter for php://input
     *
     * @return null|string
     */
    public function input()
    {
        return $this->input;
    }

    /**
     * Global getter
     *
     * @param string $location
     * @param string $offset
     * @return mixed
     */
    private function getGlobal($location, $offset)
    {
        $arr = $this->$location;
        return (array_key_exists($offset, $arr)) ? $arr[$offset] : null;
    }
}
