<html>
<title>Bank's Information</title>
<head><h3>Bank's Information</h3><head>
<body>
    <form>
      <div class="one">
        Enter IFSC code<br>
        <input type="text" id="ifsc">
        <br>
        <input type="button" value="Submit" onclick="ifsc_srch()">
      </div>
      <br>
      <div class="two">
        or
      </div>
      <br>
      <div class="three">
        First name: <input type="text" id="city" placeholder="Delhi"><br>
        Last name: <input type="text" id="name" placeholder="SBI"><br>
        <input type="button" value="Submit" onclick="details_fndr()">
      </div>
    </form>
    <br><p id="ls"><br>
</body>
<script type="text/javascript">
  function ifsc_srch()
  {
    var agnt = new XMLHttpRequest();
    var ifsc=document.getElementById("ifsc").value;
    agnt.onreadystatechange = function()
    {
      if (this.readyState == 4 && this.status == 200)
      {
        var ifsc_ret_obj=JSON.parse(this.responseText);
        if(ifsc_ret_obj!='[""]')
        {
          document.getElementById("ls").innerHTML=ifsc_ret_obj;
        }
        else {
          document.getElementById("ls").innerHTML="No Match Found";
        }
      }
    }
    agnt.open("GET", "ifsc_rest_service.php?ifsc="+ifsc, true);
    agnt.send();
  }
  function details_fndr()
  {
    var agnt = new XMLHttpRequest();
    var name=document.getElementById("name").value,city=document.getElementById("city").value;
    agnt.onreadystatechange = function()
    {
      if (this.readyState == 4 && this.status == 200)
      {
        if(this.responseText!='[""]')
        {
        }
        else {
          document.getElementById("ls").innerHTML="No Match Found";
        }
      }
    }
    agnt.open("GET", "details_rest_service.php?city="+city"&name="+name, true);
    agnt.send();
  }
</script>
</html>
