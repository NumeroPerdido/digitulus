<?php
    function menu_administrador(){
?>
        <ul class="sidebar-menu">
            <!--Usa a classe active caso esteja na respectiva página do menu-->
            <li class="<?php  if(!isset($_GET["page"])){ echo "active"; } ?>">
                <a href="index.php">
                    <i class="fa fa-dashboard"></i> <span>Painel de Controle</span>
                </a>
            </li>
            <li class="treeview <?php echo check_active(array("Adicionar-Produto","Lista-de-Produtos","Importar-Produtos","Exportar-Produtos")); ?>">
                <a href="#">
                    <i class="fa fa-shopping-cart"></i>
                    <span>Produtos</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php echo check_active(array("Adicionar-Produto")); ?>"><a href="index.php?page=Adicionar-Produto"><i class="fa fa-plus-circle"></i>Adicionar Produto</a></li>
                    <li class="<?php echo check_active(array("Lista-de-Produtos")); ?>"><a href="index.php?page=Lista-de-Produtos"><i class="fa fa-bars"></i> Lista de Produtos</a></li>
                    <li class="<?php echo check_active(array("Importar-Produtos")); ?>"><a href="index.php?page=Importar-Produtos"><i class="fa fa-cloud-upload"></i>Importar Produtos</a></li>
                    <li class="<?php echo check_active(array("Exportar-Produtos")); ?>"><a href="index.php?page=Exportar-Produtos"><i class="fa fa-cloud-download"></i>Exportar Produtos</a></li>
                </ul>
            </li>

             <li class="treeview <?php echo check_active(array("Adicionar-Voo")); ?>">
                <a href="#">
                    <i class="fa fa-plane"></i>
                    <span>Voo</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php echo check_active(array("Converter-Codigo")); ?>"><a href="index.php?page=Converter-Codigo"><i class="fa fa-wrench"></i>Converter Código</a></li>
                    <li class="<?php echo check_active(array("Adicionar-Voo")); ?>"><a href="index.php?page=Adicionar-Voo"><i class="fa fa-plus-circle"></i>Adicionar Voo</a></li>
                    <li class="<?php echo check_active(array("Lista-de-Voos")); ?>"><a href="index.php?page=Lista-de-Voos"><i class="fa fa-bars"></i> Lista de Voos</a></li>
                    <li class="<?php echo check_active(array("Adicionar-Companhia-Aerea")); ?>"><a href="index.php?page=Adicionar-Companhia-Aerea"><i class="fa fa-plus-circle"></i>Adicionar Companhia Aérea</a></li>
                    <li class="<?php echo check_active(array("Lista-de-Companhias-Aereas")); ?>"><a href="index.php?page=Lista-de-Companhias-Aereas"><i class="fa fa-bars"></i> Lista de Companhias Aéreas</a></li>
                    <li class="<?php echo check_active(array("Adicionar-Aeroporto")); ?>"><a href="index.php?page=Adicionar-Aeroporto"><i class="fa fa-plus-circle"></i>Adicionar Aeroporto</a></li>
                    <li class="<?php echo check_active(array("Lista-de-Aeroportos")); ?>"><a href="index.php?page=Lista-de-Aeroportos"><i class="fa fa-bars"></i> Lista de Aeroportos</a></li>
                </ul>
            </li>
            <li class="treeview <?php echo check_active(array("Adicionar-Cambio","Lista-de-Cambios")); ?>">
                <a href="#">
                    <i class="fa fa-money"></i>
                    <span>Câmbio</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php echo check_active(array("Tabela-Cambio")); ?>"><a href="index.php?page=Tabela-Cambio"><i class="fa fa-table"></i>Gerar Tabela de Câmbio</a></li>
                    <li class="<?php echo check_active(array("Adicionar-Cambio")); ?>"><a href="index.php?page=Adicionar-Cambio"><i class="fa fa-plus-circle"></i>Adicionar Câmbio</a></li>
                    <li class="<?php echo check_active(array("Lista-de-Cambios")); ?>"><a href="index.php?page=Lista-de-Cambios"><i class="fa fa-bars"></i>Lista de Câmbios</a></li>
                    <li class="<?php echo check_active(array("Lista-de-Cambios-Administrador")); ?>"><a href="index.php?page=Lista-de-Cambios-Administrador"><i class="fa fa-bars"></i>Lista de Câmbios Administrador</a></li>                                
                </ul>
            </li>
            <li class="treeview <?php echo check_active(array("Adicionar-Seguro","Lista-de-Seguros")); ?>">
                <a href="#">
                    <i class="fa fa-medkit"></i>
                    <span>Seguro</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php echo check_active(array("Adicionar-Seguro")); ?>"><a href="index.php?page=Adicionar-Seguro"><i class="fa fa-plus-circle"></i>Adicionar Seguros</a></li>
                    <li class="<?php echo check_active(array("Lista-de-Seguros")); ?>"><a href="index.php?page=Lista-de-Seguros"><i class="fa fa-bars"></i>Lista de Seguros</a></li>
                </ul>
            </li>
            <li class="treeview <?php echo check_active(array("Adicionar-Imagem","Lista-de-Imagens")); ?>">
                <a href="#">
                    <i class="fa fa-picture-o"></i>
                    <span>Imagens Produto</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php echo check_active(array("Lista-de-Imagens")); ?>"><a href="index.php?page=Lista-de-Imagens"><i class="fa fa-bars"></i>Lista de Imagens</a></li>
                                <li class="<?php echo check_active(array("Lista-de-Localizacoes")); ?>"><a href="index.php?page=Lista-de-Localizacoes"><i class="fa fa-bars"></i>Lista de Localizacoes</a></li>
                        
                   
           
                </ul>
            </li>
            <li class="treeview <?php echo check_active(array("Lista-de-Duracao")); ?>">
                <a href="#">
                    <i class="fa fa-calendar"></i>
                    <span>Duração</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php echo check_active(array("Lista-de-Duracoes")); ?>"><a href="index.php?page=Lista-de-Duracoes"><i class="fa fa-bars"></i> Lista de Durações</a></li>
                </ul>
            </li>
            <li class="treeview <?php echo check_active(array("Editar-Configuracoes")); ?>">
                <a href="#">
                    <i class="fa fa-cog"></i>
                    <span>Configurações</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php echo check_active(array("Editar-Configuracoes")); ?>"><a href="index.php?page=Editar-Configuracoes"><i class="fa fa-pencil-square-o"></i> Editar Configurações</a></li>
                </ul>
            </li>
            <li class="treeview <?php echo check_active(array("Adicionar-Usuario","Lista-de-Usuarios")); ?>">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span>Usuários</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php echo check_active(array("Adicionar-Usuario")); ?>"><a href="index.php?page=Adicionar-Usuario"><i class="fa fa-plus-circle"></i>Adicionar Usuário</a></li>
                    <li class="<?php echo check_active(array("Lista-de-Usuarios")); ?>"><a href="index.php?page=Lista-de-Usuarios"><i class="fa fa-bars"></i> Lista de Usuários</a></li>
                </ul>
            </li>
            <li class="treeview <?php echo check_active(array("Add-Yield-Management-Promotion")); ?>">
                <a href="#">
                    <i class="fa fa-tags"></i>
                    <span>Schools</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php echo check_active(array("Add-Yield-Management-Promotion")); ?>"><a href="index.php?page=Add-Yield-Management-Promotion"><i class="fa fa-plus-circle"></i>Add Yield Management Promotion</a></li>
                </ul>
            </li>
            
            <li class="treeview <?php echo check_active(array("Adicionar-Cliente-com-Atendimento","Adicionar-Atendimento","Lista-de-Atendimentos","Concluir-Venda","Editar-Atendimento","Lista-de-Atendimentos-Completos")); ?>">
                <a href="#">
                    <i class="fa fa-comment"></i>
                    <span>Atendimento</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php echo check_active(array("Adicionar-Cliente-com-Atendimento")); ?>"><a href="index.php?page=Adicionar-Cliente-com-Atendimento"><i class="fa fa-plus-circle"></i>Adicionar Cliente (com Atendimento)</a></li>
                    <li class="<?php echo check_active(array("Lista-de-Atendimentos")); ?>"><a href="index.php?page=Lista-de-Atendimentos"><i class="fa fa-bars"></i>Lista de Atendimentos</a></li>
                    <li class="<?php echo check_active(array("Lista-de-Atendimentos-Completos")); ?>"><a href="index.php?page=Lista-de-Atendimentos-Completos"><i class="fa fa-bars"></i>Lista de Atendimentos ADMIN</a></li> 
                </ul>
            </li>
            
            <li class="treeview <?php echo check_active(array("Adicionar-Cliente","Lista-de-Clientes","Editar-Cliente")); ?>">
                <a href="#">
                    <i class="fa fa-user"></i>
                    <span>Cliente</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php echo check_active(array("Adicionar-Cliente")); ?>"><a href="index.php?page=Adicionar-Cliente"><i class="fa fa-plus-circle"></i>Adicionar Cliente</a></li>
                    <li class="<?php echo check_active(array("Lista-de-Clientes")); ?>"><a href="index.php?page=Lista-de-Clientes"><i class="fa fa-bars"></i>Lista de Clientes</a></li>
                </ul>
            </li>

            <li class="treeview <?php echo check_active(array("Lista-de-Atendimentos-Vendidos","Gerar-Email-Matricula","Editar-Orçamento")); ?>">
                <a href="#">
                    <i class="fa fa-book"></i>
                    <span>Registrar</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php echo check_active(array("Lista-de-Atendimentos-Vendidos")); ?>"><a href="index.php?page=Lista-de-Atendimentos-Vendidos"><i class="fa fa-bars"></i>Lista de Atendimento Vendidos</a></li>
                </ul>
            </li>

            
   <li class="<?php  if(isset($_GET["page"]) AND $_GET["page"]=="teste"){ echo "active"; } ?>">
                <a href="index.php?page=teste">
                    <i class="fa fa-bug"></i> <span>teste</span>
                </a>
            </li>
        </ul>       
      
<?php } ?>


<?php function menu_gerente_website() {?>
    <ul class="sidebar-menu">
            <!--Usa a classe active caso esteja na respectiva página do menu-->
            <li class="<?php  if(!isset($_GET["page"])){ echo "active"; } ?>">
                <a href="index.php">
                    <i class="fa fa-dashboard"></i> <span>Painel de Controle</span>
                </a>
            </li>
            <li class="treeview <?php echo check_active(array("Adicionar-Produto","Lista-de-Produtos","Importar-Produtos","Exportar-Produtos")); ?>">
                <a href="#">
                    <i class="fa fa-shopping-cart"></i>
                    <span>Produtos</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php echo check_active(array("Adicionar-Produto")); ?>"><a href="index.php?page=Adicionar-Produto"><i class="fa fa-plus-circle"></i>Adicionar Produto</a></li>
                    <li class="<?php echo check_active(array("Lista-de-Produtos")); ?>"><a href="index.php?page=Lista-de-Produtos"><i class="fa fa-bars"></i> Lista de Produtos</a></li>
                    <li class="<?php echo check_active(array("Importar-Produtos")); ?>"><a href="index.php?page=Importar-Produtos"><i class="fa fa-cloud-upload"></i>Importar Produtos</a></li>
                    <li class="<?php echo check_active(array("Exportar-Produtos")); ?>"><a href="index.php?page=Exportar-Produtos"><i class="fa fa-cloud-download"></i>Exportar Produtos</a></li>
                </ul>
            </li>

             <li class="treeview <?php echo check_active(array("Converter-Codigo","Adicionar-Voo","Lista-de-Voos")); ?>">
                <a href="#">
                    <i class="fa fa-plane"></i>
                    <span>Voo</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                     <li class="<?php echo check_active(array("Converter-Codigo")); ?>"><a href="index.php?page=Converter-Codigo"><i class="fa fa-wrench"></i>Converter Código</a></li>
                    <li class="<?php echo check_active(array("Adicionar-Voo")); ?>"><a href="index.php?page=Adicionar-Voo"><i class="fa fa-plus-circle"></i>Adicionar Voo</a></li>
                    <li class="<?php echo check_active(array("Lista-de-Voos")); ?>"><a href="index.php?page=Lista-de-Voos"><i class="fa fa-bars"></i> Lista de Voos</a></li>
                   
                </ul>
            </li>
            <li class="treeview <?php echo check_active(array("Adicionar-Seguro","Lista-de-Seguros")); ?>">
                <a href="#">
                    <i class="fa fa-medkit"></i>
                    <span>Seguro</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php echo check_active(array("Adicionar-Seguro")); ?>"><a href="index.php?page=Adicionar-Seguro"><i class="fa fa-plus-circle"></i>Adicionar Seguros</a></li>
                    <li class="<?php echo check_active(array("Lista-de-Seguros")); ?>"><a href="index.php?page=Lista-de-Seguros"><i class="fa fa-bars"></i>Lista de Seguros</a></li>
                </ul>
            </li>
<!--
           <li class="treeview <?php echo check_active(array("Tabela-Cambio","Lista-de-Cambios")); ?>">
                <a href="#">
                    <i class="fa fa-money"></i>
                    <span>Câmbio</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php echo check_active(array("Tabela-Cambio")); ?>"><a href="index.php?page=Tabela-Cambio"><i class="fa fa-table"></i>Gerar Tabela de Câmbio</a></li>
                    <li class="<?php echo check_active(array("Lista-de-Cambios")); ?>"><a href="index.php?page=Lista-de-Cambios"><i class="fa fa-bars"></i>Lista de Câmbios</a></li>
                    </ul>
            </li>
-->
            <li class="treeview <?php echo check_active(array("Lista-de-Imagens")); ?>">
                <a href="#">
                    <i class="fa fa-picture-o"></i>
                    <span>Imagens Produto</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php echo check_active(array("Lista-de-Imagens")); ?>"><a href="index.php?page=Lista-de-Imagens"><i class="fa fa-bars"></i>Lista de Imagens</a></li>
                </ul>
            </li>
        </ul>          
<?php } ?>        
<?php
    function menu_funcionario(){
?>
        <ul class="sidebar-menu">
            <!--Usa a classe active caso esteja na respectiva página do menu-->
            <li class="<?php  if(!isset($_GET["page"])){ echo "active"; } ?>">
                <a href="index.php">
                    <i class="fa fa-dashboard"></i> <span>Painel de Controle</span>
                </a>
            </li>
            <li class="treeview <?php echo check_active(array("Adicionar-Produto","Lista-de-Produtos","Importar-Produtos","Exportar-Produtos")); ?>">
                <a href="#">
                    <i class="fa fa-shopping-cart"></i>
                    <span>Produtos</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php echo check_active(array("Adicionar-Produto")); ?>"><a href="index.php?page=Adicionar-Produto"><i class="fa fa-plus-circle"></i>Adicionar Produto</a></li>
                    <li class="<?php echo check_active(array("Lista-de-Produtos")); ?>"><a href="index.php?page=Lista-de-Produtos"><i class="fa fa-bars"></i> Lista de Produtos</a></li>
                    <li class="<?php echo check_active(array("Importar-Produtos")); ?>"><a href="index.php?page=Importar-Produtos"><i class="fa fa-cloud-upload"></i>Importar Produtos</a></li>
                    <li class="<?php echo check_active(array("Exportar-Produtos")); ?>"><a href="index.php?page=Exportar-Produtos"><i class="fa fa-cloud-download"></i>Exportar Produtos</a></li>
                </ul>
            </li>

             <li class="treeview <?php echo check_active(array("Converter-Codigo","Adicionar-Voo","Lista-de-Voos")); ?>">
                <a href="#">
                    <i class="fa fa-plane"></i>
                    <span>Voo</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php echo check_active(array("Converter-Codigo")); ?>"><a href="index.php?page=Converter-Codigo"><i class="fa fa-wrench"></i>Converter Código</a></li>
                    <li class="<?php echo check_active(array("Adicionar-Voo")); ?>"><a href="index.php?page=Adicionar-Voo"><i class="fa fa-plus-circle"></i>Adicionar Voo</a></li>
                    <li class="<?php echo check_active(array("Lista-de-Voos")); ?>"><a href="index.php?page=Lista-de-Voos"><i class="fa fa-bars"></i> Lista de Voos</a></li>
                </ul>
            </li>
            <li class="treeview <?php echo check_active(array("Adicionar-Cambio","Lista-de-Cambios")); ?>">
                <a href="#">
                    <i class="fa fa-money"></i>
                    <span>Câmbio</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php echo check_active(array("Tabela-Cambio")); ?>"><a href="index.php?page=Tabela-Cambio"><i class="fa fa-table"></i>Gerar Tabela de Câmbio</a></li>
                    <li class="<?php echo check_active(array("Lista-de-Cambios")); ?>"><a href="index.php?page=Lista-de-Cambios"><i class="fa fa-bars"></i>Lista de Câmbios</a></li>                             
                </ul>
            </li>
            <li class="treeview <?php echo check_active(array("Adicionar-Imagem","Lista-de-Imagens")); ?>">
                <a href="#">
                    <i class="fa fa-picture-o"></i>
                    <span>Imagens Produto</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php echo check_active(array("Lista-de-Imagens")); ?>"><a href="index.php?page=Lista-de-Imagens"><i class="fa fa-bars"></i>Lista de Imagens</a></li>
                </ul>
            </li>
        </ul>
<?php } ?>

<?php
    function menu_financeiro(){
?>
        <ul class="sidebar-menu">
            <!--Usa a classe active caso esteja na respectiva página do menu-->
            <li class="<?php  if(!isset($_GET["page"])){ echo "active"; } ?>">
                <a href="index.php">
                    <i class="fa fa-dashboard"></i> <span>Painel de Controle</span>
                </a>
            </li>
             <li class="treeview <?php echo check_active(array("Converter-Codigo","Adicionar-Voo","Lista-de-Voos")); ?>">
                <a href="#">
                    <i class="fa fa-plane"></i>
                    <span>Voo</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php echo check_active(array("Converter-Codigo")); ?>"><a href="index.php?page=Converter-Codigo"><i class="fa fa-wrench"></i>Converter Código</a></li>
                    <li class="<?php echo check_active(array("Adicionar-Voo")); ?>"><a href="index.php?page=Adicionar-Voo"><i class="fa fa-plus-circle"></i>Adicionar Voo</a></li>
                    <li class="<?php echo check_active(array("Lista-de-Voos")); ?>"><a href="index.php?page=Lista-de-Voos"><i class="fa fa-bars"></i> Lista de Voos</a></li>
                </ul>
            </li>
<!--
            <li class="treeview <?php echo check_active(array("Adicionar-Cambio","Lista-de-Cambios")); ?>">
                <a href="#">
                    <i class="fa fa-money"></i>
                    <span>Câmbio</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php echo check_active(array("Tabela-Cambio")); ?>"><a href="index.php?page=Tabela-Cambio"><i class="fa fa-table"></i>Gerar Tabela de Câmbio</a></li>
                    <li class="<?php echo check_active(array("Lista-de-Cambios")); ?>"><a href="index.php?page=Lista-de-Cambios"><i class="fa fa-bars"></i>Lista de Câmbios</a></li>                             
                </ul>
            </li>
            
-->
            <li class="treeview <?php echo check_active(array("Adicionar-Cliente-com-Atendimento","Adicionar-Atendimento","Lista-de-Atendimentos","Concluir-Venda","Editar-Atendimento","Lista-de-Atendimentos-Completos")); ?>">
                <a href="#">
                    <i class="fa fa-comment"></i>
                    <span>Atendimento</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php echo check_active(array("Adicionar-Cliente-com-Atendimento")); ?>"><a href="index.php?page=Adicionar-Cliente-com-Atendimento"><i class="fa fa-plus-circle"></i>Adicionar Cliente (com Atendimento)</a></li>
                    <li class="<?php echo check_active(array("Lista-de-Atendimentos")); ?>"><a href="index.php?page=Lista-de-Atendimentos"><i class="fa fa-bars"></i>Lista de Atendimentos</a></li>
                    <li class="<?php echo check_active(array("Lista-de-Atendimentos-Completos")); ?>"><a href="index.php?page=Lista-de-Atendimentos-Completos"><i class="fa fa-bars"></i>Lista de Atendimentos ADMIN</a></li> 
                </ul>
            </li>
            
            <li class="treeview <?php echo check_active(array("Adicionar-Cliente","Lista-de-Clientes","Editar-Cliente")); ?>">
                <a href="#">
                    <i class="fa fa-user"></i>
                    <span>Cliente</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php echo check_active(array("Adicionar-Cliente")); ?>"><a href="index.php?page=Adicionar-Cliente"><i class="fa fa-plus-circle"></i>Adicionar Cliente</a></li>
                    <li class="<?php echo check_active(array("Lista-de-Clientes")); ?>"><a href="index.php?page=Lista-de-Clientes"><i class="fa fa-bars"></i>Lista de Clientes</a></li>
                </ul>
            </li>
          
        </ul>

<?php } ?>

<?php
    function menu_registrar(){
?>
        <ul class="sidebar-menu">
            <!--Usa a classe active caso esteja na respectiva página do menu-->
            <li class="<?php  if(!isset($_GET["page"])){ echo "active"; } ?>">
                <a href="index.php">
                    <i class="fa fa-dashboard"></i> <span>Painel de Controle</span>
                </a>
            </li>
             <li class="treeview <?php echo check_active(array("Converter-Codigo","Adicionar-Voo","Lista-de-Voos")); ?>">
                <a href="#">
                    <i class="fa fa-plane"></i>
                    <span>Voo</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php echo check_active(array("Converter-Codigo")); ?>"><a href="index.php?page=Converter-Codigo"><i class="fa fa-wrench"></i>Converter Código</a></li>
                    <li class="<?php echo check_active(array("Adicionar-Voo")); ?>"><a href="index.php?page=Adicionar-Voo"><i class="fa fa-plus-circle"></i>Adicionar Voo</a></li>
                    <li class="<?php echo check_active(array("Lista-de-Voos")); ?>"><a href="index.php?page=Lista-de-Voos"><i class="fa fa-bars"></i> Lista de Voos</a></li>
                </ul>
            </li>

<!--
            <li class="treeview <?php echo check_active(array("Adicionar-Cambio","Lista-de-Cambios")); ?>">
                <a href="#">
                    <i class="fa fa-money"></i>
                    <span>Câmbio</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php echo check_active(array("Tabela-Cambio")); ?>"><a href="index.php?page=Tabela-Cambio"><i class="fa fa-table"></i>Gerar Tabela de Câmbio</a></li>
                    <li class="<?php echo check_active(array("Lista-de-Cambios")); ?>"><a href="index.php?page=Lista-de-Cambios"><i class="fa fa-bars"></i>Lista de Câmbios</a></li>                             
                </ul>
            </li>
-->
            
            <li class="treeview <?php echo check_active(array("Adicionar-Cliente-com-Atendimento","Adicionar-Atendimento","Lista-de-Atendimentos","Concluir-Venda","Editar-Atendimento","Lista-de-Atendimentos-Completos")); ?>">
                <a href="#">
                    <i class="fa fa-comment"></i>
                    <span>Atendimento</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php echo check_active(array("Adicionar-Cliente-com-Atendimento")); ?>"><a href="index.php?page=Adicionar-Cliente-com-Atendimento"><i class="fa fa-plus-circle"></i>Adicionar Cliente (com Atendimento)</a></li>
                    <li class="<?php echo check_active(array("Lista-de-Atendimentos")); ?>"><a href="index.php?page=Lista-de-Atendimentos"><i class="fa fa-bars"></i>Lista de Atendimentos</a></li>
                    <li class="<?php echo check_active(array("Lista-de-Atendimentos-Completos")); ?>"><a href="index.php?page=Lista-de-Atendimentos-Completos"><i class="fa fa-bars"></i>Lista de Atendimentos ADMIN</a></li> 
                </ul>
            </li>
            
            <li class="treeview <?php echo check_active(array("Adicionar-Cliente","Lista-de-Clientes","Editar-Cliente")); ?>">
                <a href="#">
                    <i class="fa fa-user"></i>
                    <span>Cliente</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php echo check_active(array("Adicionar-Cliente")); ?>"><a href="index.php?page=Adicionar-Cliente"><i class="fa fa-plus-circle"></i>Adicionar Cliente</a></li>
                    <li class="<?php echo check_active(array("Lista-de-Clientes")); ?>"><a href="index.php?page=Lista-de-Clientes"><i class="fa fa-bars"></i>Lista de Clientes</a></li>
                </ul>
            </li> 
            
            
        </ul>
<?php } ?>


<?php
    function menu_gerente_vendas(){
?>
        <ul class="sidebar-menu">
            <!--Usa a classe active caso esteja na respectiva página do menu-->
            <li class="<?php  if(!isset($_GET["page"])){ echo "active"; } ?>">
                <a href="index.php">
                    <i class="fa fa-dashboard"></i> <span>Painel de Controle</span>
                </a>
            </li>
             <li class="treeview <?php echo check_active(array("Converter-Codigo")); ?>">
                <a href="#">
                    <i class="fa fa-plane"></i>
                    <span>Voo</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php echo check_active(array("Converter-Codigo")); ?>"><a href="index.php?page=Converter-Codigo"><i class="fa fa-wrench"></i>Converter Código</a></li>
                </ul>
            </li>
            <li class="treeview <?php echo check_active(array("Lista-de-Cambios")); ?>">
                <a href="#">
                    <i class="fa fa-money"></i>
                    <span>Câmbio</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php echo check_active(array("Tabela-Cambio")); ?>"><a href="index.php?page=Tabela-Cambio"><i class="fa fa-table"></i>Gerar Tabela de Câmbio</a></li>                           
                </ul>
            </li>
            
            <li class="treeview <?php echo check_active(array("Adicionar-Cliente-com-Atendimento","Adicionar-Atendimento","Lista-de-Atendimentos","Concluir-Venda","Editar-Atendimento","Lista-de-Atendimentos-Completos")); ?>">
                <a href="#">
                    <i class="fa fa-comment"></i>
                    <span>Atendimento</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php echo check_active(array("Adicionar-Cliente-com-Atendimento")); ?>"><a href="index.php?page=Adicionar-Cliente-com-Atendimento"><i class="fa fa-plus-circle"></i>Adicionar Cliente (com Atendimento)</a></li>
                    <li class="<?php echo check_active(array("Lista-de-Atendimentos")); ?>"><a href="index.php?page=Lista-de-Atendimentos"><i class="fa fa-bars"></i>Lista de Atendimentos</a></li>
                    <li class="<?php echo check_active(array("Lista-de-Atendimentos-Completos")); ?>"><a href="index.php?page=Lista-de-Atendimentos-Completos"><i class="fa fa-bars"></i>Lista de Atendimentos ADMIN</a></li> 
                </ul>
            </li>
            
            <li class="treeview <?php echo check_active(array("Adicionar-Cliente","Lista-de-Clientes","Editar-Cliente")); ?>">
                <a href="#">
                    <i class="fa fa-user"></i>
                    <span>Cliente</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php echo check_active(array("Adicionar-Cliente")); ?>"><a href="index.php?page=Adicionar-Cliente"><i class="fa fa-plus-circle"></i>Adicionar Cliente</a></li>
                    <li class="<?php echo check_active(array("Lista-de-Clientes")); ?>"><a href="index.php?page=Lista-de-Clientes"><i class="fa fa-bars"></i>Lista de Clientes</a></li>
                </ul>
            </li>
            
        </ul>
<?php } ?>
<?php
    function menu_vendedor(){
?>
        <ul class="sidebar-menu">
            <!--Usa a classe active caso esteja na respectiva página do menu-->
            <li class="<?php  if(!isset($_GET["page"])){ echo "active"; } ?>">
                <a href="index.php">
                    <i class="fa fa-dashboard"></i> <span>Painel de Controle</span>
                </a>
            </li>
             <li class="treeview <?php echo check_active(array("Converter-Codigo")); ?>">
                <a href="#">
                    <i class="fa fa-plane"></i>
                    <span>Voo</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php echo check_active(array("Converter-Codigo")); ?>"><a href="index.php?page=Converter-Codigo"><i class="fa fa-wrench"></i>Converter Código</a></li>
                </ul>
            </li>
<!--
            <li class="treeview <?php echo check_active(array("Lista-de-Cambios")); ?>">
                <a href="#">
                    <i class="fa fa-money"></i>
                    <span>Câmbio</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php echo check_active(array("Tabela-Cambio")); ?>"><a href="index.php?page=Tabela-Cambio"><i class="fa fa-table"></i>Gerar Tabela de Câmbio</a></li>                           
                </ul>
            </li>
-->
            
            <li class="treeview <?php echo check_active(array("Adicionar-Cliente-com-Atendimento","Adicionar-Atendimento","Lista-de-Atendimentos","Concluir-Venda","Editar-Atendimento")); ?>">
                <a href="#">
                    <i class="fa fa-comment"></i>
                    <span>Atendimento</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php echo check_active(array("Adicionar-Cliente-com-Atendimento")); ?>"><a href="index.php?page=Adicionar-Cliente-com-Atendimento"><i class="fa fa-plus-circle"></i>Adicionar Cliente (com Atendimento)</a></li>
                    <li class="<?php echo check_active(array("Lista-de-Atendimentos")); ?>"><a href="index.php?page=Lista-de-Atendimentos"><i class="fa fa-bars"></i>Lista de Atendimentos</a></li>
                </ul>
            </li>
            
            <li class="treeview <?php echo check_active(array("Adicionar-Cliente","Lista-de-Clientes","Editar-Cliente")); ?>">
                <a href="#">
                    <i class="fa fa-user"></i>
                    <span>Cliente</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php echo check_active(array("Adicionar-Cliente")); ?>"><a href="index.php?page=Adicionar-Cliente"><i class="fa fa-plus-circle"></i>Adicionar Cliente</a></li>
                    <li class="<?php echo check_active(array("Lista-de-Clientes")); ?>"><a href="index.php?page=Lista-de-Clientes"><i class="fa fa-bars"></i>Lista de Clientes</a></li>
                </ul>
            </li>
            
        </ul>
<?php } ?>
<?php
    function menu_aereo(){
?>
        <ul class="sidebar-menu">
            <!--Usa a classe active caso esteja na respectiva página do menu-->
            <li class="<?php  if(!isset($_GET["page"])){ echo "active"; } ?>">
                <a href="index.php">
                    <i class="fa fa-dashboard"></i> <span>Painel de Controle</span>
                </a>
            </li>
             <li class="treeview <?php echo check_active(array("Converter-Codigo","Adicionar-Voo","Lista-de-Voos")); ?>">
                <a href="#">
                    <i class="fa fa-plane"></i>
                    <span>Voo</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php echo check_active(array("Converter-Codigo")); ?>"><a href="index.php?page=Converter-Codigo"><i class="fa fa-wrench"></i>Converter Código</a></li>
                    <li class="<?php echo check_active(array("Adicionar-Voo")); ?>"><a href="index.php?page=Adicionar-Voo"><i class="fa fa-plus-circle"></i>Adicionar Voo</a></li>
                    <li class="<?php echo check_active(array("Lista-de-Voos")); ?>"><a href="index.php?page=Lista-de-Voos"><i class="fa fa-bars"></i> Lista de Voos</a></li>
                </ul>
            </li>
<!--
            <li class="treeview <?php echo check_active(array("Adicionar-Cambio","Lista-de-Cambios")); ?>">
                <a href="#">
                    <i class="fa fa-money"></i>
                    <span>Câmbio</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php echo check_active(array("Tabela-Cambio")); ?>"><a href="index.php?page=Tabela-Cambio"><i class="fa fa-table"></i>Gerar Tabela de Câmbio</a></li>                            
                </ul>
            </li>
-->
            
            <li class="treeview <?php echo check_active(array("Adicionar-Cliente-com-Atendimento","Adicionar-Atendimento","Lista-de-Atendimentos","Concluir-Venda","Editar-Atendimento")); ?>">
                <a href="#">
                    <i class="fa fa-comment"></i>
                    <span>Atendimento</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php echo check_active(array("Adicionar-Cliente-com-Atendimento")); ?>"><a href="index.php?page=Adicionar-Cliente-com-Atendimento"><i class="fa fa-plus-circle"></i>Adicionar Cliente (com Atendimento)</a></li>
                    <li class="<?php echo check_active(array("Lista-de-Atendimentos")); ?>"><a href="index.php?page=Lista-de-Atendimentos"><i class="fa fa-bars"></i>Lista de Atendimentos</a></li>
                </ul>
            </li>
            
            <li class="treeview <?php echo check_active(array("Adicionar-Cliente","Lista-de-Clientes","Editar-Cliente")); ?>">
                <a href="#">
                    <i class="fa fa-user"></i>
                    <span>Cliente</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php echo check_active(array("Adicionar-Cliente")); ?>"><a href="index.php?page=Adicionar-Cliente"><i class="fa fa-plus-circle"></i>Adicionar Cliente</a></li>
                    <li class="<?php echo check_active(array("Lista-de-Clientes")); ?>"><a href="index.php?page=Lista-de-Clientes"><i class="fa fa-bars"></i>Lista de Clientes</a></li>
                </ul>
            </li>
            
        </ul>
<?php } ?>

<?php
    function menu_escola(){
?>
        <ul class="sidebar-menu">
             <li class="treeview <?php echo check_active(array("Add-Yield-Management-Promotion")); ?>">
                <a href="#">
                    <i class="fa fa-tags"></i>
                    <span>Schools</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php echo check_active(array("Add-Yield-Management-Promotion")); ?>"><a href="index.php?page=Add-Yield-Management-Promotion"><i class="fa fa-plus-circle"></i>Add Yield Management Promotion</a></li>
                </ul>
            </li>
        </ul>
<?php } ?>
<?php
    function menu_convidado(){
?>
        <ul class="sidebar-menu">
            <li>
                <a href="#">
                    <span>Nenhuma Permissão para Convidado.</span>
                </a>
            </li>
        </ul>
<?php } ?>