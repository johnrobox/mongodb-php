    

    <script src="datatables/js/jquery.dataTables.min.js"></script>
    <script src="datatables/js/dataTables.bootstrap.min.js"></script>
    <script src="datatables/js/dataTables.responsive.js"></script>

    <?php
    include 'classes/Classes.php';
    $collection = new Classes();
    $query = $collection->connect();
    $members =  $query->find();
    ?>
    <table class="table table-bordered" id="member-datatable">
        <thead>
            <tr>
                <td>Firstname</td>
                <td>Lastname</td>
                <td>Address</td>
                <td>Contact</td>
                <td>Action</td>
            </tr>
        </thead>          
        <tbody >
            <?php foreach($members as $member) { ?>
            <tr id="Tr<?php echo $member['_id']; ?>">
                <td id="firstnameTd<?php echo $member['_id']; ?>">
                    <?php echo $member['firstname'];?>
                </td>
                <td id="lastnameTd<?php echo $member['_id']; ?>">
                    <?php echo $member['lastname'];?>
                </td>
                <td id="addressTd<?php echo $member['_id']; ?>">
                    <?php echo $member['address'];?>
                </td>
                <td id="contactTd<?php echo $member['_id']; ?>">
                    <?php echo $member['contact'];?>
                </td>
                <td>
                    <button class="btn btn-success btn-xs updateMemberButton" id_value="<?php echo $member['_id']; ?>">Update</button>
                    <button class="btn btn-danger btn-xs deleteMemberButton" contact_number="<?php echo $member['contact'];?>" id_value="<?php echo $member['_id']; ?>">Delete</button>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
        
<script>
    $(document).ready(function(){
        $('#member-datatable').DataTable({
            responsive: true
        });
    });
</script>