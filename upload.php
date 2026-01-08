<?php
$uploadDir = __DIR__ . '/uploads/';
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}
if (!empty($_FILES['files'])) {
    foreach ($_FILES['files']['name'] as $i => $name) {
        if ($_FILES['files']['error'][$i] === UPLOAD_ERR_OK) {
            $tmp = $_FILES['files']['tmp_name'][$i];
            $safeName = basename($name);
            move_uploaded_file($tmp, $uploadDir . $safeName);
        }
    }
}

// получаем список файлов
$files = array_diff(scandir($uploadDir), ['.', '..']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload</title>
</head>
<body bgcolor="#000000" text="#FFFFFF">
    <h1>Jesteś na stronie <?php echo $_POST["name"]; ?></h1>

<h2>Ładowanie plików</h2>

<form id="uploadForm" method="post" enctype="multipart/form-data">
    <div id="dropzone">
        Przesuń pliki tutaj lub kliknij, aby wybrać.
        <br><br>
        <input type="file" name="files[]" multiple>
    </div>
    <button type="submit">Załadować</button>
</form>

<h3>Pliki:</h3>
<ul>
    <?php foreach ($files as $file): ?>
        <li><?= htmlspecialchars($file) ?></li>
    <?php endforeach; ?>
</ul>

<script>
const dropzone = document.getElementById('dropzone');
const input = document.querySelector('input[type=file]');

dropzone.addEventListener('dragover', e => {
    e.preventDefault();
    dropzone.classList.add('dragover');
});

dropzone.addEventListener('dragleave', () => {
    dropzone.classList.remove('dragover');
});

dropzone.addEventListener('drop', e => {
    e.preventDefault();
    dropzone.classList.remove('dragover');
    input.files = e.dataTransfer.files;
});
</script>

</body>
</html>
