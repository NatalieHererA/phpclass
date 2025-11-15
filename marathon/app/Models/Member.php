<?php

namespace App\Models;

use CodeIgniter\Model;

class Member extends Model
{
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

            return true;
    }

    public function create_user($username, $email, $password, $retypePassword){
            $db = db_connect();
            $query = "INSERT INTO members (memberName, memberEmail, memberPassword, memberKey ) VALUES (?,?,?,?)";
            $result = $db->query($query, [$username, $email, $password, $retypePassword, $memberKey ]);
            $row = $result->getFirstRow();

            if ($row==null) return false;

            $dbPassword = $row->memberPassword;
            $dbMemberKey = $row->memberKey;
            $hashedPassword = md5($dbpassword . $dbMemberKey);

            if ($dbPassword != $hashedPassword) return false;

            return true;


    }

}
