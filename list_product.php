
<?php
    //cria a sessão table com o nome da table do bd, que sera usado em server_processing
    $_SESSION["table"]="digitulus_product";
?> 

<!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">                
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Lista de Produtos
                        <small></small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active"><?php echo str_replace("-"," ",$_GET["page"]); ?></li>
                    </ol>
                </section>
                <?php
                    if(isset($_GET["success"])){
                        if($_GET["success"]=="add"){
                            echo "
                                    <div class='alert alert-success alert-dismissable'>
                                        <i class='fa fa-check'></i>
                                        <b>Sucesso!</b> Adicionado com Sucesso.
                                    </div>";
                        }
                        if($_GET["success"]=="edit"){
                            echo "
                                    <div class='alert alert-success alert-dismissable'>
                                        <i class='fa fa-check'></i>
                                        <b>Sucesso!</b> Atualizado com Sucesso.
                                    </div>";
                        }
                    }
                ?>
                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box box-info">
                                <div class="box-header">
                                    <h3 class="box-title">Produtos</h3>                                    
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <a href="#" id="link" ><button type="submit" id="edit_btn" class="btn btn-warning">Editar Produtos</button></a>
                                    <table id="list_product" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>sku</th>
                                                <th>Nome</th>
                                                <th>Escola</th>
                                                <th visibility="false">Bairro</th>
                                                <th visibility="false">Cidade</th>
                                                <th>País</th>
                                                <th visibility="false">Duração do Curso (texto)</th>
                                                <th visibility="false">Descrição Curta</th>
                                                <th visibility="false">Descrição</th>
                                                <th visibility="false">Datas de Início</th>
                                                <th visibility="false">Feriados</th>
                                                <th visibility="false">Duração da Acomodação (texto)</th>
                                                <th visibility="false">Tipo de Acomodação</th>
                                                <th visibility="false">Tipo de Quarto</th>
                                                <th visibility="false">Tipo de Alimentação</th>
                                                <th visibility="false">Taxa de Matrícula</th>
                                                <th visibility="false">Taxa de Material</th>
                                                <th visibility="false">Taxa de Colocação em Acomodação</th>
                                                <th visibility="false">Taxa de Exames</th>
                                                <th visibility="false">Taxa de Correio Expresso</th>
                                                <th visibility="false">Taxa de Serviços aos Estudantes</th>
                                                <th visibility="false">Taxa de Transferência Internacional</th>
                                                <th visibility="false">Traslado do Aeroporto</th>
                                                <th visibility="false">Seguro</th>
                                                <th visibility="false">Vídeo</th>
                                                <th visibility="false">Rótulo da Imagem</th>
                                                <th visibility="false">Miniatura da Imagem</th>
                                                <th visibility="false">Condições da Passagem Aérea</th>
                                                <th visibility="false">Passagem Aérea Inclusa</th>
                                                <th visibility="false">Data de Criação</th>
                                                <th visibility="false">Aulas por Semana</th>
                                                <th visibility="false">Duração da Aula</th>
                                                <th visibility="false">Metadescrição</th>
                                                <th visibility="false">Produto Novo</th>
                                                <th visibility="false">Novo a partir de</th>
                                                <th visibility="false">Novo até</th>
                                                <th visibility="false">Status</th>
                                                <th visibility="false">Aéreo</th>
                                                <th visibility="false">Visibilidade</th>
                                                <th visibility="false">Requisitos</th>
                                                <th visibility="false">O que está incluso</th>
                                                <th visibility="false">O que não está incluso</th>
                                                <th visibility="false">URL</th>
                                                <th visibility="false">Idioma</th>
                                                <th visibility="false">Status Digitulus</th>
                                                <th visibility="false">Latitude</th>
                                                <th visibility="false">Longitude</th>
                                                <th visibility="false">Código da Moeda</th>
                                                <th visibility="false">Duração do Curso</th>
                                                <th visibility="false">Valor Bruto do Curso por Semana</th>
                                                <th visibility="false">Valor Promocional do Curso por Semana</th>
                                                <th visibility="false">Comissão do Curso</th>
                                                <th visibility="false">Duração da Acomodação</th>
                                                <th visibility="false">Valor da Acomodação por Semana</th>
                                                <th visibility="false">Desconto sobre o Valor da Acomodação para o Valor Promocional</th>
                                                <th visibility="false">Comissão da Acomodação</th>
                                                <th visibility="false">Valor da Taxa de Material</th>
                                                <th visibility="false">Valor da Taxa de Matrícula</th>
                                                <th visibility="false">Valor da Taxa de Colocação em Acomodação</th>
                                                <th visibility="false">Valor da Taxa de Exames</th>
                                                <th visibility="false">Valor da Taxa de Serviços aos Estudantes</th>
                                                <th visibility="false">Valor da Taxa de Correio Expresso</th>
                                                <th visibility="false">Valor do Traslado do Aeroporto</th>
                                                <th visibility="false">Desconto sobre o Valor das Taxas para o Valor Promocional</th>
                                                <th visibility="false">Valor do Seguro Obrigatório</th>
                                                <th visibility="false">Valor Padrão do Fator de Lucro</th>
                                                <th visibility="false">Fator de Lucro</th>
                                                <th visibility="false">Código IATA do Aeroporto de Chegada</th>
                                                <th visibility="false">Preço</th>
                                                <th visibility="false">Preço Especial</th>
                                                <th visibility="false">Custo</th>
                                                <th visibility="false">Preço Especial a partir de</th>
                                                <th visibility="false">Preço Especial até</th>
                                                <th>Editar</th>
                                                <th>Remover</th> 
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>sku</th>
                                                <th>Nome</th>
                                                <th>Escola</th>
                                                <th>Bairro</th>
                                                <th>Cidade</th>
                                                <th>País</th>
                                                <th>Duração do Curso (texto)</th>
                                                <th>Descrição Curta</th>
                                                <th>Descrição</th>
                                                <th>Datas de Início</th>
                                                <th>Feriados</th>
                                                <th>Duração da Acomodação (texto)</th>
                                                <th>Tipo de Acomodação</th>
                                                <th>Tipo de Quarto</th>
                                                <th>Tipo de Alimentação</th>
                                                <th>Taxa de Matrícula</th>
                                                <th>Taxa de Material</th>
                                                <th>Taxa de Colocação em Acomodação</th>
                                                <th>Taxa de Exames</th>
                                                <th>Taxa de Correio Expresso</th>
                                                <th>Taxa de Serviços aos Estudantes</th>
                                                <th>Taxa de Transferência Internacional</th>
                                                <th>Traslado do Aeroporto</th>
                                                <th>Seguro</th>
                                                <th>Vídeo</th>
                                                <th>Rótulo da Imagem</th>
                                                <th>Miniatura da Imagem</th>
                                                <th>Condições da Passagem Aérea</th>
                                                <th>Passagem Aérea Inclusa</th>
                                                <th>Data de Criação</th>
                                                <th>Aulas por Semana</th>
                                                <th>Duração da Aula</th>
                                                <th>Metadescrição</th>
                                                <th>Produto Novo</th>
                                                <th>Novo a partir de</th>
                                                <th>Novo até</th>
                                                <th>Status</th>
                                                <th>Aéreo</th>
                                                <th>Visibilidade</th>
                                                <th>Requisitos</th>
                                                <th>O que está incluso</th>
                                                <th>O que não está incluso</th>
                                                <th>URL</th>
                                                <th>Idioma</th>
                                                <th>Status Digitulus</th>
                                                <th>Latitude</th>
                                                <th>Longitude</th>
                                                <th>Código da Moeda</th>
                                                <th>Duração do Curso</th>
                                                <th>Valor Bruto do Curso por Semana</th>
                                                <th>Valor Promocional do Curso por Semana</th>
                                                <th>Comissão do Curso</th>
                                                <th>Duração da Acomodação</th>
                                                <th>Valor da Acomodação por Semana</th>
                                                <th>Desconto sobre o Valor da Acomodação para o Valor Promocional</th>
                                                <th>Comissão da Acomodação</th>
                                                <th>Valor da Taxa de Material</th>
                                                <th>Valor da Taxa de Matrícula</th>
                                                <th>Valor da Taxa de Colocação em Acomodação</th>
                                                <th>Valor da Taxa de Exames</th>
                                                <th>Valor da Taxa de Serviços aos Estudantes</th>
                                                <th>Valor da Taxa de Correio Expresso</th>
                                                <th>Valor do Traslado do Aeroporto</th>
                                                <th>Desconto sobre o Valor das Taxas para o Valor Promocional</th>
                                                <th>Valor do Seguro Obrigatório</th>
                                                <th>Valor Padrão do Fator de Lucro</th>
                                                <th>Fator de Lucro</th>
                                                <th>Código IATA do Aeroporto de Chegada</th>
                                                <th>Preço</th>
                                                <th>Preço Especial</th>
                                                <th>Custo</th>
                                                <th>Preço Especial a partir de</th>
                                                <th>Preço Especial até</th>
                                                <th>Editar</th>
                                                <th>Remover</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div><!-- /.box -->
                        </div>
                    </div>
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        <!-- page script -->
        <script type="text/javascript">
            //variável global contendo todos os skus que foram marcados
            var skus=[];
            //script para carregar o conteúdo da tabela
            $(document).ready(function() {
                
                //Coloca o input pra busca no head de cada coluna
                $('#list_product tfoot th').each( function () {
                    var title = $('#list_product thead th').eq( $(this).index() ).text();
                    $(this).html( '<input class="form-control" type="text" placeholder="Buscar '+title+'" />' );
                } );
                
                var cbx;
                var table = $('#list_product').DataTable( {
                    dom: 'Bfrtip',
//                    dom: 'C<"clear">lfrtip',
                    colReorder: true,
                    buttons: [
                        'colvis'
                    ],
                    "processing": true,
                    "serverSide": true,
                    //recebe o json desse página para ser aplicado na tabela
                    "ajax": {
                        "url":"pagination/pagination_serverside.php",
                        "type": "POST"
                    },
                    "fnCreatedRow": function( nRow, ajax, iDataIndex ) {
                         // nRow - this is the HTML element of the row
                         // aData - array of the data in the columns. Get column 4 data: aData[3]
                         // iDataIndex - row index in the table
                         // Append to the first column
                         //esse if else foi criado para salvar o status do checkbox, se um check box foi marcado, ele continuara marcado
                         //mesmo se mudar de página do datatabes, os status só será alterado se o usuário desmarcar o checkbox
                         var i=skus.indexOf(ajax[0]);
                         if(i != -1){
                             cbx="<input type='checkbox' value='"+ajax[0]+"' onclick='check_product(this);' checked /> ";
                         }
                         else{
                             cbx="<input type='checkbox' value='"+ajax[0]+"' onclick='check_product(this);' /> ";
                         }
                         // Adiciona checkbox na primeira coluna
                         $('td:eq(0)', nRow).prepend(cbx);
                         //pega a quantidade de colunas
                         var qt_col=$("#list_product thead th").length;
                        qt_col=qt_col-2;
                         //Gera o link para edição na última coluna
                         $('td:eq('+qt_col+')', nRow).html("<a href='index.php?page=Editar-Produto&sku="+ajax[0]+"'><i class='fa fa-edit'/> Editar</a>");
                        qt_col ++;
                        $('td:eq('+qt_col+')', nRow).html("<a href='index.php?page=Remover-Produto&sku="+ajax[0]+"'><i class='fa fa-times-circle'/> Remover Produto</a>");
                    },
                } );
                // Aplica o filtro
                $("#list_product tfoot input").on( 'keyup change', function () {
                    table
                        .column( $(this).parent().index()+':visible' )
                        .search( this.value )
                        .draw();
                } );
                var j=0;
                $('#list_product thead th').each( function () {
                    // Get the column API object
                    var visibility=$(this).attr('visibility');
                    var col = table.column( j );
                    // Toggle the visibility
                    if(visibility=="false"){
                      col.visible(false);
                    }
                    j++;
                } );
                
            } );
            //função para salvar ids de múltiplos produtos
            function check_product(checkbox){
                //verifica se o checkbox foi marcado, caso tenha sido marcado adiciona o sku no vetor
                if(checkbox.checked==1){
                    skus.push(checkbox.value);
                }
                //se o check box foi desmarcado o sku é removido do vetor
                else{
                    var index;
                    //procura o sku no vetor e retorna o index
                    index = skus.indexOf(checkbox.value);
                    //se encontrou, remove a partir do index. Se o index == -1 quer dizer que o sku não foi encontrado no vetor
                    if (index != -1) {
                        skus.splice(index, 1);
                    }
                }
                document.getElementById("edit_btn").innerHTML="Editar Produtos:<br/>"+skus;
                //gera o link com a array skus sendo passado via get
                create_link();
            }
            //função para gerara link para pagia de edição com múltiplos produtos 
            function create_link(){
                //se o vetor skus conter skus, gera o link, caso contrário, não gera
                if(skus.length > 0){   
                    document.getElementById("link").href="index.php?page=Editar-Produto&skus="+skus;
                }else{
                   document.getElementById("link").href="#";
                }
            }
        </script>