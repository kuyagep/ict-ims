<!-- Add Modal -->
<!-- Modal -->
<div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Logout</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5>Are you sure you want to logout?</h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <form action="action/allcode.php" method="post">
                    <button type="submit" name="logout" class="btn btn-danger">Proceed</button>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Add Purchase Order -->
<div class="modal fade" id="add-purchase-order" data-backdrop="static" data-keyboard="true" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form class="form-horizontal" action="action/admin/add-inventory.php" method="POST">
                <div class="modal-header">
                    <h4 class="modal-title">Add Inventory</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group row">
                        <label for="category" class="col-sm-3 col-form-label"> Item Classification</label>
                        <div class="col-sm-9">
                            <select class="custom-select" id="category" name="category" required>
                                <option value="" class="text-muted" selected>Choose Classification...</option>
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
                    <div class="form-group row">
                        <label for="end_user" class="col-sm-3 col-form-label">End User</label>
                        <div class="col-sm-9">
                            <select class="custom-select" id="end_user" name="end_user" required>
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
                    <div class="form-group row">
                        <label for="item_name" class="col-sm-3 col-form-label">Item Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="item_name" name="item_name"
                                placeholder="Enter Item Name" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="specs" class="col-sm-3 col-form-label">Specifications</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" name="specs" placeholder="Enter Specifications" id="specs"
                                required></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="quantity" class="col-sm-3 col-form-label">Item Quantity</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="quantity" name="quantity" placeholder="Enter Quantity"
                            required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="serial_no" class="col-sm-3 col-form-label">Device Serial</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="serial_no" name="serial_no"
                                placeholder="Enter Serial Number">
                        </div>
                    </div>
                        <div class="form-group row">
                        <label for="serial_no" class="col-sm-3 col-form-label">Unit Price</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="price" name="price"
                                placeholder="Enter Amount">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="date_acquired" class="col-sm-3 col-form-label">Date Acquired</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" id="date_acquired" name="date_acquired">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="date_inspection" class="col-sm-3 col-form-label">Date of Inspection</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" id="date_inspection" name="date_inspection">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inspected_by" class="col-sm-3 col-form-label">Inspected by</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="inspected_by" name="inspected_by"
                                placeholder="Inspected By">
                        </div>
                    </div>
                    <div class="modal-footer justify-content-right">
                        <button type="button" class="btn bg-gradient-danger " data-dismiss="modal">Close</button>
                        <button type="submit" name="add-purchase" class="btn bg-gradient-primary ">Save &
                            Record</button>
                    </div>

            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
