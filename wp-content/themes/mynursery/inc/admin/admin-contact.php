<?php
/**
 * Register a custom menu page.
 */

function wpdocs_register_my_custom_menu_page_contact(){

    add_menu_page(__( 'Contact', 'mynursery' ),
        'Admin Contact',
        'manage_options',
        'contactpageadmin',
        'contact_menu_page',
        'dashicons-phone',
        70);
}
add_action('admin_menu', 'wpdocs_register_my_custom_menu_page_contact');

/* Display a custom menu page*/

function contact_menu_page(){
    $urlBase = admin_url().'admin.php?page=contactpageadmin';
    ?>
    <ul>
        <li>
            <a class="button" href="<?= $urlBase; ?>">Listing</a>
        </li>
    </ul>
    <?php
    if(!empty($_GET['single']) && is_numeric($_GET['single'])) {
        $id = $_GET['single'];
        contact_admin_single($id,$urlBase);
    } elseif(!empty($_GET['archive']) && is_numeric($_GET['archive'])) {
        $id = $_GET['archive'];
        archive_admin_single($id,$urlBase);
    } else {
        contact_admin_listing($urlBase);
    }

}



function contact_admin_listing($urlBase)
{
global $wpdb;
$contacts = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}contact WHERE statut = '0' ORDER BY created_at DESC", OBJECT );

?>
    <div class="wrap">
        <table class="wp-list-table widefat fixed striped posts">
            <thead>
            <caption>Liste des messages</caption>
            <tr>
                <th>id</th>
                <th>Sujet</th>
                <th>Email</th>
                <th>Message</th>
                <th>Date</th>
                <th>Lire</th>
                <th>Archiver</th>
            </tr>
            </thead>

            <tbody id="the-list">
            <?php foreach ($contacts as $contact) { ?>
            <table class="wp-list-table widefat fixed striped posts">
                <thead>
                <tr>
                    <td><?= $contact->id; ?></td>
                    <td><?= $contact->sujet; ?></td>
                    <td><?= $contact->email; ?></td>
                    <td><?= $contact->message; ?></td>
                    <td><?= date('d/m/Y',strtotime($contact->created_at)); ?></td>
                    <td>
                        <a href="<?= $urlBase; ?>&single=<?= $contact->id; ?>">Lire</a>
                    </td>
                    <td>
                        <a href="<?= $urlBase ?>&archive=<?= $contact->id; ?>">Archiver</a>
                    </td>
                </tr>
                <?php } ?>
                </tbody>
                </thead>
            </table>
        </table>
    </div>
    <?php
}
function contact_admin_single($id,$urlBase)
{
    global $wpdb;
    $contact = $wpdb->get_row( "SELECT * FROM {$wpdb->prefix}contact WHERE id = $id" , OBJECT );
    ?>
    <p>id: <?= $contact->id; ?></p>
    <p>sujet: <?= $contact->sujet; ?></p>
    <p>email: <?= $contact->email; ?></p>
    <p>Message: <?= $contact->message; ?></p>
    <p>Date: <?= date('d/m/Y',strtotime($contact->created_at)); ?></p>
    <?php
}

function archive_admin_single($id,$urlBase)
{
    global $wpdb;
    $archive = $wpdb->update(
        'nurs_contact',
        array(
            'statut' => '1',
            'modified_at' => current_time('mysql'),
        ),
        array(
            'id' => $id,
        ),
        array(
            '%d',
        ),
        array('%d', '%s')
    );

   /* header("Location:'. $urlBase . '&noheader=true");*/
    /*la redirection, quelque soit la manière dont elle est écrite retourne l'erreur suivante :
    Warning: Cannot modify header information - headers already sent by (output started at C:\xampp\htdocs\mynursery\wp-includes\formatting.php:5699)
    in C:\xampp\htdocs\mynursery\wp-content\themes\mynursery\inc\admin\admin-contact.php on line 120
    */
    ?>
    <script type="text/javascript">
        window.location = 'http://localhost/mynursery/wp-admin/admin.php?page=contactpageadmin';
    </script>

   <!-- <h2>Votre message a bien été archivé, cliquez sur listing pour retourner aux messages</h2>-->
    <?php
}
    ?>


