<?php
/**
 * Created by PhpStorm.
 * User: archer
 * Date: 1/27/18
 * Time: 3:07 PM
 */

class User
{
    private $uname;
    private $pw;
    private $sid = 'SID2';
    private $bco = 0;
    private $wins = 0;
    private $b = 'b0,b1,b2,b3,b4';
    private $i = 'i0,i1,i2,i3,i4';
    private $n = 'n0,n1,n2,n3,n4';
    private $g = 'g0,g1,g2,g3,g4';
    private $o = 'o0,o1,o2,o3,o4';


    /**
     * User constructor.
     * @param $uname
     * @param $pw
     */
    public function __construct($uname, $pw)
    {
        $this->uname = $uname;
        $this->pw = $pw;
    }

    /**
     * @return mixed
     */
    public function getUname()
    {
        return $this->uname;
    }

    /**
     * @param mixed $uname
     */
    public function setUname($uname)
    {
        $this->uname = $uname;
    }

    /**
     * @return mixed
     */
    public function getPw()
    {
        return $this->pw;
    }

    /**
     * @param mixed $pw
     */
    public function setPw($pw)
    {
        $this->pw = $pw;
    }

    /**
     * @return string
     */
    public function getSid()
    {
        return $this->sid;
    }

    /**
     * @param string $sid
     */
    public function setSid($sid)
    {
        $this->sid = $sid;
    }

    /**
     * @return int
     */
    public function getBco()
    {
        return $this->bco;
    }

    /**
     * @param int $bco
     */
    public function setBco($bco)
    {
        $this->bco = $bco;
    }

    /**
     * @return int
     */
    public function getWins()
    {
        return $this->wins;
    }

    /**
     * @param int $wins
     */
    public function setWins($wins)
    {
        $this->wins = $wins;
    }

    /**
     * @return string
     */
    public function getB()
    {
        return $this->b;
    }

    /**
     * @param string $b
     */
    public function setB($b)
    {
        $this->b = $b;
    }

    /**
     * @return string
     */
    public function getI()
    {
        return $this->i;
    }

    /**
     * @param string $i
     */
    public function setI($i)
    {
        $this->i = $i;
    }

    /**
     * @return string
     */
    public function getN()
    {
        return $this->n;
    }

    /**
     * @param string $n
     */
    public function setN($n)
    {
        $this->n = $n;
    }

    /**
     * @return string
     */
    public function getG()
    {
        return $this->g;
    }

    /**
     * @param string $g
     */
    public function setG($g)
    {
        $this->g = $g;
    }

    /**
     * @return string
     */
    public function getO()
    {
        return $this->o;
    }

    /**
     * @param string $o
     */
    public function setO($o)
    {
        $this->o = $o;
    }

    // meths
    public function bingo_gen()
    {
        $this->b = rand(1, 204) . ',' . rand(1, 204) . ',' . rand(1, 204) . ',' . rand(1, 204) . ',' . rand(1, 204);
        $this->i = rand(204, 409) . ',' . rand(204, 409) . ',' . rand(204, 409) . ',' . rand(204, 409) . ',' . rand(204, 409);
        $this->n = rand(409, 614) . ',' . rand(409, 614) . ',' . 0 . ',' . rand(409, 614) . ',' . rand(409, 614);
        $this->g = rand(614, 819) . ',' . rand(614, 819) . ',' . rand(614, 819) . ',' . rand(614, 819) . ',' . rand(614, 819);
        $this->o = rand(819, 1024) . ',' . rand(819, 1024) . ',' . rand(819, 1024) . ',' . rand(819, 1024) . ',' . rand(819, 1024);
    }

    // db function
    public function toDB()
    {
        return "INSERT OR REPLACE INTO users (uname, pw, sid, bco, wins, b, i, n, g, o)
                VALUES ('$this->uname', '$this->pw', '$this->sid', $this->bco, $this->wins, '$this->b', '$this->i', '$this->n', '$this->g', '$this->o');";
    }

    // every class should implement the magic __toString method!
    public function __toString()
    {
        return 'User: '. $this->getUname() . ',' . $this->getB() . ',' . $this->getI() . ',' . $this->getN() . ',' . $this->getG() . ',' . $this->getO();
    }

}