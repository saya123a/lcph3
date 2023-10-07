<!DOCTYPE html>
<html lang="en">
	<head>
		<title>LCPH Homepage</title>
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
					<img class="lcph" src="img/logo_surau.png" ></a> 	
				</div>
				<ul class="menu-list">
					<div class="icon cancel-btn">
						<i class="fas fa-times"></i>
					</div>
					<li><a href="home_page.php">Home</a></li>
					<li>
						<div class="dropdown">
							<a button class="dropbtn">Update</button></a>
							<div class="dropdown-content">
								<div class="sub-dropdown">
									<a class="sub-dropbtn">Stocks</a>
									<div class="sub-dropdown-content">
										<a href="addcurrentdata.html">Add Current Stocks</a>
										<a href="addnewdata.html">Add New Stocks</a>
										<a href="deletecurrentdata.html">Delete Current Stocks</a>
									</div>
								</div>
								<div class="sub-dropdown">
									<a class="sub-dropbtn">Receiver</a>
									<div class="sub-dropdown-content">
										<a href="addnewreceiver.html">Add New Receiver</a>
										<a href="deletecurrentreceiver.html">Delete Current Receiver</a>
									</div>
								</div>
							</div>	
						</div>
					</li>
					<li><a href="checkoutmain.php">Checkout</a></li>
                    <li>
                        <div class="dropdown">
                            <a button class="dropbtn id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                            </button></a>
							<div class="dropdown-content">
							    <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
	                        </div>
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
                
    <table>
        @foreach($items as $item)
        <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->item_barcode}}</td>
            <td>{{$item->item_name}}</td>
            <td>{{$item->item_brand}}</td>
            <td>
                <a href="{{route('edit', ['item' => $item])}}">Edit</a>
            </td>
            <td>
                <form method="post" action="{{route('delete', ['item' => $item])}}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" name="submit" class="submit-button">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

			</div>
		</main>
		<main class="container">
			<section class="receiver-list">
				<h2>List of Receivers</h2>
				<ul class="receiver-list">
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
