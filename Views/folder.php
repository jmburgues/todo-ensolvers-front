<!-- background -->
<div class="folder">
  <h2><a href="<?= FRONT_ROOT?>">Folders</a> > <?=$folder->getName()?></h2>

    <table>
      <?php if(is_array($tasks)){  foreach($tasks as $task){  ?>
      <tr>
        <td><label><input type="checkbox" onclick="javascript:location.href='<?=FRONT_ROOT?>Task/changeStatus/<?=$task->getId()?>/<?=$folder->getId()?>'" <?php if($task->getDone()){ echo "checked"; } ?> > <?=$task->getDescription()?></label></td>
        <td><a href="<?php echo FRONT_ROOT."Task/edit/".$task->getId()."/".$folder->getId()?>">Edit</a></td>
        <td><a href="<?php echo FRONT_ROOT."Task/remove/".$task->getId()."/".$folder->getId()?>">Remove</a></td>
      </tr>
      <?php } }else{?>
        <tr>
          <td><label><input type="checkbox" <?php if($task->getDone()){ echo "checked"; } ?> > <?=$task->getDescription()?></label></td>
          <td><a href="<?php echo FRONT_ROOT."Task/edit/".$tasks->getId()."/".$folder->getId()?>">Edit</a></td>
          <td><a href="<?php echo FRONT_ROOT."Task/remove/".$task->getId()."/".$folder->getId()?>">Remove</a></td>
        </tr>
      <?php } ?>
    </table>

  <form class="submit" action="<?=FRONT_ROOT?>Task/add" method=POST>
    <input type="hidden" name="folderId" value="<?=$folder->getId();?>">
    <input type="text" maxlength="50" name="description" placeholder="New Task" id="description" autofocus required>
    <button>Add</button>
  </form>
</div>
