<?php
class Places
{
    private $city;

    function __construct($city)
    {
        $this->city = $city;
    }

    function setCity($new_city)
    {
        $this->city = (string) $new_city;
    }

    function getCity()
    {
        return $this->city;
    }

    function save()
    {
        array_push($_SESSION['list_of_city'], $this);
    }

    static function getAll()
    {
        return $_SESSION['list_of_city'];
    }
    static function deleteAll()
    {
        $_SESSION['list_of_city'] = array();
    }
}





/*private $8; 8 = user input

        function __construct($x)
        {
            $this->8 = $x;
        }
        function getF()
        {
            return $this->8;
        }

        function setF($new_y)
        {
            $this->8 = (string) $new_y;
        }


        */
?>
