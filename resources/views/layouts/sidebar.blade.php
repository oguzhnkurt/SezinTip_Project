<!-- Main sidebar -->
<div class="sidebar sidebar-dark sidebar-main sidebar-expand-lg">

    <!-- Sidebar content -->
    <div class="sidebar-content">

        <!-- Sidebar header -->
        <div class="sidebar-section">
            <div class="sidebar-section-body d-flex justify-content-center">
                <h5 class="sidebar-resize-hide flex-grow-1 my-auto">Sezin Akademi</h5>

                <div>
                    <button type="button" class="btn btn-flat-white btn-icon btn-sm rounded-pill border-transparent sidebar-control sidebar-main-resize d-none d-lg-inline-flex">
                        <i class="ph-arrows-left-right"></i>
                    </button>

                    <button type="button" class="btn btn-flat-white btn-icon btn-sm rounded-pill border-transparent sidebar-mobile-main-toggle d-lg-none">
                        <i class="ph-x"></i>
                    </button>
                </div>
            </div>
        </div>
        <!-- /sidebar header -->

        <!-- Main navigation -->
        <div class="sidebar-section">
            <ul class="nav nav-sidebar" id="navbar-nav" data-nav-type="accordion">

                <!-- Main -->
                <li class="nav-item-header pt-0">
                    <div class="text-uppercase fs-sm lh-sm opacity-50 sidebar-resize-hide">Ana Sayfa</div>
                    <i class="ph-dots-three sidebar-resize-show"></i>
                </li>
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link">
                        <i class="ph-house"></i>
                        <span>
                            Ana Sayfa
                            <span class="d-block fw-normal opacity-50">Bekleyen işlem yok</span>
                        </span>
                    </a>
                </li>

                <!-- Forms -->
                <li class="nav-item-header">
                    <div class="text-uppercase fs-sm lh-sm opacity-50 sidebar-resize-hide">Modüller</div>
                    <i class="ph-dots-three sidebar-resize-show"></i>
                </li>
                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link">
                        <i class="ph-note-pencil"></i>
                        <span>Eğitim</span>
                    </a>
                    <ul class="nav-group-sub collapse">
                        <li class="nav-item"><a href="{{ route('schedule.index') }}" class="nav-link">Eğitim Takvimi</a></li>
                        <li class="nav-item"><a href="form_checkboxes_radios" class="nav-link">Akademi &amp; Eğitimler</a></li>
                        <li class="nav-item"><a href="form_dual_listboxes" class="nav-link">Sınav Sonuçları (Admin) </a></li>
                                <li class="nav-item"><a href="form_controls_extended" class="nav-link">Başarı Durumları</a></li>
                                <li class="nav-item"><a href="form_floating_labels" class="nav-link">Başarısızlık Raporu</a></li>
                                <li class="nav-item"><a href="form_actions" class="nav-link">Başarı Sertifikası</a></li>
                                <li class="nav-item"><a href="form_wizard" class="nav-link">Özel Yönetim Raporu (Admin) </a></li>
                    </ul>
                </li>

                
            </ul>
        </div>
        <!-- /main navigation -->

    </div>
    <!-- /sidebar content -->

</div>
<!-- /main sidebar -->
