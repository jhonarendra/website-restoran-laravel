<!DOCTYPE html>
<html>
<head>
	<title>Tes File Upload</title>
</head>
<body>
	<form action="{{URL('form/upload')}}" method="POST" enctype="multipart/form-data">
		{{ csrf_field() }}
		<input type="file" name="file">
		<button type="submit">Kirim</button>
	</form>
</body>
</html>