<?php
function silentPost($url = '?', array $post = null, $target = '_self') {
    $url = htmlentities($url);
    $target = htmlentities($target);
    $fields = '';
    if ($post) {
        foreach ($post as $name => $value) {
            $fields .= fieldToHtml($name, $value);
        }
    }
    $ret = "
        <form id=\"silentPost\" action=\"{$url}\" method=\"post\">
            {$fields}
            <noscript><input type=\"submit\" value=\"Continue\"></noscript>
        </form>
        <script>
            window.setTimeout('document.forms.silentPost.submit()', 0);
        </script>
    ";
    return $ret;
}

// Return a value as hidden HTML FORM fields
function fieldToHtml($name, $value) {
    $ret = '';
    if (is_array($value)) {
        foreach ($value as $n => $v) {
            $ret .= fieldToHtml($name . '[' . $n . ']', $v);
        }
    } 
    else {
        // Convert all applicable characters or none printable characters to HTML entities
        $value = preg_replace_callback('/[\x00-\x1f]/', function($matches) { return '&#' . ord($matches[0]) .
        ';'; }, htmlentities($value, ENT_COMPAT, 'UTF-8', true));
        $ret = "<input type=\"hidden\" name=\"{$name}\" value=\"{$value}\" />\n";
    }
    return $ret;
}

$style = (isset($res['threeDSRequest']['threeDSMethodData']) ? 'display: none;' : '');
//echo "<iframe name=\"threeds_acs\" style=\"height:420px; width:420px; {$style}\"></iframe>\n";
// Silently POST the 3DS request to the ACS in the IFRAME
echo silentPost($res['threeDSURL'], $res['threeDSRequest'], $res['target']);
?>