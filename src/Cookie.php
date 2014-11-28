<?php

namespace R;

class Cookie implements \ArrayAccess {

    /**
     * Build a cookie string
     *
     * @param array $cookie
     * @return string
     */
    public function httpBuild( array $cookie)
    {
        return http_build_cookie($cookie);
    }

    /**
     * Parse a HTTP cookie
     *
     * @param string $cookie
     * @param int $flags
     * @param array $allowdExtras
     */
    public function httpParse($cookie, $flags = 0, $allowdExtras = [])
    {
        http_parse_cookie($cookie, $flags, $allowdExtras);
    }

    /**
     * Send a cookie
     *
     * @param string $name
     * @param string $value
     * @param int $expire
     * @param string $path
     * @param string $domain
     * @param bool $secure
     * @param bool $httpOnly
     * @return bool
     */
    public function set(
        $name,
        $value = null,
        $expire = 0,
        $path = null,
        $domain = null,
        $secure = false,
        $httpOnly = false
    ) {
        return setcookie($name, $value, $expire, $path, $domain, $secure, $httpOnly);
    }

    /**
     * Send a cookie (unencoded)
     *
     * @param string $name
     * @param string $value
     * @param int $expire
     * @param string $path
     * @param string $domain
     * @param bool $secure
     * @param bool $httpOnly
     * @return bool
     */
    public function setRaw(
        $name,
        $value = null,
        $expire = 0,
        $path = null,
        $domain = null,
        $secure = false,
        $httpOnly = false
    ) {
        return setrawcookie($name, $value, $expire, $path, $domain, $secure, $httpOnly);
    }

    /**
     * Whether a $_COOKIE offset exists
     *
     * @param string $offset
     * @return bool
     */
    public function offsetExists($offset)
    {
        return isset($_COOKIE[$offset]);
    }

    /**
     * Gets a $_COOKIE offset
     *
     * @param mixed $offset
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return isset($_COOKIE[$offset]) ? $_COOKIE[$offset] : null;
    }

    /**
     * Sends a cookie
     *
     * @param mixed $offset
     * @param mixed $value
     */
    public function offsetSet($offset, $value)
    {
        setcookie($offset, $value);
    }

    /**
     * Unset a $_COOKIE by offset
     *
     * @param mixed $offset
     * @return void
     */
    public function offsetUnset($offset)
    {
        setCookie($offset, null, -1);
    }
}
