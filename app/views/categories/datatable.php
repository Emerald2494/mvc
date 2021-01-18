<?php session_start(); ?>
<?php require_once APPROOT .'/views/inc/header.php'; ?>
<div class="wrapper d-flex align-items-stretch">
    <?php  require_once APPROOT.'/views/inc/sidebar.php'; ?>
<div id="content" class="p-4 p-md-5">
    <?php  require_once APPROOT.'/views/inc/navbar.php'; ?>
<table id="example" class="table table-striped table-bordered" style="width:100%">
            
            <?php require APPROOT.'/views/components/auth_messages.php'; ?>
        <thead>
            
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Description</th>
                <th>Type</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($data['categories'] as $category) { ?>
                <tr>
                    <td><?php echo $category['id']; ?> </td>
                    <td><?php echo $category['name']; ?> </td>
                    <td><?php echo $category['description']; ?> </td>
                    <td><?php echo $category['types_name']; ?> </td>
                    <td><a href="<?php echo URLROOT; ?>/categories/edit_category/<?php echo $category['id']; ?>" class="btn btn-warning">Edit</a></td>
                        <form action="<?php echo URLROOT; ?>/categories/delete/<?php echo base64_encode($category['id']); ?>" method="POST">
                    <td> <input type="submit" class="btn btn-danger" value="DELETE"></td>
                    </form>
                    
                </tr>
            <?php } ?>
           
        </tbody>
              
    </table>
    <a href="<?php echo URLROOT;?>/categories/create" class="btn btn-success float-right mt-4">Add New</a>
<?php  require_once APPROOT.'/views/inc/footer.php'; ?>