
<form action="index.php?Controller=Index&action=wordCkediterAction" method="POST" >
	<input type="hidden" name="Controller" value="Index">
	<input type="hidden" name="action" value="wordCkediterAction" >
    <label> name:</label>
    <input type="text" name="name">
    <label>title:</label>
	<input type="text" name="title" >
	<textarea name="ckediter" id="ckediter" ></textarea>
    <input type="submit" name="submit"  value="submit">
    <input type="hidden" name="data_token" value="<?php echo $data['tokens'] ?>">
</form>
