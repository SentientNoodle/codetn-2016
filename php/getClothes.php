<?php
    // Clothing options to set the user's current clothing
    $clothes = '';
    for ($i = 1; $i <= 6; $i++) {
        $clothes .= '
            <div class="col-xs-12 col-xs-offset-1 col-sm-4 col-md-offset-0">
                <form action="inventory.php?id='.$_GET["id"].'" method="post">
                    <input type="hidden" name="shirtID" value='.$i.'">
                    <input type="image" src="media/skins/'.$i.'.png">
                </form>
            </div>';
    }
    
    echo $clothes;
?>