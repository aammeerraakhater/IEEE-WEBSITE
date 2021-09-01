<?php 

$style = "contact-us.css";
include 'init.php';
?>

<?php
    if ($_SERVER["REQUEST_METHOD"]=="POST" ) {
        
        $name=FILTER_VAR($_POST['name'],FILTER_SANITIZE_STRING);
        $email=FILTER_VAR($_POST['email'],FILTER_SANITIZE_EMAIL);
        $msg=FILTER_VAR($_POST['message'],FILTER_SANITIZE_STRING);
        $subject=FILTER_VAR($_POST['title'],FILTER_SANITIZE_STRING);
        $phone=FILTER_VAR($_POST['phone'],FILTER_SANITIZE_NUMBER_INT);
        $header="from:".$email;

        $formErrors = array ();
        if(empty($name)||strlen($name)<3){
          $formErrors[] = "
          <script>
              toastr.error('Please fill the name field and it should be more than 3 letters.')
          </script>";
          $name_error="border border-danger";
        }
        if (empty($email)) {
            $formErrors[] = "
            <script>
                toastr.error('Please fill the email field.')
            </script>";
            $email_error="border border-danger";
        }
        if (empty($phone)) {
            $formErrors[] = "
            <script>
                toastr.error('Please fill the phone field.')
            </script>";
            $phone_error="border border-danger";
        }
        if (empty($msg)) {
            $formErrors[] = "
            <script>
                toastr.error('Please fill the message field.')
            </script>";
            $message_error="border border-danger";

        }
        if (empty($subject)) {
            $formErrors[] = "
            <script>
                toastr.error('Please fill the subject field.')
            </script>";
            $subject_error="border border-danger";
        }
            
        
        if (empty($formErrors)){

            //=================================== NEED UPDATE IN FUTURE =============================
            mail("Ieeebub@gmail.com",$subject,$email,$header . "\r\n" ."CC: Ieeebub@gmail.com". "\r\n" .$msg);
            addmsg($email,$name,$msg,$subject);
                    
        }
    }
    ?>


<?php
    if (isset($formErrors)){ 
    foreach($formErrors as $error){
        echo $error;
    }
}
?>


<div class="contact">
            <div class="overlay">
                <div class="container">
                    <a class="btn back_btn btn-secondary pr-4 pl-4 mb-5 mt-5" href="index.html">Back</a>
                    <h1>Contact US</h1>
                    <div class="bottom">
                        <div class="dark"></div>
                    </div>
                    <form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="name" value = "<?php if(isset($name)){ echo $name;} ?>" placeholder="Name *" class="<?php echo $name_error;?>" autocomplete="off">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="email" name="email" value = "<?php if(isset($email)){ echo $email;} ?>" placeholder="Email *" class="<?php echo $email_error;?>" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="<?php echo $subject_error;?>" name="title" value = "<?php if(isset($subject)){ echo $subject;} ?>" placeholder="Subject *" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group">
                                    <input class="<?php echo $phone_error;?>" type="tel" name="phone" value = "<?php if(isset($phone)){ echo $phone;} ?>" placeholder="Phone *" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea name="message" class="<?php echo $message_error;?>" placeholder="Your Message *" rows="4" autocomplete="off"><?php if(isset($msg)){ echo $msg;} ?></textarea>
                                </div>
                            </div>
                        <button class="ml-3" id="success" type="submit">Send Message</button>
                        </div>
                    </form>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="item">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-phone" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M11 1H5a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM5 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H5z" />
                                    <path fill-rule="evenodd" d="M8 14a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                                </svg>
                                <div class="cont">
                                    <h6>Phone</h6>
                                    <p><a href="tel:+201023046001">+201095426880</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="item">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-envelope" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2zm13 2.383l-4.758 2.855L15 11.114v-5.73zm-.034 6.878L9.271 8.82 8 9.583 6.728 8.82l-5.694 3.44A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.739zM1 11.114l4.758-2.876L1 5.383v5.73z" />
                                </svg>
                                <div class="cont">
                                    <h6>Email</h6>
                                    <p><a href="mailto:Ieeebub@gmail.com">Ieeebub@gmail.com</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="item">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-geo-alt" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                </svg>
                                <div class="cont">
                                    <h6>Address</h6>
                                    <p>Benha University - Al Qalyubia - Egypt</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
