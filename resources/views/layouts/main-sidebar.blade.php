<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">
                    <!-- menu item Dashboard-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#dashboard">
                            <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">الصفحة الرائسية</span>
                            </div>

                            <div class="clearfix"></div>
                        </a>

                    </li>
                    <!-- menu title -->
                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">المحتوى </li>
                    <!-- menu item Elements-->
                 @can("user_access")
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#users">
                            <div class="pull-left"><i class="ti-palette"></i><span
                                    class="right-nav-text">الموظفين</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="users" class="collapse" data-parent="#users">
                            <li><a href="{{route("dashboard.user.index")}}"> كل الموظفين </a></li>
                            <li><a href="{{route("dashboard.user.create")}}"> اضافة موظف </a></li>
                        </ul>
                    </li>
                    <!-- menu item calendar-->
                 @endcan
                 @can("city_access")
                    <!-- menu item Elements-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#cities">
                            <div class="pull-left"><i class="ti-palette"></i><span
                                    class="right-nav-text">المدن</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="cities" class="collapse" data-parent="#cities">
                            <li><a href="{{route("dashboard.city.index")}}"> كل المدن </a></li>
                            <li><a href="{{route("dashboard.city.create")}}"> اضافة مدينة </a></li>
                        </ul>
                    </li>
                    <!-- menu item calendar-->
                 @endcan
                  @can("step_access")
                    <!-- menu item Elements-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#steps">
                            <div class="pull-left"><i class="ti-palette"></i><span
                                    class="right-nav-text"> المراحل</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="steps" class="collapse" data-parent="#steps">
                            <li><a href="{{route("dashboard.step.index")}}"> كل المراحل </a></li>
                            <li><a href="{{route("dashboard.step.create")}}"> اضافة مرحلة </a></li>
                        </ul>
                    </li>
                    <!-- menu item calendar-->
                  @endcan
                    <!-- menu item Elements-->
                @can("group_access")
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#group">
                            <div class="pull-left"><i class="ti-palette"></i><span
                                    class="right-nav-text"> المجموعات</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="group" class="collapse" data-parent="#group">
                            <li><a href="{{route("dashboard.group.index")}}"> كل المجموعات </a></li>
                            <li><a href="{{route("dashboard.group.create")}}"> اضافة مجموعة </a></li>
                        </ul>
                    </li>
                    <!-- menu item calendar-->

                @endcan
                @can("apartment_access")
                    <!-- menu item Elements-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#apartment">
                            <div class="pull-left"><i class="ti-palette"></i><span
                                    class="right-nav-text"> الوحدات</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="apartment" class="collapse" data-parent="#apartment">
                            <li><a href="{{route("dashboard.apartment.index")}}"> كل الوحدات </a></li>
                            <li><a href="{{route("dashboard.apartment.create")}}"> اضافة وحدة </a></li>
                            <li><a href="{{route("dashboard.apartment.mine")}}">  الوحدة المضافة بواسطتى </a></li>
                            <li><a href="{{route("dashboard.apartment.search")}}">  بحث عن وحدة </a></li>
                        </ul>
                    </li>
                    <!-- menu item Elements-->
                @endcan
                @can("role_access")
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#persmissions">
                            <div class="pull-left"><i class="ti-palette"></i><span
                                    class="right-nav-text"> الصلاحيات</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="persmissions" class="collapse" data-parent="#persmissions">
                            <li><a href="{{route("dashboard.role.index")}}"> كل الصلاحيات </a></li>
                            <li><a href="{{route("dashboard.role.create")}}"> اضافة صلاحية </a></li>
                        </ul>
                    </li>
                @endcan
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#changetextType">
                            <div class="pull-left"><i class="ti-palette"></i><span
                                    class="right-nav-text"> تعديل نص</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="changetextType" class="collapse" data-parent="#changetextType">
                            <li><a href="{{route("dashboard.apartment.changeTextType")}}"> تعديل </a></li>

                        </ul>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Left Sidebar End-->

        <!--=================================
