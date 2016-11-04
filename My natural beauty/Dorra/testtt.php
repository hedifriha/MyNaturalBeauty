
<?php     
if(!isset($_GET['clic'])) {     
       $clic=0;     
}     
else{     
 $clic=$_GET['clic']+1;  
 $
 
}     
?>     
<form method='GET'> 
<input type='submit' name='clic' value='<?php echo $clic; ?>  personnes aiment ça' />   
</form>