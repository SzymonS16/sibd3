<html>
 <body>
 <h3>Make appointment for client <?=$_REQUEST['VAT']?></h3>
 <form action="doc_list.php" method="post">
 <p><input type="hidden" name="VAT"
value="<?=$_REQUEST['VAT']?>"/></p>
 <p>date: <input type="date" name="date"/></p>
 <p><input type="submit" value="Submit"/></p>
 </form>
 </body>
</html>
