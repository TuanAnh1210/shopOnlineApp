<?php
if (!empty($_POST)) {
    var_dump($_POST);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="POST">
        <div class="form__group">
            <label for=""></label>
            <select name="checkFood" id="">
                <option value="update">update</option>
                <option value="delete">delete</option>
            </select>
        </div>

        <div class="form__group">
            <label for="">banh cuon</label>
            <input name="a" value="banh cuon" type="checkbox">
        </div>
        <div class="form__group">
            <label for="">pho bo</label>
            <input name="b" value="pho bo" type="checkbox">

        </div>
        <div class="form__group">
            <label for="">bun cha</label>
            <input required value="bun cha" type="checkbox">


        </div>

        <button>submit</button>
    </form>
</body>

</html>