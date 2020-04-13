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
        <form action="" class="form__wrapper">
                <label for="name" class="form__labels">Name</label>
                <input id="name" name="name" type="text" class="form__input">
                <label for="email" class="form__labels">Email address</label>
                <input id="email" name="email" type="text" class="form__input">
                <label for="message" class="form__labels">Message</label>
                <textarea class="form__textarea" name="message" id="message" cols="30" rows="10"></textarea>
                 
                <div class="form__submit">
                <input type="submit">
                <input type="reset">
                </div>
                
   
        </form>
    </section>
      



</body>
</html>