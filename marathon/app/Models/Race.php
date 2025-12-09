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
        $query = "select R.raceID, raceName, raceLocation, raceDescription, raceDateTime from race R inner join member_race MR on R.raceID = MR.raceID inner join members M on MR.memberID = M.memberID WHERE M.memberKey = '$memberKey' AND MR.roleID = '2'";

        $result = $db->query($query);
        return $result->getResultArray();
    }

    public function get_races_api($apiKey)
    {
        $db = db_connect();
        $query = "select R.raceID, raceName, raceLocation, raceDescription, raceDateTime from race R inner join member_race MR on R.raceID = MR.raceID inner join members M on MR.memberID = M.memberID WHERE M.memberKey = ? AND MR.roleID = 1";
        $result = $db->query($query, [ $apiKey ]);
        return $result->getResultArray();
    }

    public function get_runners($apiKey, $raceID)
    {
        $db = db_connect();
        $query = "SELECT * FROM member_race mr JOIN members m ON mr.memberID = m.memberID WHERE memberKey = ? AND raceID = ? AND mr.roleID = 1";
        $result = $db->query($query, [ $apiKey, $raceID ]);
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
            $query = "INSERT INTO member_race (memberID, raceID, roleID ) values(?,?,1)";
            $db->query($query,[$memberID, $LastID ]);

            return true;

        }catch (\Exception $ex){
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
        }catch (\Exception $ex){
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
        }
        catch(\Exception $ex){
            return false;
        }
    }

    public function add_runner($memberID, $raceID)
    {
        try{
            $db = db_connect();
            $query = "INSERT INTO member_race (memberID, raceID, roleID) VALUES (?, ?, 1)";
            $db->query($query,[ $memberID, $raceID ]);
            return true;
        }
        catch (\Exception $ex){
            return false;
        }

    }

    public function delete_runner($memberID, $raceID)
    {
        try{
            $db = db_connect();
            $query = "DELETE FROM member_race WHERE memberID = ? AND raceID = ? AND roleID = 1";
            $db->query($query,[ $memberID, $raceID ]);
            return true;
        }
        catch (\Exception $ex){
            return false;
        }

    }

}