<p>
	<label for="<?php echo $this->get_field_id('menu'); ?>"><?php echo __('Меню'); ?></label>
	<select id="<?php echo $this->get_field_id('menu'); ?>" name="<?php echo $this->get_field_name('menu'); ?>">
		<option value="" selected disabled>-- <?php echo __('Выберите желаемое меню'); ?> --</option>
		<?php foreach ($menus as $_menu): ?>
			<?php $selected = $_menu->term_id == $menu ? ' selected' : ''; ?>
			<option value="<?php echo $_menu->term_id; ?>"<?php echo $selected; ?>><?php echo $_menu->name; ?></option>
		<?php endforeach; ?>
	</select>
</p>