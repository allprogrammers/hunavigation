<?php
    class places extends SQLite3
    {
        function __construct()
        {
            $this->open('places.db');
        }
    }
?>
