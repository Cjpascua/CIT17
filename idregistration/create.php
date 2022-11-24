<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
// Check if POST data is not empty
if (!empty($_POST)) {
    // Post data not empty insert a new record
    // Set-up the variables that are going to be inserted, we must check if the POST variables exist if not we can default them to blank
    $id = isset($_POST['id']) && !empty($_POST['id']) && $_POST['id'] != 'auto' ? $_POST['id'] : NULL;
    // Check if POST variable "name" exists, if not default the value to blank, basically the same for all variables
    $id_number = isset($_POST['id_number']) ? $_POST['id_number'] : '';
    $first_name = isset($_POST['first_name']) ? $_POST['first_name'] : '';
    $last_name = isset($_POST['last_name']) ? $_POST['last_name'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $degree_program = isset($_POST['degree_program']) ? $_POST['degree_program'] : '';
    $created = isset($_POST['created']) ? $_POST['created'] : date('Y-m-d H:i:s');
    // Insert new record into the contacts table
    $stmt = $pdo->prepare('INSERT INTO contacts VALUES (?, ?, ?, ?, ?, ?, ?)');
    $stmt->execute([$id, $id_number, $first_name, $last_name, $email, $degree_program, $created]);
    // Output message
    $msg = 'Created Successfully!';
}
?>

<?=template_header('Create')?>

<div class="content update">
    <h2>Register an ID</h2>
    <form action="create.php" method="post">
        <label for="id">ID</label>
        <label for="id_number">ID Number</label>
        <input type="text" name="id" placeholder="26" value="auto" id="id">
        <input type="text" name="id_number" placeholder="20-3599-327" id="id_number">
        <label for="first_name">First Name</label>
        <label for="last_name">Last Name</label>
        <input type="text" name="first_name" placeholder="Camilo Joshua" id="first_name">
        <input type="text" name="last_name" placeholder="Pascua" id="last_name">
        <label for="email">Email</label>
        <label for="degree_program">Degree Program</label>
        <input type="text" name="email" placeholder="cjpascua345@gmail.com" id="email">
        <input type="text" name="degree_program" placeholder="BSIT" id="degree_program">
        <label for="created">Created</label>
        <input type="datetime-local" name="created" value="<?=date('Y-m-d\TH:i')?>" id="created">
        <input type="submit" value="Create">
    </form>
    <?php if ($msg): ?>
        <p><?=$msg?></p>
    <?php endif; ?>
</div>

<?=template_footer()?>
