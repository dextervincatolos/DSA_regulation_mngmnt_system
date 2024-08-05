<?php
    $pageTitle = 'Policy Management';
    include('sessions.php');
    include('includes/header.php');
    include('includes/navbar.php');
?>

    <!-- Main Sidebar Container -->
    <?php include('includes/sidebar.php'); ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <?php include('includes/breadcrumb.php'); ?>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            
            <div class="card">
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="col-lg-12 col-md-12 col-12 pb-5  <?php echo $_SESSION['role'] == 'DSA-User' ? 'hiddenTouser' : ''; ?>">
                        <a class="btn btn-success float-right" data-toggle="modal" data-target="#newPolicy">
                            <i class="fa fa-balance-scale"></i>
                        </a>
                        <!-- add policy modal -->
                        <div class="modal fade" id="newPolicy" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header btn-success">
                                        <h5 class="modal-title text-bold" id="exampleModalLabel"> <i class="fa fa-balance-scale"></i> Create new policy</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                    <form action="script/newPolicy.php" method="POST">
                                        <div class="modal-body">

                                            <div class="form-group" >
                                                <label> 
                                                    Policy Title
                                                    <span class="text-bold text-sm text-danger">*</span> 
                                                </label>
                                                <input type="text" name="policy_title" id="policy_title" class="form-control" required placeholder="Policy Title" required>
                                            </div>

                                            <div class="form-group">
                                                <label>  
                                                    Policy Description  
                                                    <span class="text-bold text-sm text-danger">*</span> 
                                                </label>
                                                <textarea class="form-control" name="policy_description" required></textarea>
                                            </div>

                                            <hr>
                                            <label> Policy Sanction(s) <span class="text-bold text-sm text-danger">*</span></label>
                                            <div id="add_sanction">
                                                <div class="row">
                                                    <div class="form-group col-md-11">
                                                        <input type="text" name="policy_sanction[]" class="form-control" required placeholder="Write sanction here">
                                                    </div>
                                                    <div class="form-group col-md-1">
                                                        <button class="form-control btn btn-success btn-sm create_new_sanction"><i class="fa fa-plus"></i></button>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                            <button type="submit" name="save_policy" class="btn btn-success">Save</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                        <!-- add policy modal -->
                    </div>

                    <div class="col-md-12">
                        <div class="">
                            <div class="card-body">
                                
                                <div id="accordion">
                                    <?php
                                    $query_policies = "SELECT * FROM schoolpolicy_tbl";
                                    $res = mysqli_query($connection, $query_policies);

                                    if(mysqli_num_rows($res) > 0) {
                                        while($row = mysqli_fetch_assoc($res)) { ?>

                                            <div class="card">
                                                
                                                <h4 class="card-title w-100">
                                                    <a class="d-block w-100" data-toggle="collapse" href="#policy_<?php echo $row['spID']; ?>">
                                                        <blockquote class="quote-warning">
                                                            <p class="text-bold text-success"><?php echo $row['policy_title']; ?></p> 
                                                            <a class="btn btn-warning float-right  <?php echo $_SESSION['role'] == 'DSA-User' ? 'hiddenTouser' : ''; ?>"  data-toggle="modal" data-target="#editPolicy_<?php echo $row['spID']; ?>" style="margin-top: -30px;"  >
                                                                <i class="fa fa-edit"></i>
                                                            </a>

                                                            <!-- edit policy modal -->
                                                            <div class="modal fade" id="editPolicy_<?php echo $row['spID']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog modal-lg" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title text-bold" id="exampleModalLabel"> <i class="fa fa-balance-scale"></i> Update policy <?php echo $row['spID']; ?></h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>

                                                                        <form action="script/updatePolicy.php" method="POST">
                                                                            <div class="modal-body">

                                                                                <div class="form-group">
                                                                                    <label>
                                                                                        Policy Title
                                                                                        <span class="text-bold text-sm text-danger">*</span>
                                                                                    </label>
                                                                                    <input type="hidden" name="policyID" id="policyID" class="form-control" value="<?php echo $row['spID']; ?>" required readonly>
                                                                                    <input type="text" name="policy_title" id="policy_title" class="form-control" value="<?php echo $row['policy_title']; ?>" required>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label>
                                                                                        Policy Description
                                                                                        <span class="text-bold text-sm text-danger">*</span>
                                                                                    </label>
                                                                                    <textarea class="form-control" name="policy_description" required><?php echo $row['policy_desc']; ?></textarea>
                                                                                </div>

                                                                                <hr>
                                                                                <label> Policy Sanction(s) <span class="text-bold text-sm text-danger">*</span></label>
                                                                                <div id="update_sanction_<?php echo $row['spID']; ?>">
                                                                                    <div class="form-group">
                                                                                        <?php
                                                                                        $getSanction = "SELECT * FROM sanction_tbl WHERE sanction_tbl.spID =" . $row['spID'];
                                                                                        $sanction = mysqli_query($connection, $getSanction);

                                                                                        if (mysqli_num_rows($sanction) > 0) {
                                                                                            while ($sanc = mysqli_fetch_assoc($sanction)) { ?>
                                                                                                <input type="hidden" name="sanction_id[]" value="<?php echo $sanc['sanctionID']; ?>">
                                                                                                <input type="text" name="policy_sanction[<?php echo $sanc['sanctionID']; ?>]" class="form-control" value="<?php echo $sanc['sanction']; ?>" required>
                                                                                                <br>
                                                                                            <?php }
                                                                                        } ?>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <button type="button" class="form-control btn btn-success btn-sm add_sanction" data-policy-id="<?php echo $row['spID']; ?>"><i class="fa fa-plus"></i> Add sanction</button>
                                                                                </div>
                                                                            </div>

                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                                                <button type="submit" name="save_policy" class="btn btn-success">Save</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- edit policy modal -->


                                                            <small class="text-dark"><cite title="Description"><?php echo $row['policy_desc']; ?></cite></small>
                                                        </blockquote>
                                                    </a>
                                                    
                                                </h4>
                                                <div id="policy_<?php echo $row['spID']; ?>" class="collapse" data-parent="#accordion">
                                                    <div class="card-body">
                                                        <h6 class="text-bold">Policy Sanctions:</h6>
                                                        <ol>
                                                            <?php
                                                            $getSanction = "SELECT * FROM sanction_tbl WHERE sanction_tbl.spID =".$row['spID'];
                                                            $sanction = mysqli_query($connection, $getSanction);
                                                            
                                                            if(mysqli_num_rows($sanction) > 0) {
                                                                while($sanc = mysqli_fetch_assoc($sanction)) { ?>
                                                                <li><?php echo $sanc['sanction']; ?></li>
                                                                <?php 
                                                                }
                                                            } ?>
                                                        </ol>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                    }else{?>

                                        <div class="text-center text-danger" style="opacity: 0.5;">
                                            <h1><i class="fa fa-balance-scale"></i></h1>
                                            <h2>No Policy found!</h2>
                                        </div>
                                        <?php
                                    } ?>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>            
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
<?php
include('includes/scripts.php');
include('script/addSanction.php');
include('script/updateSanction.php');
include('includes/footer.php');
?>