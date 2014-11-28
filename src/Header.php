<?php

namespace R;

class Header {

    /**
     * Returns a list of response headers sent (or ready to send)
     *
     * @return array
     */
    public function _list()
    {
        return header_list();
    }

    /**
     * Send a raw HTTP header
     *
     * @param string $string
     * @param bool $replace
     * @param int $http_response_code
     * @return void
     */
    public function _header($string, $replace = true, $http_response_code = 200)
    {
        header($string, $replace, $http_response_code);
    }

    /**
     * Checks if or where headers have been sent
     *
     * @return bool
     */
    public function sent()
    {
        return header_sent();
    }

    /**
     * Registers a function that will be called when PHP starts sending output.
     *
     * The callback is executed just after PHP prepares all headers to be sent,
     * and before any other output is sent, creating a window to manipulate the
     * outgoing headers before being sent.
     *
     * @param Callback|string $callback
     * @return bool
     */
    public function registerCallback($callback)
    {
        return header_register_callback($callback);
    }

    /**
     * Remove previously set headers
     *
     * Note: This parameter is case-insensitive.
     *
     * @param string $name
     * @return void
     */
    public function remove($name)
    {
        header_remove($name);
    }

}
