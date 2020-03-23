<?php
/*
Template Name: Contact
*/
get_header();
?>


    <div class="container">
        <form action="" method="post" class="form-style">
            <h2 class="text-center pt-4">Contactez nous</h2>
            <div class="form-row">
                <div class="col-md-8 mx-auto mt-3">
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" id="name">
                        <label for="name">Nom</label>
                        <span class="input-highlight"></span>
                    </div>
                    <div class="form-group">
                        <i class="glyphicon glyphicon-user"></i>
                        <input type="email" class="form-control" name="email" id="email">
                        <label for="email">Email</label>
                        <span class="input-highlight"></span>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="subject" id="subject">
                        <label for="subject">Sujet</label>
                        <span class="input-highlight"></span>
                    </div>
                    <!--                    <div class="col-md-6">-->
                    <div class="form-group">
                        <textarea name="message" id="message" class="form-control"></textarea>
                        <label for="message">Message</label>
                        <span class="input-highlight"></span>
                    </div>
                    <!--                    </div>-->
                </div>

            </div>
            <div class="col-md-5 mx-auto mt-5">
                <input type="submit" class="btn btn-lg btn-danger btn-block">
            </div>
        </form>
    </div>

<?php get_footer();
