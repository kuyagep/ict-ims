<!-- Content Header -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Search</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Search</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- End Content Header -->
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <form action="action/admin/search_result.php" method="post">
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <div class="row">
                        <!-- <div class="col-6">
                                <div class="form-group">
                                    <label>Result Type:</label>
                                    <select class="form-control" multiple="multiple" data-placeholder="Any" style="width: 100%;">
                                        <option>Text only</option>
                                        <option>Images</option>
                                        <option>Video</option>
                                    </select>
                                </div>
                            </div> -->
                        <div class="col-3">
                            <div class="form-group">
                                <label>Item Category:</label>
                                <select class="select2 form-control" id="category" name="category">
                                    <option selected>Choose Classification...
                                    <option value="" class="text-muted" selected>Choose Category...</option>
                                    <?php
                                                $result = mysqli_query($con,"SELECT * FROM category;");
                                                $rowCount = mysqli_num_rows($result);
                                                if($rowCount > 0){
                                                    while($row = mysqli_fetch_assoc($result)){ ?>
                                    <option value="<?php echo $row['category_id']; ?>">
                                        <?php echo $row['category_name']; ?>
                                    </option>
                                    <?php   }
                                                }
                                            ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label>Office:</label>
                                <select class="select2 form-control" id="office" name="office">
                                    <option value="" class="text-muted" selected>Choose Office...</option>
                                    <?php
                                                $result = mysqli_query($con,"SELECT * FROM office;");
                                                $rowCount = mysqli_num_rows($result);
                                                if($rowCount > 0){
                                                    while($row = mysqli_fetch_assoc($result)){ ?>
                                    <option value="<?php echo $row['office_id']; ?>">
                                        <?php echo $row['office_name']; ?>
                                    </option>
                                    <?php   }
                                                }
                                            ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label>End User:</label>
                                <select class="select2 form-control" id="end_user" name="end_user">
                                    <option value="" class="text-muted" selected>Choose Employee...</option>
                                    <?php
                                                $result = mysqli_query($con,"SELECT * FROM employee where division_id !=0;");
                                                $rowCount = mysqli_num_rows($result);
                                                if($rowCount > 0){
                                                    while($row = mysqli_fetch_assoc($result)){ ?>
                                    <option value="<?php echo $row['employee_id']; ?>">
                                        <?php echo $row['firstname']." ".$row['lastname']; ?>
                                    </option>
                                    <?php   }
                                                }
                                            ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label>Sort Order:</label>
                                <select class="select2 form-control" style="width: 100%;">
                                    <option selected>ASC</option>
                                    <option>DESC</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group input-group-lg">
                            <input type="search" class="form-control form-control-lg"
                                placeholder="Type your keywords here" name="search"
                                value="<?php if(isset($_GET['s'])){ echo $_GET['s']; } ?>">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-lg btn-default">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <?php 
            // if(isset($_GET['c']) || isset($_GET['e']) || isset($_GET['s'])  ) {
            // $s_category = $_GET['c'];
            // $s_office = $_GET['o'];
            // $s_employee = $_GET['e'];
            // $s_search = $_GET['s'];
            // $query = mysqli_query($con,"SELECT * FROM inv_ict WHERE CONCAT(item_name,specs) LIKE '%$s_search%' OR category_id = $s_category OR employee_id = $s_employee; ");
            // }
            if(!empty($_GET['s'])){

            
            // if (isset($_GET['s']) || isset($_GET['c']) || isset($_GET['e'])) {
            //     $s_category = !empty($_GET['c']);
            //     // $s_office = $_GET['o'];
            //     $s_employee = !empty($_GET['e']);
            //     $s_search = !empty($_GET['e']);
                    $s_search = $_GET['s'];
                $query = mysqli_query($con,"SELECT `inv_ict`.`inv_id`,`inv_ict`.`inv_no`, `office`.`office_name`,`employee`.`employee_id`, `employee`.`firstname`, `employee`.`lastname`, 
                `inv_ict`.`item_name`, `inv_ict`.`specs`, `inv_ict`.`amount`, `inv_ict`.`serial_no`, `inv_ict`.`date_acquired`, `category`.`category_name`, 
                `inv_ict`.`date_inspection`, `inv_ict`.`inspected_by`, `inv_ict`.`created_at` FROM `inv_ict` left JOIN `employee` ON `employee`.`employee_id`=`inv_ict`.`employee_id` INNER JOIN `office` ON `employee`.`office_id`=`office`.`office_id` 
                INNER JOIN category ON `category`.`category_id`=`inv_ict`.`category_id` WHERE `item_name` LIKE '%$s_search%' OR `firstname` LIKE '%$s_search%' ");
                $rowCount = mysqli_num_rows($query);
        ?>
        <div class="row mt-3">
            <div class="col-md-10 offset-md-1">
                <div class="list-group">
                    <?php 
                        if ($rowCount > 0 ) {
                            while ($row = mysqli_fetch_assoc($query)) {
                                $id=$row['inv_id'];
                    ?>
                    
                        <div class="list-group-item">
                            <div class="row">
                                <div class="col px-4">
                                    <div>
                                        <div class="float-right"><?php echo $row['created_at']; ?></div>
                                        <a href=""><h3><?php echo $row['item_name']; ?></h3></a>
                                        <p class="mb-0">
                                            <?php echo $row['specs']; ?> <br>
                                            <a href="index.php?page=employee-view&&id=<?=$row['employee_id']?>"> <?php echo $row['firstname']." ".$row['lastname'] ." > ".$row['office_name']; ?> </a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                    <?php
                            }
                        }else{
                            echo "<h3>No Result Found!</h3>";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Select2 -->