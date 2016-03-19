<?  
    require '../../../db.php';
?>
<!DOCTYPE html>
    <?php
    if(isset($_POST{'submit'}))
	{
        $name = $_POST{'name'};
        $email = $_POST{'email'};
        $message = $_POST{'message'};
        
        $name = mysqli_real_escape_string($cnxn, $name);
        $email = mysqli_real_escape_string($cnxn, $email);
        $message = mysqli_real_escape_string($cnxn, $message);
        
        //Write to Database
        $sql = "INSERT INTO contact (name, email, message)
                VALUES ('$name', '$email', '$message')";
        @mysqli_query($cnxn, $sql)
            or die ("Error executing query: $sql");
    }
    ?>
    <!-- Contact Section -->
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Contact Us</h2>
                    <h3 class="section-subheading text-muted">Type that message down below</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form method="post" name="sentMessage" id="contactForm" action="" novalidate>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control" placeholder="Your Name *" id="name" value="<?php echo $_POST{'name'}; ?>" required data-validation-required-message="Please enter your name.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" placeholder="Your Email *" id="email" value="<?php echo $_POST{'email'}; ?>" required data-validation-required-message="Please enter your email address.">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <textarea class="form-control" name="message" placeholder="Your Message *" id="message" value="<?php echo $_POST{'message'}; ?>" required data-validation-required-message="Please enter a message."></textarea>
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-lg-12 text-center">
                                <div id="success"></div>
                                <input type="submit" name="submit" id="submit" class="btn btn-xl">Send Message</input>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>