<?php

namespace helpers;

class redis
{
    public function connect()
    {
        $redis = new \Redis();
    }
}
