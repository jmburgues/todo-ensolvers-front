<!-- background -->
<div class="folder">
  <h2><a href="<?= FRONT_ROOT?>">Folders</a> > <?=$folder->getName()?></h2>

    <table>
      <?php if(is_array($tasks)){  foreach($tasks as $task){  ?>
      <tr>
        <td>- <?=$task->getDescription()?></td>
        <td><a href="<?php echo FRONT_ROOT."Task/edit/".$task->getId()?>">Edit</a></td>
      </tr>
      <?php } }else{?>
        <tr>
          <td>- <?=$tasks[0]->getDescription()?></td>
          <td><a href="<?php echo FRONT_ROOT."Task/edit/".$tasks->getId()?>">Edit</a></td>
        </tr>
      <?php } ?>
    </table>

  <form class="submit" action="<?=FRONT_ROOT?>Task/add" method=POST>
    <input type="hidden" name="folderId" value="<?=$folder->getId();?>">
    <input type="text" maxlength="20" name="description" placeholder="New Task" id="description" required>
    <button>Add</button>
  </form>
</div>