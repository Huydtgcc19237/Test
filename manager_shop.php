<?php
    if(isset($_SESSION['us']) && $_SESSION['admin']==1)
    {
?>
<form name="frm" method="post">
    <h2 style="text-align: center;">Management Shop</h2>
    <table id="tablecategory" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th style='text-align:center'><strong>No.</strong></th>
                <th style='text-align:center'><strong>ID Shop</strong></th>
                <th style='text-align:center'><strong>Name Shop</strong></th>
                <th style='text-align:center'><strong>Shop Address</strong></th>
            </tr>
        </thead>
    </table>  
</form>
<?php
    }
?>
<br>
<br>