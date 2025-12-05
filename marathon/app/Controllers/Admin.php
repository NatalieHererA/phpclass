<?php

namespace App\Controllers;

use App\Models\Member;
use App\Models\Race;

class Admin extends BaseController
{

    public function index(): string
    {
        $data = ['index' => 'true'];
        return view('admin_page', $data);
    }


    //Navigation
    public function manage_marathon(): string
    {
        $Race = new Race();
        $data = ['manage_marathon' => 'true'];
        $data['races'] = $Race->get_races();
        return view('marathon_page', $data);
    }

    public function add_marathon(): string
    {
        $data = ['add_marathon' => 'true'];
        return view('add_page', $data);
    }

    public function manage_runners(): string
    {
        $data = ['manage_runners' => 'true'];
        return view('runners_page', $data);
    }

    public function registration_form(): string
    {
        $data = ['registration_form' => 'true'];
        return view('registration_page', $data);
    }

    public function add_race()
    {
        $Race = new Race();
        $Race->add_race($this->request->getPost('race_name'), $this->request->getPost('race_location'), $this->request->getPost('race_description'), $this->request->getPost('race_date'));
        header("Location: marathon");
        exit();

    }

    public function delete_race($id)
    {
        $Race = new Race();

        $this->session = service('session');
        $this->session->start();
        $memberKey = $this->session->get('memberKey');
        $Member = new Member();
        if ($Member->has_access($id, $memberKey )){

            $Race->delete_race($id);
        }
        else{
            echo "Error Access Denied!";
            exit();
        }
        header("Refresh:0; url=/marathon/public/marathon");
        exit();

    }

    public function update_race($id)
    {
        $data = ['manage_marathon' => 'true'];

        $this->session = service('session');
        $this->session->start();
        $memberKey = $this->session->get('memberKey');
        $Member = new Member();
        if ($Member->has_access($id, $memberKey )){

            $Race = new Race();
            $data['race'] = $Race->get_race($id);
        }
        else{
            echo "Error Access Denied!";
            exit();
        }


        return view('update_page', $data);
    }

    public function edit_race()
    {
        $Race = new Race();


        $this->session = service('session');
        $this->session->start();
        $memberKey = $this->session->get('memberKey');
        $Member = new Member();
        if ($Member->has_access($this->request->getPost('txtID'), $memberKey )){

            $Race->update_race($this->request->getPost('race_name'), $this->request->getPost('race_location'), $this->request->getPost('race_description'), $this->request->getPost('race_date'), $this->request->getPost('txtID'));
        }
        else{
            echo "Error Access Denied!";
            exit();
        }
        header("Refresh:0; url=/marathon/public/marathon");
        exit();

    }

    public function logout()
    {
        $this->session = service('session');
        $this->session->destroy();
        header("Refresh:0; url=/marathon/public/");

    }
}


