<?php
//clean form to prevent injections
function validateFormData($formData){
    //trim - removes white space
    //strip slashes - removes slashes from html form
    //convert things such as quotes and && to HTML entities
    //strips html tags such as <b>, <script>
    //replace will get rid of brackets and turn them into empty spaces
    //Not sure what ENT_QUOTES is lol
    
    $formData = trim(stripslashes(htmlspecialchars(strip_tags(str_replace(array('(',')'),"",$formData)),ENT_QUOTES)));
    return $formData;
}

?>