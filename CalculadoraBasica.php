<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Ejercicio 1</title>
<link rel="stylesheet" href="CalculadoraBasica.css"/>
</head>
<body>
<header>
<h1>Calculadora Basica</h1>
</header>
<section>
<pre>
<code>
<?php 
class CalculadoraBasica{
	
	public function __construct(){
		session_start();
	}
	public function digitos(){
		if (count($_POST)>0) { 
            if(isset($_POST["0"])){
                $this->digit(0);
            }else if(isset($_POST["1"])){
                $this->digit(1);
			}else if(isset($_POST["2"])){
				$this->digit(2);
			}else if(isset($_POST["3"])){
				$this->digit(3);
			}else if(isset($_POST["4"])){
				$this->digit(4);
			}else if(isset($_POST["5"])){
				$this->digit(5);
			}else if(isset($_POST["6"])){
				$this->digit(6);
			}else if(isset($_POST["7"])){
				$this->digit(7);
			}else if(isset($_POST["8"])){
				$this->digit(8);
			}else if(isset($_POST["9"])){
				$this->digit(9);
			}else if(isset($_POST["+"])){
				$this->digit('+');
			}else if(isset($_POST["-"])){
				$this->digit('-');
			}else if(isset($_POST["*"])){
				$this->digit('*');
			}else if(isset($_POST["punto"])){
				$this->punto();
			}else if(isset($_POST["/"])){
				$this->digit('/');
			}else if(isset($_POST["C"])){
				$this->remove();
			}else if(isset($_POST["mrc"])){
				$this->mrc();
			}else if(isset($_POST["mMenos"])){
				$this->mMenos();
			}else if(isset($_POST["mMas"])){
				$this->mMas();
			}else if(isset($_POST["="])){
				$this->igual();
			}
		} 
	}
	public function digit($digito){
		if(isset($_SESSION["calculadora"])){
			$_SESSION["calculadora"] .= strval($digito);
		}else{
			$_SESSION["calculadora"] = strval($digito);
		}
	}
	public function ver(){
		if(isset($_SESSION["calculadora"])){
			return $_SESSION["calculadora"];
		}
    }
	public function mMas(){
		if(isset( $_SESSION['calculadora'])) {
            if(isset( $_SESSION['memoria'])) {
                $_SESSION['memoria'] += $_SESSION['calculadora'];
			}else{
				$_SESSION['memoria'] = ($_SESSION['calculadora']);
			}
		}
    }
	public function mMenos(){
		if(isset( $_SESSION['memoria'])) {
            $_SESSION['memoria'] -= $_SESSION['calculadora'];
		}
    }
	public function mrc(){
		if(isset( $_SESSION['calculadora'])) {
			if(isset( $_SESSION['memoria'])) {
				$_SESSION['calculadora'] = $_SESSION['memoria'];
			}else{
				$_SESSION['calculadora'] ="0";
			}
        }
    }
	public function remove(){
		$_SESSION["calculadora"]="";
    }
	public function punto(){
		$_SESSION["calculadora"].=".";
    }
	public function igual(){
		if(isset($_SESSION["calculadora"])){
			try {
				$resultado = $_SESSION["calculadora"];
                $_SESSION["calculadora"] = eval("return $resultado;");
			}
			catch(Exception $e) {
				$_SESSION["calculadora"] = "Error: " . $e->getMessage();
			}
		}
    }
}

$calculadoraBasica = new CalculadoraBasica();
$calculadoraBasica->digitos();
?>
</pre>
</code>
</section>
<section class='calculadora'>
<h2>Calculadora</h2>
<form action='#' method='post' name='botones'>
<input type='text' title='pantalla' name='pantalla'  value="<?php 
echo $calculadoraBasica->ver();?>" readOnly />
<div>
<input type='submit' class='button' name='mrc' value='mrc'/>
<input type='submit' class='button' name='mMenos' value='m-'/>
<input type='submit' class='button' name='mMas' value='m+'/>
<input type='submit' class='button' name='/' value='/'/>
</div>
<div>
<input type='submit' class='button' name='7' value='7'/>
<input type='submit' class='button' name='8' value='8'/>
<input type='submit' class='button' name='9' value='9'/>
<input type='submit' class='button' name='*' value='*'/>
</div>
<div>
<input type='submit' class='button' name='4' value='4'/>
<input type='submit' class='button' name='5' value='5'/>
<input type='submit' class='button' name='6' value='6'/>
<input type='submit' class='button' name='-' value='-'/>
</div>
<div>
<input type='submit' class='button' name='1' value='1'/>
<input type='submit' class='button' name='2' value='2'/>
<input type='submit' class='button' name='3' value='3'/>
<input type='submit' class='button' name='+' value='+'/>
</div>
<div>
<input type='submit' class='button' name='0' value='0'/>
<input type='submit' class='button' name='punto' value='.'/>
<input type='submit' class='button' name='C' value='C'/>
<input type='submit' class='button' name='=' value='='/>
</div>
</form>
</section>

<footer>
<a href="http://validator.w3.org/check/referer" hreflang="en-us">
	<img src="valid-html5-button.png" alt="¡HTML5 válido!" />
</a>
<a href="http://jigsaw.w3.org/css-validator/check/referer">
	<img style="border:0;width:88px;height:31px" src="http://jigsaw.w3.org/css-validator/images/vcss" alt="¡CSS Válido!" />
</a>
</footer>

</body>
</html>
