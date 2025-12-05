<?php

namespace App\Models;

use CodeIgniter\Model;

class Race extends Model
{
    public function get_races()
    {

        $this->session = service('session');
        $this->session->start();

        $memberKey = $this->session->get('memberKey');

        $db = db_connect();
        $query = "select R.raceID, raceName, raceLocation, raceDescription, raceDateTime from race R inner join member_race MR on R.raceID = MR.raceID inner join members M on MR.memberID = M.memberID WHERE M.memberKey = '$memberKey' AND MR.roleID = '2';";
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

    public function add_race($name,$location, $description,$date)
    {
        $this->session = service('session');
        $this->session->start();
        $memberID = $this->session->get('memberID');
        try{

            //Insert my race
            $db = db_connect();
            $query = "INSERT INTO race (raceName, raceLocation, raceDescription, raceDateTime ) values(?,?,?,?)";
            $db->query($query,[$name, $location, $description, $date ]);

            //get Auto ID
            $query = "SELECT LAST_INSERT_ID()";
            $result = $db->query($query);
            $row = $result->getResultArray();
            $LastID = $row[0]  ["LAST_INSERT_ID()"];

            //Insert into my member_race table
            $query = "INSERT INTO member_race (memberID, raceID, roleID ) values(?,?,2)";
            $db->query($query,[$memberID, $LastID ]);

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