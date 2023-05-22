<?php
$view = mysqli_fetch_array($query);
?>
<section>
<!-- style=" background-color: #eee; -->
    <div class="container py-3">
        <form action="action/admin/update-profile.php" method="POST" enctype="multipart/form-data">
            <div class="row-right">
                    <!-- Widget: user widget style 1 -->
                    <div class="card-widget widget-user ">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <?php 
                                if($view['picture']==""){
                                    $img = "default2-1-1.jpg";
                                }else{
                                    $img = $view['picture'];
                                }
                            ?>
                        
                    </div>
                    <!-- Profiles -->
                    <div class="card card-primary card-outline"> 
                        <!-- style="background: url('dist/img/photo1.png') center center;" -->
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle"
                                    src="dist/img/users/<?php echo $img; ?>" alt="User profile picture">
                            </div>

                            <h3 class="profile-username text-center">
                                <?php echo $view['firstname']." ".$view['lastname']; ?></h3>

                            <p class="text-muted text-center"><?php
                                    $result = mysqli_query($con,"SELECT * FROM position;");
                                    $rowCount = mysqli_num_rows($result);
                                    if($rowCount > 0){
                                        while($row = mysqli_fetch_assoc($result)){ ?>

                                <?php if($row['position_id'] == $view['position_id']){echo $row['position_name'];} ?>
                                <?php   }
                                    }
                                ?></p>
                            <button href="#" name="updateEmployee" class="btn btn-primary btn-block"><b>Update
                                    Profile</b></button>
                        </div>
                        <!-- /.card-body -->
                    </div>

                    <!-- /.widget-user -->
                </div>