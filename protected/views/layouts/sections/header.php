<?php
$navBarItems = array(
    array(
        'name' => 'Dashboard',
        'link' => '/'
    ),
    array(
        'name' => 'Project',
        'dropdown' => array(
            array(
                'name' => 'Project Backlog',
                'link' => '#'
            ),
            array(
                'name' => 'Sprint Backlog',
                'link' => '#'
            )
        )
    ),
    array(
        'name' => 'Task'
    )
);
function renderNavbar($navBarItems){

}
?>
<nav class="navbar navbar-default" role="navigation">
	<!-- Brand and toggle get grouped for better mobile display -->
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse"
			data-target=".navbar-ex1-collapse">
			<span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span>
			<span class="icon-bar"></span> <span class="icon-bar"></span>
		</button>
		<a class="navbar-brand" href="#">Project Master</a>
	</div>

	<!-- Collect the nav links, forms, and other content for toggling -->
	<div class="collapse navbar-collapse navbar-ex1-collapse">
		<ul class="nav navbar-nav">
            <?php
            foreach ($navBarItems as $item){
                if(isset($item['link'])){
                    echo '<li><a href="' . $item['link'] . '">' . $item['name'] . '</a></li>';
                }else{
                    if(isset($item['dropdown'])){
                        echo '<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">' . $item['name'] . '<b class="caret"></b></a>';
                        foreach ($item['dropdown'] as $subItem){

                        }
                        '</li>';
                    }else{
                        echo '<li>' . $item['name'] . '</li>';
                    }
                }
            }
            ?>
			<li class="active"><a href="#">Link</a></li>
			<li><a href="#">Link</a></li>
			<li class="dropdown"><a href="#" class="dropdown-toggle"
				data-toggle="dropdown">Dropdown <b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li><a href="#">Action</a></li>
					<li><a href="#">Another action</a></li>
					<li><a href="#">Something else here</a></li>
					<li><a href="#">Separated link</a></li>
					<li><a href="#">One more separated link</a></li>
				</ul></li>
		</ul>
		<form class="navbar-form navbar-left" role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
			<button type="submit" class="btn btn-default">Submit</button>
		</form>
		<ul class="nav navbar-nav navbar-right">
			<li><a href="#">Link</a></li>
			<li class="dropdown"><a href="#" class="dropdown-toggle"
				data-toggle="dropdown">Dropdown <b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li><a href="#">Action</a></li>
					<li><a href="#">Another action</a></li>
					<li><a href="#">Something else here</a></li>
					<li><a href="#">Separated link</a></li>
				</ul></li>
		</ul>
	</div>
	<!-- /.navbar-collapse -->
</nav>