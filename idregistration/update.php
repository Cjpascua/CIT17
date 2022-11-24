<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
// Check if the contact id exists, for example update.php?id=1 will get the contact with the id of 1
if (isset($_GET['id'])) {
    if (!empty($_POST)) {
        // This part is similar to the create.php, but instead we update a record and not insert
        $id = isset($_POST['id']) ? $_POST['id'] : NULL;
        $id_number = isset($_POST['id_number']) ? $_POST['id_number'] : '';
        $first_name = isset($_POST['first_name']) ? $_POST['first_name'] : '';
        $last_name = isset($_POST['last_name']) ? $_POST['last_name'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $degree_program = isset($_POST['degree_program']) ? $_POST['degree_program'] : '';
        $created = isset($_POST['created']) ? $_POST['created'] : date('Y-m-d H:i:s');
        // Update the record
        $stmt = $pdo->prepare('UPDATE contacts SET id_number = ?, name = ?, first_name = ?, last_name = ?, email = ?, degree_program = ?, created = ? WHERE id = ?');
        $stmt->execute([$id, $id_number, $first_name, $last_name, $email, $degree_program,$created, $_GET['id']]);
        $msg = 'Updated Successfully!';
    }
    // Get the contact from the contacts table
    $stmt = $pdo->prepare('SELECT * FROM contacts WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    $contact = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$contact) {
        exit('Contact doesn\'t exist with that ID!');
    }
} else {
    exit('No ID specified!');
}
?>

<?=template_header('Read')?>

<div class="content update">
    <h2>Update Contact #<?=$contact['id']?></h2>
    <form action="update.php?id=<?=$contact['id']?>" method="post">
        <label for="id">ID</label>
        <label for="id_number">ID Number</label>
        <input type="text" name="id" placeholder="1" value="<?=$contact['id']?>" id="id">
        <input type="text" name="id_number" placeholder="20-3599-327" value="<?=$contact['id_number']?>" id="id_number">
        <label for="first_name">First Name</label>
        <label for="last_name">Last Name</label>
        <input type="text" name="first_name" placeholder="Camilo Joshua" value="<?=$contact['first_name']?>" id="first_name">
        <input type="text" name="last_name" placeholder="Pascua" value="<?=$contact['last_name']?>" id="last_name">
        <label for="email">Email</label>
        <label for="degree_program">Degree Program</label>
        <label for="created">Created</label>
        <input type="text" name="email" placeholder="cjapscua345@gmail.com" value="<?=$contact['email']?>" id="email">
        <input type="text" name="degree_program" placeholder="BSIT" value="<?=$contact['degree_program']?>" id="degree_program">
        <input type="datetime-local" name="created" value="<?=date('Y-m-d\TH:i', strtotime($contact['created']))?>" id="created">
        <input type="submit" value="Update">
    </form>
    <?php if ($msg): ?>
        <p><?=$msg?></p>
    <?php endif; ?>
</div>

<?=template_footer()?>
