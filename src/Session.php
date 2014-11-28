<?php

namespace R;

class Session implements \ArrayAccess {

     /**
     * Finishes session without saving data. Thus original values in session data is kept
     *
     * @return bool
     */
    public function abort()
    {
        return session_abort();
    }

    /**
     * Return current HTTP cache expiration time or set HTTP cache expiration time , in minuts
     *
     * @param int|string|null $newCacheExpire
     * @return int|string Current setting of session.cache_expire, in minuts
     */
    public function cacheExpire($newCacheExpire = null)
    {
        if(is_int($newCacheExpire) || is_string($newCacheExpire)) {
            // setter
            return session_cache_expire($newCacheExpire);
        }
        // getter
        return session_cache_expire();
    }

    /**
     * Get and/or set the current cache limiter
     *
     * @param string|null $cacheLimiter
     * @return string Name of the current cache limiter
     */
    public function cacheLimiter($cacheLimiter = null)
    {
        if(is_string($cacheLimiter)) {
            // setter
            return session_cache_limiter($cacheLimiter);
        }
        // getter
        return session_cache_limiter();
    }

    /**
     * Alias of WriteClose()
     *
     * @return void
     */
    public function commit()
    {
        return $this->writeClose();
    }

    /**
     * Decodes session data from a session encoded string
     *
     * @param string $data
     * @return bool
     */
    public function decode($data)
    {
        return session_decode($data);
    }

    /**
     * Destroys all data registered to a session
     *
     * @return bool
     */
    public function destroy()
    {
        return session_destroy();
    }

    /**
     * Encodes the current session data as a session encoded string
     *
     * @return string Contents of the current session encoded
     */
    public function encode()
    {
        return session_encode();
    }

    /**
     * Get the session cookie parameters
     *
     * @return array Current session cookie information
     */
    public function getCookieParams()
    {
        return session_get_cookie_params();
    }

    /**
     * Sets user-level session storage functions
     *
     * @param \SessionHandlerInterface $sessionHandler
     * @param bool $register_shutdown
     * @return bool
     */
    public function setSaveHandler(
        \SessionHandlerInterface $sessionHandler,
        $register_shutdown = true
    ) {
        return session_set_save_handler($sessionHandler, $register_shutdown);
    }

    /**
     * Get and/or set the current session id
     *
     * @param string|int|null $id
     * @return string id of session, be aware if a new id is set, the old is returned
     */
    public function id($id)
    {
        if(is_string($id) || is_int($id)) {
            // setter return last id, not the newly set
            return session_id($id);
        }
        // getter
        return session_id();
    }

    /**
     * Get and/or set the current session module
     *
     * @param string|null $module
     * @return string Name of the current session module.
     */
    public function moduleName($module)
    {
        if(is_string($module)) {
            // setter
            return session_module_name($module);
        }
        // getter
        return session_module_name();
    }

    /**
     * Get and/or set the current session name
     *
     * @param string|null $name
     * @return string Name of current session
     */
    public function name($name = null)
    {
        if(is_string($name)) {
            // setter
            return session_name($name);
        }
        // getter
        return session_name();
    }

    /**
     * Update the current session id with a newly generated one
     *
     * @param bool $delete_old_session
     * @return bool
     */
    public function regenerate_id($delete_old_session = false)
    {
        return session_regenerate_id($delete_old_session);
    }

    /**
     * Registers session_write_close() as a shutdown function.
     *
     * @return void
     */
    public function registerShutdown()
    {
        session_register_shutdown();
    }

    /**
     * Re-initialize session array with original values
     *
     * @return bool
     */
    public function reset()
    {
        return session_reset();
    }

    /**
     * Get and/or set the current session save path
     *
     * @param string|null $path
     * @return string
     */
    public function savePath($path = null)
    {
        if(is_string($path)) {
            // setter
            return session_save_path($path);
        }
        // getter
        return session_save_path();
    }

    /**
     * Start new or resume existing session
     *
     * @return bool
     */
    public function start()
    {
        return session_start();
    }

    /**
     * Returns the current session status
     *
     * PHP_SESSION_DISABLED if sessions are disabled.
     * PHP_SESSION_NONE if sessions are enabled, but none exists.
     * PHP_SESSION_ACTIVE if sessions are enabled, and one exists.
     *
     * @return bool
     */
    public function status()
    {
        return session_status();
    }

    /**
     * Free all session variables
     * Prefixed with _ to avoid name clash with unset()
     *
     * @return void
     */
    public function _unset()
    {
        session_unset();
    }

    /**
     * Write session data and end session
     *
     * @return void
     */
    public function writeClose()
    {
        session_write_close();
    }

    /**
     * Whether a $_SESSION offset exists
     *
     * @param string $offset
     * @return bool
     */
    public function offsetExists($offset)
    {
        return isset($_SESSION[$offset]);
    }

    /**
     * Gets a $_SESSION offset
     *
     * @param mixed $offset
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return isset($_SESSION[$offset]) ? $_SESSION[$offset] : null;
    }

    /**
     * Sets a session offset
     *
     * @param mixed $offset
     * @param mixed $value
     */
    public function offsetSet($offset, $value)
    {
        $_SESSION[$offset] = $value;
    }

    /**
     * Unset a session offset
     *
     * @param mixed $offset
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($_SESSION[$offset]);
    }
}
