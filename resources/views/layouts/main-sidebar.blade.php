<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">
                    <!--start Dashboard-->
                    <li>
                        <a href="{{ route('dashboard') }}">
                            <div class="pull-left"><i class="ti-home"></i><span
                                    class="right-nav-text">{{ trans('main_trans.dashboard') }}</span></div>
                            <div class="clearfix"></div>
                        </a>
                    </li>
                    <!-- end Dashboard- -->
                    <!-- start school_grade -->
                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">{{ trans('main_trans.school_grade') }}</li>
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#school_grade">
                            <div class="pull-left"><i class="ti-palette"></i><span
                                    class="right-nav-text">{{ trans('main_trans.school_grade') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="school_grade" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{ route('grades.index') }}">{{ trans('main_trans.school_grade_list') }}</a></li>
                        </ul>
                    </li>
                    <!-- end school_grade -->
                    <!-- start classroom -->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#classroom">
                            <div class="pull-left"><i class="ti-palette"></i><span
                                    class="right-nav-text">{{ trans('main_trans.classroom') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="classroom" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{ route('school_classrooms.index') }}">{{ trans('main_trans.classroom_list') }}</a></li>
                        </ul>
                    </li>
                    <!-- end classroom -->
                    <!-- start section -->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#section">
                            <div class="pull-left"><i class="ti-palette"></i><span
                                    class="right-nav-text">{{ trans('main_trans.sections') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="section" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{ route('sections.index') }}">{{ trans('main_trans.sections_lists') }}</a></li>
                        </ul>
                    </li>
                    <!-- end section -->
                    <!-- start parents -->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#parents">
                            <div class="pull-left"><i class="ti-palette"></i><span
                                    class="right-nav-text">{{ trans('main_trans.parents') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="parents" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{ route('stuParents') }}">{{ trans('main_trans.parents_list') }}</a></li>
                        </ul>
                    </li>
                    <!-- end parents -->
                </ul>
            </div>
        </div>

        <!-- Left Sidebar End-->

        <!--=================================
