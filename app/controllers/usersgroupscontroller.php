<?php
namespace app\controllers;

use app\controllers\AbstractController;
use app\lib\Helper;
use app\lib\Messenger;
use app\lib\ValidateInput;
use app\models\Privilege;
use app\models\Usersgroups;
use app\models\Usersgroupprivilege;


class UsersgroupsController extends AbstractController
{
    use Helper;
    use ValidateInput;
    public $privileges = [];
    public function index()
    {

        $this->data['groups'] = Usersgroups::getAll();


        $this->langauge->load('usersgroups.default');

        $this->langauge->load('usersgroups.labels');
        $this->langauge->load('template.common');
        $this->renderview();


    }



    public function add()
    {


        $this->data['privileges'] = Privilege::getAll();

        $this->langauge->load('usersgroups.labels');
        $this->langauge->load('usersgroups.create');
        $this->langauge->load('privileges.labels');

        $this->langauge->load('template.common');
        $this->renderview();


        if (isset($_POST['submit'])) {
            $group = new Usersgroups();
            $group->groupName = $this->ValidateString($_POST['groupName']);
           
            if ($group->create()) {
                
                

                if (isset($_POST['privileges']) && is_array($_POST['privileges'])) {
                    

                   
                    foreach ($_POST['privileges'] as $privilge_id) {
                      


                        $groupPrivilges = new Usersgroupprivilege();


                        $groupPrivilges->group_id = $group->groupId;
                        $groupPrivilges->privilge_id = $privilge_id;
                        $groupPrivilges->create(); 

                    }
                    // $this->messenger->add('group saved successfully' , Messenger::SUCCSESS_COLOR);
                    

                    $this->redirect('/public/usersgroups/index');

                }

            }
        }


    }


    public function edit()
    {

         $id = $this->filterINt($this->params[0]);
        $group = Usersgroups::getByPk($id);
     

        if ($group == false ) {
            $this->redirect('/public/usersgroups/index');
        }


        $this->data['group'] = $group;
        $this->data['privileges'] = Privilege::getAll();
        
        $privilgeIDS = Usersgroupprivilege::getBy(['group_id' => $group->groupId]);
        $extractedPrivileges= []; 

        $this->langauge->load('usersgroups.labels');
        $this->langauge->load('usersgroups.create');
        $this->langauge->load('privileges.labels');

        $this->langauge->load('template.common');

        if ($privilgeIDS != false) {
            foreach($privilgeIDS as $privilge) {
                $extractedPrivileges[] = $privilge->privilge_id;
            }
          
        }
        $this->data['grouprivilges'] = $extractedPrivileges;

        if (isset($_POST['submit'])) {
            $group = new Usersgroups();
            $group->groupName = $this->ValidateString($_POST['groupName']);
            //   var_dump($_POST);
            if ($group->update($id)) {
             

                if (isset($_POST['privileges']) && is_array($_POST['privileges'])) {

                    
     $privilgeidsToBeDeleted = array_diff($extractedPrivileges, $_POST['privileges']);
     $privilgeidsToBeAdded = array_diff($_POST['privileges'], $extractedPrivileges);

                    // var_dump($_POST['privileges']);
                    echo "<br>";
                    // var_dump($privilgeidsToBeAdded);
                    echo "<br>";
                    // var_dump($privilgeidsToBeDeleted);
                

            foreach($privilgeidsToBeDeleted as $deletdPrivilge) {
                        // var_dump($deletdPrivilge);

                        // var_dump($group->groupId);
                       $unwantedPrivilges = Usersgroupprivilege::getBy([
                            'privilge_id' => $deletdPrivilge,
                               'group_id' => $id
                        ]);
                        // var_dump($unwantedPrivilges , "arr");
                        // var_dump ($deletdPrivilge);
                        echo "<br>";


                       $unwantedPrivilges->current()->deleteWithoutPrkey($deletdPrivilge , "privilge_id" );
                         
                 }

                 
                   
                       
                        foreach ($privilgeidsToBeAdded as $privilge_id) {


                            $groupPrivilges = new Usersgroupprivilege();


                            $groupPrivilges->group_id = $id;
                       
                            $groupPrivilges->privilge_id = $privilge_id;
                        
                          
                           
                            $groupPrivilges->create();


                        
                    
                    } 
                 

                  
                    $this->redirect('/public/usersgroups/index');

                }

            }
        }
        $this->renderview();


    }


public function  delete() {
    
    $id = $this->filterINt($this->params[0]);
    $group = Usersgroups::getByPk($id);
 

    if ($group == false ) {
        $this->redirect('/public/usersgroups/index');
    }
        $groupPrivileges = Usersgroupprivilege::getBy(['group_id' => $id]);
      
       
      
       
        if ($groupPrivileges != false) {
            foreach($groupPrivileges as $groupPrivilege) {
               $groupPrivilege->deleteWithoutPrkey($groupPrivilege->privilge_id, 'privilge_id');
            }
        }
        if ($group->delete($id)) {
            $this->redirect('/public/usersgroups/index');
        }
 }

}