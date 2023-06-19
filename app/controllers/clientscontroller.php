<?php
namespace app\controllers;
use app\controllers\AbstractController;

use app\lib\Helper;
use app\lib\Messenger;
use app\lib\ValidateInput;
use app\models\clients;
use app\models\suppliers;

class ClientsController extends AbstractController
{
    use Helper;
    use ValidateInput;

    private $_createActionRoles =
        [

            'name'    => 'req|between(3,12)',
            'Email'    => 'req|email',
            'address'   => 'req|alphanum',
            'phone_number' => 'req|max(15)',
            
        ];

   
    public function index()
    {
        $this->langauge->load('clients.default');
        $this->langauge->load('template.common');
        $this->langauge->load('clients.labels');


       
     

        $this->data['clientss'] = clients::getAll();

         $this->renderview();


    }




    
    public function edit()
    {

        $id = $this->filterInt($this->params[0]);
        $client = clients::getByPk($id);

        if($client === false) {
            $this->redirect('/public/clients');
        }

        $this->data['client'] = $client;

        $this->langauge->load('template.common');
        $this->langauge->load('clients.edit');
        $this->langauge->load('clients.labels');
        $this->langauge->load('clients.messages');
        $this->langauge->load('validation.errors');

        if(isset($_POST['submit'])) {

            $client->name = $this->ValidateString($_POST['name']);
            $client->Email = $this->ValidateString($_POST['Email']);
            $client->phone_number = $this->ValidateString($_POST['phone_number']);
            $client->address = $this->ValidateString($_POST['address']);

           
            if($client->update($id)) {
                $this->messenger->add($this->langauge->get('message_create_success'));
            } else {
                $this->messenger->add($this->langauge->get('message_create_failed'), Messenger::WARNING_COLOR);
            }
            $this->redirect('/public/clients');
        }

        $this->renderview();
    }

    public function delete()
    {

        $id = $this->filterInt($this->params[0]);
      $client = clients::getByPK($id);

        if($client === false) {
            $this->redirect('/clients');
        }

        $this->langauge->load('clients.messages');

        if($client->delete($id)) {
            $this->messenger->add($this->langauge->get('message_delete_success'));
        } else {
            $this->messenger->add($this->langauge->get('message_delete_failed'), Messenger::WARNING_COLOR);
        }
        $this->redirect('/public/clients');
    }





    public function add()
    {
        $this->langauge->load('clients.default');
        $this->langauge->load('clients.create');
        $this->langauge->load('clients.labels');
        $this->langauge->load('clients.messages');


        $this->langauge->load('validation.errors');


        $this->langauge->load('template.common');






        $this->renderview();

        if (isset($_POST['submit']) && $this->isValid($this->_createActionRoles, $_POST)) {

     
            $client = new clients();



            $client->name = $this->ValidateString($_POST['name']);
            $client->Email = $this->ValidateString($_POST['Email']);
            $client->address = $this->ValidateString($_POST['address']);
            $client->phone_number = $this->ValidateString($_POST['phone_number']);

                if ($client->create()) {
                  

                    $this->messenger->add($this->langauge->get('message_create_success'), Messenger::SUCCSESS_COLOR);
                    $this->redirect('/public/clients/index');
                }
                

            }


        }


    }
