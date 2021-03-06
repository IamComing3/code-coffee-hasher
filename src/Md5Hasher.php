<?php

namespace CodeCoffee\Hasher;

class Md5Hasher
{
    /**
     * @param $value
     * @param array $options
     * @return string
     */
    public function make($value, array $options = [])
    {
        $salt = isset($options['salt']) ? $options['salt'] : '';
        $hashValue = hash('md5', $value . $salt);

        return $hashValue;
    }

    /**
     * @param $value
     * @param $hashValue
     * @param array $options
     * @return bool
     */
    public function check($value, $hashValue, array $options = [])
    {
        $salt = isset($options['salt']) ? $options['salt'] : '';
        $hash = hash('md5', $value . $salt);

        return $hash === $hashValue;
    }
}