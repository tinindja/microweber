<?php

//$rand = rand();


?>
<?php
$is_required = (isset($data['options']) == true and isset($data['options']["required"]) == true);

if(!isset($data['input_class'])){
	$data['input_class'] = '';
}

if(isset($data['params']) and isset($data['params']['input_class'])) {
	$data['input_class'] = $data['params']['input_class'];
}
?>

<script>mw.require('forms.js');</script>

<div class="control-group form-group">
  <label class="mw-ui-label"><?php print $data["name"]; ?>
  
  <?php if (isset($data['options']) == true and isset($data['options']["required"]) == true): ?>  
	<span style="color:red;">*</span>
	<?php endif; ?>
  </label>
  <div class="mw-custom-field-form-controls">
    <input type="number"
        onkeyup="mw.form.typeNumber(this);"
        <?php if ($is_required): ?> required="true"  <?php endif; ?>
        class="<?php print $data['input_class']; ?>  mw-ui-field"
        data-custom-field-id="<?php print $data["id"]; ?>"
        name="<?php print $data["name"]; ?>"
         placeholder="<?php print $data["value"]; ?>"
        />
  </div>
</div>
