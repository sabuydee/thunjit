<div style="text-align: center;">
    <form container="#container" method="post" action="User/Login"
          style="border: 1px solid #ddd; padding: 20px; width: 400px; 
          border-radius: 5px; display: inline-block;">


        <div style="text-align: left;">

            <h4 style="text-align: center;">Login</h4><hr>

            <div style="text-indent: 20px; margin-bottom: 5px;">
                <label style="width: 100px;">Username</label>
                <input type="text" name="username" value="<?=$username?>" style="width: 200px;">
            </div>

            <div style="text-indent: 20px; margin-bottom: 5px;">
                <label style="width: 100px;">Password</label>
                <input type="password" name="password" value="<?=$password?>" style="width: 200px;">
            </div>

            <h6 style="text-align: center; color: #cd0a0a; margin-bottom: 20px; margin-top: 20px;"><?=$message?></h6>

            <div style="text-indent: 20px;">
                <label style="width: 100px;"></label>
                <input type="submit" value="Login">
            </div>


        </div>
    </form>
</div>