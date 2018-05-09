<!-- MENU SECTION END-->
<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="page-head-line">Form <i>Login</i> </h4>
            </div>

            </div>
            <form method="POST" action="proses_login_administrator.php?op=in">
            <div class="row">
                <div class="col-md-6">
                    <h4> Masuk</i> dengan <strong><b>Akun Anda  : </b></strong></h4>
                        <br />
                            <label><i class="glyphicon glyphicon-user"></i> Username : </label>
                            <input type="text" class="form-control" name="username" required/>
                            <label><i class="glyphicon glyphicon-lock"></i> Password :  </label>
                            <input type="password" class="form-control" name="password" required/>
                            <hr />
                            <button type="submit" class="btn btn-info" name="login"> Masuk </button>
                            <a href="?page=lupa_pass" style="text-decoration:none;"> &nbsp;&nbsp;&nbsp; <i class="glyphicon glyphicon-key"></i>Reset Password ? </a>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- CONTENT-WRAPPER SECTION END-->