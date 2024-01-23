<div class="sidebar" id="userProfile">
    <div class="text-center p-4">
        <figure class="avatar avatar-state-success avatar-lg mb-4">
            <img src="assets/media/image/avatar.jpg" class="rounded-circle" alt="image">
        </figure>
        <h4 class="text-primary"><?php echo $_SESSION['user_name'];?></h4>
        <p class="text-muted d-flex align-items-center justify-content-center line-height-0 mb-0">
            <?php echo $_SESSION['user_type'];?>
        </p>
    </div>
   
	
</div>