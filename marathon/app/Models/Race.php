<?php

namespace App\Models;

use CodeIgniter\Model;

class Race extends Model
{
    public function get_races()
    {
        $db = db_connect();
        $query = "SELECT * FROM race";
        $result = $db->query($query);
        return $result->getResultArray();
    }

    public function add_race($name,$location, $description, $date)
    {
        try{
            $db = db_connect();
            $query = "INSERT INTO race (raceName, raceLocation, raceDescription, raceDateTime ) values(?,?,?,?)";
            $db->query($query,[$name, $location, $description, $date ]);
            return true;

        }catch (Exception $ex){
            return false;

        }


    }
}