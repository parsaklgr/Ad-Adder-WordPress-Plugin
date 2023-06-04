<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div class="jumbotron">
    <h1>Ad Adder Plugin Settings</h1>
    <form method="POST" action="options.php">
        <?php
        settings_fields('adaddercustomsettings');
        do_settings_sections('adaddercustomsettings');
        ?>
        <div class="form-group">
            <?php $selectedoption = get_option("place_of_ad") ?>
            <label for="place_of_ad">Place of Ad</label>
            <select class="form-control" name="place_of_ad" id="place_of_ad">
                <option value="0" <?php if ($selectedoption == '0') {
                                        echo "selected";
                                    }; ?>>before heading</option>
                <option value="1" <?php if ($selectedoption == '1') {
                                        echo "selected";
                                    }; ?>>after heading</option>
            </select>
        </div>
        <div class="form-group">
            <label for="data_aa_of_ad">data-aa</label>
            <input type="text" name="data_aa_of_ad" value="<?php echo esc_attr(get_option("data_aa_of_ad")); ?>" class="form-control" id="data_aa_of_ad" placeholder="1234">
        </div>
        <div class="form-group">
            <label for="src_of_ad">src</label>
            <input type="text" name="src_of_ad" value="<?php echo esc_attr(get_option("src_of_ad")); ?>" class="form-control" id="src_of_ad" placeholder="">
        </div>
        <div class="form-group">
            <label for="style_of_add">style (css)</label>
            <input type="text" name="style_of_add" value="<?php echo esc_attr(get_option("style_of_add")); ?>" class="form-control" id="style_of_add" placeholder="">
        </div>
        <button type="submit" class="btn btn-primary mb-2">submit settings</button>

    </form>
</div>