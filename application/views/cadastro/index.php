<div class="container">
	
	<form id="formulario_cadastro">
		<div class="col-md-6">
			<div class="form-group">
				<?php echo form_label('Descrição', 'descricao') ?>
				<?php echo form_input(array(
					'name' => 'descricao',
					'class' => 'form-control',
					'id' => 'descricao',
					'type' => 'text',
					'placeholder' => 'Descrição'
				)); ?>
			</div>
		</div>
		<div class="col-md-3">
			<div class="form-group">
				<?php echo form_label('Valor', 'valor') ?>
				<?php echo form_input(array(
					'name' => 'valor',
					'class' => 'form-control',
					'id' => 'valor',
					'type' => 'text',
					'placeholder' => 'Valor'
				)); ?>
			</div>
		</div>
		<div class="col-md-3">
			<div class="form-group">
				<?php echo form_input(array(
					'name' => 'Cadastrar',
					'style' => 'margin-top: 25px;',
					'class' => 'form-control btn btn-primary',
					'id' => 'cadastrar',
					'type' => 'submit',
				), "Cadastrar"); ?>
			</div>
		</div>
	</form>
	
	
</div>
<br><br>
<div class="container">
		
				<table id="lista-produtos" class="display">
					<thead>
						<tr>
							<th>Descrição</th>
							<th>Valor</th>
							<th class="text-center">Editar ou Excluir</th>
					    </tr>
					</thead>
					<tbody>
				<?php 
					foreach ($produtos as $produto) {
				?>
					<tr>
						<td><?php echo $produto->descricao; ?></td>
						<td><?php echo $produto->valor; ?></td>
						<td width="200" class="text-center">
							<a href="<?php echo base_url('alterar/' . $produto->pk); ?>" class="btn btn-default">Alterar</a>
							<button class="btn btn-danger " id="<?php echo $produto->pk; ?>">Excluir</button>
						</td>		
					</tr>
				<?php
					}
				?>
				</tbody>	
				</table>

				
		
	</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/bootbox.min.js'); ?>"></script>
    <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.10/js/jquery.dataTables.js"></script>



<script type="text/javascript">
	
    $(document).ready(function(){

    	$('#lista-produtos').dataTable();

        $("#cadastrar").click(function(){
                var url = 'http://localhost/padaria/cadastro/cadastrar';
                var descricao = $('#descricao').val();
                var valor =  $('#valor').val();
                if (descricao == "" || valor == "") {
                	bootbox.alert("Os campos Descrição e Valor precisam ser preenchidos!");
                } else {
	                	$.ajax({
	                        url: url,
	                        type: 'POST',
	                        data: $("#formulario_cadastro").serialize(),
	                        success: function(msg){
	                            //$("#mensagem").html(msg);
	                            bootbox.alert('Produto cadastrado com sucesso', function() {
						  			location.reload();
						  		});
	                        },
	                        error: function() {
	                        	bootbox.alert('Ocorreu um erro ao tentar cadastrar o produto');
	                        }
	                    });
                }
                return false;
            });
    });     
</script>


  </body>
</html>

