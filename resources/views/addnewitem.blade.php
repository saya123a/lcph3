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
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $(".edit-button").click(function () {
            const itemId = $(this).data("id");
            $(`#edit-row-${itemId}`).toggle();
        });
    });
</script>

	</head>
	<body>
    <h1>Hai</h1>
        <form method="post" action="{{ route('addnewitems') }}">
            @csrf
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
        
        <!-- Display Data -->
<div>
    <table>
        @foreach($items as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->item_barcode }}</td>
            <td>{{ $item->item_name }}</td>
            <td>{{ $item->item_brand }}</td>
            <td>
                <button class="edit-button" data-id="{{ $item->id }}">Edit</button>
            </td>
        </tr>
        <tr id="edit-row-{{ $item->id }}" style="display: none;">
            <td colspan="7">
                <!-- Edit Form (initially hidden) -->
                <form method="post" action="{{ route('updateitem', ['id' => $item->id]) }}">
                    @csrf
                    @method('put')
                    <div class="data-input">
                        <label for="edit_item_barcode">Barcode:</label>
                        <input type="text" id="edit_item_barcode" name="item_barcode" value="{{ $item->item_barcode }}" required>
                    </div>
                    <!-- Add similar fields for 'item_name' and 'item_brand' -->
                    <button type="submit" name="submit" class="submit-button">Update</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>

  </body>
</html>
