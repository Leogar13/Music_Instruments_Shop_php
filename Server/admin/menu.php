<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Admin</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Home</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Interface
      </div>

      <!-- Nav Item - Quản trị hệ thống -->
      <?php 
              if(count($_SESSION['permission'])!=0){
              
              for ($i=0; $i < count($_SESSION['permission']); $i++) { 
               
               if(!empty(array_search("System", $_SESSION['permission'][$i]))){ 
                
                ?>
                <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSystem" aria-expanded="true"
          aria-controls="collapseSystem">
          <i class="fas fa-fw fa-cog"></i>
          <span>Quản trị hệ thống</span>
        </a>
        <div id="collapseSystem" class="collapse" aria-labelledby="collapseSystem" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="user/user.php">Quản lý người dùng</a>
            <a class="collapse-item" href="permission/permission.php">Quản lý chức năng</a>
            <a class="collapse-item" href="role/role.php">Quản lý vai trò</a>
            <a class="collapse-item" href="logout_action.php">Đăng xuất</a>
            
            <hr class="myhr"/>
            <a class="collapse-item" href="">Sao lưu</a>
          </div>
        </div>
      </li>
                <?php break;}
              }
              } ?>
      

          <?php 
              if(count($_SESSION['permission'])!=0){
              
              for ($i=0; $i < count($_SESSION['permission']); $i++) { 
               
               if(!empty(array_search("Warehouse", $_SESSION['permission'][$i]))){ 
                
                ?>
                <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseInitSystem" aria-expanded="true"
          aria-controls="collapseInitSystem">
          <i class="fas fa-fw fa-cog"></i>
          <span>Quản trị sản phẩm</span>
        </a>
        <div id="collapseInitSystem" class="collapse" aria-labelledby="collapseInitSystem" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="products/product.php">Danh sách sản phẩm</a>
            <a class="collapse-item" href="category/category.php">Danh sách loại sản phẩm</a>
            <a class="collapse-item" href="warehouse/warehouse.php">Nhập hàng</a>
            <a class="collapse-item" href="order/order.php">Kiểm tra đơn hàng</a>
            <hr class="myhr"/>
            <a class="collapse-item" href="">Nhóm nhà cung cấp</a>
            <a class="collapse-item" href="">Nguồn kinh phí</a>
            <a class="collapse-item" href="">Kho vật tư</a>
            <a class="collapse-item" href="">Vât tư thiết bị</a>
          </div>
        </div>
      </li>
                <?php break;}
              }
              } ?>
      <!-- Nav Item - Quản trị hệ thống -->
    

      

    </ul>