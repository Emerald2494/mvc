<?php if(isset($_SESSION['error'])) { ?>
    <p class="text-danger my-3 font-weight-bold">
        <?php echo $_SESSION['error'];
        unsetMessage('error');
        ?>
    </p>
<?php } ?>

<?php if(isset($_SESSION['success'])) { ?>
    <p class="alert text-center alert-primary my-3 font-weight-bold">
        <?php echo $_SESSION['success'];
        unsetMessage('success');
        ?>
    </p>
<?php } ?>