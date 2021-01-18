<?php require_once APPROOT. '/views/inc/header.php'; ?>

<div class="wrapper d-flex align-items-stretch">
    <?php  require_once APPROOT.'/views/inc/sidebar.php'; ?>
<div id="content" class="p-4 p-md-5">
<?php  require_once APPROOT.'/views/inc/navbar.php'; ?>
<form method="POST" action="<?php echo URLROOT;?>/incomeApi/import" enctype="multipart/form-data">
  <div class="form-group">
    <label class="display-4" for="exampleFormControlFile1">Upload your Excel file</label>
    <input type="file" class="form-control-file pt-2" id="exampleFormControlFile1">
    <div class="container-create100-form-btn"">
          <button type="submit" id="submit" name="submit" class="btn btn-success">Upload</button>
      </div>  
  </div>
  <i class="fa fa-long-arrow-left m-l-5" aria-hidden="true"></i>
  <a href="<?php echo URLROOT;?>/expenses/create">Upload with form</a>
  
</form>

<?php require_once APPROOT . '/views/inc/footer.php'; ?>