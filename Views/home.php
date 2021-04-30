
<div class="folder">
  <h2>Folders</h2>
  <?php if(isset($folders)){ ?>
    <table class="tabla">
      <?php if(is_array($folders)){ foreach($folders as $folder){  ?>
      <tr>
        <td>- <?=$folder->getName()?></td>
        <td><a href="<?php echo FRONT_ROOT."Folder/view/".$folder->getId()?>">View Items</a></td>
        <td><a href="<?php echo FRONT_ROOT."Folder/remove/".$folder->getId()?>">Remove</a></td>
      </tr>
      <?php } }else{?>
        <tr>
          <td>- <?=$folders->getName()?></td>
          <td><a href="<?php echo FRONT_ROOT."Folder/view/".$folder->getId()?>">View Items</a></td>
          <td><a href="<?php echo FRONT_ROOT."Folder/remove/".$folder->getId()?>">Remove</a></td>
        </tr>
      <?php } ?>
    </table>
    <?php } else{ ?>
    <h4> No folders created. </h4>
    <?php }?>

  <form class="submit" action="<?=FRONT_ROOT?>Folder/add" method=POST>
    <input type="text" maxlength="30" name="name" placeholder="New Folder" id="name" autofocus required>
    <button>Add</button>
  </form>
</div>