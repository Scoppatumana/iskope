<?php
    if(isset($_SESSION['message'])){
?>
    <div class="message <?php echo $_SESSION['type']; ?>">
        <i class="fa fa-check-circle message-icon fa-lg"></i>
        <span> <?php echo $_SESSION['message']; ?> </span>
    </div>
<?php
    unset($_SESSION['message'], $_SESSION['type']);
    }
?>