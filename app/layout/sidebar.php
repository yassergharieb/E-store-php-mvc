   <!-- Sidebar Start -->
</head>

<body>




    <div class="container-fluid position-relative d-flex p-0">
 
 
   <div class="sidebar pe-4 pb-3 ">

        <nav class="navbar bg-secondary navbar-dark  main_navigation">

                <a href="index.html" class="navbar-brand mx-4 mb-3">

                    <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>E-store</h3>
                </a>

                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle profile_picture" src="/public/img/user.jpg" alt="" style="width: 40px; height: 40px;">
                    </div>  
                  <div class="employee_info ms-3">
                  <h6 class="name mb-0">
                     <?= @!is_null($this->session->u->profile->firstname) 
                 ? $this->session->u->profile->firstname :  "اسم المستخدم" ?>
                 </h6>
                 <span class="privilege">
                    
                 <?= @!is_null($this->session->u->groupName) 
                   ? $this->session->u->groupName :  "مجموعة المستخدم" ?>
                
                </span>
                 </div>
    
                </div>

                <div class="navbar-nav w-100">

                    <a href="index.html" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i><?= $dashboard ?></a>

      <div class="nav-item dropdown">

                        
                    


   

      <a href="/public/privileges/index" class="nav-item nav-link d-flex"><i class="fa fa-user "></i> privilege </a>

     <a href="/public/" class="nav-item nav-link d-flex"><i class="fa fa-table "></i> <?= $general_statistics ?> </a>
     <a href="/public/user/index" class="nav-item nav-link d-flex"><i class="fa fa-user "></i> <?= $users ?> </a>
     <a href="/public/" class="nav-item nav-link d-flex"><i class="fa fa-store"> </i> <?= $store  ?> </a>
     <a href="/public/clients/index" class="nav-item nav-link d-flex"><i class="fa fa-user "></i> <?= $clients  ?> </a>
     <a href="/public/supplier" class="nav-item nav-link d-flex"><i class="fa fa-user "></i> <?= $suppliers  ?> </a>
     <a href="/public/" class="nav-item nav-link d-flex"><i class="fa fa-dollar-sign "></i> <?= $expenses ?> </a>
     <a href="/public/" class="nav-item nav-link d-flex"><i class=" fa fa-dollar-sign "></i> <?= $transactions ?> </a>
     <a href="/public/auth/logout" class="nav-item nav-link d-flex "><i class="fa fa-solid fa-flag"></i> <?= $log_out  ?> </a>
     <a href="/public/" class="nav-item nav-link"><i class="fa fa-solid fa-flag "></i> <?= $reports  ?> </a>
 

                   
                    


                  
                </div>
            </nav>



        </div>




        
        <!-- Sidebar End -->
        <!-- Content Start -->
        <div class="content">        
