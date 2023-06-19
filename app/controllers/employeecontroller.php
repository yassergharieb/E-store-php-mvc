<?php

namespace app\controllers;

use app\controllers\AbstractController;
use app\lib\Helper;
use app\lib\ValidateInput;
use app\models\employee;

// use Exception;

class EmployeeController extends AbstractController
{

  use ValidateInput;
  use Helper;
  public function add()
  {
    $this->langauge->load('layout.common');

    $this->langauge->load('employee.index');
    $this->renderview();


    if (isset($_POST['submit'])) {
      $emp = new Employee();
      $emp->name = $this->ValidateString($_POST['name']);
      $emp->salary = $this->filterINt($_POST['salary']);
      $emp->company = $this->ValidateString($_POST['company']);
      $emp->email = $this->ValidateString($_POST['email']);
      $emp->address = $this->ValidateString($_POST['address']);



      if ($emp->create()) {
        $_SESSION['message'] = "addedd successfuly";

        $this->redirect('/public/employee/index');

      } else {
        $_SESSION['error'] = "invalid data";
      }







    }




  }


  public function notfound()
  {
    $this->langauge->load('employee.index');
    $this->langauge->load('layout.common');
    $this->renderview();
  }

  public function index()
  {


    $this->langauge->load('employee.index');
    $this->langauge->load('layout.common');

  
    $this->data['employees'] = Employee::getAll();

    $this->renderview();

  }

  public function delete()
  {


    $id = $this->filterINt($this->params[0]);
    $emp = Employee::getByPk($id);
    if ($emp->delete($id)) {
      $_SESSION['message'] = "deleted successfuly";
      $this->redirect('/public/employee/index');
    }


  }

  public function edit()
  {
    $id = $this->filterINt($this->params[0]);
    $emp = Employee::getByPk($id);
    $this->data['Employee'] = $emp;



    if (isset($_POST['submit'])) {
      $emp = new Employee();
      $emp->name = $this->ValidateString($_POST['name']);
      $emp->salary = $this->filterINt($_POST['salary']);
      $emp->company = $this->ValidateString($_POST['company']);
      $emp->email = $this->ValidateString($_POST['email']);
      $emp->address = $this->ValidateString($_POST['address']);

      var_dump($emp);
      if ($emp->update($id)) {



        $_SESSION['message'] = "updated successfuly";
        $this->redirect('/public/employee/index');

      } else {
        $_SESSION['error'] = "invalid data";
      }



    }

    $this->renderview();


  }
}