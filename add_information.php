<html>
 <body>
 <form action="insert_dental_charting.php" method="post">
 <h3>Add information to the appointment</h3>
    
    <p><input type="hidden" name="vat_doctor" value="<?=$_REQUEST['vat_doctor']?>"/></p>
    <p><input type="hidden" name="date_timestamp" value="<?=$_REQUEST['date_timestamp']?>"/></p>
    
    <p>Consultation</p>
        <p>SOAP_S: <input type="text" name="soap_s"/></p>
        <p>SOAP_O: <input type="text" name="soap_o"/></p>
        <p>SOAP_A: <input type="text" name="soap_a"/></p>
        <p>SOAP_P: <input type="text" name="soap_p"/></p>

    <p>Consultation assistant</p>
        <p>do wyboru asystanta TO DO </p>

    <p>Consultation diagnostic</p>
        <p>do wyboru diagnoza TO DO </p>
        <p>do wyboru diagnoza TO DO </p>
        <p>do wyboru diagnoza TO DO </p>

    <p>Prescription</p>
        <p>do wyboru lek TO DO </p>
        <p>Dosage: <input type="text" name="dosage_1"/></p>
        <p>Description: <input type="text" name="presc_description_1"/></p>

        <p>do wyboru lek TO DO </p>
        <p>Dosage: <input type="text" name="dosage_2"/></p>
        <p>Description: <input type="text" name="presc_description_2"/></p>

        <p>do wyboru lek TO DO </p>
        <p>Dosage: <input type="text" name="dosage_3"/></p>
        <p>Description: <input type="text" name="presc_description_3"/></p>

 <p><input type="submit" value="Submit"/></p>
 </form>

consultation(VAT_doctor,date_timestamp,SOAP_S,SOAP_O,SOAP_A,SOAP_P)

consultation_assistant(VAT_doctor,date_timestamp,VAT_nurse)

consultation_diagnostic(VAT_doctor,date_timestamp,ID)

prescription(name,lab,VAT_doctor,date_timestamp,ID,dosage,description)

 </body>
</html>


