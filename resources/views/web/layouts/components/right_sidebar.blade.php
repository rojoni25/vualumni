@push('css')

<style>
    .panel-title {
margin: 0;
}

.title-span{
	padding: 0%;
}
.panel-heading {
	padding: 5px 25px;
}
.panel-title > a {
	padding: 0px 15px;
	width: 100%;
}

.panel-title > a > span > i {
	padding: 0px 15px;
}
#nt-cr-container{
	height: 250px!important;
}
.panel-body #nt-cr-container {
	margin-top: 0px !important;
}
.panel-body #nt-cr-container > ul {
	margin-left: 0;
}
.panel-body {
	padding: 0;
}
.nav-tabs >:nth-child(1) a {
	background: #c44d2d;
}

.nav-tabs >:nth-child(2) a {
	background: #c44d2d;
}
.nav-tabs >:nth-child(3) a {
	background: #c44d2d;
}

.nav-tabs > li > a {
	font-weight: 800;
	color: white;
}

.tab-content{
	margin-top: 10px !important;
}

.nav-tabs > li > a:hover {
	font-weight: 800;
	color: #c44d2d;
	transition: 0.5s;
}

.panel-group .panel {
	padding: 0;
	background-color: white;
}
.panel-default > .panel-heading{
	background-color: #196aab;
	color: white;
	font-size: 10px;
}
.panel-title {
	font-size: 15px;
	text-align: left;
	color: white
}

.panel-title > a:hover {
		color: white;
}

.panel-title:hover {
	color: white;
}

.panel-default > .panel-heading:hover{
	background-color: #c44d2d;
	color: white;
}
</style>
@endpush
<div class="vu-gradient">
    <a href="<?php echo base_url(); ?>notice">
        <div class="show-all-btn">
            <h4 style="color: white; font-weight: 700; text-align: left; ">&nbsp;<i class="fas fa-exclamation-circle"></i>&nbsp;NOTICE</h4>
        </div>
    </a>
</div>


<div class="container" style="margin-top: 10px;margin-left:0px; height:410px; overflow:hidden;">
    <ul class="nav nav-tabs">
        <li class="active">
            <a href="#1" data-toggle="tab" style="padding: 10px 5px !important;">Admission</a>
        </li>
        <li><a href="#2" data-toggle="tab" style="padding: 10px 5px !important;">Administration</a>
        </li>
        <li><a href="#3" data-toggle="tab" onclick="toggleAll('')" style="padding: 10px 5px !important;">Dept</a>
        </li>
    </ul>

    <div class="tab-content ">
        <div class="tab-pane active" id="1">
            <div>
                <div style="background-color: #FFFBFA; box-shadow : 0px 0px 1px rgba(0, 0, 0, 0.75);">
                    <div id="nt-cr-container" style="margin-top: 15px; margin-bottom: 10px; height: 315px;">
                        <ul class="notice-slider1" id="nt-cr">
                            <?php
                            foreach ($admission_notices as $notice_row) {
                                echo '<li>';
                                echo '<div class="ticker-body"><i class="fa fa-file"></i><a href="' . base_url() . 'notice/details/' . $notice_row['auto_id'] . '">' . $notice_row['notice_title'] . ' - <span class="t-day">(' . date("d/m/Y", strtotime($notice_row['date'])) . ')</span></a>';
                                echo '</div>';
                                echo '</li>';
                            }
                            ?>
                        </ul>
                    </div>
                    <div class="btn btn-success" style="width: 100%; "> <a style="color: white;" href="<?php echo base_url(); ?>notice"><i class='fas fa-file-alt' style='font-size:14px;color:white'></i> More notices..</a> </div>
                </div>
            </div>
        </div>
        <div class="tab-pane" id="2">
            <div>
                <div style="background-color: #FFFBFA; box-shadow : 0px 0px 1px rgba(0, 0, 0, 0.75);">
                    <div id="nt-cr-container" style="margin-top: 15px; margin-bottom: 10px; height: 315px;">
                        <ul class="notice-slider2" id="nt-cr">
                            <?php
                            foreach ($notices2 as $notice_row) {
                                echo '<li>';
                                echo '<div class="ticker-body"><i class="fa fa-file"></i><a href="' . base_url() . 'notice/details/' . $notice_row['auto_id'] . '">' . $notice_row['notice_title'] . ' - <span class="t-day">(' . date("d/m/Y", strtotime($notice_row['date'])) . ')</span></a>';
                                echo '</div>';
                                echo '</li>';
                            }
                            ?>
                        </ul>
                    </div>
                    <div class="btn btn-success" style="width: 100%; "> <a style="color: white;" href="<?php echo base_url(); ?>notice"><i class='fas fa-file-alt' style='font-size:14px;color:white'></i> More notices..</a> </div>
                </div>
            </div>
        </div>
        <div class="tab-pane" id="3">
            <div class="panel-group" id="accordion">
                <div class="panel panel-default">
                    <div class="panel-heading" id="heading_ba">
                        <a data-toggle="collapse" data-parent="#accordion" onclick="toggleAll('heading_ba');" href="#ba">
                            <h4 class="panel-title">
                                <span class="title-span">BA</span><span style="float: right;"><i class="fa fa-angle-double-down"></i></span>
                            </h4>
                        </a>
                    </div>
                    <div id="ba" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div>
                                <div style="background-color: #FFFBFA; box-shadow : 0px 0px 1px rgba(0, 0, 0, 0.75);">
                                    <div id="nt-cr-container" style="margin-top: 15px; margin-bottom: 10px; height: 315px;">
                                        <ul class="notice-slider3" id="nt-cr">
                                            <?php
                                            foreach ($this->page_model->get_sidebar_notices('programbba') as $notice_row) {
                                                echo '<li>';
                                                echo '<div class="ticker-body"><i class="fa fa-file"></i><a href="' . base_url() . 'notice/details/' . $notice_row['auto_id'] . '">' . $notice_row['notice_title'] . ' - <span class="t-day">(' . date("d/m/Y", strtotime($notice_row['date'])) . ')</span></a>';
                                                echo '</div>';
                                                echo '</li>';
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                    <div class="btn btn-success" style="width: 100%; "> <a style="color: white;" href="<?php echo base_url(); ?>academics/departments/business-administration/notice"><i class='fas fa-file-alt' style='font-size:14px;color:white'></i> More notices..</a> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" id="heading_cse">
                        <a data-toggle="collapse" data-parent="#accordion" onclick="toggleAll('heading_cse');" href="#cse">
                            <h4 class="panel-title">
                                <span class="title-span">CSE</span><span style="float: right;"><i class="fa fa-angle-double-down"></i></span>
                            </h4>
                        </a>
                    </div>
                    <div id="cse" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div>
                                <div style="background-color: #FFFBFA; box-shadow : 0px 0px 1px rgba(0, 0, 0, 0.75);">
                                    <div id="nt-cr-container" style="margin-top: 15px; margin-bottom: 10px; height: 315px;">
                                        <ul class="notice-slider4" id="nt-cr">
                                            <?php
                                            foreach ($this->page_model->get_sidebar_notices('programcse') as $notice_row) {
                                                echo '<li>';
                                                echo '<div class="ticker-body"><i class="fa fa-file"></i><a href="' . base_url() . 'notice/details/' . $notice_row['auto_id'] . '">' . $notice_row['notice_title'] . ' - <span class="t-day">(' . date("d/m/Y", strtotime($notice_row['date'])) . ')</span></a>';
                                                echo '</div>';
                                                echo '</li>';
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                    <div class="btn btn-success" style="width: 100%; "> <a style="color: white;" href="<?php echo base_url(); ?>academics/departments/computer-science-and-engineering/notice"><i class='fas fa-file-alt' style='font-size:14px;color:white'></i> More notices..</a> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" id="heading_economics">
                        <a data-toggle="collapse" data-parent="#accordion" onclick="toggleAll('heading_economics');" href="#economics">
                            <h4 class="panel-title">
                                <span class="title-span">Economics</span><span style="float: right;"><i class="fa fa-angle-double-down"></i></span>
                            </h4>
                        </a>
                    </div>
                    <div id="economics" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div>
                                <div style="background-color: #FFFBFA; box-shadow : 0px 0px 1px rgba(0, 0, 0, 0.75);">
                                    <div id="nt-cr-container" style="margin-top: 15px; margin-bottom: 10px; height: 315px;">
                                        <ul class="notice-slider5" id="nt-cr">
                                            <?php
                                            foreach ($this->page_model->get_sidebar_notices('programeco') as $notice_row) {
                                                echo '<li>';
                                                echo '<div class="ticker-body"><i class="fa fa-file"></i><a href="' . base_url() . 'notice/details/' . $notice_row['auto_id'] . '">' . $notice_row['notice_title'] . ' - <span class="t-day">(' . date("d/m/Y", strtotime($notice_row['date'])) . ')</span></a>';
                                                echo '</div>';
                                                echo '</li>';
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                    <div class="btn btn-success" style="width: 100%; "> <a style="color: white;" href="<?php echo base_url(); ?>academics/departments/economics/notice"><i class='fas fa-file-alt' style='font-size:14px;color:white'></i> More notices..</a> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" id="heading_eee">
                        <a data-toggle="collapse" data-parent="#accordion" onclick="toggleAll('heading_eee');" href="#eee">
                            <h4 class="panel-title">
                                <span class="title-span">EEE</span><span style="float: right;"><i class="fa fa-angle-double-down"></i></span>
                            </h4>
                        </a>
                    </div>
                    <div id="eee" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div>
                                <div style="background-color: #FFFBFA; box-shadow : 0px 0px 1px rgba(0, 0, 0, 0.75);">
                                    <div id="nt-cr-container" style="margin-top: 15px; margin-bottom: 10px; height: 315px;">
                                        <ul class="notice-slider6" id="nt-cr">
                                            <?php
                                            foreach ($this->page_model->get_sidebar_notices('programeee') as $notice_row) {
                                                echo '<li>';
                                                echo '<div class="ticker-body"><i class="fa fa-file"></i><a href="' . base_url() . 'notice/details/' . $notice_row['auto_id'] . '">' . $notice_row['notice_title'] . ' - <span class="t-day">(' . date("d/m/Y", strtotime($notice_row['date'])) . ')</span></a>';
                                                echo '</div>';
                                                echo '</li>';
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                    <div class="btn btn-success" style="width: 100%; "> <a style="color: white;" href="<?php echo base_url(); ?>academics/departments/electrical-and-electronic-engineering/notice"><i class='fas fa-file-alt' style='font-size:14px;color:white'></i> More notices..</a> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" id="heading_english">
                        <a data-toggle="collapse" data-parent="#accordion" onclick="toggleAll('heading_english');" href="#english">
                            <h4 class="panel-title">
                                <span class="title-span">English</span><span style="float: right;"><i class="fa fa-angle-double-down"></i></span>
                            </h4>
                        </a>
                    </div>
                    <div id="english" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div>
                                <div style="background-color: #FFFBFA; box-shadow : 0px 0px 1px rgba(0, 0, 0, 0.75);">
                                    <div id="nt-cr-container" style="margin-top: 15px; margin-bottom: 10px; height: 315px;">
                                        <ul class="notice-slider7" id="nt-cr">
                                            <?php
                                            foreach ($this->page_model->get_sidebar_notices('programeng') as $notice_row) {
                                                echo '<li>';
                                                echo '<div class="ticker-body"><i class="fa fa-file"></i><a href="' . base_url() . 'notice/details/' . $notice_row['auto_id'] . '">' . $notice_row['notice_title'] . ' - <span class="t-day">(' . date("d/m/Y", strtotime($notice_row['date'])) . ')</span></a>';
                                                echo '</div>';
                                                echo '</li>';
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                    <div class="btn btn-success" style="width: 100%; "> <a style="color: white;" href="<?php echo base_url(); ?>academics/departments/english/notice"><i class='fas fa-file-alt' style='font-size:14px;color:white'></i> More notices..</a> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" id="heading_jcms">
                        <a data-toggle="collapse" data-parent="#accordion" onclick="toggleAll('heading_jcms');" href="#jcms">
                            <h4 class="panel-title">
                                <span class="title-span">JCMS</span><span style="float: right;"><i class="fa fa-angle-double-down"></i></span>
                            </h4>
                        </a>
                    </div>
                    <div id="jcms" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div>
                                <div style="background-color: #FFFBFA; box-shadow : 0px 0px 1px rgba(0, 0, 0, 0.75);">
                                    <div id="nt-cr-container" style="margin-top: 15px; margin-bottom: 10px; height: 315px;">
                                        <ul class="notice-slider8" id="nt-cr">
                                            <?php
                                            foreach ($this->page_model->get_sidebar_notices('programjour') as $notice_row) {
                                                echo '<li>';
                                                echo '<div class="ticker-body"><i class="fa fa-file"></i><a href="' . base_url() . 'notice/details/' . $notice_row['auto_id'] . '">' . $notice_row['notice_title'] . ' - <span class="t-day">(' . date("d/m/Y", strtotime($notice_row['date'])) . ')</span></a>';
                                                echo '</div>';
                                                echo '</li>';
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                    <div class="btn btn-success" style="width: 100%; "> <a style="color: white;" href="<?php echo base_url(); ?>academics/departments/journalism-communication-and-media-studies/notice"><i class='fas fa-file-alt' style='font-size:14px;color:white'></i> More notices..</a> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" id="heading_law">
                        <a data-toggle="collapse" data-parent="#accordion" onclick="toggleAll('heading_law');" href="#law">
                            <h4 class="panel-title">
                                <span class="title-span">Law and HR</span><span style="float: right;"><i class="fa fa-angle-double-down"></i></span>
                            </h4>
                        </a>
                    </div>
                    <div id="law" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div>
                                <div style="background-color: #FFFBFA; box-shadow : 0px 0px 1px rgba(0, 0, 0, 0.75);">
                                    <div id="nt-cr-container" style="margin-top: 15px; margin-bottom: 10px; height: 315px;">
                                        <ul class="notice-slider9" id="nt-cr">
                                            <?php
                                            foreach ($this->page_model->get_sidebar_notices('programllb') as $notice_row) {
                                                echo '<li>';
                                                echo '<div class="ticker-body"><i class="fa fa-file"></i><a href="' . base_url() . 'notice/details/' . $notice_row['auto_id'] . '">' . $notice_row['notice_title'] . ' - <span class="t-day">(' . date("d/m/Y", strtotime($notice_row['date'])) . ')</span></a>';
                                                echo '</div>';
                                                echo '</li>';
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                    <div class="btn btn-success" style="width: 100%; "> <a style="color: white;" href="<?php echo base_url(); ?>academics/departments/law-and-human-rights/notice"><i class='fas fa-file-alt' style='font-size:14px;color:white'></i> More notices..</a> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" id="heading_pharmacy">
                        <a data-toggle="collapse" data-parent="#accordion" onclick="toggleAll('heading_pharmacy');" href="#pharmacy">
                            <h4 class="panel-title">
                                <span class="title-span">Pharmacy</span><span style="float: right;"><i class="fa fa-angle-double-down"></i></span>
                            </h4>
                        </a>
                    </div>
                    <div id="pharmacy" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div>
                                <div style="background-color: #FFFBFA; box-shadow : 0px 0px 1px rgba(0, 0, 0, 0.75);">
                                    <div id="nt-cr-container" style="margin-top: 15px; margin-bottom: 10px; height: 315px;">
                                        <ul class="notice-slider10" id="nt-cr">
                                            <?php
                                            foreach ($this->page_model->get_sidebar_notices('programpharm') as $notice_row) {
                                                echo '<li>';
                                                echo '<div class="ticker-body"><i class="fa fa-file"></i><a href="' . base_url() . 'notice/details/' . $notice_row['auto_id'] . '">' . $notice_row['notice_title'] . ' - <span class="t-day">(' . date("d/m/Y", strtotime($notice_row['date'])) . ')</span></a>';
                                                echo '</div>';
                                                echo '</li>';
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                    <div class="btn btn-success" style="width: 100%; "> <a style="color: white;" href="<?php echo base_url(); ?>academics/departments/pharmacy/notice"><i class='fas fa-file-alt' style='font-size:14px;color:white'></i> More notices..</a> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" id="heading_polscience">
                        <a data-toggle="collapse" data-parent="#accordion" onclick="toggleAll('heading_polscience');" href="#polscience">
                            <h4 class="panel-title">
                                <span class="title-span">Political Science</span><span style="float: right;"><i class="fa fa-angle-double-down"></i></span>
                            </h4>
                        </a>
                    </div>
                    <div id="polscience" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div>
                                <div style="background-color: #FFFBFA; box-shadow : 0px 0px 1px rgba(0, 0, 0, 0.75);">
                                    <div id="nt-cr-container" style="margin-top: 15px; margin-bottom: 10px; height: 315px;">
                                        <ul class="notice-slider11" id="nt-cr">
                                            <?php
                                            foreach ($this->page_model->get_sidebar_notices('polscience') as $notice_row) {
                                                echo '<li>';
                                                echo '<div class="ticker-body"><i class="fa fa-file"></i><a href="' . base_url() . 'notice/details/' . $notice_row['auto_id'] . '">' . $notice_row['notice_title'] . ' - <span class="t-day">(' . date("d/m/Y", strtotime($notice_row['date'])) . ')</span></a>';
                                                echo '</div>';
                                                echo '</li>';
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                    <div class="btn btn-success" style="width: 100%; "> <a style="color: white;" href="<?php echo base_url(); ?>academics/departments/political-science/notice"><i class='fas fa-file-alt' style='font-size:14px;color:white'></i> More notices..</a> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" id="heading_mph">
                        <a data-toggle="collapse" data-parent="#accordion" onclick="toggleAll('heading_mph');" href="#mph">
                            <h4 class="panel-title">
                                <span class="title-span">Public Health</span><span style="float: right;"><i class="fa fa-angle-double-down"></i></span>
                            </h4>
                        </a>
                    </div>
                    <div id="mph" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div>
                                <div style="background-color: #FFFBFA; box-shadow : 0px 0px 1px rgba(0, 0, 0, 0.75);">
                                    <div id="nt-cr-container" style="margin-top: 15px; margin-bottom: 10px; height: 315px;">
                                        <ul class="notice-slider12" id="nt-cr">
                                            <?php
                                            foreach ($this->page_model->get_sidebar_notices('programmph') as $notice_row) {
                                                echo '<li>';
                                                echo '<div class="ticker-body"><i class="fa fa-file"></i><a href="' . base_url() . 'notice/details/' . $notice_row['auto_id'] . '">' . $notice_row['notice_title'] . ' - <span class="t-day">(' . date("d/m/Y", strtotime($notice_row['date'])) . ')</span></a>';
                                                echo '</div>';
                                                echo '</li>';
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                    <div class="btn btn-success" style="width: 100%; "> <a style="color: white;" href="<?php echo base_url(); ?>academics/departments/public-health/notice"><i class='fas fa-file-alt' style='font-size:14px;color:white'></i> More notices..</a> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" id="heading_sociology">
                        <a data-toggle="collapse" data-parent="#accordion" onclick="toggleAll('heading_sociology');" href="#sociology">
                            <h4 class="panel-title">
                                <span class="title-span">Sociology</span><span style="float: right;"><i class="fa fa-angle-double-down"></i></span>
                            </h4>
                        </a>
                    </div>
                    <div id="sociology" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div>
                                <div style="background-color: #FFFBFA; box-shadow : 0px 0px 1px rgba(0, 0, 0, 0.75);">
                                    <div id="nt-cr-container" style="margin-top: 15px; margin-bottom: 10px; height: 315px;">
                                        <ul class="notice-slider13" id="nt-cr">
                                            <?php
                                            foreach ($this->page_model->get_sidebar_notices('programsocio') as $notice_row) {
                                                echo '<li>';
                                                echo '<div class="ticker-body"><i class="fa fa-file"></i><a href="' . base_url() . 'notice/details/' . $notice_row['auto_id'] . '">' . $notice_row['notice_title'] . ' - <span class="t-day">(' . date("d/m/Y", strtotime($notice_row['date'])) . ')</span></a>';
                                                echo '</div>';
                                                echo '</li>';
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                    <div class="btn btn-success" style="width: 100%; "> <a style="color: white;" href="<?php echo base_url(); ?>academics/departments/sociology/notice"><i class='fas fa-file-alt' style='font-size:14px;color:white'></i> More notices..</a> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('js')

<script>
    $(document).ready(function() {
        $(".title-span").each(function() {
            alert($(this).width());
        })
    })

    function toggleAll(id) {
        if (id == '') {
            $(".in").removeClass("in");
            $(".open").removeClass("open");
            $(".panel-heading").show().fadeIn();
        } else if (id != '') {
            if ($(".panel-heading").hasClass('open')) {
                $(".panel-heading a h4 span i").removeClass("fa-angle-double-up");
                $(".panel-heading a h4 span i").addClass("fa-angle-double-down").fadeIn();
                $(".panel-heading").show().fadeIn();
                $("#" + id).removeClass("open");
            } else {
                $(".panel-heading").hide().fadeOut();
                $("#" + id).addClass("open");
                $("#" + id).show().fadeIn();
                $("#" + id + " a h4 span i").removeClass("fa-angle-double-down");
                $("#" + id + " a h4 span i").addClass("fa-angle-double-up").fadeIn();
            }
        }


    }
</script>

<script type="text/javascript">

    for (let index = 1; index < 14; index++) {
        $('.notice-slider'+index).slick({
            autoplay: true,
            slidesToShow: 6,
            slidesToScroll: 1,
            autoplaySpeed: 1000,
            arrows: false,
            dots: false,
            vertical: true,
            verticalSwiping: true,
            focusOnSelect: true,
            pauseOnHover: true,
            pauseOnFocus: true,
        });

    }
</script>
@endpush
