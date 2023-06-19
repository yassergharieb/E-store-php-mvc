<?php


namespace app\controllers;
use app\controllers\AbstractController;
use app\lib\Helper;
use app\lib\ValidateInput;
use app\models\privilege;
use app\models\Usersgroupprivilege;
use PDOException;

class PrivilegesController extends AbstractController
{
    use Helper;
    use ValidateInput;
    public function index()
    {
        $this->langauge->load('privileges.default');
        $this->langauge->load('template.common');
        $this->langauge->load('privileges.labels');

        $this->data['privilges'] = privilege::getAll();
       
     

        $this->renderview();
    }



    public function add()
    {

        $this->langauge->load('privileges.default');
        $this->langauge->load('privileges.create');
        $this->langauge->load('privileges.labels');



        $this->langauge->load('template.common');

        $this->renderview();


        if (isset($_POST['submit'])) {

            $privilge = new Privilege();
            $privilge->privlige_title = $this->ValidateString($_POST['PrivilegeTitle']);
            $privilge->privlige = $this->ValidateString($_POST['Privilege']);
            if ($privilge->create()) {


                $_SESSION['message'] = "addedd successfuly";

                header('location: public/privileges/index ');



            }

        }
    }









    public function edit()
    {

        // $this->langauge->load('privileges.default');
        // $this->langauge->load('privileges.create');

        $privilege_id = ValidateInput::filterINt($this->params[0]);

        $privilege = Privilege::getByPk($privilege_id);

        $this->data['privilege'] = $privilege;



        $this->langauge->load('privileges.labels');
        $this->langauge->load('privileges.edit');
        $this->langauge->load('template.common');
        $this->renderview();


        if (isset($_POST['edit'])) {

            $privilge = new Privilege();
            $privilge->privlige_title = $this->ValidateString($_POST['PrivilegeTitle']);
            $privilge->privlige = $this->ValidateString($_POST['Privilege']);
            if ($privilge->update($privilege_id)) {


                $_SESSION['message'] = "updated successfuly";

                header('location: /public/privileges/index ');



            }
        }
     }





    public  function delete () {
        $privilege_id = $this->filterINt( $this->params[0]);
 

        $privilege = Privilege::getByPk($privilege_id);
        var_dump($privilege);

        $privilegegroup = Usersgroupprivilege::getBy(['privilge_id' => $privilege_id]);
        var_dump($privilegegroup);
    
        if ($privilegegroup != false) {
            foreach($privilegegroup as $privilege ){
                $privilege->deleteWithoutPrkey($privilege->privilge_id , "privilge_id");
            }
        }
        if ($privilege->delete($privilege_id)) {
          $_SESSION['message'] = "deleted successfuly";
          $this->redirect('/public/privileges/index');
        }
    
    }
    }


   





