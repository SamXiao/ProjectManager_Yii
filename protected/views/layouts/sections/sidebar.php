<?php $url = Yii::app()->baseUrl;?>
<div class="sidebar" id="sidebar">
    <script type="text/javascript">
        try {
            ace.settings.check('sidebar', 'fixed')
        } catch(e) {}
    </script>
    <div class="sidebar-shortcuts" id="sidebar-shortcuts">
        <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
            <button class="btn btn-success">
                <i class="icon-signal"></i>
            </button>
            <button class="btn btn-info">
                <i class="icon-pencil"></i>
            </button>
            <button class="btn btn-warning">
                <i class="icon-group"></i>
            </button>
            <button class="btn btn-danger">
                <i class="icon-cogs"></i>
            </button>
        </div>
        <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
            <span class="btn btn-success"></span>
            <span class="btn btn-info"></span>
            <span class="btn btn-warning"></span>
            <span class="btn btn-danger"></span>
        </div>
    </div>
    <!-- #sidebar-shortcuts -->
    <ul class="nav nav-list">
        <li class="active">
            <a href="index.html">
                <i class="icon-dashboard"></i>
                <span class="menu-text">
                    Dashboard
                </span>
            </a>
        </li>
        <li>
            <a href="<?=$url.'/ProjectCronjobs/index'?>">
                <i class="icon-youtube-sign"></i>
                <span class="menu-text">
                    CronJob
                </span>
            </a>
        </li>

        <li>
            <a href="calendar.html">
                <i class="icon-calendar"></i>
                <span class="menu-text">
                    Calendar
                    <span class="badge badge-transparent tooltip-error" title="2&nbsp;Important&nbsp;Events">
                        <i class="icon-warning-sign red bigger-130">
                        </i>
                    </span>
                </span>
            </a>
        </li>
    </ul>
    <!-- /.nav-list -->
    <div class="sidebar-collapse" id="sidebar-collapse">
        <i class="icon-double-angle-left" data-icon1="icon-double-angle-left"
        data-icon2="icon-double-angle-right">
        </i>
    </div>
    <script type="text/javascript">
        try {
            ace.settings.check('sidebar', 'collapsed')
        } catch(e) {}
    </script>
</div>
<!-- End .sidebar -->