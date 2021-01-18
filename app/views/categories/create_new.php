<div class="text-center">    
  <?php session_start(); ?>
  <?php require APPROOT.'/views/components/auth_messages.php'; ?>
</div>
<?php require_once APPROOT. '/views/inc/header.php'; ?>

<div class="wrapper d-flex align-items-stretch">
    <?php  require_once APPROOT.'/views/inc/sidebar.php'; ?>
<div id="content" class="p-4 p-md-5">
    <?php  require_once APPROOT.'/views/inc/navbar.php'; ?>

    
<div class="row">
  <div class="col-sm-9"> 
    <h2>New Category</h2>
  </div>
  <div class="col-sm-3">
    
  </div>
</div>
<div class="align-middle pt-2">
  
<form method="POST" action="<?php echo URLROOT;?>/categories/store">
      <div class="wrap-input100 validate-input" data-validate = "">
      <label for="exampleFormControlInput1">Name</label>
      <input type="text" class="createinput100" name="name" id="exampleFormControlInput1" placeholder="Enter name here">
      </div>

      <div class="wrap-input100 validate-input" data-validate = "">
      <label for="exampleFormControlSelect1">Type</label>
    <select class="createinput100" name="type" id="exampleFormControlSelect1">
      <?php foreach ($data['types'] as $type) { ?>
          <option value="<?php echo $type['id']; ?>">
              <?php echo $type['name']; ?>
          </option>
      <?php } ?>
    </select>
      </div>

      <div class="wrap-input100 validate-input" data-validate = "">
      <label for="exampleFormControlTextarea1">Description</label>
      <textarea class="createinput100" name="description" id="exampleFormControlTextarea1" placeholder="Type description..." rows="3"></textarea>
      </div>
      

      <div class="container-create100-form-btn"">
          <button type="reset" class="create100-form-btn btn-warning ">Reset</button>
          <button type="submit" id="submit" class="create100-form-btn btn-success">Submit</button>
      </div>  
    
</form>
</div>

<?php require_once APPROOT . '/views/inc/footer.php'; ?>