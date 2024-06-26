<!DOCTYPE html>
<html lang="tr">

<?php $this->load->view("includes/header");?>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

 

  <?php $this->load->view("includes/navbar");?>

  <?php $this->load->view("includes/sidebar");?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Ürün Kategorileri İşlemleri</h1>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Ürün Kategorileri</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Id</th>
                    <th>Kategori Adı</th>
                    <th>Durumu</th>
                    <th>Oluşturma Tarihi</th>
                    <th>Sil/Güncelle</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($items as $item) { ?>
                  <tr>
                    <td><?php echo $item->id; ?></td>
                    <td><?php echo $item->title; ?></td>
                    <td><?php echo $item->is_active == 1 ? "Aktif" : "Pasif"; ?></td>
                    <td><?php echo $item->created_at; ?></td>
                    <td><?php  ?></td>
                  
                  </tr>
             <?php   } ?>
                  </tbody>
                </table>
              </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  <?php $this->load->view("includes/footer");?>
