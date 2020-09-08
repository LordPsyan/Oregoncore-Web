<div class="box_right_title">Updates</div>
<script type="text/javascript">
function getLatestVersions() {
	$(".hidden_version").fadeIn("fast");
}
</script>
<table width="100%">
       <tr>
            <td>Current version: r_01</td><td class="hidden_version">Available version: r_02</td>
       </tr>
       <tr>
            <td>Current database version: r_01</td><td class="hidden_version">Available database version: r_02</td>
       </tr>
       <tr>
           <td><input type="submit" value="Check for available versions" onclick="getLatestVersions()"/></td>
           <td class="hidden_version"><input type="submit" value="Update" onclick="alert('Trololol! This feature is not implemented yet! :D')"/></td>
       </tr>
</table>