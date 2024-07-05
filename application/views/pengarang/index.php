<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UAS RIKKY</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/layout.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: blue ">
    <div class="container-fluid">
        <a href="#" class="navbar-brand">Website Rikky Wahyu Saputra</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse align-items-center justify-content-md-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="#" class="nav-link">Logout, Rikky</a>
                </li>
            </ul>
        </div>
    </div>
</nav>


    <div id="app" class="container-fluid">
        <div class="row">
            <!-- sidebar -->
            <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky">
                    <div class="list-group">
                        <a href="<?php echo site_url(); ?>/buku" class="list-group-item list-group-item-action"> Buku</a>
                        <a href="<?php echo site_url(); ?>/pengarang" class="list-group-item list-group-item-action active"> Pengarang</a>
                    </div>
                </div>
            </nav>

            <!-- main content -->
            <main class="col-md-9 col-lg-10 ml-sm-auto px-md-4 py-4">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Users</li>
                    </ol>
                </nav>
                <h3>Dashboard Pengarang</h3>

                <div class="row">
                    <div class="col-12 col-xs-12 mb-4 mb-lg-0">
                        <div class="card shadow-sm">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5 class="card-title mb-0">Data Pengarang</h5>
                                <button data-bs-target="#myModal" data-bs-toggle="modal" @click="showModal(null)" class="btn btn-primary">Tambah Data</button>
                            </div>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped text-center">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Id Pengarang</th>
                                                <th>Nama Pengarang</th>
                                                <th>No telepon</th>
                                                <th>email</th>
                                                <th>alamat</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="(row, index) in aData" :key="row.id_pengarang">
                                                <td>{{ index + 1 }}</td>
                                                <td>{{ row.id_pengarang }}</td>
                                                <td>{{ row.nama_pengarang }}</td>
                                                <td>{{ row.no_telp }}</td>
                                                <td>{{ row.email }}</td>
                                                <td>{{ row.alamat }}</td>
                                                <td>
                                                    <a href="#" data-bs-target="#myModal" data-bs-toggle="modal" @click="showModal(row)" class="btn btn-sm btn-success">Edit</a>
                                                    <a href="#" @click="hapusdata(row.id_pengarang)" class="btn btn-sm btn-danger">Delete</a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- footer -->
                <footer class="pt-5 d-flex justify-content-between">
                     <div class="card-footer"> </div>
                    <span>Copyright &copy; 2024 <a href="informatika.unpam.ac.id">UAS Pemrograman Web 2</a></span>
                </footer>

        <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <form class="needs-validation" novalidate>
                        <div class="modal-header bg-success text-white">
                            <h5 class="modal-title" id="myModalLabel">{{ oData.method == 'post' ? 'Tambah' : 'Edit' }} Data</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="id_pengarang" class="form-label">Id Pengarang</label>
                                    <input type="text" id="id_pengarang" v-model="oData.id_pengarang" class="form-control" required>
                                    <div class="invalid-feedback">Field ini wajib diisi</div>
                                </div>
                                <div class="col-md-6">
                                    <label for="nama_pengarang" class="form-label">Nama Pengarang</label>
                                    <input type="text" id="nama_pengarang" v-model="oData.nama_pengarang" class="form-control" required>
                                    <div class="invalid-feedback">Field ini wajib diisi</div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="no_telp" class="form-label">No telepon</label>
                                    <input type="text" id="no_telp" v-model="oData.no_telp" class="form-control" required>
                                    <div class="invalid-feedback">Field ini wajib diisi</div>
                                </div>
                                <div class="col-md-6">
                                    <label for="email" class="form-label">E-Mail</label>
                                    <input type="email" id="email" v-model="oData.email" class="form-control" required>
                                    <div class="invalid-feedback">Field ini wajib diisi</div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <input type="text" id="alamat" v-model="oData.alamat" class="form-control" required>
                                    <div class="invalid-feedback">Field ini wajib diisi</div>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" @click="simpandata" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="<?php echo base_url(); ?>assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/vue.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/axios.min.js"></script>

    <script>
        var v = new Vue({
            el: "#app",
            data: {
                apiUrl: '<?php echo base_url();?>index.php/api/',
                aData: [],
                oData: {
                    id_pengarang: '',
                    nama_pengarang: '',
                    no_telp: '',
                    email: '',
                    alamat: '',
                    method: '',
                }
            },
            created() {
                this.showdata();
            },
            methods: {
                showModal(oRow) {
                    if (oRow == null) {
                        this.oData.method = 'post';
                        this.oData.id_pengarang = '';
                        this.oData.nama_pengarang = '';
                        this.oData.no_telp = '';
                        this.oData.email = '';
                        this.oData.alamat = '';
                    } else {
                        this.oData.method = 'put';
                        this.oData.id_pengarang = oRow.id_pengarang;
                        this.oData.nama_pengarang = oRow.nama_pengarang;
                        this.oData.no_telp = oRow.no_telp;
                        this.oData.email = oRow.email;
                        this.oData.alamat = oRow.alamat;
                    }
                    var modal = new bootstrap.Modal(document.getElementById('myModal'));
                    modal.show();
                },

                showdata() {
                    axios.get(this.apiUrl + 'pengarang')
                        .then(response => {
                            this.aData = response.data;
                        })
                        .catch(error => {
                            console.log(error);
                        });
                },

                hapusdata(id_pengarang) {
                    if (confirm("Apakah yakin data akan dihapus?")) {
                        axios.delete(this.apiUrl + 'pengarang/' + id_pengarang)
                            .then(response => {
                                this.showdata();
                            })
                            .catch(error => {
                                console.log(error);
                            });
                    }
                },

                oUriFormData(obj) {
                    var formData = new URLSearchParams();
                    for (var key in obj) {
                        formData.append(key, obj[key]);
                    }
                    return formData.toString();
                },

                simpandata() {
                    var dt = this.oUriFormData(this.oData);
                    if (this.oData.method == 'post') {
                        axios.post(this.apiUrl + 'pengarang', dt, {
                            headers: {
                                'Content-Type': 'application/x-www-form-urlencoded'
                            }
                        }).then(response => {
                            this.showdata();
                            this.closeModal();
                        }).catch(error => {
                            console.log(error);
                        });
                    } else {
                        axios.put(this.apiUrl + 'pengarang', dt, {
                            headers: {
                                'Content-Type': 'application/x-www-form-urlencoded'
                            }
                        }).then(response => {
                            this.showdata();
                            this.closeModal();
                        }).catch(error => {
                            console.log(error);
                        });
                    }
                },

                closeModal() {
                    var modal = new bootstrap.Modal(document.getElementById('myModal'));
                    modal.hide();
                }
            }
        });
    </script>
</body>

</html>
