<?php
?>


<html>
	<title>Movies</title>
	<head>
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
	<script type="text/javascript" src="extjs/examples/shared/include-ext.js"></script>
	<script type="text/javascript" src="extjs/examples/shared/options-toolbar.js"></script>
	<script>
			
			
		Ext.onReady(function() 
		{
			Ext.define('movie', {
    					extend: 'Ext.data.Model',
    					fields: [{name:'id', type: 'int'},'title',  'director', 'released', 'genre', 'tagline'] } );

				Ext.define('MyApp.store.MyStore', {
						extend: 'Ext.data.Store',
						model: 'movie',
						autoSync: true,
						autoLoad: true,
						proxy: {
        						type: 'ajax',
        						api: {
                						read: 'db.php',                								},        							        reader: {
            							type: 'json',
								root: 'data'
        						}
        						    							}
				});
				var mystore = Ext.create('MyApp.store.MyStore');
			var grid = Ext.create('Ext.grid.Panel', {
				style: 'margin-top: 1%; margin-left: 24%',
				store: mystore,
				width: 700,
				height: 300,
				title: 'Movie Details',
				collapsible: true,
				closable:true,
				maximizable: true,
				frame:true,
				draggable: true,
				stripedRows: true,
				columns: [
				   {header: 'Movie Name', width: 100, sortable: true, dataIndex: 'title',editor: 'textfield'},
{header: 'Director Name', width: 100, sortable: true, dataIndex: 'director',editor: 'textfield'},
{header: 'Released Date', width: 150, sortable: true, dataIndex: 'released',editor: 'datefield'},
{header:'Genre', width:150, sortable:true, dataIndex:'genre',editor:'numberfield',},
{header: 'Tagline', width: 200, sortable: true, dataIndex: 'tagline',editor: 'textfield'}
					 
				],
				plugins: [
        				Ext.create('Ext.grid.plugin.CellEditing', {
          				clicksToEdit: 1
        				})
    				],
				


					
			});
				mystore.load(); 
				grid.render('table')
			}); 


	</script>

	<style>
		.inputbox {
			width:100px !important;
		}
		input {
			width:100px !important;
		}
	</style>

	</head>
	<body>
	<div id='table'> </div>
	</body>
</html>
