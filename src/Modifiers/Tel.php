<?php

namespace Netnak\Tel\Modifiers;

use Statamic\Modifiers\Modifier;

class Tel extends Modifier
{
    /**
     * Modify a value.
     *
     * @param mixed  $value    The value to be modified
     * @param array  $params   Any parameters used in the modifier
     * @param array  $context  Contextual values
     * @return mixed
     */
    public function index($value, $params, $context)
    {
        // If we find a plus, switch it out for 00
        $value = $this->removePlus($value);
        $value = $this->removeOptionalZero($value);
        $value = $this->removeNonNumericals($value);

        return $value;
    }

    /**
     * @param $value
     * @return string
     */
    public function removePlus($value): string
    {
        if (preg_match('/[+]/', $value)) {
            return '00'.str_replace('+', '', $value);
        }

        return $value;
    }

    /**
     * Removes any (0) optional numbers (for local callers) from phone strings.
     * Does not remove any spaces around the instance.
     *
     * @param $value
     * @return string
     */
    public function removeOptionalZero($value): string
    {
        return preg_replace('/\(0\)/', '', $value);
    }

    /**
     * Removes any non-numerical characters, including spaces, -, _, commas etc.
     *
     * @param $value
     * @return string
     */
    public function removeNonNumericals($value): string
    {
        return preg_replace('/[^0-9]/', '', $value);
    }
}
