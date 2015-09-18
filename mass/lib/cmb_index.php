<?php

function index_combo($val_text,$combo)
{
?>
<script language="Javascript">

for (i=0;i<document.form1.<?php echo $combo; ?>.length;i++)
{
  document.form1.<?php echo $combo; ?>.selectedIndex = i;
  if (document.form1.<?php echo $combo; ?>.value == '<?php echo $val_text; ?>')
    {
      break;
     }
}
if (document.form1.<?php echo $combo; ?>.value!='0')
if ((<?php echo "'$val_text'"; ?> == 0)||(<?php echo "'$val_text'"; ?> == ''))
    {
	 document.form1.<?php echo $combo; ?>.selectedIndex = 0;
	}
</script>
<?php
}
?>
