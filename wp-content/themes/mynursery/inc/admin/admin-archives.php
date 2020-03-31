
/*/**
 * Register a custom menu page.
 */

function wpdocs_register_my_custom_menu_page(){

    add_menu_page(__( 'Archives', 'mynursery' ),
        'Admin Archives',
        'manage_options',
        'archivespageadmin',
        'archives_menu_page',
        'dashicons-portfolio',
        71);
}

add_action( 'admin_archives', 'wpdocs_register_my_custom_menu_page' );


/* Display a custom menu page*/

function archives_menu_page(){
    $urlBase = admin_url().'admin.php?page=archivespageadmin';
    */?><!--
    <ul>
        <li><a class="button" href="<?/*= $urlBase; */?>">Listing</a></li>
    </ul>
    <?php
/*    if(!empty($_GET['single']) && is_numeric($_GET['single'])) {
        $id = $_GET['single'];
        archives_admin_single($id,$urlBase);
    } else {
        archives_admin_listing($urlBase);
    }
}


function archives_admin_listing($urlBase)
{
    global $wpdb;
    $contacts = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}contact WHERE statut = '0' ORDER BY created_at DESC", OBJECT );

    */?>
    <div class="wrap">
        <table class="wp-list-table widefat fixed striped posts">
            <thead>
            <tr>
                <th>id</th>
                <th>sujet</th>
                <th>email</th>
                <th>message</th>
                <th>date</th>
            </tr>
            </thead>

            <tbody id="the-list">
            <?php /*foreach ($contacts as $contact) { */?>
            <table class="wp-list-table widefat fixed striped posts">
                <thead>
                <tr>
                    <td><?/*= $contact->id; */?></td>
                    <td><?/*= $contact->sujet; */?></td>
                    <td><?/*= $contact->email; */?></td>
                    <td><?/*= $contact->message; */?></td>
                    <td><?/*= date('d/m/Y',strtotime($contact->created_at)); */?></td>
                    <th>id</th>
                    <th>sujet</th>
                    <th>email</th>
                    <th>message</th>
                    <th>date</th>
                    <th>Action</th>
                </tr>
                <?php /*} */?>
                </tbody>
                </thead>
            </table>
        </table>
    </div>
    <?php
/*}
function archives_admin_single($id,$urlBase)
{
    global $wpdb;
    $contact = $wpdb->get_row( "SELECT * FROM {$wpdb->prefix}contact WHERE id = $id" , OBJECT );
    */?>
    <p>id: <?/*= $contact->id; */?></p>
    <p>sujet: <?/*= $contact->sujet; */?></p>
    <p>email: <?/*= $contact->email; */?></p>
    <p>Message: <?/*= $contact->message; */?></p>
    <p>Date: <?/*= date('d/m/Y',strtotime($contact->created_at)); */?></p>
    --><?php
/*}*/
