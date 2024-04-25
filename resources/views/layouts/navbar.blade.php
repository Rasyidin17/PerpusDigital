<!--begin::Navbar-->
<div class="d-flex align-items-stretch" id="kt_header_nav">
    <!--begin::Menu wrapper-->
    <div class="header-menu align-items-stretch" data-kt-drawer="true" data-kt-drawer-name="header-menu" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="end" data-kt-drawer-toggle="#kt_header_menu_mobile_toggle" data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav'}">
        <!--begin::Menu-->
        <div class="menu menu-lg-rounded menu-column menu-lg-row menu-state-bg menu-title-gray-700 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-400 fw-bold my-5 my-lg-0 align-items-stretch" id="#kt_header_menu" data-kt-menu="true">
            <div class="menu-item me-lg-1">
                <a class="menu-link {{ request()->is('dashboards*') ? 'active' : '' }}" href="{{ route('dashboards.index') }}">
                    <span class="menu-title">Dashboard</span>
                </a>
            </div>
            <div data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start" class="menu-item menu-lg-down-accordion me-lg-1">
                <a class="menu-link {{ request()->is('books*') ? 'active' : '' }}" href="{{ route('books.index') }}">
                    <span class="menu-title">Book</span>
                </a>
            </div>
            <div data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start" class="menu-item menu-lg-down-accordion me-lg-1">
                <a class="menu-link {{ request()->is('categories*') ? 'active' : '' }}" href="{{ route('categories.index') }}">
                    <span class="menu-title">Categories</span>
                </a>
            </div>
            <div data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start" class="menu-item menu-lg-down-accordion me-lg-1">
                <a class="menu-link {{ request()->is('users*') ? 'active' : '' }}" href="{{ route('users.index') }}">
                    <span class="menu-title">Account</span>
                </a>
            </div>
            <div data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start" class="menu-item menu-lg-down-accordion me-lg-1">
                <a class="menu-link {{ request()->is('borrowings*') ? 'active' : '' }}" href="{{ route('borrowings.index') }}">
                    <span class="menu-title">Borrowing</span>
                </a>
            </div>
        </div>
        <!--end::Menu-->
    </div>
    <!--end::Menu wrapper-->
</div>
<!--end::Navbar-->
