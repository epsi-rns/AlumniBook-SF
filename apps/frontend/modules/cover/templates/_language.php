<form action="<?php echo url_for('common/language') ?>" method="post">
  <label for="language">Choose a language:</label>
  <?php echo $form['language'] ?>
  <?php echo $form->renderHiddenFields() ?>
  <input type="submit" value="ok">
</form>
