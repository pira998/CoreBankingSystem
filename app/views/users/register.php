<?php
   require  APPROOT.'/views/includes/head.php';
?>

<div class="navbar">
    <?php
       require  APPROOT.'/views/includes/navigation.php';
    ?>
</div>

<div class="container-login">
    <div class="wrapper-login">
        <h1>Customer Register</h1>

            <form
                id="register-form"
                method="POST"
                action="/customer/profile/register"
                >
            <input type="text" placeholder="Username *" name="username">
            <span class="invalidFeedback">
                <?php echo $data['usernameError']; ?>
            </span>
            <input type="text" placeholder="Customer Id *" name="customer_id">
        

            <input type="password" placeholder="Password *" name="password">
            <span class="invalidFeedback">
                <?php echo $data['passwordError']; ?>
            </span>

            <input type="password" placeholder="Confirm Password *" name="confirmPassword">
            <span class="invalidFeedback">
                <?php echo $data['confirmPasswordError']; ?>
            </span>

            <button id="submit" type="submit" value="submit">Submit</button>

            <p class="options">Already have account? <a href="/customer/profile/login">Sign in!</a></p>
        </form>
    </div>
</div>
