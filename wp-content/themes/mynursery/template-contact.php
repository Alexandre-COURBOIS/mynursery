<?php
/*
Template Name: Contact
*/
get_header();
?>


    <div class="container">
        <form action="" method="post" class="form-style">
            <h2 class="text-center pt-4">Contactez-nous</h2>
            <div class="form-row">
                <div class="col-md-8 mx-auto mt-3">
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" id="name" placeholder="Votre nom">
                        <span class="input-highlight"></span>
                    </div>
                    <p class="errors"></p>

                    <div class="form-group">
                        <input type="email" class="form-control" name="email" id="email" placeholder="john.doe@example.com">
                        <span class="input-highlight"></span>
                    </div>
                    <p class="errors"></p>

                    <div class="form-group">
                        <input type="text" class="form-control" name="subject" id="subject" placeholder="Sujet de votre message">
                        <span class="input-highlight"></span>
                    </div>
                    <p class="errors"></p>

                    <!--                    <div class="col-md-6">-->
                    <div class="form-group">
                        <textarea name="message" id="message" class="form-control" placeholder="Votre message"></textarea>
                        <span class="input-highlight"></span>
                    </div>
                    <p class="errors"></p>
                    <!--                    </div>-->
                </div>

            </div>
            <div class="col-md-5 mx-auto mt-5 mb-5">
                <input type="submit" class="btn btn-lg btn-success btn-block">
            </div>
        </form>
    </div>

<?php get_footer();
