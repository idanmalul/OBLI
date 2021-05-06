<?php if($this->session->flashdata('error') || !empty($error)){ ?>
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <strong><?php if($this->session->flashdata('error')){ echo $this->session->flashdata('error'); }else{ echo $error; }  ?></strong>
                </div>
            </div>
        </div>
<?php } ?>
<?php if($this->session->flashdata('success')){ ?>
<div class="row">
    <div class="col-md-12">
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
            <strong><?php echo $this->session->flashdata('success'); ?></strong>
        </div>
    </div>
</div>
<?php } ?>
<div class="row">

            <div class="col-md-12">

            <div class="row">

                <div class="col-md-12">

                    <div class="panel panel-default">

    <div class="panel-heading">

        <div class="panel-title">

            <?php if(!empty($menu_detail)) echo 'Edit'; else echo 'Add'; ?> Menu

        </div>

    </div>

        

    <div class="panel-body">

        <form action="<?php if(!empty($menu_detail)) echo site_url('index.php/admin/edit_menu'); else echo site_url('index.php/admin/add_menu'); ?>" role="form" id="form1" method="post" enctype="multipart/form-data" class="validate">


            <div class="form-group">

                <label class="control-label">Menu Title</label>

                <input type="text" name="menu_title" placeholder="" class="form-control" data-validate="required" value="<?php if(!empty($menu_detail)){ echo $menu_detail[0]->menu_title; }else{ if(isset($_POST['menu_title'])){ echo $_POST['menu_title']; } }?>" autocomplete="off" /><br>

            </div>

            <div class="form-group">

                <label class="control-label">Set Menu Order</label>

                <input type="number" name="set_order" placeholder="" class="form-control" data-validate="required, number" min="1" value="<?php if(!empty($menu_detail)){ echo $menu_detail[0]->set_order; }else{ if(isset($_POST['set_order'])){ echo $_POST['set_order']; } }?>" autocomplete="off" /><br>

            </div>

            
            <div class="form-group">
                <?php if(!empty($menu_detail)){ ?>

                <input type="hidden" name="menu_id" value="<?php echo $menu_detail[0]->id; ?>">

                <input type="submit" name="submit" value="Update" class="btn btn-success float_right ck_textarea_on">
         

                <?php } else { ?>

                <input type="submit" name="submit" value="Submit" class="btn btn-success float_right ck_textarea_on">


                <?php } ?>

                

            </div>

        </form>

    </div>

 </div>



        </div>

       </div> 

   </div> 

</div>







