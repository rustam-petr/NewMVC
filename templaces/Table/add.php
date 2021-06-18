

<form action="?type=Table&action=add" method="post">

    <?php
    foreach ($this->data as $field=>$comment){
        echo "<input name='$field' placeholder='$comment'><br>";
    }
    ?>
<input type="submit" value="ok" class="btn btn-info">
</form>
