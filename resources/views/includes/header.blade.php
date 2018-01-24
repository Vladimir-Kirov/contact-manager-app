<nav class="navbar navbar-default navbar-fixed-top">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#myNavbar" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand text-uppercase" href="#">My contact</a>
		</div>

		<div class="collapse navbar-collapse" id="myNavbar">
			<ul class="nav navbar-nav navbar-right">
				<li><a href="{{ route('admin.login') }}"><i class="fa fa-user" aria-hidden="true"></i> Login</a></li>
				<li><a href="{{ route('admin.register') }}"><i class="fa fa-sign-out" aria-hidden="true"></i> Register</a></li>
			</ul>
		</div>
	</div>
</nav>