<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload</title>
</head>
<body bgcolor="#000000" text="#FFFFFF">
    <h1>Jesteś na stronie <?php echo $_POST["name"]; ?></h1>
    <label for="upload">Załadować pliki</label>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="upload" id="upload">
    </form>
</body>
</html>