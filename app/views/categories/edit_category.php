<div class="text-center">    
  <?php session_start(); ?>
  <?php require APPROOT.'/views/components/auth_messages.php'; ?>
</div>
<?php require_once APPROOT. '/views/inc/header.php'; ?>

<div class="wrapper d-flex align-items-stretch">
    <?php  require_once APPROOT.'/views/inc/sidebar.php'; ?>
<div id="content" class="p-4 p-md-5">
    <?php  require_once APPROOT.'/views/inc/navbar.php'; ?>
<h2>Edit Category</h2>
<div class="align-middle">
<form method="POST" action="<?php echo URLROOT;?>/categories/update">
<input type="hidden" value="<?php echo $data['categories']['id']; ?>" name="id">
  <div class="form-group ">
    <label for="exampleFormControlInput1">Name</label>
    <input type="text" class="form-control" name="name" id="exampleFormControlInput1" placeholder="Enter name here" value="<?php echo $data['categories']['name']; ?>">
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Type</label>
    <select class="form-control" name="type" id="exampleFormControlSelect1">
      <?php foreach ($data['types'] as $type) { ?>
          <option value="<?php echo $type['id']; ?>" <?php if($data['categories']['type'] == $type['id']) {
                                                            echo " selected";
                                                            } ?>>
              <?php echo $type['name']; ?>
          </option>
      <?php } ?>
    </select>
  </div>
  
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Description</label>
    <textarea class="form-control" name="description" id="exampleFormControlTextarea1" placeholder="Type description..." rows="3"><?php echo $data['categories']['description']; ?></textarea>
  </div>
  
  <div class="col-md-12 text-center"">
    <button type="reset" class="btn btn-warning w-25">Reset</button>
    <button type="submit" class="btn btn-info w-25">Update</button>
  </div>  
</form>
</form>
</div>

<?php require_once APPROOT . '/views/inc/footer.php'; ?>