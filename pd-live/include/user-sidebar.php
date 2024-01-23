<div class="sidebar" id="userProfile">
    <div class="text-center p-4">
        <figure class="avatar avatar-state-success avatar-lg mb-4">
            <span class="avatar-title bg-info rounded-circle">BR</span>
        </figure>
        <h4 class="text-primary"><?php echo $_SESSION['user_name'];?></h4>
        <p class="text-muted d-flex align-items-center justify-content-center line-height-0 mb-0">
            <?php echo $_SESSION['user_type'];?>
        </p>
        <br>
        <p class="text-muted d-flex align-items-center justify-content-center line-height-0 mb-0">
            <a class="btn btn-light" href="logout.php">Logout</a>
        </p>
    </div>
   
	
</div>