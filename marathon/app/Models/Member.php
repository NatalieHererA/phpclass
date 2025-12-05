<?php

namespace App\Models;

use CodeIgniter\Model;

class Member extends Model
{
    public function has_access($raceID, $memberKey)
    {
        try {
            $db = db_connect();
            $query = "select R.raceID from race R inner join member_race MR on R.raceID = MR.raceID inner join members M on MR.memberID = M.memberID WHERE M.memberKey = ? AND MR.roleID = '2' and MR.raceID = ?;";
            $result = $db->query($query, [$memberKey, $raceID]);
            $row = $result->getFirstRow();

            if ($row==null){
                return false;
            }else{
                return true;
            }
        }catch (Exception $ex){
            return false;
        }
    }



    public function user_login($email, $password){
        $db = db_connect();
            $query = "SELECT * FROM members WHERE memberEmail = ?";
            $result = $db->query($query, [ $email ]);
            $row = $result->getFirstRow();

            if ($row==null) return false; // email not in db

            $dbPassword = $row->memberPassword;
            $dbMemberKey = $row->memberKey;
            $hashedPassword = md5($password . $dbMemberKey);

            if($dbPassword != $hashedPassword) return false; // incorrect pw entered

            $this->session = service('session');
            $this->session->start();

            //$_SESSION["userID"] = $row["memberID"];
            //$_SESSION["roleID"] = $row["roleID"];
            $this->session->set('memberKey', $row->memberKey);
            $this->session->set('roleID', $row->roleID);
            $this->session->set('memberName', $row->memberName);
            $this->session->set('memberID', $row->memberID);

            return true;
    }

    public function create_user($username, $email, $hashedPassword, $retypePassword){

            $db = db_connect();
            $query = "INSERT INTO members (memberName, memberEmail, memberPassword, memberRetypePassword) VALUE (?,?,?,?)";
            $result = $db->query($query, [ $username, $email, $hashedPassword, $retypePassword ]);

            //if ($row==null) return false;

            //$dbPassword = $row->memberPassword;
            //$dbMemberKey = $row->memberKey;
            //$hashedPassword = md5($dbpassword . $dbMemberKey);

            //if ($dbPassword != $hashedPassword) return false;

            return true;
    }

}
