<?php
// HTML for reset form
$front[1] = <<<EOD
<form>
<input type="email" name="email" required>
<input type="submit" name="button" value="Check">
</form>
EOD;

$front[2] = <<<EOD
<form>
<p>We will send you reset instruction to <b>$email</b></p>
<input type="submit" name="button" value="Send">
</form>
EOD;

$front[3] =  <<<EOD
<p>Please check your email inbox, or spam folder.</p>
EOD;

$front[4] = <<<EOD
<p>Sorry, we cannot find <b>$email</b> in our database</p>
EOD;

?>