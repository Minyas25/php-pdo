<form method="post">
    <label for="test">Test :</label>
    <input type="text" name="test" id="test">
    <button>Go</button>
</form>

<?php

if(isset($_POST['test'])) {
    var_dump($_POST['test']);

}