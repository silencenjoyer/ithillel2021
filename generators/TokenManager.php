<?php
require_once('DB.php');

class TokenManager
{

    public function getRandomString($count): Generator
    {
        $st = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
        $randomString = '';

        for ($i = 1; $i <= $count; $i++) {
            yield $st[mt_rand(0, 51)];
        }
    }

    public function generateToken($count): Generator
    {
        $tokens = '';
        for ($i = 0; $i <= $count; $i++) {
            $st = '';
            foreach ($this->getRandomString(15) as $randomString) {
                $st .= $randomString;
            }
                if ($i <= 0) {
                    $tokens .= '(\'' . $st . '\')';
                } else {
                    $tokens .= ',(\'' . $st . '\')';
                }
        }
        yield $tokens;
    }

    public function partition($value, $step): Generator
    {
        $a = 0;
        $lastQueryStep = 0;
        $result = '';
        for ($i = 1; $i <= $value; $i ++) {
            $a ++;

            if ($a == $step) {
                foreach($this->generateToken($a) as $result) {
                    yield $result;
                };
                $a = 0;
                
                $lastQueryStep = $i;
            } 
            if ($i + $step > $value) {
                foreach($this->generateToken($value - $lastQueryStep) as $result) {
                    yield $result;
                };
                break;
            }
        }
    }
}
