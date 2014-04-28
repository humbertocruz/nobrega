<?php

App::uses('AppHelper', 'View/Helper');

class BootstrapHelper extends AppHelper {

	public $helpers = array('Html','Paginator','Form','Bootstrap.AuthBs','Session');
	
	public function pageHeader($header = 'Page Header') { ob_start(); ?>

		<div class="page-header">
		<h3><?php echo $header;?></h3>
		</div>

	<?php return ob_get_clean(); }

	public function btnLink($text = 'Adicionar', $url = array(), $options = array()) {
		
		$defaults = array(
			'style'=>'default',
			'type'=>'',
			'message'=>false,
			'size' => '',
			'title' => '',
			'icon' => false,
			'method' => 'get',
			'block' => false,
			'message' => false,
			'submit' => false
		);
		$options = array_merge($defaults, $options);
		
		if ($options['icon']) {
			$icon_span = '<span class="glyphicon glyphicon-'.$options['icon'].'"></span>';
		} else {
			$icon_span = '';
		}
		$linkText = '';
		if ($options['icon']) $linkText.=$icon_span;
		if ($options['icon'] and $text) $linkText.='&nbsp;';
		if ($text) $linkText.=$text;
		if ($options['block']) {
			$block = 'btn-block';
		} else {
			$block = '';
		}
		if ($options['submit']) {
			return( $this->submit($linkText, array(
				'class' => 'btn btn-'.$options['style'].' '.$options['type'].' '.$options['size']
				//'block' => $options['block']
			) ) );
		} else if ($options['method'] == 'get') {
			return $this->Html->link(
				$linkText,
				$url,
				array(
					'escape'=>false,
					'class'=>'btn btn-'.$options['style'].' '.$block.' '.$options['type'].' '.$options['size'],
					'title' => $options['title'],
				),
				$options['message']
			);
		} else if ($options['method'] == 'post') {
			return $this->Form->postLink(
				$linkText,
				$url,
				array(
					'escape'=>false,
					'class'=>'btn btn-'.$options['style'].' '.$block.' '.$options['type'].' '.$options['size'],
					'title' => $options['title'],
					'block' => $options['block']
				),
				$options['message']
			);
		}
	}
	
	public function btnPost($text = 'Adicionar', $url = array(), $options = array()) {
		
		$defaults = array(
			'style'=>'default',
			'type'=>'',
			'message'=>false,
			'size' => ''
		);
		$options = array_merge($defaults, $options);
		return $this->Form->postLink($text, $url, array('escape'=>false,'class'=>'btn btn-'.$options['style'].' '.$options['type'].' '.$options['size']), $options['message']);
	}
	
	// Form	
	public function create($Model, $Options = array()) {
		$form = $this->Form->create($Model, $Options + array(
			'inputDefaults' => array(
				'format' => array('before', 'label', 'between', 'input', 'after','error'),
				'div' => array(
					'class' => 'form-group'
				),
				'class' => 'form-control',
				'required' => false,
				'error' => array(
					'attributes' => array(
						'class'=>'help-block text-danger',
						'wrap' => 'span',
						'scape' => false
					)
				)
			),
			'type'=>'post'
		));
		return $form;
	}
	
	public function end($Text = null) {
		return $this->Form->end($Text);
	}
	
	public function input($Name = 'name', $Options = array()) {
		return $this->Form->input($Name, $Options);
	}
	
	public function submit($Text = 'Submit', $Options = array()) {
		$defaults = array(
			'class' => '',
			'icon' => '',
			'escape' => false,
			'type' => 'submit',
			'block' => false
		);
		
		if (isset($Options['block'])) {
			$Options['class'].= ' btn-block';
		}
		$textSubmit = '';
		if (isset($Options['icon'])) {
			$textSubmit.= '<span class="glyphicon glyphicon-'.$Options['icon'].'"></span>&nbsp;';
		}
		$textSubmit.= $Text;
		$Options = array_merge($defaults, $Options);
		
		return $this->Form->button($textSubmit, $Options);
	}
	
	// End Form
	
	public function sorter($field = '', $text = '', $options = array()) {
		if ( $this->Paginator->sortKey() == $field ) {
			if ( $this->Paginator->sortDir() == 'desc') {
				$chevron = '&nbsp;<span class="glyphicon glyphicon-chevron-down">';
			} else {
				$chevron = '&nbsp;<span class="glyphicon glyphicon-chevron-up">';
			}
			$options['escape'] = false;
		} else {
			$chevron = '';
		}
		return $this->Paginator->sort($field, $text.$chevron, $options);
	}

	// Formularios Bootstrap

	public function belongs($name, $options = array()) {
		$defaults = array(
			'label' => $name,
			'options' => array(),
			'id' => Inflector::classify( $this->params['controller']).$name,
			'disabled'=>'',
			'url'=>'',
			'hide'=>'',
			'model'=> Inflector::classify( $this->params['controller'])
		);
		$options = array_merge(
			$defaults,
			$options
		);
		$hide = ($options['hide'] === 'hide')?('none'):('block');
		$options['value'] = (isset($this->request->data[$options['model']][$name]))?($this->request->data[$options['model']][$name]):('');
		ob_start(); ?>
		<div class="form-group" style="display:<?php echo $hide;?>">
			<?php echo $options['label']; ?>
			<div class="row">
				<div class="col-md-11">
					<select <?php echo $options['disabled'];?> id="<?php echo $options['id'];?>" class="form-control" name="data[<?php echo $options['model'];?>][<?php echo $name; ?>]">
						<?php foreach ($options['options'] as $key => $value) { 
							$selected = ($key == $options['value'])?('selected="selected"'):('');
						?>
						<option <?php echo $selected; ?> value="<?php echo $key;?>"><?php echo $value;?></option>
						<?php } ?>
					</select>
				</div>
				<div class="col-md-1">
					<a href="#" class="btn btn-success btn-belongs" data-plugin="<?php echo strtolower( $this->plugin ); ?>" data-url="<?php echo $options['url'];?>"><span class="glyphicon glyphicon-list-alt"></a>
				</div>
			</div>
		</div>

		<?php return ob_get_clean(); 
	}
	
	public function paginator() {  ob_start(); ?>
		<?php
				$registros = intval( $this->Paginator->counter('{:count}') );
				$paginas = intval( $this->Paginator->counter('{:pages}') );
				$pagina = intval( $this->Paginator->counter('{:page}') );
		?>
		<ul class="pagination pull-right">
			
			<?php if ($pagina == 1) { ?>
			<li class="disabled"><a href="#">Primeira</a></li>
			<?php if ($paginas == 1) { ?><li class="active"><a href="#">1</a></li><?php } ?>
			<?php } else { ?>
			<li><?php echo $this->Paginator->first('Primeira');?></li>
			<?php } ?>
			<?php echo $this->Paginator->numbers(
			array(
				'separator' => null,
				'tag' => 'li',
				'currentClass' => 'active',
				'currentTag' => 'a',
				'escape' => false
			)
			); ?>
			<?php if ($pagina == $paginas) { ?>
			<li class="disabled"><a href="#">Última</a></li>
			<?php } else { ?>
			<li><?php echo $this->Paginator->last('Última');?></li>
			<?php } ?>
			<li class="disabled"><a href="#">
			<?php
			echo ($registros>1)?($registros.' registros'):($registros.' registro');
			echo ($paginas>1)?(' ('.$paginas.' páginas)'):(' ('.$paginas.' página)');
			?>
			</a></li>
		</ul>
		<?php return ob_get_clean();
	}
	public function simplePaginator() {  ob_start(); ?>
		<?php //pr($paginator->pageCount); ?>
		<ul class="pagination">
		<?php echo $this->Paginator->numbers(
			array(
				'separator' => null,
				'tag' => 'li',
				'currentClass' => 'active',
				'currentTag' => 'a',
				'escape' => false
			)
		); ?>
		</ul>
		<?php return ob_get_clean();
	}
	
	public function listActions($id = null, $buttons = array(), $options = array()) {
		$buttons_default = array(
			'text'=>'default',
			'title'=>'',
			'plugin' => null,
			'controller' => null,
			'action' => null,
			'style' => 'default',
			'size' => '',
			'icon' => '',
			'method' => 'get',
			'message' => false,
			'submit' => false,
			'block' => false
		);
		$defaults = array(
			'size' => false
		);
		$options = array_merge($defaults, $options);
		ob_start(); ?>
		<ul class="list-group">
			<?php
			foreach ($buttons as $button) { 
				$button = array_merge($buttons_default, $button);
				$link = array();
				if ($button['plugin']) $link['plugin'] = $button['plugin'];
				if ($button['controller']) $link['controller'] = $button['controller'];
				if ($button['action']) $link['action'] = $button['action'];
				array_push($link, $id);
				echo '<li class="list-group-item">'.$this->btnLink(
					$button['text'],
					$link,
					array(
						'style' => $button['style'],
						'title' => $button['title'],
						'icon' => $button['icon'],
						'method' => $button['method'],
						'message' => $button['message'],
						'submit' => $button['submit'],
						'block' => $button['block']
					)
				).'</li>';
			}
			
			?>
		</ul>
		<?php return ob_get_clean();
	}
	
	public function actions($id = null, $buttons = array(), $options = array()) {
		$buttons_default = array(
			'text'=>'default',
			'title'=>'',
			'plugin' => null,
			'controller' => null,
			'action' => null,
			'style' => 'default',
			'size' => '',
			'icon' => '',
			'method' => 'get',
			'message' => false,
			'submit' => false,
			'block' => false
		);
		$defaults = array(
			'size' => false
		);
		$options = array_merge($defaults, $options);
		ob_start(); ?>
		<div class="btn-group <?php echo ($options['size'])?('btn-group-'.$options['size']):(''); ?>">
			<?php
			foreach ($buttons as $button) { 
				$button = array_merge($buttons_default, $button);
				$link = array();
				if ($button['plugin']) $link['plugin'] = $button['plugin'];
				if ($button['controller']) $link['controller'] = $button['controller'];
				if ($button['action']) $link['action'] = $button['action'];
				array_push($link, $id);
				
				echo $this->btnLink(
					$button['text'],
					$link,
					array(
						'style' => $button['style'],
						'title' => $button['title'],
						'icon' => $button['icon'],
						'method' => $button['method'],
						'message' => $button['message'],
						'submit' => $button['submit'],
						'block' => $button['block']
					)
				);
			}
			
			?>
		</div>
		<?php return ob_get_clean();
	}
	
	public function basicActions($id = 0, $options = array()) { 
		$defaults = array(
			'size'=>'btn-sm'
		);
		$options = $defaults + $options;
		ob_start(); ?>
		<div class="btn-group">
		<?php echo $this->btnLink('Editar', array('action'=>'edit', $id), array('style'=>'primary','size'=>$options['size'])); ?>
		<?php echo $this->btnPost('Excluir', array('action'=>'del', $id), array('style'=>'danger','message'=>'Tem Certeza?','size'=>$options['size'])); ?>
		</div>
		<?php return ob_get_clean();
	}
	
	public function sacadosActions($id = 0, $options = array()) { 
		$defaults = array(
			'size'=>'btn-xs'
		);
		$options = $defaults + $options;
		ob_start(); ?>
		<div class="btn-group">
		<?php echo $this->btnLink('Ver', array('action'=>'view', $id), array('style'=>'success','size'=>$options['size'])); ?>
		<?php echo $this->btnLink('Editar', array('action'=>'edit', $id), array('style'=>'primary','size'=>$options['size'])); ?>
		<?php echo $this->btnPost('Excluir', array('action'=>'del', $id), array('style'=>'danger','message'=>'Tem Certeza?','size'=>$options['size'])); ?>
		</div>
		<?php return ob_get_clean();
	}
	
	public function setFlash($message, $style = 'default') {
		return $this->Session->setFlash($message, array('element'=>'Bootstrap.flash', 'class'=>'alert alert-'.$style.' alert-dismissable'));
	}
}
