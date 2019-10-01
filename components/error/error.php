<?php
function error_message($headline, $content)
{
    ?>
    <div class="error-message">
        <div class="error-message-header">
            <h2>
                <?php echo $headline; ?>
            </h2>
        </div>
        <div class="error-message-content">
            <p>
                <?php echo $content; ?>
            </p>
            <div class="error-message-image">
                <img src="../img/error.svg">
            </div>
        </div>
    </div>
    <?php
}
?>
