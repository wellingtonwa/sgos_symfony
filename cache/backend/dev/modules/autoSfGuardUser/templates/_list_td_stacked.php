<td colspan="3">
  <?php echo __('%%first_name%% - %%last_name%% - %%username%%', array('%%first_name%%' => link_to($sf_guard_user->getFirstName(), 'sf_guard_user_edit', $sf_guard_user), '%%last_name%%' => link_to($sf_guard_user->getLastName(), 'sf_guard_user_edit', $sf_guard_user), '%%username%%' => link_to($sf_guard_user->getUsername(), 'sf_guard_user_edit', $sf_guard_user)), 'messages') ?>
</td>
