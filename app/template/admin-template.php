<h1>Noindex by path</h1>

<p><?php
    printf(__( 'Simply add relative paths one by one. A relative path is a text from the domain name to the first question mark: %s (notice that you must include initial and trailing slashes too).', 'noindexbypath' ),
'<code>http://wpdomain.com<strong><u>/relative-path/page/subpage/</u></strong>?query=string</code>'); ?></p>
<p><?php _e('Need any path to be indexable again? Leave input empty and save the changes.', 'noindexbypath'); ?></p>

<form method="post">
<?php
foreach ($paths as $path) {
    ?><input type="text" value="<?php echo $path->getPath(); ?>" name="path[]" style="width:95%" /><br>
<?php }

?>
    <input type="text" value="" name="path[]" style="width:95%" /><br>
    <input type="submit" value="<?php _e('Save changes', 'noindexbypath') ?>" class="button button-primary button-large" style="margin: 10px auto; display: block;">
</form>
