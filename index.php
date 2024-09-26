<?php
// menjalankan sesion
session_start();

//menyimpan sesion dengan variabel test ada isinya yang kita panggil di halaman
// proses.php
// $_SESSION["test"] = "Test Session";

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
    crossorigin="anonymous" />

  <title>Todo list</title>
</head>

<body>
  <h2 class="text-center">Aplikasi to do list sederhana pt.cgs</h2>
  <h4 class="text-center">FSD_15_Dheny Cahyono</h4>
  <div class="container">
    <form action="proses.php" method="post">
      <div class="mb-3 card px-5">
        <label for="" class="form-label mt-4">
          <h4>Tuliskan disini</h4>
        </label>
        <input
          type="text"
          name="todo"
          class="form-control form-control-lg"
          id=""
          placeholder="Masukkan todoList mu" />

        <label for="" class="form-label mt-3">
          <h4>prioritas</h4>
        </label>
        <select
          name="prioritas"
          class="form-select form-select-lg mb-3"
          aria-label=".form-select-lg example">
          <option selected>~~prioritas~~</option>
          <option value="High">High</option>
          <option value="low">Low</option>
          <option value="Middle">Middle</option>
        </select>
        <button type="submit" name="submit" class="btn btn-primary mb-3">kirim</button>
      </div>
    </form>

    <div class="mt-3">
      <a href="proses.php" class="btn btn-success">liat daftar to do list</a>
    </div>
  </div>

  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
</body>

</html>