<html>
 <body>
 <form action="insert_dental_charting.php" method="post">
 <h3>Dental charting</h3>

   <p><input type="hidden" name="vat_doctor" value="<?=$_REQUEST['vat_doctor']?>"/></p>
   <p><input type="hidden" name="date_timestamp" value="<?=$_REQUEST['date_timestamp']?>"/></p>
   <p><input type="hidden" name="description" value="<?=$_REQUEST['description']?>"/></p>

    <p>upper right 1: <input type="number" step="0.01" name="upper_right_1"/></p>
    <p>upper right 2: <input type="number" step="0.01" name="upper_right_2"/></p>
    <p>upper right 3: <input type="number" step="0.01" name="upper_right_3"/></p>
    <p>upper right 4: <input type="number" step="0.01" name="upper_right_4"/></p>
    <p>upper right 5: <input type="number" step="0.01" name="upper_right_5"/></p>
    <p>upper right 6: <input type="number" step="0.01" name="upper_right_6"/></p>
    <p>upper right 7: <input type="number" step="0.01" name="upper_right_7"/></p>
    <p>upper right 8: <input type="number" step="0.01" name="upper_right_8"/></p>

    <p>upper left 1: <input type="number" step="0.01" name="upper_left_1"/></p>
    <p>upper left 2: <input type="number" step="0.01" name="upper_left_2"/></p>
    <p>upper left 3: <input type="number" step="0.01" name="upper_left_3"/></p>
    <p>upper left 4: <input type="number" step="0.01" name="upper_left_4"/></p>
    <p>upper left 5: <input type="number" step="0.01" name="upper_left_5"/></p>
    <p>upper left 6: <input type="number" step="0.01" name="upper_left_6"/></p>
    <p>upper left 7: <input type="number" step="0.01" name="upper_left_7"/></p>
    <p>upper left 8: <input type="number" step="0.01" name="upper_left_8"/></p>

    <p>lower right 1: <input type="number" step="0.01" name="lower_right_1"/></p>
    <p>lower right 2: <input type="number" step="0.01" name="lower_right_2"/></p>
    <p>lower right 3: <input type="number" step="0.01" name="lower_right_3"/></p>
    <p>lower right 4: <input type="number" step="0.01" name="lower_right_4"/></p>
    <p>lower right 5: <input type="number" step="0.01" name="lower_right_5"/></p>
    <p>lower right 6: <input type="number" step="0.01" name="lower_right_6"/></p>
    <p>lower right 7: <input type="number" step="0.01" name="lower_right_7"/></p>
    <p>lower right 8: <input type="number" step="0.01" name="lower_right_8"/></p>

    <p>lower left 1: <input type="number" step="0.01" name="lower_left_1"/></p>
    <p>lower left 2: <input type="number" step="0.01" name="lower_left_2"/></p>
    <p>lower left 3: <input type="number" step="0.01" name="lower_left_3"/></p>
    <p>lower left 4: <input type="number" step="0.01" name="lower_left_4"/></p>
    <p>lower left 5: <input type="number" step="0.01" name="lower_left_5"/></p>
    <p>lower left 6: <input type="number" step="0.01" name="lower_left_6"/></p>
    <p>lower left 7: <input type="number" step="0.01" name="lower_left_7"/></p>
    <p>lower left 8: <input type="number" step="0.01" name="lower_left_8"/></p>

 <p><input type="submit" value="Submit"/></p>
 </form>
 </body>
</html>