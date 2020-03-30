<?php
global $wpdb;

/*
Template Name: Contact
*/

use inc\service\Validation;
use inc\service\Form;

$errors = array();
$success = false;

if (!empty($_POST['submitted'])) {

    $name = trim(strip_tags(stripslashes($_POST['nom'])));
    $email = trim(strip_tags(stripslashes($_POST['email'])));
    $subject = trim(strip_tags(stripslashes($_POST['sujet'])));
    $message = trim(strip_tags(stripslashes($_POST['message'])));

    $v = new Validation();
    $errors['nom'] = $v->textValid($name, 'nom', 3, 100);
    $errors['email'] = $v->emailValid($email);
    $errors['sujet'] = $v->textValid($subject, 'sujet', 3, 100);
    $errors['message'] = $v->textValid($message, 'message', 3, 500);

    if ($v->IsValid($errors)) {

        $wpdb->insert(
            'nurs_contact',
            array(
                'nom' => $name,
                'email' => $email,
                'sujet' => $subject,
                'message' => $message,
                'created_at' => current_time('mysql'),
            ),
            array(
                '%s', '%s', '%s', '%s',
            )
        );
        $success = true;

    }

}
$form = new Form($errors);


get_header();
?>


    <div class="container">
        <form action="" method="post" class="form-style">
            <h2 class="text-center pt-4">Contactez-nous</h2>
            <div class="form-row">
                <div class="col-md-8 mx-auto mt-3">
                    <div class="form-group">
                        <input type="text" class="form-control" name="nom" id="nom" placeholder="Votre nom"
                               value="<?php if (!empty($_POST['nom'])) echo $_POST['nom']; ?>">
                        <span class="input-highlight"></span>
                        <?= $form->error('nom') ?>
                    </div>
                    <p class="errors"></p>

                    <div class="form-group">
                        <input type="email" class="form-control" name="email" id="email"
                               placeholder="john.doe@example.com"
                               value="<?php if (!empty($_POST['email'])) echo $_POST['email']; ?>">
                        <span class="input-highlight"></span>
                        <?= $form->error('email') ?>
                    </div>
                    <p class="errors"></p>

                    <div class="form-group">
                        <input type="text" class="form-control" name="sujet" id="subject"
                               placeholder="Sujet de votre message"
                               value="<?php if (!empty($_POST['sujet'])) echo $_POST['sujet']; ?>">
                        <span class="input-highlight"></span>
                        <?= $form->error('sujet') ?>
                    </div>
                    <p class="errors"></p>

                    <!--                    <div class="col-md-6">-->
                    <div class="form-group">
                        <textarea name="message" id="message" class="form-control"
                                  placeholder="Votre message"><?php if (!empty($_POST['message'])) echo $_POST['message']; ?></textarea>
                        <span class="input-highlight"></span>
                        <?= $form->error('message') ?>
                    </div>
                    <p class="errors"></p>
                    <!--                    </div>-->
                </div>

            </div>
            <div class="col-md-5 mx-auto mt-5 mb-5">
                <input type="submit" name="submitted" class="btn btn-lg btn-success btn-block">
            </div>
        </form>
    </div>

<?php get_footer();
