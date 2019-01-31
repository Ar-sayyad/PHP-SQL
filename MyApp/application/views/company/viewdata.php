<html>
 
   <head> 
         <?php echo $error;?> 
      <title>Upload Form</title> 
   </head>
	
   <body>  
      <h3>Your file was successfully uploaded!</h3>  
		
      <ul> 
         <?php foreach ($upload_data as $item => $value){ ?> 
         <li><?php echo $item[$value];?></li> 
         <?php } ?>
      </ul>  
		
      <p><?php echo anchor('upload', 'Upload Another File!'); ?></p>  
   </body>
	
</html>