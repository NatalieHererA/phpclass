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

    public function get_race($id)
    {
        $db = db_connect();
        $query = "SELECT * FROM race where raceID = ?";
        $result = $db->query($query, [$id]);
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

    public function delete_race($id)
    {
        try{
            $db = db_connect();
            $query = "DELETE from race where raceID = ?";
            $db->query($query,[$id]);
            return true;
        }catch (Exception $ex){
            return false;

        }

    }

    public function update_race($name,$location, $description, $date, $txtID)
    {
        try{
            $db = db_connect();
            $query = "Update race set raceName = ?, raceLocation = ?, raceDescription = ?, raceDateTime = ? where raceID = ?";
            $db->query($query,[$name, $location, $description, $date, $txtID ]);
            return true;

        }catch (Exception $ex){
            return false;

        }

    }

}