<!DOCTYPE html>
<html>
<head>
	<title>Solution 2</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>

	<div class="container-fluid">
		<div class="card py-2">
			<div class="card-header text-center">
				<h2>Entry Form</h2>
			</div>
			<div class="card-body">
				<form id="solution2" method="post" action="solution2.php">
					<div class="form-group row">
						<label class="col-sm-1 text-right" for="breadQty">No of Servers</label>
						<div class="col-sm-1">
							<input type="number" id="server" name="server" class="form-control" placeholder="No of Servers">
							
						</div>

						<label class="col-sm-1 text-right" for="oneLoad">1st Min Load %</label>
						<div class="col-sm-1">
							<input type="number" id="oneLoad" name="oneLoad" class="form-control" placeholder="1st Min Load %">
							
						</div>

						<label class="col-sm-1 text-right" for="oneLoad">2nd Min Load %</label>
						<div class="col-sm-1">
							<input type="number" id="twoLoad" name="twoLoad" class="form-control" placeholder="2nd Min Load %">
							
						</div>

						<label class="col-sm-1 text-right" for="oneLoad">3rd Min Load %</label>
						<div class="col-sm-1">
							<input type="number" id="threeLoad" name="threeLoad" class="form-control" placeholder="3rd Min Load %">
							
						</div>

						<label class="col-sm-1 text-right" for="oneLoad">4th Min Load %</label>
						<div class="col-sm-1">
							<input type="number" id="fourLoad" name="fourLoad" class="form-control" placeholder="4th Min Load %">
							
						</div>

						<label class="col-sm-1 text-right" for="oneLoad">5th Min Load %</label>
						<div class="col-sm-1">
							<input type="number" id="fiveLoad" name="fiveLoad" class="form-control" placeholder="5th Min Load %">
							
						</div>
					</div>

					<div class="row">
						<div class="col-sm-4 col-md-4">
							
						</div>
						<div class="col-sm-4 col-md-4">
							<input type="submit" name="submit" class="btn btn-sm btn-block btn-primary" value="Submit">
						</div>

						<div class="col-sm-4 col-md-4">
							
						</div>
					</div>
				</form>
			</div>
		</div>

		<div class="card py-4" id="resultBox" style="display: none;">
			<div class="card-header text-center">
				<h3>Result</h3>
			</div>

			<div class="card-body">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Running Servers</th>
							<th>Free Server</th>
							<th>Need Extra Server</th>
							<th>Average Load %</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td id="servers"></td>
							<td id="freeServer"></td>
							<td id="extraServer"></td>
							<td id="averageLoad"></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

	<script type="text/javascript">
		$(document).ready(function()
		{
			$('#solution2').submit(function(e)
			{
				e.preventDefault();

				$.ajax(
				{
					url:'calculation.php',
					method:'post',
					data: $('#solution2').serializeArray(),
					dataType: 'json',
					async:false,
					success:function(response)
					{
						$('#servers').html(response.servers);
						$('#freeServer').html(response.freeServer);
						$('#extraServer').html(response.extraServer);
						$('#averageLoad').html(response.averageLoad);
						$('#resultBox').show();
					},
					error:function()
					{
						alert('Try Again');
					}
				})
			})
		})
	</script>
</body>
</html>

