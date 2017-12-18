<?php include 'includings/headerGuest.php'?>


    <div class="container">
        <h2>Login</h2>

        <?php if($this->session->flashdata('msg1')){
            echo "<h3>".$this->session->flashdata('msg1')."</h3>";
        }
        ?>

        <hr>


        <?php echo validation_errors(); ?>

        <?php echo form_open('Login/LoginUser'); ?>

        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email" name="email">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
        </div>


        <button type="submit" class="btn btn-default">Submit</button>

        <?php echo form_close(); ?>

    </div>

<?php include 'includings/footer.php'?>