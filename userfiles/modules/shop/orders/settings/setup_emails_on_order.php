<script type="text/javascript">
    $(document).ready(function () {

        mw.options.form('.<?php print $config['module_class'] ?>', function () {
            mw.notification.success("<?php _e("Saved"); ?>.");
        });


    });


</script>
<script type="text/javascript">

    runOnNewOrderMailEditor = function () {
        if (!window.OnNewOrderMailEditor) {
            OnNewOrderMailEditor = mw.editor({
                element: "#order_email_content",
                addControls: mwd.getElementById('editorctrls').innerHTML,
                ready: function (content) {
                    content.defaultView.mw.dropdown();
                    mw.$("#order_email_content_dynamic_vals li", content).bind('click', function () {
                        OnNewOrderMailEditor.api.insert_html($(this).attr('value'));
                    });
                }
            });


            $(OnNewOrderMailEditor).bind('change', function () {

            })
        }
    }


    $(document).ready(function () {
        runOnNewOrderMailEditor();
    })

</script>

<div class="mw-ui-box mw-ui-settings-box mw-ui-box-content m-b-20">
    <div class="m-b-10">
        <h4 class=" pull-left"><?php _e("Enable email on new order"); ?></h4>
        <label class="mw-switch pull-left inline-switch">
            <input type="checkbox" name="order_email_enabled" class="mw_option_field" data-option-group="orders"
                   data-value-checked="1"
                   data-value-unchecked="0"
                <?php if (get_option('order_email_enabled', 'orders') == 1): ?> checked="1" <?php endif; ?>>
            <span class="mw-switch-off">OFF</span>
            <span class="mw-switch-on">ON</span>
            <span class="mw-switcher"></span>
        </label>
        <div class="clearfix"></div>
    </div>

    <small class="mw-ui-label-help">
        <?php _e("You must have a working email setup in order to send emails"); ?>.
        <a class="mw-ui-btn mw-ui-btn-small m-l-10" target="_blank" href="<?php print admin_url('view:settings#option_group=email'); ?>"><?php _e("Setup email here"); ?>.</a>
    </small>
</div>


<div class="mw-ui-row m-b-20">
    <div class="mw-ui-col">
        <label class="mw-ui-label bold"><?php _e("Send email when"); ?></label>

        <label class="mw-ui-check" style="margin-right: 15px;">
            <input name="order_email_send_when" class="mw_option_field" data-option-group="orders" value="order_received"
                   type="radio" <?php if (get_option('order_email_send_when', 'orders') == 'order_received' || get_option('order_email_send_when', 'orders') == ''): ?> checked="checked" <?php endif; ?> >
            <span></span><span>Order is received</span>
        </label>

        <label class="mw-ui-check">
            <input name="order_email_send_when" class="mw_option_field" data-option-group="orders" value="order_paid" type="radio" <?php if (get_option('order_email_send_when', 'orders') == 'order_paid'): ?> checked="checked" <?php endif; ?> >
            <span></span><span>Order is paid</span>
        </label>
    </div>
</div>


<module type="admin/mail_providers/integration_select" option_group="shop" />
<hr />


<div class="mw-ui-row m-b-20" style="margin: 0 -10px 20px -10px;">
    <div class="mw-ui-col p-10">
        <label class="mw-ui-label bold"><?php _e("Email subject"); ?></label>
        <input name="order_email_subject" class="mw-ui-field mw_option_field" id="order_email_subject" placeholder="<?php _e("Thank you for your order"); ?>!" data-option-group="orders" value="<?php print get_option('order_email_subject', 'orders') ?>" type="text"/>
    </div>

    <div class="mw-ui-col p-10">
        <label class="mw-ui-label"><?php _e("Send copy email to"); ?></label>
        <input name="order_email_cc" class="mw-ui-field mw_option_field" style="float: left;margin-right:10px;" id="order_email_cc" placeholder="me@email.com" data-option-group="orders" value="<?php print get_option('order_email_cc', 'orders') ?>" type="text"/>
    </div>
</div>

<div class="mw-ui-row m-b-20">
    <div class="mw-ui-col">
        <label class="mw-ui-label bold"><?php _e("Email content"); ?></label>
        <textarea class="mw-ui-field mw_option_field" data-option-group="orders" id="order_email_content" name="order_email_content"><?php print get_option('order_email_content', 'orders') ?></textarea>
    </div>
</div>


<a class="mw-ui-btn mw-ui-btn-info mw-ui-btn-medium pull-right" id="mail-test-btn" href="javascript:void(0);" onclick="$('#test_ord_eml_toggle').show();$(this).hide();"><?php _e("Send test email"); ?></a>

<div id="test_ord_eml_toggle" style="display:none">
    <div class="mw-ui-row valign-bottom">
        <div class="mw-ui-col">
            <div class="mw-ui-col-container">
                <label class="mw-ui-label bold">
                    <?php _e("Send test email to"); ?>
                </label>
                <input name="test_email_to" id="test_email_to" class="mw_option_field mw-ui-field" type="text" option-group="email" value="<?php print get_option('test_email_to', 'email'); ?>"/>
            </div>
        </div>
        <div class="mw-ui-col">
            <div class="mw-ui-col-container"> <span onclick="mw.checkout_confirm_email_test();" class="mw-ui-btn mw-ui-btn-green pull-left" id="email_send_test_btn">
            <?php _e("Send the email"); ?>
            </span>
                <pre id="email_send_test_btn_output"></pre>
            </div>
        </div>
    </div>
</div>

<div id="editorctrls" style="display: none">

    <span class="mw_dlm"></span>
    <div style="width: 112px;" data-value="" title="<?php _e("These values will be replaced with the actual content"); ?>" id="order_email_content_dynamic_vals" class="mw-dropdown mw-dropdown-type-wysiwyg mw-dropdown-type-wysiwyg_blue mw_dropdown_action_dynamic_values">
        <span class="mw-dropdown-value">
            <span class="mw-dropdown-arrow"></span>
            <span class="mw-dropdown-val"><?php _e("E-mail Values"); ?></span>
        </span>
        <div class="mw-dropdown-content">
            <ul>
                <li value="{id}"><a href="javascript:;"><?php _e("Order ID"); ?></a></li>
                <li value="{date}"><a href="javascript:;"><?php _e("Order Date"); ?></a></li>
                <li value="{cart_items}"><a href="javascript:;"><?php _e("Cart items"); ?></a></li>
                <li value="{amount}"><a href="javascript:;"><?php _e("Amount"); ?></a></li>
                <li value="{order_status}"><a href="javascript:;"><?php _e("Order Status"); ?></a></li>
                <li value="{email}"><a href="javascript:;"><?php _e("Email"); ?></a></li>
                <li value="{currency}"><a href="javascript:;"><?php _e("Currency Code"); ?></a></li>
                <li value="{first_name}"><a href="javascript:;"><?php _e("First Name"); ?></a></li>
                <li value="{last_name}"><a href="javascript:;"><?php _e("Last Name"); ?></a></li>
                <li value="{email}"><a href="javascript:;"><?php _e("Email"); ?></a></li>
                <li value="{country}"><a href="javascript:;"><?php _e("Country"); ?></a></li>

                <li value="{city}"><a href="javascript:;"><?php _e("City"); ?></a></li>
                <li value="{state}"><a href="javascript:;"><?php _e("State"); ?></a></li>
                <li value="{zip}"><a href="javascript:;"><?php _e("ZIP/Post Code"); ?></a></li>
                <li value="{address}"><a href="javascript:;"><?php _e("Address"); ?></a></li>
                <li value="{phone}"><a href="javascript:;"><?php _e("Phone"); ?></a></li>
                <li value="{transaction_id}"><a href="javascript:;"><?php _e("Transaction ID"); ?></a></li>
                <li value="{order_id}"><a href="javascript:;">Custom order ID</a></li>

            </ul>
        </div>
    </div>

</div>





