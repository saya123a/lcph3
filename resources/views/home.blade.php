<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Home</title>
		<!--Meta Tag-->
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!--External CSS-->
		<link rel="stylesheet" href="update.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
	</head>
	<body>
		<nav class="navbar">
			<div class="content">
                <div class="logo">
                    <a href="{{ route('home') }}">
                        <div>
                            <img class="lcph2" src="img/logo_surau.png">
                            <h3>La Cottage Prayer Hall Food Bank</h3>
                        </div>
                    </a>
                </div>
				<ul class="menu-list">
					<div class="icon cancel-btn">
						<i class="fas fa-times"></i>
					</div>
					<li><a href="{{ route('home') }}">Home</a></li>
					<li>
						<div class="dropdown">
							<a button class="dropbtn">Update</button></a>
							<div class="dropdown-content">
								<div class="sub-dropdown">
									<a class="sub-dropbtn">Stocks</a>
									<div class="sub-dropdown-content">
										<a href="{{ route('addcurrentitem') }}">Add Current Stocks</a>
										<a href="{{ route('addnewitem') }}">Add New Stocks</a>
										<a href="{{ route('deletecurrentitem') }}">Delete Current Stocks</a>
									</div>
								</div>
								<div class="sub-dropdown">
									<a class="sub-dropbtn">Receiver</a>
									<div class="sub-dropdown-content">
										<a href="{{ route('addnewreceiver') }}">Add New Receiver</a>
										<a href="{{ route('deletecurrentreceiver') }}">Delete Current Receiver</a>
									</div>
								</div>
							</div>	
						</div>
					</li>
					<li><a href="{{ route('checkout') }}">Checkout</a></li>
                    <li>
                        
                            <a button class="dropbtn" class="nav-link dropdown-toggle" role="button" id="navbarDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </button></a>
							<div>
							    <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
	                        </div>
                        
                    </li>
				</ul>
				<div class="icon menu-btn">
					<i class="fas fa-bars"></i>
				</div>
			</div>
		</nav>
		<div class="banner"></div>
		<main>
			<h2>Current Stocks</h2>
			<div class="bar-grid">
                @if(count($stockItems) > 0)
                    @foreach($stockItems as $stockItem)
                        <div class="bar-container">
                            <div class="item-number">{{ $stockItem->quantity }}</div>
                            <div class="bar" style="height: {{ $stockItem->quantity }}px;"></div>
                            <div class="item-name">{{ $stockItem->item_name }}</div>
                            <div class="item-brand">{{ $stockItem->item_brand }}</div>
                        </div>
                    @endforeach
                @else
                    <p>No stock data available.</p>
                @endif
			</div>
		</main>
		<main class="container">
			<section class="receiver-list">
				<h2>List of Receivers</h2>
				<ul class="receiver-list">
                    @forelse($receivers as $receiver)
                        <li class="receiver-box">{{ $receiver->receiver_ic }} - {{ $receiver->receiver_name }}</li>
                    @empty
                        <li>No receivers found.</li>
                    @endforelse
				</ul>
			</section>
		</main>
		<div class="nutri">
			<div class="content">
				<img class="lcph" src="img/logo_surau.png">
				<p>&copy; 2023 La Cottage Prayer Hall</p>
			</div>
		</div>
		<script>
			const body = document.querySelector("body");
			const navbar = document.querySelector(".navbar");
			const menuBtn = document.querySelector(".menu-btn");
			const cancelBtn = document.querySelector(".cancel-btn");
			menuBtn.onclick = ()=>{
				navbar.classList.add("show");
				menuBtn.classList.add("hide");
				body.classList.add("disabled");
			}
			cancelBtn.onclick = ()=>{
				body.classList.remove("disabled");
				navbar.classList.remove("show");
				menuBtn.classList.remove("hide");
			}
			window.onscroll = ()=>{
				this.scrollY > 20 ? navbar.classList.add("sticky") : navbar.classList.remove("sticky");
			}
		</script>
	</body>
</html>
