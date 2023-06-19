<?php
namespace app\controllers;
use app\controllers\AbstractController;

use app\lib\Helper;
use app\lib\Messenger;
use app\lib\ValidateInput;
use app\Models\Userprofile;
use app\models\Usersgroups;
use app\models\User;

class UserController extends AbstractController
{
    use Helper;
    use ValidateInput;

    private $_createActionRoles =
        [

            'username' => 'req|alphanum|between(3,12)',
            'password' => 'req|min(6)',
            'CPassword' => 'req|min(6)',
            'Email' => 'req|email|eq_field(CEmail)',
            'CEmail' => 'req|email',
            'PhoneNumber' => 'alphanum|max(15)',
            'GroupId' => 'req|int'
        ];

    private $_editActionRoles =
        [
            'PhoneNumber' => 'alphanum|max(15)',
            'GroupId' => 'req|int'
        ];
    public function index()
    {
        $this->langauge->load('users.default');
        $this->langauge->load('template.common');
        $this->langauge->load('users.create');
        $this->langauge->load('users.labels');


       
     

        $this->data['usrs'] = User::getUser($this->session->u);

      
        





        // var_dump($this->data['users']);




        $this->renderview();


    }





    public function add()
    {
        $this->langauge->load('users.default');
        $this->langauge->load('users.create');
        $this->langauge->load('users.labels');
        $this->langauge->load('users.messages');


        $this->langauge->load('validation.errors');


        $this->langauge->load('template.common');




        $this->data['Usersgroups'] = Usersgroups::getAll();


        $this->renderview();

        if (isset($_POST['submit']) && $this->isValid($this->_createActionRoles, $_POST)) {

            $user = new User();



            $user->username = $this->ValidateString($_POST['username']);



            $user->cryptPassword($_POST['password']);


            $user->Email = $this->ValidateString($_POST['Email']);



            $user->Phonenumber = $this->ValidateString($_POST['PhoneNumber']);
            $user->groupId = $this->filterINt($_POST['GroupId']);
            $user->subscrbtiondate = date('Y-m-d');
            $user->lastLogin = date('Y-m-d H:i:s');
            $user->status = 1;






            if (User::userExists($user->username) || User::EmailExists($user->Email)) {


                $this->messenger->add($this->langauge->get('message_user_exists'), Messenger::DANGER_COLOR);
                $this->redirect('/public/user/add');
            } else {





                if ($user->create()) {
                    $userProfile = new Userprofile();
                    $userProfile->userId = $user->id;

                    $userProfile->firstname = $this->ValidateString($_POST['firstname']);
                    $userProfile->lastname = $this->ValidateString($_POST['lastname']);
                    $userProfile->create();


                    $this->messenger->add($this->langauge->get('message_create_success'), Messenger::SUCCSESS_COLOR);
                    $this->redirect('/public/user/index');
                }
                

            }


        }


    }
}

