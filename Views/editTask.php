<!-- background -->
<div class="folder">
  <h2>Editing Task "<?=$task->getDescription()?>"</h2>

  <form class="submit" action="<?=FRONT_ROOT?>Task/sendEdit" method="POST">
    <input type="hidden" id="id" name="id" value="<?=$task->getId()?>">
    <input type="hidden" id="done" name="done" value="<?=$task->getDone()?>">
    <input type="hidden" id="folderId" name="folderId" value="<?=$folderId?>">
    <input type="text" id="description" maxlength="50" name="description" value="<?=$task->getDescription()?>" required>
    <button>Edit</button>
  </form>
    <button onclick="window.location.href='<?=FRONT_ROOT?>Folder/view/<?=$folderId?>'">Cancel</button>


</div>
