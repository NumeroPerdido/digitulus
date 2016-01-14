<?php
    include_once "cambio.php";
	$cambio = new Cambio();
?>  
<!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">                
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Tabela de valores de câmbios
                        <small></small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active"><?php echo str_replace("-"," ",$_GET["page"]); ?></li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title"> Tabela de Câmbios</h3>                                    
                                </div><!-- /.box-header -->
           
									<table style="border-collapse: collapse; font-family: Verdana;
										font-size: 8pt;" border="1" width="100%" cellpadding="2"
										cellspacing="0">
										<tbody>
											<tr align="center" bgcolor="#cccccc">
												<td style="border: 1px solid #888888; border-spacing: 0px;"> Conversão Para Real (R$)</td>
												<td style="border: 1px solid #888888; border-spacing: 0px;"> Valor (R$) </td>
											</tr>	
											<tr align="center">
												<td style="border: 1px solid #888888; border-spacing: 0px;"> Dólar (US$) </td>
												<td style="border: 1px solid #888888; border-spacing: 0px;"><?php echo $cambio->cotacao(date('dmY', strtotime('-1 day')), $i=1, "Dólar");?>  </td>
											</tr>	
											<tr align="center">
												<td style="border: 1px solid #888888; border-spacing: 0px;"> Libra (£) </td>
												<td style="border: 1px solid #888888; border-spacing: 0px;">  <?php echo $cambio->cotacao(date('dmY', strtotime('-1 day')), $i=1, "Libra");?></td>
											</tr>		
											<tr align="center">
												<td style="border: 1px solid #888888; border-spacing: 0px;"> Euro (€)</td>
												<td style="border: 1px solid #888888; border-spacing: 0px;"> <?php echo $cambio->cotacao(date('dmY', strtotime('-1 day')), $i=1, "Euro");?> </td>
											</tr>	
											<tr align="center">
												<td style="border: 1px solid #888888; border-spacing: 0px;"> Dólar Canadense (CA$)</td>
												<td style="border: 1px solid #888888; border-spacing: 0px;">  <?php echo $cambio->cotacao(date('dmY', strtotime('-1 day')), $i=1, "Dólar Canadense");?></td>
											</tr>	
											<tr align="center">
												<td style="border: 1px solid #888888; border-spacing: 0px;"> Dólar Australiano (AU$)</td>
												<td style="border: 1px solid #888888; border-spacing: 0px;">  <?php echo $cambio->cotacao(date('dmY', strtotime('-1 day')), $i=1, "Dólar Australiano");?></td>
											</tr>	
											<tr align="center">
												<td style="border: 1px solid #888888; border-spacing: 0px;"> Dólar Neozelandês (NZ$)</td>
												<td style="border: 1px solid #888888; border-spacing: 0px;"> <?php echo $cambio->cotacao(date('dmY', strtotime('-1 day')), $i=1, "Dólar  Neozelandês");?> </td>
											</tr>	
											<tr align="center">
												<td style="border: 1px solid #888888; border-spacing: 0px;"> Franco Suíço (Fr.)</td>
												<td style="border: 1px solid #888888; border-spacing: 0px;"> <?php echo $cambio->cotacao(date('dmY', strtotime('-1 day')), $i=1, "Franco Suíço");?> </td>
											</tr>	
											<tr align="center">
												<td style="border: 1px solid #888888; border-spacing: 0px;"> Rande (R)</td>
												<td style="border: 1px solid #888888; border-spacing: 0px;"><?php echo $cambio->cotacao(date('dmY', strtotime('-1 day')), $i=1, "Rande");?>  </td>
											</tr>	
											<tr align="center">
												<td style="border: 1px solid #888888; border-spacing: 0px;"> Iene (¥)</td>
												<td style="border: 1px solid #888888; border-spacing: 0px;"><?php echo $cambio->cotacao(date('dmY', strtotime('-1 day')), $i=1, "Iene");?>  </td>
											</tr>	
											
											<tr align="center">
												<td style="border: 1px solid #888888; border-spacing: 0px;">Dólar Iata (IATA US$)</td>
												<td style="border: 1px solid #888888; border-spacing: 0px;"> <?php echo $cambio->cotacao(date('dmY', strtotime('-1 day')), $i=1, "Dólar Iata");?> </td>
											</tr>	
										</tbody>
									</table>
								<div class="box-header">
                                    <h3 class="box-title"> Tabela de Câmbios de Abertura</h3>                                    
                                </div><!-- /.box-header -->
								<table style="border-collapse: collapse; font-family: Verdana;
										font-size: 8pt;" border="1" width="100%" cellpadding="2"
										cellspacing="0">
										<tbody>
											<tr align="center" bgcolor="#cccccc">
												<td style="border: 1px solid #888888; border-spacing: 0px;"> Conversão Para Real (R$)</td>
												<td style="border: 1px solid #888888; border-spacing: 0px;"> Valor (R$) </td>
											</tr>	
											<tr align="center">
												<td style="border: 1px solid #888888; border-spacing: 0px;"> Dólar (US$) </td>
												<td style="border: 1px solid #888888; border-spacing: 0px;"><?php echo $cambio->cod_cambio("Dólar");?>  </td>
											</tr>	
											<tr align="center">
												<td style="border: 1px solid #888888; border-spacing: 0px;"> Libra (£) </td>
												<td style="border: 1px solid #888888; border-spacing: 0px;">  <?php echo $cambio->cod_cambio("Libra");?></td>
											</tr>		
											<tr align="center">
												<td style="border: 1px solid #888888; border-spacing: 0px;"> Euro (€)</td>
												<td style="border: 1px solid #888888; border-spacing: 0px;"> <?php echo $cambio->cod_cambio("Euro");?> </td>
											</tr>	
											<tr align="center">
												<td style="border: 1px solid #888888; border-spacing: 0px;"> Dólar Canadense (CA$)</td>
												<td style="border: 1px solid #888888; border-spacing: 0px;">  <?php echo $cambio->cod_cambio("Dólar Canadense");?></td>
											</tr>	
											<tr align="center">
												<td style="border: 1px solid #888888; border-spacing: 0px;"> Dólar Australiano (AU$)</td>
												<td style="border: 1px solid #888888; border-spacing: 0px;">  <?php echo $cambio->cod_cambio("Dólar Australiano");?></td>
											</tr>	
											<tr align="center">
												<td style="border: 1px solid #888888; border-spacing: 0px;"> Dólar Neozelandês (NZ$)</td>
												<td style="border: 1px solid #888888; border-spacing: 0px;"> <?php echo $cambio->cod_cambio("Dólar Neozelandês");?> </td>
											</tr>	
											<tr align="center">
												<td style="border: 1px solid #888888; border-spacing: 0px;"> Franco Suíço (Fr.)</td>
												<td style="border: 1px solid #888888; border-spacing: 0px;"> <?php echo $cambio->cod_cambio("Franco Suíço");?> </td>
											</tr>	
											<tr align="center">
												<td style="border: 1px solid #888888; border-spacing: 0px;"> Rande (R)</td>
												<td style="border: 1px solid #888888; border-spacing: 0px;"><?php echo $cambio->cod_cambio("Rande");?>  </td>
											</tr>	
											<tr align="center">
												<td style="border: 1px solid #888888; border-spacing: 0px;"> Iene (¥)</td>
												<td style="border: 1px solid #888888; border-spacing: 0px;"><?php echo $cambio->cod_cambio("Iene");?>  </td>
											</tr>	
											
											<tr align="center">
												<td style="border: 1px solid #888888; border-spacing: 0px;">Dólar Iata (IATA US$)</td>
												<td style="border: 1px solid #888888; border-spacing: 0px;"> <?php echo $cambio->cod_cambio("Dólar Iata");?> </td>
											</tr>	
										</tbody>
									</table>
							
                                   
                                <!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        
