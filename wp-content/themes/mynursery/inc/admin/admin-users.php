<?php
/**
 * Register a custom menu page.
 */

function wpdocs_register_my_custom_menu_page_users(){

    add_menu_page(__( 'Users', 'mynursery' ),
        'Admin Utilisateurs',
        'manage_options',
        'userspageadmin',
        'users_menu_page',
        'dashicons-buddicons-buddypress-logo',
        70);
}

add_action( 'admin_menu', 'wpdocs_register_my_custom_menu_page_users' );


/* Display a custom menu page*/

function users_menu_page()
{
    $urlBase = admin_url().'admin.php?page=userspageadmin';
    ?>
    <ul>
        <li><a class="button" href="<?= $urlBase; ?>">Listing</a></li>
    </ul>
    <?php
    if(!empty($_GET['single']) && is_numeric($_GET['single'])) {
        $id = $_GET['single'];
        users_admin_single($id,$urlBase);
    } else {
        users_admin_listing($urlBase);
    }
}


function users_admin_listing($urlBase)
{
    global $wpdb;
    $users = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}users WHERE user_status ='0' ORDER BY user_registered DESC", OBJECT );

    ?>
    <div class="wrap">
        <table class="wp-list-table widefat fixed striped posts">
            <thead>
            <tr>
                <th>id</th>
                <th>nom</th>
                <th>email</th>
                <th>date d'inscription</th>
                <th>statut</th>
            </tr>
            </thead>

            <tbody id="the-list">
            <?php foreach ($users as $user) { ?>
            <table class="wp-list-table widefat fixed striped posts">
                <thead>
                <tr>
                    <td><?= $user->ID; ?></td>
                    <td><?= $user->user_nicename; ?></td>
                    <td><?= $user->user_email; ?></td>
                    <td><?= date('d/m/Y',strtotime($user->user_registered)); ?></td>
                    <td><?= $user->user_status ?></td>
                </tr>
                <?php } ?>
                </tbody>
                </thead>
            </table>
        </table>
    </div>
    <?php
}
function users_admin_single($id,$urlBase)
{
    global $wpdb;
    $user = $wpdb->get_row( "SELECT * FROM {$wpdb->prefix}contact WHERE id = $id" , OBJECT );
    ?>
    <p>id: <?= $user->id; ?></p>
    <p>sujet: <?= $user>sujet; ?></p>
    <p>email: <?= $user->email; ?></p>
    <p>Message: <?= $user->message; ?></p>
    <p>Date: <?= date('d/m/Y',strtotime($user->created_at)); ?></p>
    <?php
}


