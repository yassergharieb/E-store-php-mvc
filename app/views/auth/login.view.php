<div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <div class="bg-secondary rounded p-4 p-sm-5 my-4 mx-3">
                        <!-- <div class="d-flex align-items-center justify-content-between mb-3"> -->
                         
                                <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i> <?= $welcome ?></h3>
                            </a>
                            <h3>Sign In</h3>

                       <form action="" method="post" enctype="application/x-www-form-urlencoded">


                       <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="floatingInput" name="UEmail" >
                            <label for="floatingInput">Email address</label>
                        </div>
                        <div class="form-floating mb-4">
                            <input type="password" class="form-control" id="floatingPassword" name="Upass">
                            <label for="floatingPassword">Password</label>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Check me out</label>
                            </div>
                          
                        </div>
                        <button type="submit" class="btn btn-primary py-3 w-100 mb-4" name = "submit">Sign In</button>

                       </form>     
                          
                        <!-- </div> -->


                     
                    </div>
                </div>
            </div>
        </div>