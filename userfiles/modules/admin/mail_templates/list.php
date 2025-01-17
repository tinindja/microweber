<?php only_admin_access(); ?>

<script>
    function delete_mail_template(id) {
        var are_you_sure = confirm("Are you sure?");
        if (are_you_sure == true) {
            var data = {}
            data.id = id;
            var url = "<?php print api_url('delete_testimonial'); ?>";
            var post = $.post(url, data);
            post.done(function (data) {
                mw.reload_module("admin/mail_templates");
                mw.reload_module("admin/mail_templates/list");
            });
        }
    }
</script>

<?php $data = get_mail_templates("no_limit=true"); ?>

<?php if ($data): ?>
    <table width="100%" class="mw-ui-table">
        <thead>
        <tr>
			<th>#</th>
			<th>Type</th>
			<th>Name</th>
			<th>Subject</th>
			<th>From Name</th>
			<th>From Email</th>
			<th>Copy To</th>
            <th>Is Active</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($data as $item): ?>
            <tr>
	            <td><?php print $item['id'] ?></td>
	            <td><?php print $item['type'] ?></td>
	            <td><?php print $item['name'] ?></td>
	            <td><?php print $item['subject'] ?></td>
	            <td><?php print $item['from_name'] ?></td>
	            <td><?php print $item['from_email'] ?></td>
	            <td><?php print $item['copy_to'] ?></td>
                 <td><?php print $item['is_active'] ?></td>
                <td>
                <a class="mw-ui-btn"
                       href="javascript:edit_mail_template('<?php print $item['id'] ?>');">Edit
                    </a>
                <a class="mw-ui-btn"
                       href="javascript:delete_mail_template('<?php print $item['id'] ?>');">Delete
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>