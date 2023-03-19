<?php 
    if(isset($_GET['c']) || isset($_GET['o']) || isset($_GET['e'])|| isset($_GET['s']) ) {
        $s_category = $_GET['c'];
        $s_office = $_GET['o'];
        $s_employee = $_GET['e'];
        $s_search = $_GET['s']."%";
        $query = mysqli_query($con,"SELECT * FROM inv_ict WHERE category_id = $s_category OR employee_id = '".$s_employee."';");
        $view = mysqli_fetch_array($query);
    }
    // $result = mysqli_query($con,"SELECT * FROM inv_ict WHERE category_id = 4 OR employee_id = 79 OR item_name LIKE 'laptop%';");
?>

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
                                        </option>
                                        <?php
                                        $result = mysqli_query($con,"SELECT * FROM category;");
                                        $rowCount = mysqli_num_rows($result);
                                        if($rowCount > 0){
                                        while($row = mysqli_fetch_assoc($result)){ ?>
                                        <option value="<?php echo $row['category_id'];?>"
                                            <?php if($row['category_id'] == $view['category_id']){echo 'selected';} ?>>
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
                                <option selected>Choose Employee...
                                        </option>
                                        <?php
                                                $result = mysqli_query($con,"SELECT * FROM employee where division_id != 0;");
                                                $rowCount = mysqli_num_rows($result);
                                                if($rowCount > 0){
                                                    while($row = mysqli_fetch_assoc($result)){ ?>
                                        <option value="<?php echo $row['employee_id'];?>"
                                            <?php if($row['employee_id'] == $view['employee_id']){echo 'selected';} ?>>
                                            <?php echo $row['firstname'] ." ".$row['lastname']; ?>
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
                                placeholder="Type your keywords here" name="search" value="">
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
             $rowCount = mysqli_num_rows($result);

        ?>
        <div class="row mt-3">
            <div class="col-md-10 offset-md-1">
                <div class="list-group">
                    <?php 
                        if ($rowCount > 0 ) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $id=$row['inv_id'];

                    ?>
                    <div class="list-group-item">
                        <div class="row">
                            <div class="col px-4">
                                <div>
                                    <div class="float-right"><?php echo $row['created_at']; ?></div>
                                    <h3><?php echo $row['item_name']; ?></h3>
                                    <p class="mb-0">
                                        <?php echo $row['specs']; ?>
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
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Select2 -->