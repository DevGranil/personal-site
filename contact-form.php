
<?php

$messageToUser = " ";
$name = " ";
$email = " ";
$messageToUser = " ";

if(filter_has_var(INPUT_POST, 'submit')){
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    if(!empty($name) && !empty($email) && !empty($message)){

        if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){

            $messageToUser = "Email address is not valid";
        } else{

            $toEmail = 'mikegranil@hotmail.co.uk';
            $subject = 'message from ' .$email;
            $body = '<h2>Contact Request</h2>
                <h4> Name </h4> <p>'.$name.'</p> 
                <h4> Email </h4> <p>'.$email.'</p> 
                <h4> Message </h4> <p>'.$message.'</p>';

                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .="Content-Type:text/html;charset=UTF-8" . "          
                \r\n";

                $headers .= 'From: ' .$name. '<' .$email. '>'. "\r\n";

                if(mail($toEmail, $subject, $body, $headers)){
                    $messageToUser = "Your message has been sent";
                } else {
                    $messageToUser = "Your message has not been sent";
                }
        }

    } else {
        $messageToUser = "All fields are required";
    }
}

if(filter_has_var(INPUT_POST, 'reset')){
    $name = '';
    $email = '';
    $message = '';
}

?>
<?php include 'header.php'?>
<nav class="nav">
        <div class="hamburger__wrapper">
            <div class="hamburger__line js-hamLine1"></div>
            <div class="hamburger__line js-hamLine2"></div>
            <div class="hamburger__line js-hamLine3"></div>

        </div>
        <div class="mob-nav__wrapper">
            <ul >
                <li class="mob-nav__link"><a href="index.php">HOME</a></li>
                <li class="mob-nav__link--close">Close</li>
            </ul>
        </div>
        
    </nav>

    <section class="contact-form__section">
        <h4 class="contact-form__title">If you have a project in mind or just want friendly info let’s get in contact</h4>
        <?php if($messageToUser !== " "): ?>
            <p><?php echo $messageToUser?></p>
        <?php endif;?>
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']?>" class="form__wrapper">
                <label for="name" class="form__labels">Name</label>
                <input id="name" name="name" type="text" class="form__input" value="<?php echo isset($_POST['name']) ? $name : ''?>">
                <label for="email" class="form__labels">Email address</label>
                <input id="email" name="email" type="text" class="form__input" value="<?php echo isset($_POST['email']) ? $email : ''?>">
                <label for="message" class="form__labels">Message</label>
                <textarea class="form__textarea" name="message" id="message" cols="30" rows="10"><?php if(isset($_POST['message'])){echo $message;}?></textarea>
                 
                <div class="form__submit">
                <input type="submit" name="submit">
                <input type="submit" name="reset" value="reset">
                </div>
                
   
        </form>
    </section>
      



</body>
</html>