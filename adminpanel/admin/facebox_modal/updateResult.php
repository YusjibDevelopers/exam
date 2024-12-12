
<?php 
  include("../../../conn.php");
  $id = $_GET['id'];
 
  $selExmne = $conn->query("SELECT * FROM exam_attempt WHERE exmne_id='$id' ")->fetch(PDO::FETCH_ASSOC);

 ?>

<fieldset style="width:543px;" >
	<legend><i class="facebox-header"><i class="edit large icon"></i>&nbsp;Update</i></legend>
  <div class="col-md-12 mt-4">
<form method="post" id="updateResultFrm">
     <div class="form-group">
        <legend>Gender</legend>
        <input type="hidden" name="exmne_id" value="<?php echo $id; ?>">
        <select class="form-control" name="result">
          <option value="<?php echo $selExmne['result']; ?>"><?php echo $selExmne['result']; ?></option>
          <option value="ready">Ready</option>
          <option value="notReady">Not Ready</option>
        </select>
     </div>
  <div class="form-group" align="right">
    <button type="submit" class="btn btn-sm btn-primary">Send</button>
  </div>
</form>
  </div>
</fieldset>







