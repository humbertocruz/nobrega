<?php
App::uses('Helper', 'View');

class CaritasHelper extends AppHelper {
	
	public function extenso($n) {
 
/**
 * Retorna uma string do numero
 * 
 * @param string $n - Valor a ser traduzido,  apenas numeros inteiros
 * @example numeroEscrito('500');
 * @return string 
 */

 
    $numeros[1][0] = '';
    $numeros[1][1] = 'um';
    $numeros[1][2] = 'dois';
    $numeros[1][3] = 'três';
    $numeros[1][4] = 'quatro';
    $numeros[1][5] = 'cinco';
    $numeros[1][6] = 'seis';
    $numeros[1][7] = 'sete';
    $numeros[1][8] = 'oito';
    $numeros[1][9] = 'nove';
 
    $numeros[2][0] = '';
    $numeros[2][10] = 'dez';
    $numeros[2][11] = 'onze';
    $numeros[2][12] = 'doze';
    $numeros[2][13] = 'treze';
    $numeros[2][14] = 'quatorze';
    $numeros[2][15] = 'quinze';
    $numeros[2][16] = 'dezesseis';
    $numeros[2][17] = 'dezesete';
    $numeros[2][18] = 'dezoito';
    $numeros[2][19] = 'dezenove';
    $numeros[2][2] = 'vinte';
    $numeros[2][3] = 'trinta';
    $numeros[2][4] = 'quarenta';
    $numeros[2][5] = 'cinquenta';
    $numeros[2][6] = 'sessenta';
    $numeros[2][7] = 'setenta';
    $numeros[2][8] = 'oitenta';
    $numeros[2][9] = 'noventa';
 
    $numeros[3][0] = '';
    $numeros[3][1] = 'cem';
    $numeros[3][2] = 'duzentos';
    $numeros[3][3] = 'trezentos';
    $numeros[3][4] = 'quatrocentos';
    $numeros[3][5] = 'quinhentos';
    $numeros[3][6] = 'seiscentos';
    $numeros[3][7] = 'setecentos';
    $numeros[3][8] = 'oitocentos';
    $numeros[3][9] = 'novecentos';
 
    $qtd = strlen($n);
 
    $compl[0] = ' mil ';
    $compl[1] = ' milhão ';
    $compl[2] = ' milhões ';
    $numero = "";
    $casa = $qtd;
    $pulaum = false;
    $x = 0;
    for ($y = 0; $y < $qtd; $y++) {
 
        if ($casa == 5) {
 
            if ($n[$x] == '1') {
 
                $indice = '1' . $n[$x + 1];
                $pulaum = true;
            } else {
 
                $indice = $n[$x];
            }
 
            if ($n[$x] != '0') {
 
                if (isset($n[$x - 1])) {
 
                    $numero .= ' e ';
                }
 
                $numero .= $numeros[2][$indice];
 
                if ($pulaum) {
 
                    $numero .= ' ' . $compl[0];
                }
            }
        }
 
        if ($casa == 4) {
 
            if (!$pulaum) {
 
                if ($n[$x] != '0') {
 
                    if (isset($n[$x - 1])) {
 
                        $numero .= ' e ';
                    }
                }
            }
 
            $numero .= $numeros[1][$n[$x]] . ' ' . $compl[0];
        }
 
        if ($casa == 3) {
 
            if ($n[$x] == '1' && $n[$x + 1] != '0') {
 
                $numero .= 'cento ';
            } else {
 
                if ($n[$x] != '0') {
 
                    if (isset($n[$x - 1])) {
 
                        $numero .= ' e ';
                    }
 
                    $numero .= $numeros[3][$n[$x]];
                }
            }
        }
 
        if ($casa == 2) {
 
            if ($n[$x] == '1') {
 
                $indice = '1' . $n[$x + 1];
                $casa = 0;
            } else {
 
                $indice = $n[$x];
            }
 
            if ($n[$x] != '0') {
 
                if (isset($n[$x - 1])) {
 
                    $numero .= ' e ';
                }
 
                $numero .= $numeros[2][$indice];
            }
        }
 
        if ($casa == 1) {
 
            if ($n[$x] != '0') {
                if ($numeros[1][$n[$x]] <= 10)
                    $numero .= ' ' . $numeros[1][$n[$x]];
                else
                    $numero .= ' e ' . $numeros[1][$n[$x]];
            } else {
 
                $numero .= '';
            }
        }
 
        if ($pulaum) {
 
            $casa--;
            $x++;
            $pulaum = false;
        }
 
        $casa--;
        $x++;
    }
 
    return $numero;

	}

	private function filter_type($field, $field_value) {
		if (!isset($field['class'])){
			$field['class'] = '';
		} 
		switch ($field['type']) {
			case 'select':
				ob_start(); ?>
				<div class="form-group" title="<?php echo $field['label'];?>">
					<label><?php echo $field['label'];?></label>
					<select class="form-control input-sm <?php echo $field['class']; ?>" name="data[<?php echo $field['model'].'.'.$field['field'].']';?>">
						<?php foreach($field['options'] as $key => $value) { 
							$selected = ($key == $field_value)?('selected="selected"'):('');
						?>
						<option <?php echo $selected;?> value="<?php echo $key; ?>"><?php echo $value;?></option>
						<?php } ?>
					</select>
				</div>
				<?php return ob_get_clean();
				break;
			case 'text':
				ob_start(); ?>
				<div class="form-group" title="<?php echo $field['label'];?>">
					<label><?php echo $field['label'];?></label>
					<input value="<?php echo $field['value'];?>" type="text" class="form-control input-sm <?php echo $field['class']; ?>" name="data[<?php echo $field['model'].'.'.$field['field'].']';?>">
				</div>
				<?php return ob_get_clean();
				break;
		}
	}
	
	public function filters($fields = array()) {
		ob_start(); ?>
		<div class="">
			<form method="post" role="form">
			<div class="panel-body">
				<input type="hidden" name="filter" value="1">
				<?php foreach($fields as $field) {
					//$data_field = (isset($data[$field['model'].'.'.$field['field']]))?($data[$field['model'].'.'.$field['field']]):('0');
					$data_field = ($field['value'])?($field['value']):('0');
				?>
				<?php echo $this->filter_type($field, $data_field); ?>
				<?php } ?>
				
			</div>
			<div class="panel-footer">
				<div class="row">
					<div class="col-md-6">
						<input type="submit" class="btn btn-sm btn-success" value="Filtrar">
					</div>
					<div class="col-md-6">
						<input type="button" class="btn btn-sm pull-right btn-danger" value="Zerar">
					</div>
				</div>
			</div>
			</form>
		</div>
		<?php return ob_get_clean();
	}
	
}
