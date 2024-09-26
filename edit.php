<?php
session_start();

// Memeriksa apakah ada parameter 'edit' di URL
if (isset($_GET['edit'])) {
    $edit_id = $_GET['edit'];

    // Memastikan bahwa elemen dengan index $edit_id ada di session
    if (isset($_SESSION['todolist'][$edit_id])) {
        // Mengambil data yang ingin diedit
        $edit_task = $_SESSION['todolist'][$edit_id]['task'];
        $edit_prio = $_SESSION['todolist'][$edit_id]['prio'];
    } else {
        echo "Data tidak ditemukan!";
        exit();
    }
} else {
    echo "Tidak ada ID yang dipilih untuk di-edit!";
    exit();
}

// Jika form disubmit, update data
if (isset($_POST['update'])) {
    $updated_task = $_POST['todo'];
    $updated_prio = $_POST['prioritas'];

    // Update data di session berdasarkan $edit_id
    $_SESSION['todolist'][$edit_id] = [
        'task' => $updated_task,
        'prio' => $updated_prio
    ];

    // Redirect kembali ke halaman utama atau proses.php
    header("Location: proses.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kegiatan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1 class="text-center">Edit Kegiatan</h1>

        <!-- Form Edit -->
        <form method="POST" action="" class="card p-4">
            <div class="mb-3">
                <label for="todo" class="form-label">
                    <h4>nama kegiatan :</h4>
                </label>
                <input type="text" id="todo" name="todo" class="form-control form-control-lg"
                    value="<?php echo isset($edit_task) ? htmlspecialchars($edit_task) : ''; ?>" required>
            </div>

            <div>
                <label for="prioritas" class="form-label">
                    <h4>Prioritas</h4>
                </label>
                <select name="prioritas" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                    <option value="" selected>~~Prioritas~~</option>
                    <option value="High" <?php echo ($edit_prio == 'High') ? 'selected' : ''; ?>>High</option>
                    <option value="Middle" <?php echo ($edit_prio == 'Middle') ? 'selected' : ''; ?>>Middle</option>
                    <option value="Low" <?php echo ($edit_prio == 'Low') ? 'selected' : ''; ?>>Low</option>
                </select>
            </div>

            <button type="submit" name="update" class="btn btn-primary">Update Kegiatan</button>
        </form>

        <br>
        <a href="index.php" class="btn btn-secondary">Kembali ke To-Do List</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>