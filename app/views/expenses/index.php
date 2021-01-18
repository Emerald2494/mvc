<?php session_start(); ?>
<?php require_once APPROOT .'/views/inc/header.php'; ?>
<div class="wrapper d-flex align-items-stretch">
    <?php  require_once APPROOT.'/views/inc/sidebar.php'; ?>
<div id="content" class="p-4 p-md-5">
    <?php  require_once APPROOT.'/views/inc/navbar.php'; ?>

<table id="expenseTable" class="table table-striped table-bordered" style="width:100%">
            
            <?php require APPROOT.'/views/components/auth_messages.php'; ?>
            
        <thead>
            
            <tr>
                <th>Id</th>
                <th>Category</th>
                <th>Amount</th>
                <th>Qty</th>
                <th>Assigned By</th>
                <th>Date</th>
                <th colspan="2" style="text-align: center;">Action</th>
                <th></th>
            </tr>
        </thead>
        
    </table>
    <a href="<?php echo URLROOT;?>/expenses/create" class="btn btn-success float-right mt-4">Add New</a>
   
<?php  require_once APPROOT.'/views/inc/footer.php'; ?>

<script type="text/javascript">
    $(document).ready(function(){
        var table = $('#expenseTable').DataTable({
            "ajax" : "<?php echo URLROOT;?>/expenses/expenseData",
            "columns" : [
                { "data" : "id"},
                { "data" : "category_name"},
                { "data" : "amount"},
                { "data" : "qty"},
                { "data" : "user_name"},
                { "data" : "date"},
                {
                    mRender : function(data, type, full) {
                        var id = full.id;
                          var edit_url =  '<?php echo URLROOT;?>/expenses/edit/' + id;
                        return `<a href="` + edit_url + `" class = "btn btn-primary expedit">Edit</a>`;
                        // return `<button type="button" class="btn btn-primary" data-toggle="modal" data-target="` + full.id + `">Edit</button>`;
                        
                    }
                    
                },
                
                {
                    mRender : function(data, type, full) {
                        // console.log(full.id);
                        return `<button type="submit" value="` + full.id + `" id="` + full.id + `" class = "btn btn-danger exdel">Delete</button>
                        `;
                }
                },
                
            ]   
             
                 

        });

        
            
        
        $(document).on('click','.exdel', function(){
            
            var id = $(this).val();
            var del_url =  '<?php echo URLROOT;?>/expenses/delete/' + id;
            // alert(del_url);
            swal({
                title: "Are you sure?",
                text: "You will not be able to recover this imaginary file!",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel plx!",
                closeOnConfirm: false,
                closeOnCancel: false
            },
            function(isConfirm) {
                if (isConfirm) {
                $.ajax({
                    url: del_url,
                    type: 'DELETE',
                    error: function() {
                        alert('Something is wrong');
                    },
                    success: function(data) {
                        $("#"+id).remove();
                        
                        window.location.reload();
                    }
                });
                } else {
                swal("Cancelled", "Your imaginary file is safe :)", "error");
                }
            });
            
            
            });

      
    });

    
</script>