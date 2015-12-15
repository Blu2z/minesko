<header>
	<div class="head">
		<div class="head__nav">
			<ul>
				<li><a href="{{ url('/')}}">Главная</a></li>
				<li><a href="{{ url('services')}}">Услуги</a></li>
				<li><a href="{{ url('photogalleries')}}">Фотогалерея</a></li>
				<li>
					<div class="logo--img">
						<a href="{{ url('/')}}">
							<img src="/images/logo.png" height="50" width="140" alt="logo">
						</a>
					</div>
				</li>
				<li><a href="{{ url('collections')}}">Колекции</a></li>
				<li><a href="{{ url('news')}}">Новости</a></li>
				<li><a href="{{ url('contacts')}}">Контакты</a></li>
			</ul>
		</div>
		<div class="head__nav--mobile">	
			<div class="logo--img">
				<a href="{{ url('/')}}">
					<img src="/images/logo.png" height="50" width="140" alt="logo">
				</a>
			</div>
			<a href="#" class="btn__head">
				<span class="btn__line"></span>
			</a>
			<div class="head__list">
				<ul>
				<li><a href="{{ url('/')}}">Главная</a></li>
				<li><a href="{{ url('news')}}">Новости</a></li>
				<li><a href="{{ url('collections')}}">Колекции</a></li>
				<li><a href="{{ url('photogalleries')}}">Фотогалерея</a></li>
				<li><a href="{{ url('services')}}">Услуги</a></li>
				<li><a href="{{ url('contacts')}}">Контакты</a></li>
			</ul>
			</div>
		</div>
	</div>
</header>