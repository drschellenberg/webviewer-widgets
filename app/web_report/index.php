<?php include_once "../_data_fetch.php";  ?>

<!DOCTYPE html><html>
<head>
	<meta charset="utf-8">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<style>
	<?php include "style.css"; ?>
</style>

<body>

	<div v-cloak id='app'>
		<!-- 
	<div v-if="browser == 'fmp' "class="text-end">
		<button type="button" class="btn btn-primary btn-sm text-end" @click="fmDoSomething()">FMP Button</button>
	</div> -->

	<table class='table table-hover'>
		<tr>
			<th></th>
			<th>first</th>
			<th>last</th>
			<th>city</th>
			<th>source</th>
			<th v-if="browser == 'fmp' ">action
			</th>
		</tr>
		<tbody>
			<template  v-for="(row, index) in tableData">
				
				<tr>
					<td>
						{{index + 1}}
					</td>
					<td>
						{{row.firstname}}
					</td>
					<td>
						{{row.lastname}}
					</td>
					<td>
						{{row.city}}
					</td>
					<td>
						{{browser}}					
					</td>
					<td v-if="browser == 'fmp' ">
						<a class="btn-primary"  role="button"  @click="fmDoSomething(row.firstname +' '+ row.lastname)">FMP Button</a>
					</td>
				</tr>
			
			</template>
		</tbody>
	</table>


	
	
		
	</div> 



	<script src='https://cdn.jsdelivr.net/npm/vue/dist/vue.js'></script>



	<script>	

	
	var vm = new Vue({
	el: '#app',
	data: {
		tableData: <?php echo $jsonData;?>,
		browser: <?php echo "'".$browser."'" ; ?>
	},  
	
	
	
	
	methods: {
		
		fmDoSomething : function (str) {
			var param = str;
			FileMaker.PerformScript ( 'btn doSomthing', param );
		}
	}
	
	
	
	
	
	});

	//FMP
	
	function setTableData(data) {
		var payload = JSON.parse(data);
		vm.tableData = payload;
		//alert (payload);
	}
	

			
			
			
			
	</script>

</body>

</html>