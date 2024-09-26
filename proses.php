<?php
session_start();
# echo $_SESSION["test"]; #memanggil data yang ada di dalam variabel session padaha tidak dikirim data tersebut

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Memastikan bahwa 'todo' dan 'prioritas' dikirim dari form
    if (isset($_POST["todo"]) && isset($_POST["prioritas"])) {
        $nama_kegiatan = $_POST["todo"];
        $prio = $_POST["prioritas"];
    } // Menyimpan data to-do ke dalam session
    $_SESSION["todolist"][] = [
        "task" => $nama_kegiatan,
        "prio" => $prio,
    ];
}

// if (isset($submit)) {
//     $nama_kegiatan = $_POST["todo"];
//     $prio = $_POST["prioritas"];

//     $_SESSION["todolist"][] = [
//         "task" => $nama_kegiatan,
//         "prio" => $prio,
//     ];

// membuat tampilannya
// foreach ($_SESSION["todolist"] as $item) {
//     echo "<ul>{$item['task']}</ul>"; 
//     echo "{$item['prio']} ";
// }
//}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
        crossorigin="anonymous" />
</head>

<body>
    <div class="container mt-4">
        <div class="card text-center mb-4">
            <div class="card-header">
                <h1>daftar To Do List</h1>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <th>nama</th>
                        <th>prioritas</th>
                        <th>aksi</th>
                    </thead>
                    <tbody>
                        <?php
                        if (empty($_SESSION["todolist"])) {
                            echo '<div class="alert alert-danger">Tidak ada data</div>';
                        } else {
                            foreach ($_SESSION["todolist"] as $id => $item) {
                                echo "<tr>";
                                echo "<td>{$item["task"]}</td>";
                                echo "<td>{$item["prio"]}</td>";
                                echo "<td>";
                                echo "<a href='edit.php?edit=$id' class='btn btn-warning me-3'>edit</a>";
                                echo  "<a href='hapus.php?hapus=$id' class='btn btn-danger'>hapus</a>";
                                echo "</td>";
                                echo  "</tr>";
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div>
            <a href="index.php" class="btn btn-primary w-100 mb-4">add Todo List</a>
            <a href="hapusAll.php" class="btn btn-danger w-100">Clear all Todo List</a>
        </div>
    </div>
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>