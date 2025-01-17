<?php

$form_fields_from_template = template_dir() . 'modules/shop/payments/gateways/lib/omnipay/cc_form_fields.php';
//dd($form_fields_from_template);
if (is_file($form_fields_from_template)) {

    include($form_fields_from_template);
    return;
}

?>


<div class="form-row">


    <div class="form-group col-md-6">
        <label class="control-label">
            <?php _e("First Name"); ?>
        </label>
        <input name="cc_first_name" type="text" class="form-control" value=""/>
    </div>
    <div class="form-group col-md-6">
        <label class="control-label">
            <?php _e("Last Name"); ?>
        </label>
        <input name="cc_last_name" type="text" class="form-control" value=""/>
    </div>


</div>
<div class="form-row">


    <div class="form-group col-md-3">
        <label class="control-label">
            <?php _e("Credit Card"); ?>
        </label>
        <select name="cc_type" class="form-control">
            <option value="Visa" selected>
                <?php _e("Visa"); ?>
            </option>
            <option value="MasterCard">
                <?php _e("MasterCard"); ?>
            </option>
            <option value="Discover">
                <?php _e("Discover"); ?>
            </option>
            <option value="Amex">
                <?php _e("American Express"); ?>
            </option>
        </select>
    </div>


    <div class="form-group col-md-9">
        <label class="control-label">
            <?php _e("Credit Card Number"); ?>
        </label>
        <input name="cc_number" type="text" value="" class="form-control"/>
    </div>

</div>


<div class="form-row">
    <div class="form-group col-md-6">
        <label class="control-label">
            <?php _e("Expiration Date"); ?>
        </label>
        <div class="row ">
            <div class="col-xs-6">
                <input name="cc_month" class="form-control" placeholder="<?php _e("Month"); ?>" type="text" value=""
                       class="form-control"/>
            </div>
            <div class="col-xs-6">
                <input name="cc_year" class="form-control" placeholder="<?php _e("Year"); ?>" type="text" value=""
                       class="form-control"/>
            </div>
        </div>
    </div>
    <div class="form-group col-md-6">
        <label class="control-label">
            <?php _e("Verification Code"); ?>
        </label>
        <input name="cc_verification_value" type="text" value="" class="form-control"/>
        <div class="cc_process_error"></div>
    </div>

</div>