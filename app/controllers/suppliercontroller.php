<?php
namespace app\controllers;
use app\controllers\AbstractController;

use app\lib\Helper;
use app\lib\Messenger;
use app\lib\ValidateInput;
use app\models\suppliers;

class SupplierController extends AbstractController
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
        $this->langauge->load('suppliers.default');
        $this->langauge->load('template.common');
        $this->langauge->load('suppliers.labels');


       
     

        $this->data['supliers'] = suppliers::getAll();

         $this->renderview();


    }




    
    public function edit()
    {

        $id = $this->filterInt($this->params[0]);
        $supplier = suppliers::getByPk($id);

        if($supplier === false) {
            $this->redirect('/public/supplier');
        }

        $this->data['supplier'] = $supplier;

        $this->langauge->load('template.common');
        $this->langauge->load('suppliers.edit');
        $this->langauge->load('suppliers.labels');
        $this->langauge->load('suppliers.messages');
        $this->langauge->load('validation.errors');

        if(isset($_POST['submit'])) {

            $supplier->name = $this->ValidateString($_POST['name']);
            $supplier->Email = $this->ValidateString($_POST['Email']);
            $supplier->phone_number = $this->ValidateString($_POST['phone_number']);
            $supplier->address = $this->ValidateString($_POST['address']);

           
            if($supplier->update($id)) {
                $this->messenger->add($this->langauge->get('message_create_success'));
            } else {
                $this->messenger->add($this->langauge->get('message_create_failed'), Messenger::WARNING_COLOR);
            }
            $this->redirect('/public/supplier');
        }

        $this->renderview();
    }

    public function delete()
    {

        $id = $this->filterInt($this->params[0]);
      (object)  $supplier = suppliers::getByPK($id);

        if($supplier === false) {
            $this->redirect('/suppliers');
        }

        $this->langauge->load('suppliers.messages');

        if($supplier->delete($id)) {
            $this->messenger->add($this->langauge->get('message_delete_success'));
        } else {
            $this->messenger->add($this->langauge->get('message_delete_failed'), Messenger::WARNING_COLOR);
        }
        $this->redirect('/public/supplier');
    }





    public function add()
    {
        $this->langauge->load('suppliers.default');
        $this->langauge->load('suppliers.create');
        $this->langauge->load('suppliers.labels');
        $this->langauge->load('suppliers.messages');


        $this->langauge->load('validation.errors');


        $this->langauge->load('template.common');






        $this->renderview();

        if (isset($_POST['submit']) && $this->isValid($this->_createActionRoles, $_POST)) {

     
            $supplier = new suppliers();



            $supplier->name = $this->ValidateString($_POST['name']);
            $supplier->Email = $this->ValidateString($_POST['Email']);
            $supplier->address = $this->ValidateString($_POST['address']);
            $supplier->phone_number = $this->ValidateString($_POST['phone_number']);

                if ($supplier->create()) {
                  

                    $this->messenger->add($this->langauge->get('message_create_success'), Messenger::SUCCSESS_COLOR);
                    $this->redirect('/public/supplier/index');
                }
                

            }


        }


    }
