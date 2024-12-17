 <!--**********************************
            Nav header start
        ***********************************-->
 <div class="nav-header">
     <a href="index.html" class="brand-logo">
         <?php if (!empty($logo_cop)) : ?>
         <img src="<?= base_url('assets/gif/gif3.gif') ?>" width="56" alt="">
         <?php else : ?>
         <img src="<?= base_url('assets/gif/gif3.gif') ?>" width="56" alt="">
         <?php endif; ?>
         <div class="brand-title">
             <h2 class=""><?php echo $singkatan; ?></h2>
             <span class="brand-sub-title"><?php echo $company; ?></span>
         </div>
     </a>
     <div class="nav-control">
         <div class="hamburger">
             <span class="line"></span><span class="line"></span><span class="line"></span>
         </div>
     </div>
 </div>
 <!--**********************************
            Nav header end
        ***********************************-->

 <!--**********************************
            Header start
        ***********************************-->
 <div class="header border-bottom">
     <div class="header-content">
         <nav class="navbar navbar-expand">
             <div class="collapse navbar-collapse justify-content-between">
                 <div class="header-left">
                     <div class="dashboard_bar">
                         <?php echo $title; ?>
                     </div>
                 </div>
                 <ul class="navbar-nav header-right">

                     <li class="nav-item dropdown  header-profile">
                         <a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
                             <?php if (!empty($logo_cop)) : ?>
                             <img src="<?= base_url('assets/gif/gif2.gif') ?>" width="56" alt="">
                             <?php else : ?>
                             <img src="<?= base_url('assets/gif/gif2.gif') ?>" width="56" alt="">
                             <?php endif; ?>
                         </a>
                         <?php if ($nama_admin=="DLA TEKNO"): ?>
                         <div class="dropdown-menu dropdown-menu-end">
                             <a href="<?= base_url('home/logout') ?>" class="dropdown-item ai-icon">
                                 <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18"
                                     height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                     stroke-linecap="round" stroke-linejoin="round">
                                     <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                     <polyline points="16 17 21 12 16 7"></polyline>
                                     <line x1="21" y1="12" x2="9" y2="12"></line>
                                 </svg>
                                 <span class="ms-2">Home </span>
                             </a>
                         </div>
                         <?php else: ?>
                         <div class="dropdown-menu dropdown-menu-end">
                             <a href="<?= base_url('home/logout') ?>" class="dropdown-item ai-icon">
                                 <span class="ms-2">Home </span>
                             </a>
                         </div>


                         <?php endif; ?>

                     </li>
                 </ul>
             </div>
         </nav>
     </div>
 </div>