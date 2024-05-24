<?php
include("koneksi.php");
// include("crud.php");
?>



<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>CRUD - PHP</title>
</head>

<body>
    <div class="container mt-4">
        <h1 class="text-center">DAFTAR MAHASISWA UNU</h1>
        <div class="card mt-3">
            <div class="card-header">
                DATA MAHASISWA
            </div>
            <div class="card-body">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalTambah">
                    Tambah Data
                </button>
                <table class="table table-bordered">

                    <tr>
                        <th scope="col">NO</th>
                        <th scope="col">NIM</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Jurusan</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Aksi</th>
                    </tr>

                    <?php
                    $no = 1;
                    //read
                    $tampil = mysqli_query($koneksi, "SELECT * FROM mhs order by id_mhs desc");
                    while ($data = mysqli_fetch_array($tampil)) :
                    ?>

                        <tr>
                            <th><?php echo $no++; ?></th>
                            <td><?php echo $data['nim']; ?></td>
                            <td><?php echo $data['nama']; ?></td>
                            <td><?php echo $data['jurusan']; ?></td>
                            <td><?php echo $data['alamat']; ?></td>
                            <td>
                                <a href="" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalUbah<?= $no ?>">edit</a>
                                <a href="" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalHapus<?= $no ?>">hapus</a>
                            </td>
                        </tr>

                        <!-- awal modal ubah -->
                        <div class="modal fade " id="modalUbah<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Edit Data Mahasiswa</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form method="POST" action="crud.php">
                                        <input type="hidden" name="id_mhs" id="id_mhs" value="<?php echo $data['id_mhs']; ?>">
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="nim" class="form-label">NIM</label>
                                                <input type="text" class="form-control" id="nim" name="nim" value="<?php echo $data['nim']; ?>" placeholder="masukkan NIM">
                                            </div>
                                            <div class="mb-3">
                                                <label for="nama" class="form-label">Nama</label>
                                                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $data['nama']; ?>" placeholder="masukkan Nama">
                                            </div>
                                            <div class="mb-3">
                                                <label for="jurusan" class="form-label">Jurusan</label>
                                                <select class="form-select" name="jurusan" id="jurusan">
                                                    <option value="<?php echo $data['jurusan']; ?>"><?php echo $data['jurusan']; ?></option>
                                                    <option value="S1 - Teknik Komputer">Teknik Komputer</option>
                                                    <option value="S1 - Informatika">Informatika</option>
                                                    <option value="S1 - Teknik Elektro">Teknik Elektro</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="alamat" class="form-label">Alamat</label>
                                                <textarea class="form-control" id="alamat" name="alamat" rows="3"><?php echo $data['alamat']; ?></textarea>
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-success" value="ubah" name="ubah">change</button>
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">cancel</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- akhir modal ubah -->

                        <!-- awal modal hapus -->
                        <div class="modal fade " id="modalHapus<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Hapus Data Mahasiswa</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form method="POST" action="crud.php">
                                        <input type="hidden" name="id_mhs" id="id_mhs" value="<?php echo $data['id_mhs']; ?>">
                                        <div class="modal-body">
                                            <h5 class="text-center">Apakah yakin menghapus data? <br>
                                                <span class="text-danger text-center"><?php echo $data['nim'] ?> - <?php echo $data['nama'] ?></span>
                                            </h5>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary" value="hapus" name="hapus">hapus</button>
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">cancel</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- akhir modal hapus -->
                    <?php endwhile; ?>
                </table>


                <!-- Modal -->
                <div class=" modal fade " id="modalTambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Form Data Mahasiswa</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form method="POST" action="crud.php">
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="nim" class="form-label">NIM</label>
                                        <input type="text" class="form-control" id="nim" name="nim" placeholder="masukkan NIM" Required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="nama" class="form-label">Nama</label>
                                        <input type="text" class="form-control" id="nama" name="nama" placeholder="masukkan Nama" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="jurusan" class="form-label">Jurusan</label>
                                        <select class="form-select" name="jurusan" id="jurusan" required>
                                            <option value=""></option>
                                            <option value="S1 - Teknik Komputer">Teknik Komputer</option>
                                            <option value="S1 - Informatika">Informatika</option>
                                            <option value="S1 - Teknik Elektro">Teknik Elektro</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="alamat" class="form-label">Alamat</label>
                                        <textarea class="form-control" id="alamat" name="alamat" rows="3" required></textarea>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success" value="simpan" name="simpan">save</button>
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- akhir modal -->
            </div>
        </div>
    </div>





    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>

</html>