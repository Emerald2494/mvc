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
    <h2>New Expense</h2>
  </div>
  <div class="col-sm-3">
    <a href="<?php echo URLROOT;?>/incomeApi/fileUpload">Upload your Excel file</a>
  </div>
</div>
<div class="align-middle pt-2">
  
<form>
      <div class="wrap-input100 validate-input" data-validate = "">
      <label for="exampleFormControlSelect1">Choose Type</label>
      <select class="createinput100"  name="type" id="type">  
            <?php foreach ($data['types'] as $type) { ?>
                  <option value="<?php echo $type['name']; ?>">
                      <?php echo $type['name']; ?>
                  </option>
              <?php } ?>
            </select>
      </div>

      <div class="wrap-input100 validate-input" data-validate = "Password is required">
      <label for="exampleFormControlInput1">Amount</label>
          <input type="number" class="createinput100" name="amount" id="exampleFormControlInput1" placeholder="Enter Amount here">
      </div>

      <div class="wrap-input100 validate-input" data-validate = "Password is required" id="qty">
      <label for="exampleFormControlInput1">Qty</label>
          <input type="number" class="createinput100" name="qty" id="exampleFormControlInput1" placeholder="Enter Qty here">
      </div>

      <div class="wrap-input100 validate-input" data-validate = "Password is required">
      <label for="exampleFormControlSelect1">Category</label>
      <select class="createinput100" name="category" id="exampleFormControlSelect1">
            <?php foreach ($data['categories'] as $category) { ?>
                <option value="<?php echo $category['id']; ?>">
                    <?php echo $category['name']; ?>
                </option>
            <?php } ?>
          </select>
      </div>

      <div class="container-create100-form-btn"">
          <button type="reset" class="create100-form-btn btn-warning ">Reset</button>
          <button type="submit" id="submit" class="create100-form-btn btn-success">Submit</button>
      </div>  
    
</form>
</div>

<?php require_once APPROOT . '/views/inc/footer.php'; ?>

<script type="text/javascript">
  $(function(){
    $('#type').on('change', function(){
      if($(this).val()== 'expenses'){
        $('#qty').show();
        $('h2').text('New Expense');
      }else{
        $('#qty').hide();
        $('h2').text('New Income');

      }
    });
  });

  $('#submit').click(function(){
    // alert($(form).serialize());
    var url = $('#type').val();
    //  alert(url);
    var form_url = '<?php echo URLROOT;?>/' + url +'/store';
    // alert(form_url);
    $.ajax({
      url : form_url,
      type : 'POST',
      data : $('form').serialize(),
      success : function(){
        // window.location.href('<?php echo URLROOT;?>/' + url +'/index');
      }
    })
  });
</script>