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
        <form action="enhanced-results.html">
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
                                <select class="select2 form-control" id="office" name="office" required>
                                    <option value="" class="text-muted" selected>Choose Office...</option>
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
                                <select class="select2 form-control" id="office" name="office" required>
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
                                <select class="select2 form-control" id="end_user" name="end_user" required>
                                    <option value="" class="text-muted" selected>Choose Employee...</option>
                                    <?php
                                                $result = mysqli_query($con,"SELECT * FROM employee WHERE division_id != 0;");
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
                                placeholder="Type your keywords here" value="">
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
        <div class="row mt-3">
            <div class="col-md-10 offset-md-1">
                <div class="list-group">
                    <div class="list-group-item">
                        <div class="row">
                            <div class="col px-4">
                                <div>
                                    <div class="float-right">2021-04-20 04:04pm</div>
                                    <h3>Lorem ipsum dolor sit amet</h3>
                                    <p class="mb-0">consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
                                        Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes,
                                        nascetur ridiculus mus.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="list-group-item">
                        <div class="row">
                            <div class="col-auto">
                                <img class="img-fluid" src="../../dist/img/photo1.png" alt="Photo"
                                    style="max-height: 160px;">
                            </div>
                            <div class="col px-4">
                                <div>
                                    <div class="float-right">2021-04-20 10:14pm</div>
                                    <h3>Lorem ipsum dolor sit amet</h3>
                                    <p class="mb-0">consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
                                        Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes,
                                        nascetur ridiculus mus.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="list-group-item">
                        <div class="row">
                            <div class="col-auto">
                                <iframe width="240" height="160"
                                    src="https://www.youtube.com/embed/WEkSYw3o5is?controls=0"
                                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                    class="border-0" allowfullscreen></iframe>
                            </div>
                            <div class="col px-4">
                                <div>
                                    <div class="float-right">2021-04-20 11:54pm</div>
                                    <h3>Lorem ipsum dolor sit amet</h3>
                                    <p class="mb-0">consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
                                        Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes,
                                        nascetur ridiculus mus.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Select2 -->