
<script type="text/javascript" src="https://obli.co.il/assets/js/nic_editor/nicEdit-latest.js"></script>
<script type="text/javascript">bkLib.onDomLoaded(function() { nicEditors.allTextAreas() 

new nicEditor({fullPanel : true}).panelInstance('coming_soon_text',{hasPanel : true});

});</script>
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

            <?php if(!empty($admin_detail)) echo 'Edit'; else echo 'Add'; ?> Obli Detail

        </div>

    </div>

        

    <div class="panel-body">

        <form action="<?php if(!empty($admin_detail)) echo site_url('index.php/admin/edit_coming_soon'); else echo site_url('index.php/admin/add_coming_soon'); ?>" role="form" id="form1" method="post" enctype="multipart/form-data" class="validate">


            <div class="form-group">

                <label class="control-label">Coming Soon Status</label><br>

                <input type="checkbox" name="coming_soon_status" <?php if(!empty($admin_detail)){ if($admin_detail[0]->coming_soon_status == "ON"){ echo "checked='checked'"; }else{  } } ?>  class="iswitch iswitch-blue status" onclick="myFunction(this)" id="1" value="<?php if(!empty($admin_detail)){ if($admin_detail[0]->coming_soon_status == "ON"){ echo "ON"; }else{ echo "OFF"; } }else{ echo "OFF"; } ?>" >

            </div>

<style type="text/css">
    

</style>

<script>
// function myFunction(status) {
//     if(status == 1){
//         alert(123);

//         document.getElementById("coming_soon_title").readOnly = true;
//         document.getElementById("coming_soon_text").readOnly = true;
//     }
//     else{
//         alert(456);
//         document.getElementById("coming_soon_title").readOnly = false;
//         document.getElementById("coming_soon_text").readOnly = false;
//     }
  
// }

// $( ".status" ).click(function() {
    
//   $( this ).toggleClass( "status_change" );
//       document.getElementById("coming_soon_title").readOnly = true;
//       document.getElementById("coming_soon_text").readOnly = true;
// });

// $( ".status_change" ).click(function() {
//     alert(456);
    
//       document.getElementById("coming_soon_title").readOnly = false;
//       document.getElementById("coming_soon_text").readOnly = false;
// });

function myFunction(button)
{
  if(document.getElementById("1").value=="OFF"){
    // alert(111);
    document.getElementById("coming_soon_title").readOnly = false;
    document.getElementById("coming_soon_text").readOnly = false;
    document.getElementById("1").value="ON";

  }

  else if(document.getElementById("1").value=="ON"){
    // alert(222);
    document.getElementById("coming_soon_title").readOnly = true;
    document.getElementById("coming_soon_text").readOnly = true;
    document.getElementById("1").value="OFF";

  }

}



</script>

            
            <div class="form-group">

                <label class="control-label">Coming Soon Title</label>

                <input type="text" name="coming_soon_title" id="coming_soon_title" placeholder="" class="form-control" data-validate="required" value="<?php if(!empty($admin_detail)){ echo $admin_detail[0]->coming_soon_title; }else{ if(isset($_POST['coming_soon_title'])){ echo $_POST['coming_soon_title']; } }?>" autocomplete="off" <?php if(!empty($admin_detail)){ if($admin_detail[0]->coming_soon_status == "ON"){  }else{ echo "readonly='readonly'"; } } ?> />

            </div>

            <div class="form-group">

                <label class="control-label">Coming Soon Text</label>

                <textarea name="coming_soon_text" id="coming_soon_text" class="form-control ck_textarea_visible" placeholder="" rows="5" <?php if(!empty($admin_detail)){ if($admin_detail[0]->coming_soon_status == "ON"){  }else{ echo "readonly='readonly'"; } } ?> ><?php if(!empty($admin_detail)){ echo trim($admin_detail[0]->coming_soon_text); }else{ if(isset($_POST['coming_soon_text'])){ echo trim($_POST['coming_soon_text']); } }?></textarea>

            </div>

            


            <div class="form-group">
                <?php if(!empty($admin_detail)){ ?>

                <input type="hidden" name="coming_soon_id" value="<?php echo $admin_detail[0]->id; ?>">

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







