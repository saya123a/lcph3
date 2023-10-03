<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Add New Stock</title>
		<!--Meta Tag-->
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!--External CSS-->
		<link rel="stylesheet" href="update.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
	</head>
	<body>
    <h1>Hai</h1>
        <form method="post" action="{{route('addnewitems')}}">
            @csrf
            @method('post')
            <div class="data-input">
				<label for="item_barcode">Barcode:</label>
				<input type="text" id="item_barcode" name="item_barcode" required>
			</div>
			<div class="data-input">
				<label for="item_name">Name:</label>
				<input type="text" id="item_name" name="item_name" required>
			</div>
			<div class="data-input">
				<label for="item_brand">Brand:</label>
				<input type="text" id="item_brand" name="item_brand" required>
			</div>
			<button type="submit" name="submit" class="submit-button">Submit</button>
        </form>
  </body>
</html>
