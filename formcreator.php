

<form name="form1" method="post" action="">
  <p>FormName: 
    <input type="text" name="name" id="name" />
  </p>
  <p>
    <textarea name="elements" id="elements" cols="45" rows="5"></textarea>
    <input type="submit" name="button" id="button" value="Submit">
  </p>
</form>

<br /><br />

<?
echo "/////////////////form data////////////////////////<br><br>";
$name=$_POST['name'];
$aa=explode("\r\n",$_POST['elements']);
$ss="";
for($i=0; $i<count($aa); $i++)
{
?>
$<?=$aa[$i] ?> = new Zend_Form_Element_Text('<?=$aa[$i] ?>');<br>
$<?=$aa[$i] ?>->setLabel('<?=$aa[$i] ?>');<br>
$<?=$aa[$i] ?>->setRequired(true);<br>
<br>
<?
$ss .= "$".$aa[$i].",";

$dd .="$".$aa[$i]." = \$form->getValue('".$aa[$i]."'); <br>";

$elementarray .= "'".$aa[$i]."' => $".$aa[$i].",";

}

$vv .= " \$submit = new Zend_Form_Element_Submit ( 'submit' );
	    \$submit->setAttrib ( 'id', 'submitbutton' );";
		
$vv.="\$this->addElements ( array ($ss \$submit ) );";

$lowername = strtolower($name);


$elementarray=trim($elementarray);
$elementarray=substr($elementarray,0,-1);

$ss =trim($ss);
$ss=substr($ss,0,-1);

$cc="
//////////////////Model function/////////////////////
  
<br><br> public function get$name(\$id)
	{
		\$id = (int)\$id;
		\$row = \$this->fetchRow('".$name."Id = ' . \$id);
		if (!\$row) {
			throw new Exception(\"Could not find row \$id\");
		}
		return \$row->toArray();
	}

<br><br>	public function add$name($ss)
	{
		\$data = array(
				$elementarray
		);
		\$this->insert(\$data);
			
	}

<br><br>	public function update$name($ss)
	{
		\$data = array(
			$elementarray
		);
		\$this->update(\$data, '".$name."Id =' . (int)\$id);
	}

<br><br>	public function delete$name(\$id)
	{
		\$this->delete('".$name."Id =' . (int)\$id);
	}


";

$ff="
//////////////controller form //////////////////////////

 // action body <br><br>
        \$form = new Application_Form_$name();
        \$form->submit->setLabel('".$name."');
      \$this->view->form = \$form;
        if (\$this->getRequest()->isPost()) {
        	\$formData = \$this->getRequest()->getPost();
        	if (\$form->isValid(\$formData)) {
        		
				$dd
				
				
        		$".$lowername."model = new Application_Model_DbTable_$name();
        		$".$lowername."model->add$name($ss);
        		\$this->_helper->redirector('list');
        	} else {
        		\$form->populate(\$formData);
        	}
        }

//////////////////////////////////////////////////
";

echo $vv;
echo "<br><br>";
//echo $dd;
echo "<br><br>";
echo $cc;

echo "<br><br>";
echo $ff;
?>