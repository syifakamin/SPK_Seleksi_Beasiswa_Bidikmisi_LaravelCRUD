
@extends('layout.admin.admin_app')

@section('judul')
Management User - 
@endsection

@section('content')

<!-- Main Sidebar -->

    <div class="main-sidebar">
            <aside id="sidebar-wrapper">
              <div class="sidebar-brand">
                <a href="index.html">SIBIDIK-UMG</a>
              </div>
              <div class="sidebar-brand sidebar-brand-sm">
                <a href="index.html">UMG</a>
              </div>
              <ul class="sidebar-menu">
                  <li class="menu-header">Dashboard</li>
                  <li class="nav-item dropdown">
                    <a href="#" class="nav-link"><i class="fas fa-fire"></i><span>Beranda</span></a>
                  </li>
                  <li class="menu-header">Managemen Data</li>
                  <!-- Tambahkan active ketika sidebar tersebut diklik -->
                  <li class="nav-item dropdown active">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Managemen Data</span></a>
                    <ul class="dropdown-menu">
                      <!-- Tambahkan active ketika sidebar tersebut diklik -->
                      <li><a class="nav-link" href="/managemen_user">Managemen User</a></li>
                      <li class="active"><a class="nav-link" href="/kriteria">Data Kriteria & Bobot</a></li>
                      <li><a class="nav-link" href="/kriteria">Data Calon Mahasiswa </a></li>
                    </ul>
                  </li>
                  <li class="menu-header">Penilaian</li>
                  <li class="nav-item dropdown">
                    <a href="#" class="nav-link"><i class="far fa-user"></i> <span>Penilaian kriteria</span></a>
                  </li>
                  <li class="menu-header">Sistem Pendukung Keputusan</li>
                  <li class="nav-item dropdown">
                    <a href="#" class="nav-link"><i class="fas fa-th-large"></i> <span>Perangkingan WASPAS</span></a>
                  </li>
                  <li class="menu-header">Laporan</li>
                  <li class="nav-item dropdown">
                    <a href="#" class="nav-link"><i class="far fa-file-alt"></i> <span>Hasil Perangkingan</span></a>
                  </li>
                  <li class="menu-header">Tentang Aplikasi</li>
                  <li class="nav-item dropdown">
                    <a href="#" class="nav-link"><i class="fas fa-rocket"></i> <span>Tentang Aplikasi</span></a>
                  </li>
                </ul>

                <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
                  <a href="https://github.com/syifakamin/sibidik-UMG" class="btn btn-primary btn-lg btn-block btn-icon-split">
                    <i class="fas fa-rocket"></i> Kembangkan Aplikasi
                  </a>
                </div>
            </aside>
          </div>
    <!-- End Sidebar Section -->
  
  <!-- Section Header -->
    <div class="section-header">
            <h3>Data User</h3>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item">Management Data</div>
              <div class="breadcrumb-item">Data User</div>
            </div>
          </div>
          <h6 class="section-title">Fitur ini digunakan untuk menambah, menyunting, dan hapus Data User</h6>

        <!-- Alert jika sukses -->
        @if(session('sukses'))
          <div class="alert alert-success alert-dismissible show fade">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                          <span>×</span>
                        </button>
                        {{session('sukses')}}
                      </div>
                    </div>
                    @endif

        <!-- Contoh Table -->
        <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Data User</h4>
                    <div class="input-group-btn" style="position: absolute; right: 10px;">

                              <!-- Button  -->
                              <!-- Button Modal Tambah Data trigger -->
                              @csrf
                              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter">
                                Tambah
                              </button>

                              <!-- Modal TAMBAH-->
                              <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLongTitle">Tambah User</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                    <form action="/user/create" method="POST">

                                    <!-- Cara mengatasi The PUT method is not supported for this route. Supported methods: GET, HEAD, POST. -->
                                    <input type="hidden" name="_method" value="POST">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
                                    <!-- End cara mengatasi -->
                                    
                                      <div class="form-group">
                                        <label for="name">Nama User</label>
                                        <input type="text" name="name" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Nama User" required>
                                      </div>

                                      <div class="form-group">
                                      <label for="role_user"> Role User </label>
                                        <div class="form-check">
                                          <input class="form-check-input" type="radio" name="role_user" id="admin_role" value="admin">
                                          <label class="form-check-label" for="admin_role">
                                            Admin / Staff 
                                          </label>
                                        </div>
                                        <div class="form-check">
                                          <input class="form-check-input" type="radio" name="role_user" id="juri_role" value="juri">
                                          <label class="form-check-label" for="juri_role">
                                            Juri
                                          </label>
                                        </div>
                                        <div class="form-check">
                                          <input class="form-check-input" type="radio" name="role_user" id="kepala_role" value="kepala">
                                          <label class="form-check-label" for="kepala_role">
                                            Kepala Biro
                                          </label>
                                        </div>
                                      </div>

                                      <div class="form-group">
                                        <label for="email">Email User</label>
                                        <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Email User" required>
                                      </div>

                                      <div class="form-group">
                                        <label for="password">Password </label>
                                        <input type="password" name="password" class="form-control" id="password" aria-describedby="emailHelp" placeholder="Password User" required>
                                      </div>

                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                      <button type="submit" class="btn btn-primary">Daftarkan</button>
                                      </form>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>

                              <!-- Modal EDIT-->
                              <div class="modal fade" id="edit_user" tabindex="-1" role="dialog" aria-labelledby="editModal" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="editTitle">Edit User</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                    <form action="{{ url('/user/update/') }}" method="POST">
                                     
                                      @csrf
                                      <input type="hidden" name="_method" value="POST">
                                      <input type="hidden" name="id" id="id" value="">

                                      <div class="form-group">
                                        <label for="name">Nama User</label>
                                        <input type="text" name="name" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Nama User" required>
                                      </div>

                                      <div class="form-group">
                                      <label for="role_user"> Role User </label>
                                        <div class="form-check">
                                          <input class="form-check-input" type="radio" name="role_user" id="admin_role" value="admin">
                                          <label class="form-check-label" for="admin_role">
                                            Admin / Staff 
                                          </label>
                                        </div>
                                        <div class="form-check">
                                          <input class="form-check-input" type="radio" name="role_user" id="juri_role" value="juri">
                                          <label class="form-check-label" for="juri_role">
                                            Juri
                                          </label>
                                        </div>
                                        <div class="form-check">
                                          <input class="form-check-input" type="radio" name="role_user" id="kepala_role" value="kepala">
                                          <label class="form-check-label" for="kepala_role">
                                            Kepala Biro
                                          </label>
                                        </div>
                                      </div>

                                      <div class="form-group">
                                        <label for="email">Email User</label>
                                        <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Email User" required>
                                      </div>

                                      <div class="form-group">
                                        <label for="password">Password </label>
                                        <input type="password" name="password" class="form-control" id="password" aria-describedby="emailHelp" placeholder="Password User" required>
                                      </div>

                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                      <button type="submit" class="btn btn-primary">Daftarkan</button>
                                      </form>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                    </div>
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table table-striped table-hover">
                        <tr>
                            <td>ID</td>
                            <td>Nama User</td>
                            <td>Role User</td>
                            <td>Email User </td>
                            <td>Password (terenkripsi)</td>
                            <td>Aksi</td>
                        </tr>
                        @foreach($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->role_user}}</td>
                            <td>{{$user->email}} </td>
                            <td>{{$user->password}}</td>
                            <td> 
                              <!-- Button Modal EDIT Data trigger -->
                              <button class="btn btn-warning" data-id="{{$user->id}}" data-nama_user="{{$user->name}}" data-role_user="{{$user->role_user}}" data-email="{{$user->email}}" data-password="{{$user->password}}" data-toggle="modal" data-target="#edit_user">
                                Edit
                              </button>

                              <!-- Button Modal DELETE data trigger -->
                              <button type="button" class="btn btn-danger" id="deleteBtn_user" data-id="{{$user->id}}">
                                Hapus
                              </button>
                            </td>
                        </tr>
                        @endforeach
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
@endsection

@section('js')
@endsection